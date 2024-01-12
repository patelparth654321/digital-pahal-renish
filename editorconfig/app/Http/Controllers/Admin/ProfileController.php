<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile');
    }

    public function updateProfile(Request $request) {
        try{  
            $user = Auth::user();
            $user->email = $request->email;
            if($request->new_password && $request->new_password!=""){
                if(Hash::check($request->old_password, $user->password)) {
                    $user->password = Hash::make($request->new_password); 
                    
                }else {
                    $message = __("Invalid old password");
                    return redirect()->back()->with('error', $message);
                }
            }
            $user->save();
            Settings::where('key', 'app_email')->update(['value' => $request->app_email]);
            Settings::where('key', 'app_phone')->update(['value' => $request->app_phone]);
            $message = __("Profile updated successfully");
            return redirect()->back()->with('success', $message);
                  
            
        }catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
