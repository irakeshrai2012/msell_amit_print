<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Jobs\SendVerificationEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Storage;


class RegisterController extends Controller
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string'],
            'business_address' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gst_file' => ['required'],
            'pan_card_file' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data,$gst_fileName,$pan_fileName)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'business_name' => $data['business_name'],
            'business_address' => $data['business_address'],
            'gst' => $data['gst']?$data['gst']:'',
            'pan' => $data['pan']? $data['pan']:'',
            'password' => Hash::make($data['password']),
            'email_token' => base64_encode($data['email']),
            'phone' => $data['phone'],
            'gst_file'=>$gst_fileName,
            'pan_card_file'=>$pan_fileName,
            'type' => 'customer',

        ]);
    }
    
    public function signup(){
        return view('auth.signup');
    }

    public function register(Request $request){
            $this->validator($request->all())->validate();

            $gst_folder = public_path('customers/gst/');
            if (!Storage::exists($gst_folder)) {
                Storage::makeDirectory($gst_folder, 0775, true, true);
            }

            $pan_folder = public_path('customers/pan/');
            if (!Storage::exists($pan_folder)) {
                Storage::makeDirectory($pan_folder, 0775, true, true);
            }

            $gst_fileName='';
            if($request->gst_file){
              $gst_fileName = 'gst-'.$request->name.'-'.time().'.'.$request->gst_file->getClientOriginalExtension();
                $request->gst_file->move($gst_folder, $gst_fileName);  
            }

            $pan_fileName='';
            if($request->pan_card_file){
              $pan_fileName = 'pan-'.$request->name.'-'.time().'.'.$request->pan_card_file->getClientOriginalExtension();
                $request->pan_card_file->move($pan_folder, $pan_fileName);  
            }








            event(new Registered($user = $this->create($request->all(),$gst_fileName,$pan_fileName)));
            dispatch(new SendVerificationEmail($user));
            return redirect('/')->with('success','Account created successfully. Check your inbox and click on link to verify your account.');


    }
    
    public function verify($token)
    {
        try{
            
            $user = User::where('email_token',$token)->first();
            $user->verified = '1';
            $user->save();
            if($user->verified==1){
                return redirect('/login')->with('success','Your account has been verified successfully. Please login with your credentials.');
            }else{
                
                return redirect('/login')->with('error','You aren\'t verified.');
            }
            

        }catch(Execeptio $e){
            
            return redirect('/login')->with('error','You aren\'t verified.');
        }
    }


}
