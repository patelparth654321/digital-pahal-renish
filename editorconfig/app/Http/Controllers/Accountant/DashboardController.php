<?php

namespace App\Http\Controllers\Accountant;
use App\Http\Controllers\CommonController;
use App\Models\Documents;
use App\Models\SupportTickets;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends CommonController
{
    public function index(){
        $data['total_client'] =User::select('id')->where(['user_type'=>3, 'added_by'=>Auth::user()->id])->get()->count();
        $data['total_documents'] = Documents::select('documents.id')->where(['documents.status'=>1])->join('users as u', 'u.id', '=', 'documents.client_id')->where(['u.added_by'=>Auth::user()->id])->get()->count();
        $data['reviewed_document'] = Documents::select('documents.id')->where(['documents.status'=>1])->join('users as u', 'u.id', '=', 'documents.client_id')->where(['u.added_by'=>Auth::user()->id, 'view_status'=>1])->get()->count();
        $data['pending_document'] =Documents::select('documents.id')->where(['documents.status'=>1])->join('users as u', 'u.id', '=', 'documents.client_id')->where(['u.added_by'=>Auth::user()->id, 'view_status'=>0])->get()->count();
        
        $data['clients'] = User::select('users.*', 'a.*', DB::raw('(SELECT COUNT(*) FROM documents as d WHERE d.client_id = users.id) as total_documents'), DB::raw('(SELECT COUNT(*) FROM documents as d WHERE d.client_id = users.id AND d.view_status=0) as unread_documents'))->join('client_details as a', 'a.client_id', '=', 'users.id')->where(['users.user_type'=>3, 'added_by'=>Auth::user()->id])->orderBy('users.id', 'desc')->groupBy('users.id')->limit(10,0)->get()->toArray();

        return view('accountant.dashboard.index', $data);
    }
}
