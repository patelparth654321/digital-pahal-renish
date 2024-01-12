<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    

    use AuthenticatesUsers{
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Custom Login form
    public function index()
    {
        return view("auth/login");
    }

    public function login(Request $request)
    {
        try {
           
            $rules = [
                'email' => 'required',
                'password' => ['required', 'min:6'],
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->with('error', __('Please enter required fields.'))->withInput();
            }
            $getUser = User::orWhere(['email' => $request->input('email'), 'phone'=>$request->input('email')])->first();            
            if (empty($getUser)) {
                return redirect()->back()->with('error', __('Your email id or password does not match in our system. Please try again'))->withInput();
            }else {
                $validCredentials = Hash::check($request->input('password'), $getUser->getAuthPassword());
                if(!$validCredentials){
                    return redirect()->back()->with('error', __('Your email id or password does not match in our system. Please try again'))->withInput();
                }
                if($getUser['status']==1){
                    Auth::login($getUser, $request->get('remember_me'));
                    $msg = "Logged in successfully.";
                    if(Auth::user()->user_type ==1) return redirect()->route('dashboard')->with('success', $msg);
                    if(Auth::user()->user_type ==2) return redirect()->route('accountant_dashboard')->with('success', $msg);
                    if(Auth::user()->user_type ==3) return redirect()->route('client_dashboard')->with('success', $msg);
                    
                }else {
                    return redirect()->back()->with('error', __('Your Account is inactive. Please connect with administrator.'))->withInput();
                }
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }
    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('login');
    }
}
