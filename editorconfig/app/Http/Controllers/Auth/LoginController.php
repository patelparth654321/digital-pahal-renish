<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\CommonController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends CommonController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  //  protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest')->except('logout');
    }

    // Custom Login form
    public function showLoginForm()
    {
        return view("auth/login");
    }

    public function login(Request $request)
    {
        try {
           
            $rules = [
                'email' => 'required|email',
                'password' => ['required', 'min:6'],
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(3, 200);
                die;
            }
            $getUser = User::where(['email' => $request->input('email')])->first();            
            if (empty($getUser)) {
                return response()->json(2, 200); 
            }else {
                $validCredentials = Hash::check($request->input('password'), $getUser->getAuthPassword());
                if(!$validCredentials){
                    return response()->json(2, 200);
                    die;
                }
                if($getUser['status']==1){
                   
                        Auth::login($getUser);
                    
                    return response()->json($getUser, 200);
                }else {
                    return response()->json(1, 200);
                }
            }
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 500);
        }
    }
}
