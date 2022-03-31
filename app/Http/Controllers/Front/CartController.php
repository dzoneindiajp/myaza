<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Coupon;
use Carbon\Carbon;
use App\Models\Pincode;
use Auth;

class CartController extends Controller
{
    public function index(){
        $coupons = Coupon::where('valid_to','>=', Carbon::now())
                   ->where('status',1)
                   ->where('category_id',0)
                   ->where('sub_category_id',0)                   
                   ->whereIn('coupon_type',[0,2])
                   ->whereIn('user_type',[0,1,2,4])
                   ->get();
        $carts = \Cart::getContent();
        $total = \Cart::getTotal();
        $isEmpty = \Cart::isEmpty();
       
        if($isEmpty){
            \Session::put('coupon', '');
            \Session::put('coupon_discount', 0);
        }
        $coupon   = \Session::get('coupon');
        $cdiscount = \Session::get('coupon_discount');
        $cdiscount = ($cdiscount>0)?$cdiscount:0;
        $grandTotal  = $total-$cdiscount;
        $tax = $this->getTotalTax();
        $total = $total-$tax;
        return view('store.cart.index', compact('carts','coupons','total','isEmpty','coupon','cdiscount','grandTotal','tax'));
    }
    
    
    public function sidebarcarthtml(){
        $type = $_GET['b'];
        $cartItems = \Cart::getContent();
        $total = \Cart::getTotal();
        $totalQty = \Cart::getTotalQuantity();
        if($totalQty>0){
            $chtml = '<ul class="mini-cart">';
            foreach($cartItems as $rt){
                    $url = url('/').'/'.$rt->attributes->slug;
                    $image = asset('file').'/'.$rt->attributes->image;
                    $chtml .='<li class="mini-cart-item">
                                <a href="javascript:void(0);" class="remove remove_from_cart_button" aria-label="Remove this item"
                                data-product_id="'.$rt->id.'" onclick="removeItemFromSidebar($(this))">×</a>
                                <a href="'.$url.'"><img src="'.$image.'" alt="">'.$rt->name.'</a>
                                <span class="quantity">'.$rt->quantity.' × <span class="mini-cart-price"><span class="price">₹'.$rt->price.'</span></span></span>
                            </li>';
            }
            $chtml .= '</ul>';    
            $chtml .='<p class="mini-cart-total">
                           <strong>Subtotal:</strong> <span class="mini-cart-price"><span class="price">₹'.$total.'</span> </span>
                        </p>';
        }else{
            $chtml = '<ul class="mini-cart">
                        <li class="mini-cart-item text-center">
                              No Item In cart
                        </li>
                    </ul>
                    <p class="mini-cart-total">
                       <strong>Subtotal:</strong> <span class="mini-cart-price"><span class="price">₹0</span> </span>
                    </p>';
        }
        $cdiscount = \Session::get('coupon_discount');
        $cdiscount = ($cdiscount>0)?$cdiscount:0;
        $grandTotal  = $total-$cdiscount;
        $tax = $this->getTotalTax();
        return response()->json(['html'=>$chtml,'qty'=>$totalQty,'carttotal'=>$total,'grandTotal'=>$grandTotal,'tax'=>$tax],200);
    }
    
    public function removeitemsidebar(Request $request){
        \Cart::remove($request->id);
        $total = \Cart::getTotal();
        $totalQty = \Cart::getTotalQuantity();
        $cdiscount = \Session::get('coupon_discount');
        $cdiscount = ($cdiscount>0)?$cdiscount:0;
        $grandTotal  = $total-$cdiscount;
        $tax = $this->getTotalTax();
        $total = $total-$tax;
        return response()->json(['qty'=>$totalQty,'carttotal'=>$total,'grandTotal'=>$grandTotal,'tax'=>$tax],200);
    }
    
