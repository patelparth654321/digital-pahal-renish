<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\CommonController;
use App\Models\Banks;
use App\Models\Documents;
use App\Models\DocumentSubtypes;
use App\Models\DocumentTypes;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends CommonController
{
    public function gst(Request $request)
    {
        $data['data'] = User::where(['user_type' => 3, 'id' => $request->client_id])->where(function ($query) {
            $query->orWhere(['added_by' => Auth::user()->id]);
            $query->orWhere(['id' => Auth::user()->id]);
        })->first();
        if (!$data['data']) return redirect()->back()->with('error', "Invalid ID");
        $rows = DocumentTypes::where(['type' => 2, 'parent_id' => 0])->first();
        $data['subdocs'] = DocumentTypes::where(['type' => 2, 'parent_id' => $rows['id']])->get()->toArray();
        $data['subdocs'] = array_map(function ($s) use ($request) {
            $subdoc = Documents::where(['document_type' => $s['key'], 'client_id' => $request->client_id]);
            if ($request->month) $subdoc->where(['month' => $request->month]);
            else $subdoc->where(['month' => date('m')]);
            if ($request->year) $subdoc->where(['year' => $request->year]);
            else $subdoc->where(['year' => date('Y')]);
            $s['uploaded_docs'] = $subdoc->get()->toArray();
            $s['count'] = 0;
            foreach ($s['uploaded_docs'] as $d) {
                if ($d['sub_type'] == 'reverse_sheet' || $d['sub_type'] == 'reverse_adjustment_sheet') {
                    $s['count'] = (float)$s['count'] - getGstFileTotal($d['document'], $d['sub_type']);
                } else {
                    $s['count'] = (float)$s['count'] + getGstFileTotal($d['document'], $d['sub_type']);
                }
            }
            $s['count'] = round($s['count'], 2);

            $s['sub_types'] = DocumentSubtypes::where(['parent_key' => $s['key']])->get();

            return $s;
        }, $data['subdocs']);
        return view('client.documents.gst', $data);
    }

    public function uploadDocument(Request $request)
    {
        $result = ["code" => 400];
        try {

            DB::beginTransaction();

            if ($request->hasFile('file')) {
                $rules = [];
                if ($request->parent_docuent == "gst_billing_documents") {
                    $rules = [
                        'month' => 'required',
                    ];
                }
                if ($request->document_type == "bank_statement") {
                    $rules = [
                        'bank' => 'required'
                    ];
                }
                if ($request->document_type == "tax_other_documents" || $request->document_type == "personal_other_documents") {
                    $rules = [
                        'sub_type' => 'required'
                    ];
                }
                if ($request->category == "With Pass") {
                    $rules['password'] = 'required';
                }

                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    $result["message"] = $validator->errors()->first();
                } else {
                    $details = $request->only('document_type', 'month', 'bank', 'category', 'password', 'client_id', 'sub_type');
                    $details['year'] = date('Y');

                    $details['document'] = uniqid() . '.' . $request->file->getClientOriginalExtension();
                    $details['document_name'] = $request->file->getClientOriginalName();
                    if ($request->file->move(public_path('upload/documents'), $details['document'])) {
                        $details['parent_id'] = Auth::user()->id;
                        $data =  Documents::create($details);
                        $company_name = Auth::user()->name;
                        $getDoc = Documents::select('dt.title', 'documents.client_id')->where('documents.id', '=', $data->id)->join('document_types as dt', 'dt.key', '=', 'documents.document_type')->first();
                        $notification['title'] = $company_name . " uploaded new document";
                        $notification['description'] = "Your Client $company_name has been recently uploaded new document: $getDoc->title.";
                        $notification['to_id'] = Auth::user()->added_by;
                        Notifications::create($notification);
                        DB::commit();
                        $result["code"] = 200;
                        $result["message"] = __("Data added successfully");
                    } else {
                        $result["message"] = __("Error!! Please try again.");
                    }
                }
            } else {
                $result["message"] = __("Please upload file");
            }
        } catch (\Exception $exception) {
            DB::rollback();
            $result["message"] = $exception->getMessage();
        }
        return response()->json($result, $result["code"]);
    }

    public function deleteDocument(Request $request)
    {
        $result = ["code" => 400];
        try {
            $ids = $request->input('id');
            $getDocument = Documents::where('id', '=', $ids)->first();
            removeImage($getDocument->document, 'documents');
            Documents::where('id', '=', $ids)->delete();
            $result["code"] = 200;
            $result["message"] = __("Data deleted successfully.");
        } catch (\Throwable $th) {
            $result["message"] = $th->getMessage();
        }
        return response()->json($result, $result["code"]);
    }

    public function uploadGstDocument(Request $request)
    {
        $result = ["code" => 400];
        try {
            
            $rules = [
                'month' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $result["message"] = $validator->errors()->first();
            } else {

                DB::beginTransaction();
                $details = $request->only('document_type', 'sub_type', 'client_id', 'month');
                $getDoc = Documents::where(['document_type' => $details['document_type'], 'sub_type' => $details['sub_type'], 'client_id' => $details['client_id'], 'year' => date('Y'), 'month' => $details['month']])->first();
                if ($getDoc) {
                    return response()->json(["message" => "Document already uploaded for selected month."], $result["code"]);
                }
                if ($request->hasFile('file')) {
                    $details['year'] = date('Y');
                    $details['document'] = uniqid() . '.' . $request->file->getClientOriginalExtension();
                    $details['document_name'] = $request->file->getClientOriginalName();
                    if ($request->file->move(public_path('upload/documents'), $details['document'])) {
                        $details['parent_id'] = Auth::user()->id;
                        $data =  Documents::create($details);
                        $company_name = Auth::user()->name;
                        $getDoc = Documents::select('dt.title', 'documents.client_id')->where('documents.id', '=', $data->id)->join('document_types as dt', 'dt.key', '=', 'documents.document_type')->first();
                        $notification['title'] = $company_name . " uploaded new document";
                        $notification['description'] = "Your Client $company_name has been recently uploaded new document: $getDoc->title.";
                        $notification['to_id'] = Auth::user()->added_by;
                        Notifications::create($notification);
                        DB::commit();
                        $result["code"] = 200;
                        $result["message"] = __("Data added successfully");
                    } else {
                        $result["message"] = __("Error!! Please try again.");
                    }
                } else {
                    $result["message"] = __("Please upload file");
                }
            }
        } catch (\Exception $exception) {
            DB::rollback();
            $result["message"] = $exception->getMessage();
        }
        return response()->json($result, $result["code"]);
    }
}
