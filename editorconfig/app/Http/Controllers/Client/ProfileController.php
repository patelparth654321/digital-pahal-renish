<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends CommonController
{
    public function index(){
        return view('client.profile');
    }

    public function updatePassword(Request $request) {
        try{  
            $user = Auth::user();
            if($request->new_password && $request->new_password!=""){
                if(Hash::check($request->old_password, $user->password)) {
                    $user->password = Hash::make($request->new_password); 
                    $user->save();
                }else {
                    $message = __("Invalid old password");
                    return redirect()->back()->with('error', $message);
                }
            }
            
            $message = __("Profile updated successfully");
            return redirect()->back()->with('success', $message);
            
        }catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

}
