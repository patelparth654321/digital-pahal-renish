<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Models\AccountantDetails;
use App\Models\ClientDetails;
use App\Models\Documents;
use App\Models\DocumentTypes;
use App\Models\Notifications;
use App\Models\Plans;
use App\Models\SupportChat;
use App\Models\SupportTickets;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountantController extends CommonController
{
    function __construct()
    {
    }
    public function index(Request $request)
    {
        $request = $request->all();
        $where['users.user_type'] = 2;
        $row = User::select(  'a.*', 'users.*', DB::raw('(SELECT COUNT(*) FROM users as u WHERE u.added_by = users.id) as count_row'))->join('accountant_details as a', 'a.accountant_id', '=', 'users.id');
        if (isset($request['status']))  $where['users.status'] = $request['status'];
        if (isset($request['type']))  $where['a.type'] = $request['type'];
        $row->where($where);
        if (isset($request['search'])) {
            $row->where(function ($query) use ($request) {
                $query->orWhere('users.name', 'LIKE', "%{$request['search']}%");
                $query->orWhere('users.phone', 'LIKE', "%{$request['search']}%");
                $query->orWhere('users.email', 'LIKE', "%{$request['search']}%");
                $query->orWhere('a.company_name', 'LIKE', "%{$request['search']}%");
            });
        }
        $data['rows'] = $row->orderBy('users.id', 'desc')->paginate(10);
        return view('admin.accountants.index', $data);
    }
    public function add()
    {
        
        $data['plans'] = Plans::where(['status'=>1])->get();
        return view('admin.accountants.add', $data);
    }
    public function edit($id)
    {
        try {
            $data['row'] = User::join('accountant_details as a', 'a.accountant_id', '=', 'users.id')->where(['users.id' => $id, 'user_type' => 2])->first();
            $data['plans'] = Plans::where(['status'=>1])->get();
            if ($data['row']) return view('admin.accountants.edit', $data);
            else return redirect()->back()->with('error', "Invalid ID");
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return view('admin.accountants.edit');
    }
    public function addUpdateAccountant(Request $request)
    {
        try {
            DB::beginTransaction();
            $details = $request->only('name', 'email', 'phone');
            $details['user_type'] = 2;
            $details['added_by'] = Auth::user()->id;
            $rules = [
                'email' => $request->user_id ? ('required|email|unique:users,email,'.$request->user_id) : ('required|email|unique:users,email'),
                'phone' => $request->user_id ? ('required|unique:users,phone,'.$request->user_id) : ('required|unique:users,phone')
                
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return redirect()->back()->with('error', $error)->withInput();
            }
            if (isset($request->user_id)) {
                
                $message = __("Data updated successfully");
                $details['updated_at'] = date('Y-m-d H:i:s');
                if($request->password) $details['password'] = Hash::make($request->password);
                User::where('id', $request->user_id)->update($details);
                $user_id= $request->user_id;
            } else {                
                $details['password'] = Hash::make($request->password);
                $message = __("Data added successfully");
                $user_data = User::create($details);
                $user_id= $user_data->id;
            }

            $additionalInfo = $request->only('alternate_number', 'company_name', 'gst_number', 'address', 'support_email_id', 'support_phone', 'plan_id', 'is_gst');
            $additionalInfo['accountant_id'] = $user_id;
            
            if ($request->hasFile('logo')) {
                
                $additionalInfo['logo'] = uniqid() . '.' . $request->logo->extension();
                $request->logo->move(public_path('upload/accountant/logo'), $additionalInfo['logo']);
            }
            if ($request->hasFile('adhaar_card')) {
                
                $additionalInfo['adhaar_card'] = uniqid() . '.' . $request->adhaar_card->extension();
                $request->adhaar_card->move(public_path('upload/accountant/aadhaar'), $additionalInfo['adhaar_card']);
            }
            if ($request->hasFile('pan_card')) {
                
                $additionalInfo['pan_card'] = uniqid() . '.' . $request->pan_card->extension();
                $request->pan_card->move(public_path('upload/accountant/pan'), $additionalInfo['pan_card']);
            }
            $findData = AccountantDetails::where(['accountant_id'=>$user_id])->first();
            if($request->type){
                $additionalInfo['type'] = implode(',', $request->type);
            }
            if($findData){
                $additionalInfo['updated_at'] = date('Y-m-d H:i:s');
                $user_data =  AccountantDetails::where('id', $findData->id)->update($additionalInfo);
            }else{
               // print_r($additionalInfo); die;
               $getPlan = Plans::where(['id'=>$request->plan_id])->first();
               $duration = "+1 year";
                if($getPlan && $getPlan->duration)  $duration = $getPlan->duration;
                $additionalInfo['plan_expiry_date'] = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . $duration ) );;
                AccountantDetails::create($additionalInfo);
            }
            DB::commit();
            return redirect()->route('accountants')->with('success', $message);
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }

    public function view(Request $request, $id)
    {
        try {
            $data['row'] = User::join('accountant_details as a', 'a.accountant_id', '=', 'users.id')->where(['users.id' => $id, 'user_type' => 2])->first();
            if ($data['row']) {
                $data['plan'] = Plans::where('id', '=', $data['row']['plan_id'])->first();
                $request = $request->all();
                $where['user_type'] = 3;
                $row =  User::join('client_details as a', 'a.client_id', '=', 'users.id')->where(['added_by'=>$id])->orderBy('users.id', 'desc')->groupBy('users.id');
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
                $data['clients'] = $row->paginate(10);
                $data['clients_count'] = User::where(['added_by'=>$id])->get()->count();
                return view('admin.accountants.view', $data);
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
                AccountantDetails::where('accountant_id', '=', $ids)->delete();
                $getCLients = User::where('added_by', '=', $ids)->get();
                foreach($getCLients as $c){
                    ClientDetails::where('client_id', '=', $c['id'])->delete();
                    Documents::where('client_id', '=', $c['id'])->delete();
                    SupportTickets::where('client_id', '=', $c['id'])->delete();
                    SupportChat::where('from_id', '=', $c['id'])->delete();
                    SupportChat::where('to_id', '=', $c['id'])->delete();
                }
                User::where('added_by', '=', $ids)->delete();
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

    public function sendNotifications(Request $request){
        try {
            DB::beginTransaction();
           
            $details = $request->only('title', 'description');
            if ($request->hasFile('attachment')) {
                $details['attachment'] = uniqid() . '.' . $request->attachment->extension();
                $request->attachment->move(public_path('upload/notifications'), $details['attachment']);
            }
            $details['send_by'] = Auth::user()->id;
            $to_ids = explode(',', $request->to_ids);
            foreach($to_ids as $id){
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

    public function notifications(){
        $data['accountants'] =  User::join('accountant_details as a', 'a.accountant_id', '=', 'users.id')->where(['added_by'=>Auth::user()->id, 'status'=>1, 'user_type'=>2])->orderBy('users.id', 'desc')->groupBy('users.id')->get()->toArray();

        $data['notifications'] = Notifications::where(['send_by'=>Auth::user()->id])->groupBy('title')->orderBy('id', 'desc')->get()->toArray();

        return view('admin.accountants.notifications', $data);
    }

    public function viewClient(Request $request, $id){
        try {
            $data['row'] = User::join('client_details as a', 'a.client_id', '=', 'users.id')->where(['users.id' => $id, 'user_type' => 3])->first();
            if ($data['row']) {
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

                $data['members'] = User::select('users.*', 'a.*', DB::raw('(SELECT COUNT(*) FROM documents as d WHERE d.client_id = users.id) as total_documents'), DB::raw('(SELECT COUNT(*) FROM documents as d WHERE d.client_id = users.id AND d.view_status=0) as unread_documents'))->join('client_details as a', 'a.client_id', '=', 'users.id')->where(['added_by'=>$id])->orderBy('users.id', 'desc')->get();
                return view('admin.accountants.client_view', $data);
           } else {
               return redirect()->back()->with('error', "Invalid ID");
           }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