    function updateqty(Request $request){
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->qty
                ],
            ]
        );
        $iem = \Cart::get($request->id);
        $ttax = $this->getTotalTax();
        $itemtotal = $iem->quantity*$iem->price;
        $total = \Cart::getTotal();
        $totalQty = \Cart::getTotalQuantity();
        $cdiscount = \Session::get('coupon_discount');
        $cdiscount = ($cdiscount>0)?$cdiscount:0;
        $grandTotal  = $total-$cdiscount;
        $tax = $this->getTotalTax();
        $total = $total-$tax;
        return response()->json(['itemtotal'=>$itemtotal,'qty'=>$totalQty,'carttotal'=>$total,'grandTotal'=>$grandTotal,'tax'=>$tax],200);
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

    function checkBeforeApply($coupon){
        $carts = \Cart::getContent();
        $tt = 0 ;
        foreach($carts as $cay){
            $attrs = $cay->attributes->coupons;
            foreach($attrs as $r){
                if($r->code == trim($coupon)){
                    $tt += $cay->price*$cay->quantity;
                }
            }
        }
        return $tt;
    }

    public function apply_coupon(Request $request)
    {
        $coupon = Coupon::where('valid_to','>=', Carbon::now())
                  ->where('status',1)
                  ->where('code',$request->coupon)
                  ->whereIn('coupon_type',[0,2])
                  ->whereIn('user_type',[0,1,2,4])
                  ->first();
        
        $amount = \Cart::getTotal();

        $discount_price = 0;

        if($coupon){
           if($coupon->customer_id >0 && !Auth::check()){
                return response()->json([
                    'success' => true,
                    'code' => 404,
                    'message' => 'Please login before you apply your individual coupon',
                ]);
           }
           if($coupon->customer_id >0 && $coupon->customer_id != Auth::user()->id){
                return response()->json([
                    'success' => true,
                    'code' => 404,
                    'message' => 'Invalid coupon',
                ]);
           }
           $cvalue  = $this->checkBeforeApply($request->coupon);
           $amount = ($cvalue>0)?$cvalue:$amount;
           if($amount > $coupon->min_cart_amount){
               $discount = 0;
               if($coupon->discount_type === 1){
                    $discount = $coupon->value;
               }else{
                    $discount = $amount  * ($coupon->value/100) ;
               }
              
               $discount = round(($discount>$coupon->max_discount)?$coupon->max_discount:$discount,2);
               
               \Session::put('coupon', $request->coupon);
               \Session::put('coupon_discount', $discount);
 
               $cdiscount = \Session::get('coupon_discount');
               $total = \Cart::getTotal();
               $cdiscount = ($cdiscount>0)?$cdiscount:0;
               $grandTotal  = $total-$cdiscount;

               return response()->json([
                    'success' => true,
                    'code' => 200,
                    'message' => 'Coupon Apply successfully',
                    'coupon_price' => $discount,
                    'grandTotal'=>$grandTotal
                ]);

           }
           else{
            \Session::put('coupon', '');
            \Session::put('coupon_discount', 0);

                return response()->json([
                    'success' => true,
                    'code' => 403,
                    'message' => 'Order amount should be more then Rs'.$coupon->min_cart_amount,
                ]);
            }

        }else{
            return response()->json([
                'success' => true,
                'code' => 404,
                'message' => 'Invalid coupon',
            ]);
        }
    }
    
    function remove_coupon(){
        if(\Session::get('coupon')){
            \Session::put('coupon', 0);
            \Session::put('coupon_discount', 0);
            $total = \Cart::getTotal(); 
            $cdiscount = \Session::get('coupon_discount');
            $cdiscount = ($cdiscount>0)?$cdiscount:0;
            $grandTotal  = $total-$cdiscount;
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Coupon removed',
                'grandTotal'=>$grandTotal
            ]);
        }else{
           return response()->json([
                'success' => true,
                'code' => 404,
                'message' => 'Invalid coupon to be removed',
            ]); 
        }
    }

}
