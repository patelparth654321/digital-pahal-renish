<?php

namespace App\Http\Controllers\Accountant;
use App\Http\Controllers\CommonController;
use App\Models\AccountantDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ProfileController extends CommonController
{
    public function index(){
        return view('accountant.profile');
    }

    public function updatePassword(Request $request) {
        try{  
            $user = Auth::user();
            if($request->new_password && $request->new_password!=""){
                if(Hash::check($request->old_password, $user->password)) {
                    $user->password = Hash::make($request->old_passwordold_password); 
                    $user->save();
                }else {
                    $message = __("Invalid old password");
                    return redirect()->back()->with('error', $message);
                }
            }
            
            $message = __("Password changed successfully");
            return redirect()->back()->with('success', $message);
            
        }catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    
    public function updateProfile(Request $request) {
        try{  
            $user = Auth::user();
            $rules = [
                'support_email_id' => ('required|email'),
                'support_phone' =>('required')
                
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return redirect()->back()->with('error', $error)->withInput();
            }
               
            
            AccountantDetails::where(['accountant_id'=>$user->id])->update($request->only('support_email_id', 'support_phone'));            
            $message = __("Profile updated successfully");
            return redirect()->back()->with('success', $message);
            
        }catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

}
