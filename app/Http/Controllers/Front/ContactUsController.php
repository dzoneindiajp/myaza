<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\Store;
use App\Models\Setting;

class ContactUsController extends Controller
{
    public function index(){
      $setting  = Setting::first();
      return view('frontend-view.home.contact-us',compact('setting'));
    }

    public function store(Request $request)
    {
      $contact = new ContactUs;
      $contact->name = $request->name;
      $contact->email = $request->email;
      $contact->phone = $request->phone;
      $contact->subject = $request->subject;
      $contact->message = $request->message;
      $contact->save();

      return response()->json([
         'success' => true,
         'code' => 200,
         'message' => 'Message send successfully'
      ]);
    }

    public function locator(){
      $stores = Store::groupBy('city_id')->get();

      return view('frontend-view.home.contact-us', compact('stores'));
    }
}
