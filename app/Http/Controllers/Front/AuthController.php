<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referral;
use App\Models\Setting;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Config;
use App\Models\Newsletter;
use App\Models\Country;
use App\Models\City;
use DB;
use Illuminate\Validation\Rules;
use App\Models\State;
use Auth, Hash ;

class AuthController extends Controller
{
    public function login(){
      if(Auth::check()){
        return redirect()->route('user.dashboard');
      }
      \Session::put('redirectback', url()->previous());
      return view('frontend-view.auth.login');
    }

    public function logged_in(Request $request){
      $users =User::where('email',$request->email)->where('is_admin',0)->first();
      if(!$users){
        return response()->json([
            'success' => false,
            'code' => 400,
            'message' => 'Email not registered with us'
          ]);
      }
      if(auth()->attempt(array('email' => $request->email ,'password' => $request->password))){
          $redit = \Session::get('redirectback');
          \Session::forget('redirectback');
          return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'logged in successfully',
            'back'=>$redit
          ]);
      }else{
        return response()->json([
          'success' => false,
          'code' => 400,
          'message' => 'Invalid credential'
        ]);
      }

    }

    public function register(){
          $countries = Country::all();
          /*$states = State::all();
          $cities =City::all();*/
        return view('frontend-view.auth.register',compact('countries'));
    }
     public function create(array $data)
   {
     return User::create([
       'name' => $data['name'],
       'email' => $data['email'],
       'password' => Hash::make($data['password']),
       'mobile' => $data['mobile'],
       'address'=> $data['address'],
       'address2'=> $data['address2'],
       'city_id' => $data['city_id'],
       'state' => $data['state'],
       'country'=> $data['country'],
       'referral_code' => $data['referral_code'],
       'postcode' => $data['postcode'],
     ]);
     
   }
   
    function generateRandomString($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $check = User::where('referral_code',$randomString)->first();
        if(isset($check->id)){
            $this->generateRandomString();
        }
        return $randomString;
    }
   
    public function store(Request $request){
        $data = $request->all();
        
        $request->validate([
            'email' => 'required|unique:users'
        ]);

        
        $data['referral_code'] = $this->generateRandomString();
        $check = $this->create($data);
        
        if($request->has('referral_code')){
          $re = User::where('referral_code', trim($request['referral_code']))->first();
          if($re){
            $ramount = Setting::first()->reffral_amount;
            
            $ref = new Referral;
            $ref->ref_id = $re->id;
            $ref->user_id = $check->id;
            $ref->save();
            
            $add = 0 ;
            
            $adduser = Wallet::where('user_id', $re->id)->first();
            if(isset($adduser->id)){
                $add = $adduser->amount;
            }
            
            $wall = new Wallet;
            $wall->user_id = $re->id;
            $wall->amount = $add + $ramount;
            $wall->save();
            
            $wall = new Wallet;
            $wall->user_id = $check->id;
            $wall->amount = $ramount;
            $wall->save();
            
          }
          
      }
        
      return response()->json([
        'success' => true,
        'code' => 200,
        'message' => 'Registered successfully!'
      ]);
        
    }


    
    public function logout(){
      Auth::logout();
      \Session::put('coupon', '');
    \Session::put('coupon_discount', 0);
     return redirect('/');
    }
    
    public function forgot(){
        return view('frontend-view.auth.forget-password');
    }


    public function sendotp(Request $request)
    {
      try{
        $mobile = $request->mobile;
        $user = User::where('mobile', $mobile)->orWhere('email', $mobile)->first();
        if($user){
          return response()->json([
            'success' => false,
            'code' =>  220,
            'message' => 'Unique mobile number/email is required! this email or mobile which is already exists in out records.',
          ]);
        }
        $client = new \GuzzleHttp\Client();
        $key = env('SMS_AUTH_KEY');
        $otp = generateNumericOTP(6);
        $message = 'Your VASVI verification OTP - ' . $otp;
        $response = $client->request('GET', "http://www.dakshinfosoft.com/api/sendhttp.php?authkey=9293ATiWinrHpi9615ff325&mobiles=$mobile&message=Thanks%20shopping%20with%20VASVI.%20Your%20invoice%20no.%20%7B%23$otp%23%7D%20dated%20%7B%23var%23%7D%20amt.%7B%23var%23%7D.%20We%20will%20be%20honored%20to%20serve%20you%20in%20future.&sender=VASVII&route=4&country=91");

        if($response->getBody()){
          return response()->json([
            'success' => true,
            'code' =>  200,
            'otp' => $otp,
            'mobile' =>  $mobile,
            'message' => 'Otp send it to user successfully.'
          ]);
        }
      }
      catch(Exception $ex){
        return response()->json([
            'success' => false,
            'code' =>  503,
            'message' => $ex->getMessage()
          ]);
      }
    }
}
