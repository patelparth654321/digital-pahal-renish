<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\CommonController;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
class RegisterController extends CommonController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
  
    public function register(Request $request)
    {
        try {
          
            $rules = [
                'name' => 'required',
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'min:6'],
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(3, 200);
                die;
            }
            $data = $request->all();
            $userid= strtolower(substr($data['name'], 0, 2).substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 6));
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'userid'=>$userid,
                'password' => Hash::make($data['password']),
            ]);
           // event(new Registered($user));
            return response()->json([$user], 200);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 500);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
   
}
