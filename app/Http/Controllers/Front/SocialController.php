<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite, Auth;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Config;
use App\Models\Newsletter;
use Phpfastcache\Helper\Psr16Adapter;
use App\Models\Setting;


class SocialController extends Controller
{
  public function redirect($provider)
    {
       try{
           /*if(!\Session::get('redirectback')){
               \Session::put('redirectback', url()->previous());
           }*/
           return Socialite::driver($provider)->redirect();
       }
      catch(\Exception $e){
         \Log::info($e);
      }
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
    public function callback($provider)
    {
      try {

          $user = Socialite::driver($provider)->user();
          $isUser = User::where('email', $user->email)->first();

          if($isUser){
              Auth::login($isUser);
              $rf = \Session::get('redirectback');
              \Session::forget('redirectback');
              return Redirect::to($rf);
          }else{
              $createUser = User::create([
                  'name' => $user->name,
                  'email' => $user->email,
                  'provider_id' => $user->id,
                  'provider' => $provider,
                  'password' => encrypt('random'),
                  'referral_code'=>$this->generateRandomString()
              ]);

              Auth::login($createUser);
              $rf = \Session::get('redirectback');
              \Session::forget('redirectback');
              return Redirect::to($rf);
          }

      } catch (Exception $exception) {
          dd($exception->getMessage());
      }
    }

    function getProtectedValue($obj, $name) {
        $array = (array)$obj;
        $prefix = chr(0).'*'.chr(0);
        return $array[$prefix.$name];
    }

    public function insta_feed()
    {
       try{
        $store = Setting::select('instagram_username','instagram_password')->first();
       
        $instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(), 'myazakurties' , 'Myaza0987@!K', new Psr16Adapter('Files'));
        $instagram->login();
        $posts = $instagram->getFeed();
        $rt = array();
        foreach($posts as $post){
            //imageStandardResolutionUrl
            //imageThumbnailUrl
            //imageLowResolutionUrl
            //imageHighResolutionUrl
            $path = $this->getProtectedValue($post,'imageThumbnailUrl');
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            $rt[] = $base64;
        }
        //$view = view('store.partials.instapost', compact('posts'))->render();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Post fetch successfully.',
            'html' => $rt
        ]);
       }
       catch(Exception $ex){
        return response()->json([
            'success' => false,
            'code' => 503,
            'message' => 'Post fetch error.',
        ]);
       }
    }

}
