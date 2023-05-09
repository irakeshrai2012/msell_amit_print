<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\LoginLogs;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
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
    public function login(Request $request)
    {
        //     $this->username() => 'required',
        //     'password' => 'required',
        // ]);
        if(!empty(Auth::user()) && !empty($request->is_checking_out)){
            //dd(Auth::user());
            return redirect('checkout');
        }
        if ((Auth::attempt(['email' => $request->username, 'password' => $request->password]))) {
            $user = Auth::user();

            if($user->verified=="0"){
                Auth::logout();
                return redirect('/login')->with('error','Your email is not verified. Check your inbox or spam & click on link to verify your account.');

            }

            if($user->status=="0"){
                Auth::logout();
                return redirect('/login')->with('error','Your Account is pending for Approval.');

            }
            //dd($user);
            $browser_info = $_SERVER['HTTP_USER_AGENT'];
            //whether ip is from the share internet  
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
            //whether ip is from the proxy  
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            //whether ip is from the remote address  
            else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            

            // $insert_login_details = LoginLogs::insert([

            //     'user_id' => !empty($user) ? $user->id : '',
            //     'email_id' => !empty($user) ? $user->email : '',
            //     'browser_info' => $browser_info,
            //     'ip_address' => $ip,
            //     'login_date_time' => date('Y-m-d H:i:s'),



            // ]);
            if(!empty($request->is_checking_out)){
                return redirect('checkout');
            }
            else{
              $user=Auth::user();
              if($user->type=="admin"){
                return redirect('admin');
              }else{
                return redirect('home');
              }  

            
            }
        }
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request) {
        $request->session()->forget('dashboard');
        Auth::logout();
        return redirect('/login');
    }

}
