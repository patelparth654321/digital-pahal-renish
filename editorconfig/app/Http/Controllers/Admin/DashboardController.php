<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\CommonController;
use App\Models\Documents;
use App\Models\SupportTickets;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends CommonController
{
    function __construct()
    {
        
    }
    public function index(){
        $data['total_client'] =User::select('id')->where([ 'user_type'=>3])->get()->count();
        $data['total_accountant'] =User::select('id')->where(['user_type'=>2])->get()->count();
        $data['total_documents'] = Documents::select('id')->get()->count();
        $data['total_support_tickets'] = User::select('id')->where(['status'=>1, 'user_type'=>2])->get()->count();
        $data['latest_accoutants'] =User::select(  'a.*', 'users.*', DB::raw('(SELECT COUNT(*) FROM users as u WHERE u.added_by = users.id) as count_row'))->join('accountant_details as a', 'a.accountant_id', '=', 'users.id')->where(['users.user_type'=>2])->orderBy('users.id', 'desc')->groupBy('users.id')->limit(10,0)->get()->toArray();
        return view('admin.dashboard.index', $data);
    }
}
