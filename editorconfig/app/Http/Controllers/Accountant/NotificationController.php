<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\CommonController;
use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;
class NotificationController extends CommonController
{
    public function index()
    {

        $data['unread'] = Notifications::where(['to_id'=>Auth::user()->id, 'read_status'=>0])->orderBy('id', 'desc')->get()->toArray();
        $data['read'] = Notifications::where(['to_id'=>Auth::user()->id, 'read_status'=>1])->orderBy('id', 'desc')->get()->toArray();
        return view('accountant.notifications', $data);
    }

    public function markAsRead(){
        Notifications::where(['to_id'=>Auth::user()->id, 'read_status'=>0])->update(['read_status'=>1]);
        $message = __("Data updated successfully");
        return redirect()->back()->with('success', $message);
    }

}
