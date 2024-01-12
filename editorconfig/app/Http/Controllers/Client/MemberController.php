<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\CommonController;
use App\Models\Banks;
use App\Models\ClientDetails;
use App\Models\Documents;
use App\Models\DocumentTypes;
use App\Models\Notifications;
use App\Models\SupportChat;
use App\Models\SupportTickets;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class MemberController extends CommonController
{
    function __construct()
    {
    }
    public function index(Request $request)
    {
        $request = $request->all();
        $where['user_type'] = 3;
        $row =  User::select('users.*', 'a.*', DB::raw('(SELECT COUNT(*) FROM documents as d WHERE d.client_id = users.id) as total_documents'), DB::raw('(SELECT COUNT(*) FROM documents as d WHERE d.client_id = users.id AND d.view_status=0) as unread_documents'))->join('client_details as a', 'a.client_id', '=', 'users.id')->where(function ($query) {
            $query->orWhere(['added_by'=>Auth::user()->id]);
            $query->orWhere(['users.id'=>Auth::user()->id]);
        })->orderBy('users.id', 'desc');
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
        return view('client.members.index', $data);
    }
    public function add()
    {
        return view('client.members.add');
    }
    public function edit($id)
    {
        try {
            $data['row'] = User::join('client_details as a', 'a.client_id', '=', 'users.id')->where(['users.id' => $id, 'user_type' => 3, 'added_by'=>Auth::user()->id])->first();
            if ($data['row']) return view('client.members.edit', $data);
            else return redirect()->back()->with('error', "Invalid ID");
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function addUpdateMember(Request $request)
    {
        try {
            DB::beginTransaction();
            $rules = [
                'email' => $request->user_id ? ('required|email|unique:users,email,'.$request->user_id) : ('required|email|unique:users,email'),
                'phone' => $request->user_id ? ('required|unique:users,phone,'.$request->user_id) : ('required|unique:users,phone')
                
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return redirect()->back()->with('error', $error)->withInput();
            }
            $details = $request->only('name', 'email', 'phone');
            

            if (isset($request->user_id)) {
                
                $message = __("Data updated successfully");
                $details['updated_at'] = date('Y-m-d H:i:s');
                User::where('id', $request->user_id)->update($details);
                $user_id= $request->user_id;
            } else {
                $details['user_type'] = 3;
                $details['added_by'] = Auth::user()->id;
                $message = __("Data added successfully");
                $user_data = User::create($details);
                $user_id= $user_data->id;
            }

            $additionalInfo = $request->only('company_name', 'gst_number', 'address', 'pancard_number', 'gst_type','type');
            $additionalInfo['client_id'] = $user_id;
            $additionalInfo['type'] = 1;
            if($request->type){
                $additionalInfo['type'] = implode(',', $request->type);
            }
            $findData = ClientDetails::where(['client_id'=>$user_id])->first();
            if($findData){
                $additionalInfo['updated_at'] = date('Y-m-d H:i:s');
                $user_data =  ClientDetails::where('id', $findData->id)->update($additionalInfo);
            }else{
                ClientDetails::create($additionalInfo);
            }
            DB::commit();
            return redirect()->route('members')->with('success', $message);
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function view(Request $request, $id)
    {
        try {
            $data['data'] = User::join('client_details as a', 'a.client_id', '=', 'users.id')->where(['users.id' => $id, 'user_type' => 3])->where(function ($query) {
                $query->orWhere(['added_by'=>Auth::user()->id]);
                $query->orWhere(['users.id'=>Auth::user()->id]);
            })->first();
            if ($data['data']) {
                $data['docs'] = DocumentTypes::where(['type'=>1, 'parent_id'=>0])->get()->toArray();
                $data['docs'] = array_map(function ($d) use($id, $request) {
                
                    $d['subdocs'] = DocumentTypes::where(['type'=>1, 'parent_id'=>$d['id']])->get()->toArray();
                    $d['subdocs'] = array_map(function ($s) use($id, $request) {
                        $subdoc = Documents::where(['document_type'=>$s['key'], 'client_id'=>$id]);
                        if($request->month) $subdoc->where(['month'=>$request->month]);
                        if($request->year) $subdoc->where(['year'=>$request->year]);
                        $s['uploaded_docs'] = $subdoc->get()->toArray();
                        
                        return $s;
                    }, $d['subdocs']);
                    return $d;
                }, $data['docs']);
                $data['banks'] = Banks::where(['status' => 1])->get()->toArray();
                return view('client.members.view', $data);
            } else {
                return redirect()->back()->with('error', "Invalid ID");
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function details($id)
    {
        try {
            $data['data'] = User::join('client_details as a', 'a.client_id', '=', 'users.id')->where(['users.id' => $id, 'user_type' => 3])->where(function ($query) {
                $query->orWhere(['added_by'=>Auth::user()->id]);
                $query->orWhere(['users.id'=>Auth::user()->id]);
            })->first();
            if ($data['data']) {
                return view('client.members.details', $data);
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
            $notification['title'] = $company_name." viewed your document";
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

}
