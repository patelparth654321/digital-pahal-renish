<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\CommonController;
use App\Models\ClientDetails;
use App\Models\Documents;
use App\Models\DocumentSubtypes;
use App\Models\DocumentTypes;
use App\Models\Notifications;
use App\Models\SupportChat;
use App\Models\SupportTickets;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientController extends CommonController
{
    function __construct()
    {
    }
    public function index(Request $request)
    {
        $request = $request->all();
        $where['user_type'] = 3;
        $row =  User::select('users.name', 'users.email', 'users.phone', 'a.*', DB::raw('(SELECT COUNT(*) FROM documents as d WHERE d.parent_id = users.id) as total_documents'), DB::raw('(SELECT COUNT(*) FROM documents as d WHERE d.parent_id = users.id AND d.view_status=0) as unread_documents'))->join('client_details as a', 'a.client_id', '=', 'users.id')->where(['added_by' => Auth::user()->id])->orderBy('users.id', 'desc');

        if (isset($request['read_status'])) {
            if ($request['read_status'] == 'read') {
                $row->having('unread_documents', '=', 0);
            } elseif ($request['read_status'] == 'unread') {
                $row->having('unread_documents', '>', 0);
            }
        }

        if (isset($request['status']))  $where['status'] = $request['status'];
        if (isset($request['type'])) $row->where('type', 'LIKE', "%{$request['type']}%");
        $row->where($where);
        if (isset($request['search'])) {
            $row->where(function ($query) use ($request) {
                $query->orWhere('name', 'LIKE', "%{$request['search']}%");
                $query->orWhere('phone', 'LIKE', "%{$request['search']}%");
                $query->orWhere('email', 'LIKE', "%{$request['search']}%");
                $query->orWhere('company_name', 'LIKE', "%{$request['search']}%");
            });
        }
        $data['rows'] = $row->paginate(10);

        return view('accountant.clients.index', $data);
    }
    public function add()
    {
        return view('accountant.clients.add');
    }
    public function edit($id)
    {
        try {
            $data['row'] = User::join('client_details as a', 'a.client_id', '=', 'users.id')->where(['users.id' => $id, 'user_type' => 3, 'added_by' => Auth::user()->id])->first();
            if ($data['row']) return view('accountant.clients.edit', $data);
            else return redirect()->back()->with('error', "Invalid ID");
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function addUpdateAccountant(Request $request)
    {
        try {
            DB::beginTransaction();
            $rules = [
                'email' => $request->user_id ? ('required|email|unique:users,email,' . $request->user_id) : ('required|email|unique:users,email'),
                'phone' => $request->user_id ? ('required|unique:users,phone,' . $request->user_id) : ('required|unique:users,phone')

            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return redirect()->back()->with('error', $error)->withInput();
            }
            $details = $request->only('name', 'email', 'phone');
            $details['user_type'] = 3;
            $details['added_by'] = Auth::user()->id;

            if (isset($request->user_id)) {

                $message = __("Data updated successfully");
                $details['updated_at'] = date('Y-m-d H:i:s');
                if ($request->password) $details['password'] = Hash::make($request->password);
                User::where('id', $request->user_id)->update($details);
                $user_id = $request->user_id;
            } else {

                $details['password'] = Hash::make($request->password);
                $message = __("Data added successfully");
                $user_data = User::create($details);
                $user_id = $user_data->id;
               // $user_data->notify(new \App\Notifications\WelcomeMailNotification($user_data));
            }

            $additionalInfo = $request->only('company_name', 'gst_number', 'address', 'pancard_number', 'gst_type');
            $additionalInfo['client_id'] = $user_id;
            $additionalInfo['type'] = 1;
            if ($request->type) {
                $additionalInfo['type'] = implode(',', $request->type);
            }
            $findData = ClientDetails::where(['client_id' => $user_id])->first();
            if ($findData) {
                $additionalInfo['updated_at'] = date('Y-m-d H:i:s');
                $user_data =  ClientDetails::where('id', $findData->id)->update($additionalInfo);
            } else {
                ClientDetails::create($additionalInfo);
            }
            DB::commit();
            return redirect()->route('clients')->with('success', $message);
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }

    public function view(Request $request, $id)
    {
        $parentid = $request->parentid ? $request->parentid : Auth::user()->id;
        try {
            $data['row'] = User::join('client_details as a', 'a.client_id', '=', 'users.id')->where(['users.id' => $id, 'user_type' => 3])->where(function ($query) use ($parentid) {
                $query->orWhere(['added_by' => Auth::user()->id]);
                $query->orWhere(['added_by' => $parentid]);
            })->first();
            if ($data['row']) {
                $data['docs'] = DocumentTypes::where(['type' => 1, 'parent_id' => 0])->get()->toArray();
                $data['docs'] = array_map(function ($d) use ($id, $request) {

                    $d['subdocs'] = DocumentTypes::where(['type' => 1, 'parent_id' => $d['id']])->get()->toArray();
                    $d['subdocs'] = array_map(function ($s) use ($id, $request) {
                        $subdoc = Documents::where(['document_type' => $s['key'], 'client_id' => $id]);
                        if ($request->month) $subdoc->where(['month' => $request->month]);
                        if ($request->year) $subdoc->where(['year' => $request->year]);
                        $s['uploaded_docs'] = $subdoc->get()->toArray();

                        return $s;
                    }, $d['subdocs']);
                    return $d;
                }, $data['docs']);

                $data['members'] = User::select('users.*', 'a.*', DB::raw('(SELECT COUNT(*) FROM documents as d WHERE d.client_id = users.id) as total_documents'), DB::raw('(SELECT COUNT(*) FROM documents as d WHERE d.client_id = users.id AND d.view_status=0) as unread_documents'))->join('client_details as a', 'a.client_id', '=', 'users.id')->where(['added_by' => $id])->orderBy('users.id', 'desc')->get();
                return view('accountant.clients.view', $data);
            } else {
                return redirect()->back()->with('error', "Invalid ID");
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    function clientDetails(Request $request, $id){
        $parentid = $request->parentid ? $request->parentid : Auth::user()->id;
        try {
            $data['row'] = User::join('client_details as a', 'a.client_id', '=', 'users.id')->where(['users.id' => $id, 'user_type' => 3])->where(function ($query) use ($parentid) {
                $query->orWhere(['added_by' => Auth::user()->id]);
                $query->orWhere(['added_by' => $parentid]);
            })->first();
            if ($data['row']) {
                
                return view('accountant.clients.details', $data);
            } else {
                return redirect()->back()->with('error', "Invalid ID");
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function statusChange(Request $request)
    {
        $result = ["code" => 400];
        try {
            $ids = $request->input('id');
            $status = $request->input('status');
            User::where('id', '=', $ids)->update(['status' => $status]);
            $result["code"] = 200;
            $result["message"] =   __("Data updated successfully.");
        } catch (\Throwable $th) {
            $result["message"] = $th->getMessage();
        }
        return response()->json($result, $result["code"]);
    }
    public function delete(Request $request)
    {
        $result = ["code" => 400];
        try {
            $ids = $request->input('id');

            User::where('id', '=', $ids)->delete();
            ClientDetails::where('client_id', '=', $ids)->delete();
            Documents::where('client_id', '=', $ids)->delete();
            SupportTickets::where('client_id', '=', $ids)->delete();
            SupportChat::where('from_id', '=', $ids)->delete();
            SupportChat::where('to_id', '=', $ids)->delete();

            $result["code"] = 200;
            $result["message"] = __("Data deleted successfully.");
        } catch (\Throwable $th) {
            $result["message"] = $th->getMessage();
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
    public function documentStatusChange(Request $request)
    {
        $result = ["code" => 400];
        try {
            $ids = $request->input('id');
            Documents::where('id', '=', $ids)->update(['view_status' => 1]);
            $getDoc = Documents::select('dt.title', 'documents.client_id')->where('documents.id', '=', $ids)->join('document_types as dt', 'dt.key', '=', 'documents.document_type')->first();
            $company_name = Auth::user()->accountant()->first()->company_name;
            $notification['title'] = $company_name . " viewed your document";
            $notification['description'] = "Your $getDoc->title has been recently viewed by your accountant firm, $company_name.";
            $notification['to_id'] = $getDoc->client_id;
            Notifications::create($notification);
            $result["code"] = 200;
            $result["message"] =   __("Data updated successfully.");
        } catch (\Throwable $th) {
            $result["message"] = $th->getMessage();
        }
        return response()->json($result, $result["code"]);
    }

    public function sendNotifications(Request $request)
    {
        try {
            DB::beginTransaction();

            $details = $request->only('title', 'description');
            if ($request->hasFile('attachment')) {
                $details['attachment'] = uniqid() . '.' . $request->attachment->extension();
                $request->attachment->move(public_path('upload/notifications'), $details['attachment']);
            }
            $details['send_by'] = Auth::user()->id;
            $to_ids = explode(',', $request->to_ids);
            foreach ($to_ids as $id) {
                $details['to_id']  = $id;
                Notifications::create($details);
            }
            $message = __("Notification sent successfully");
            DB::commit();
            return redirect()->back()->with('success', $message);
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function notifications()
    {
        $data['clients'] =  User::join('client_details as a', 'a.client_id', '=', 'users.id')->where(['added_by' => Auth::user()->id, 'status' => 1, 'user_type' => 3])->orderBy('users.id', 'desc')->groupBy('users.id')->get()->toArray();

        $data['notifications'] = Notifications::where(['send_by' => Auth::user()->id])->groupBy('title')->orderBy('id', 'desc')->get()->toArray();

        return view('accountant.clients.notifications', $data);
    }

    public function gst(Request $request)
    {
        $parentid = $request->parentid ? $request->parentid : Auth::user()->id;
        $data['data'] = User::where(['user_type' => 3, 'id' => $request->client_id])->where(function ($query) use($parentid) {
            $query->orWhere(['added_by' => $parentid]);
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
        return view('accountant.clients.gst', $data);
    }

    public function dataSummary(Request $request, $id)
    {
        $parentid = $request->parentid ? $request->parentid : Auth::user()->id;
        $month = isset($request->month) ? $request->month : date('m');
        $year = $request->year ? $request->year : date('Y');
        $user_data = $data['user'] =   User::select('users.id', 'users.name', 'c.gst_type', 'c.company_name', 'c.gst_number')->join('client_details as c', 'c.client_id', '=', 'users.id')->where(['users.user_type' => 3, 'users.id' => $id])->where(function ($query) use ($parentid) {
            $query->orWhere(['users.added_by' => Auth::user()->id]);
            $query->orWhere(['users.added_by' => $parentid]);
        })->first();
        if (!$user_data) return redirect()->back()->with('error', "Invalid ID");

        $data['uploaded_docs'] =  $this->getCurrentMonthData($id, $month, $year, $user_data->gst_type);
        $data['b2b'] = $data['b2c_large'] = $data['b2c'] = $data['credit_notes'] = $total_amount  = dataSummaryArr();
        foreach ($data['uploaded_docs'] as $d) {
            if ($d['sub_type'] == "b2c") {
                $data['b2c'] = getTotalOfFiled($d['document'], $data['b2c'], 'b2c');
                $data['b2c_large'] = getTotalOfFiled($d['document'], $data['b2c_large'], 'b2c_large');
            } elseif ($d['sub_type'] == "b2b") {
                $data['b2b'] = getTotalOfFiled($d['document'], $data['b2b'], 'b2b');
                $data['credit_notes'] = getTotalOfFiled($d['document'], $data['credit_notes'], 'credit_notes');
            } elseif ($d['sub_type'] == "forward_sheet" || $d['sub_type'] == 'forward_adjustment_sheet') {
                $data['b2c'] = getTotalOfFiledXls($d['document'], $data['b2c'], 'b2c', $d['sub_type']);
                $data['b2c_large'] = getTotalOfFiledXls($d['document'], $data['b2c_large'], 'b2c_large', $d['sub_type']);
            } elseif ($d['sub_type'] == "reverse_sheet" || $d['sub_type'] == 'reverse_adjustment_sheet') {
                $data['b2c'] = getTotalOfFiledXlsReverse($d['document'], $data['b2c'], 'b2c', $d['sub_type']);
                $data['b2c_large'] = getTotalOfFiledXlsReverse($d['document'], $data['b2c_large'], 'b2c_large', $d['sub_type']);
            } elseif ($d['sub_type'] == "sales") {
                $data['b2c'] = getTotalOfFieldSalesReport($d['document'], $data['b2c'], 'b2c', $d['sub_type']);
                $data['b2c_large'] = getTotalOfFieldSalesReport($d['document'], $data['b2c_large'], 'b2c_large', $d['sub_type']);
            } elseif ($d['sub_type'] == "gst") {
                $data['b2c'] = getTotalOfFieldGSTReport($d['document'], $data['b2c'], 'b2c', $d['sub_type']);
                $data['b2c_large'] = getTotalOfFieldGSTReport($d['document'], $data['b2c_large'], 'b2c_large', $d['sub_type']);
            }
        }
        $total_amount = getTotalDataSummary($total_amount, $data['b2b']);
        $total_amount = getTotalDataSummary($total_amount, $data['b2c']);
        $total_amount = getTotalDataSummary($total_amount, $data['b2c_large']);
        $total_amount = getTotalDataSummary($total_amount, $data['credit_notes']);
        $data['total_amount'] = $total_amount;
        $data['parent_id'] = $request->parentid ? $request->parentid : "";
        $data['clients'] = User::select('users.name', 'users.id')->where(['added_by' => Auth::user()->id])->orderBy('users.id', 'desc')->get()->toArray();
        return view('accountant.clients.data-summary', $data);
    }

    public function downloadZip(Request $request)
    {
        $month = isset($request->month) ? $request->month : date('m');
        $year = isset($request->year) ? $request->year : date('Y');
        $isHsn = isset($request->is_hsn) ? 1 : 0;
        $this->downloadZipFileHelper($request->id, $month, $year, $request->gst_type, $isHsn);
    }

    public function downloadJson(Request $request)
    {
        $month = isset($request->month) ? $request->month : date('m');
        $year = isset($request->year) ? $request->year : date('Y');
        $isHsn = isset($request->is_hsn) ? 1 : 0;

        $uploadedData = $this->getCurrentMonthData($request->id, $month, $year, $request->gst_type);

        $data[] =['sply_ty' => "INTRA", 'rt' => 0, "typ" => "OE", 'pos' => "", 'txval' => 0, 'iamt' => 0, 'samt' => 0, 'camt' => 0, 'csamt' => 0];
        $hsnData[] = ['num' => "", 'hsn_sc' => "", 'uqc' => '', 'qty' => 0, 'rt' => 0, 'txval' => 0.0, 'iamt' => 0, "samt" => 0, "camt" => 0, 'csamt' => 0];
        $b2bData = [];
        $creditDebitNotes = [];
        foreach ($uploadedData as $d) {
            if ($d['sub_type'] == "gst") {
                $data = getFlipKartGstJson($d['document'], $data);
                if ($isHsn) $hsnData = getFlipKartGstHsnJson($d['document'], $hsnData);
            } elseif ($d['sub_type'] == "sales") {
                $data = getFlipKartSalesJson($d['document'], $data);
                if ($isHsn) $hsnData = getFlipKartSalesHsnJson($d['document'], $hsnData);
            } elseif ($d['sub_type'] == "forward_sheet") {
                $data = getMeeshoForwardJson($d['document'], $data);
                if ($isHsn) $hsnData = getMeeshoForwardHsnJson($d['document'], $hsnData);
            } elseif ($d['sub_type'] == "reverse_sheet") {
                $data = getMeeshoReverseJson($d['document'], $data);
                if ($isHsn) $hsnData = getMeeshoReverseHsnJson($d['document'], $hsnData);
            } elseif ($d['sub_type'] == "b2c") {
                $data = getAmazoneB2cJson($d['document'], $data);
                if ($isHsn) $hsnData = getAmazoneB2cHsnJson($d['document'], $hsnData);
            } elseif ($d['sub_type'] == "b2b") {
                $b2bData = getAmazoneB2bJson($d['document'], $b2bData, 'b2b');
                $creditDebitNotes = getAmazoneB2bJson($d['document'], $creditDebitNotes, 'credit');
            }
        }
        $getClientDetail = ClientDetails::select('gst_number')->where(['client_id' => $request->id])->first();
        $finalData['fp'] = $month . '' . $year;
        $finalData['gstin'] = $getClientDetail->gst_number;
        $data = array_values(array_filter($data, function ($a) {
            return $a['txval'] != 0;
          }));
        if (!empty($data)) {
            $finalData['b2cs'] =  $data;
        }
        $b2bData = array_values(array_filter($b2bData, function ($a) {
            return $a['ctin'] != "";
          }));
        if (!empty($b2bData)) {
            $finalData['b2b'] =  $b2bData;
        }
        $creditDebitNotes = array_values(array_filter($creditDebitNotes, function ($a) {
            return $a['ctin'] != "";
          }));
        if (!empty($creditDebitNotes)) {
            $finalData['cdnr'] =  $creditDebitNotes;
        }
        $hsnData = array_values(array_filter($hsnData, function ($a) {
            return $a['txval'] != 0;
          }));
        if (!empty($hsnData)) {
            $finalData['hsn']['data'] =  $hsnData;
        }
        
        // Downloading the zip file
        header('Content-disposition: attachment; filename=R1' . $finalData['gstin'] . '_' . $month . '_' . $year . '.json');
        header('Content-type: application/json');
        echo json_encode($finalData);
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
