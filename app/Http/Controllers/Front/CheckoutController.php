<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;
use App\Models\Country;
use App\Models\ProductVariation;
use DB,Auth;
use Session;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $isEmpty = \Cart::isEmpty();
        if($isEmpty){
            return redirect()->route('cart');
        }
       $carts = \Cart::getContent();
       $coupon_discount = (\Session::get('coupon_discount'))?\Session::get('coupon_discount'):0;
       $coupon = (\Session::get('coupon'))?\Session::get('coupon'):'';
       $carttotal = \Cart::getTotal();
       $addresses = [];
       $loggedIn = 0;
       $user_wallet = false;
       if(Auth::check()){
            $loggedIn =1;
            $addresses =  DB::table('user_addresses')->where('user_id',Auth::user()->id)->get();
            $user_wallet = DB::table('wallets')->select('amount')->where('user_id',Auth::user()->id);
       }

       $country = Country::get();
       $coupon_discount = ($coupon_discount>0)?$coupon_discount:0;
        $grandTotal  = $carttotal-$coupon_discount;
        $tax = $this->getTotalTax();
        $carttotal = $carttotal-$tax;
       return view('store.checkout.index', compact('addresses','grandTotal','coupon','coupon_discount','carts','carttotal','loggedIn','tax','user_wallet','country'));
    }

    function states(Request $request){
        $addressd = $request->input('id');
        $address = DB::table('states')->where('country_id',$addressd)->get();
        return response()->json(['sta'=>$address],200);
    }

    function city(Request $request){
        $addressd = $request->input('id');
        $address = DB::table('cities')->where('state_id',$addressd)->get();
        return response()->json(['sta'=>$address],200);
    }

    function shipping(Request $request){
        $addressd = $request->input('id');
        $address = DB::table('user_addresses')->where('id',$addressd)->first();
        $pincode = $address->pincode;
        
        $tweight = $this->getTotalWeight();
        $range = DB::select('select * from `weight_range` where '.$tweight.' BETWEEN `weight_from` and `weight_to` limit 1');
        //$range = DB::table('weight_range')->where('weight_from','>=',$tweight)->where('weight_to','<=',$tweight)->first();
        
        $rangeId = (isset($range[0]))?$range[0]->id:0;
        
        $deliveryPossible = DB::table('pincode_shipping')->where('ps_pincode',$pincode)->where('ps_weight_id',$rangeId)->first();
        
        $doWeDeliver = (isset($deliveryPossible->id))?1:0;
        
        $charges = ($doWeDeliver>0)?$deliveryPossible->ps_price:0;
        
        $coupon_discount = (\Session::get('coupon_discount'))?\Session::get('coupon_discount'):0;
        $carttotal = \Cart::getTotal();
        $coupon_discount = ($coupon_discount>0)?$coupon_discount:0;
        
        $grandTotal  = $carttotal-$coupon_discount;
        $grandTotal = ($charges>0)? $grandTotal+$charges:$grandTotal;
        
        return response()->json(['totalWeight'=>$tweight,'possiblility'=>$doWeDeliver,'charges'=>$charges,'grandTotal'=>$grandTotal],200);
    }
    
    function delivery(Request $request){
        $addressd = $request->input('id');
        $deliveryPossible = DB::table('pincode_shipping')->where('ps_pincode',$addressd)->first();
        $doWeDeliver = (isset($deliveryPossible->id))?1:0;
        return response()->json(['possiblility'=>$doWeDeliver],200);
    }

    function addressdelete(Request $request){
        $addressd = $request->input('id');
        DB::table('user_addresses')->where('id',$addressd)->delete();
        return response()->json(['is_deleted'=>1],200);
    }

    function getTotalWeight(){
        $carts = \Cart::getContent();
        $w = 0 ;
        foreach($carts as $car){
            
            if($car->attributes->weight>0){
                $w += ($car->attributes->weight*$car->quantity);
            }
        }
        //echo $w;
        return $w;
    }

    function getTotalTax(){
        $tt = 0 ;
        $carts = \Cart::getContent();
        foreach($carts as $cay){
            $rt = 0;
            if($cay->price<1000){
                $g = $cay->price/1.05;
                $rt = $g*(5/100);
            }else{
                $g = $cay->price/1.12;
                $rt = $g*(12/100);
            }
            $rt = $rt*$cay->quantity;
            $tt += $rt;
        }
        return round($tt,2);
    }
}
