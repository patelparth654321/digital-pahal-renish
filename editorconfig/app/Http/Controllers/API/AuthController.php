<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\AccountantDetails;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{

    public function login(Request $request)
    {
        try {
            $rules = [
                'email' => 'required',
                'password' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return $this->sendError($error, json_decode("{}"));
            }
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password]) || Auth::attempt(['phone' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                if ($user->user_type != "3") {
                    return $this->sendError('Invalid email or password.');
                } else {
                    $user['token'] =  $user->createToken('api')->accessToken;
                    $account_details = AccountantDetails::select('support_email_id', 'support_phone')->where(['accountant_id'=>$user['added_by']])->first();
                    $user['support_email_id']  = $account_details ? $account_details->support_email_id : "";
                    $user['support_phone']  = $account_details ? $account_details->support_phone : "";
                    return $this->sendResponse($user, 'Logged in successfully');
                }
            } else {
                return $this->sendError('Invalid email or password.');
            }
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }
    public function logout()
    {
        try {
            if (Auth::check()) {
                $user = Auth::user()->token();
                $user->revoke();
                $success['token'] =  null;
                return $this->sendResponse($success, 'Logged out successfully.');
            }
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, 500);
        }
    }

}
