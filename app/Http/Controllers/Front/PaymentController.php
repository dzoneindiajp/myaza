<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Order;
use App\Models\OrderDiscount;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductImage;
use App\Models\Refund;
use App\Models\UserOrder;
use App\Models\OrderProductMessage;
use App\Models\OrderProductGift;
use App\Models\UserAddress;
use App\Models\Wallet;
use App\Models\Setting;
use Session,Exception,Validator,URL,Auth,Redirect,Input,Config,DB,Mail;

class PaymentController extends Controller
{
    public function index(){
        return view('frontend.payment');
    }
    
    public function slider(){
        return view('store.test_zoom');
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

    function placeorder(Request $request){
      
        $cartItems = \Cart::getContent();
		
		/* echo " placeorder <pre>"; print_r($cartItems); die; */
		
		$wfamount = 0;
		if(count($cartItems) <= 0){
			return response()->json([
				'success' => false,
				'code' => 201,
				'message' => 'Cart is empty.'
			]);
		}else{				
			/* echo "<pre>"; print_r($cartItems); die; */
			$total = \Cart::getTotal();
			$coupon_name = \Session::get('coupon');
			$coupon_discout = \Session::get('coupon_discount');
			$addressid = $request->input('addressid');
			$method = $request->input('paymethod');
			$amtToBePaid = $request->input('payableamount');
			$txnid = $request->input('txnid');
			$user = Auth::user();
			
			if($method == "wallet"){
			    
				$wall = Wallet::where('user_id',$user->id)->first();
				
                $wall_amount = 0;
                if(!empty($wall)){
                    $wall_amount = $wall->amount;
                }
				$wfamount = $wall_amount - $amtToBePaid;
				
				if($amtToBePaid > $wall_amount){
					return response()->json([
						'success' => false,
						'code' => 201,
						'message' => 'Not enough amount in your wallet, please choose different payment method.'
					]);
				}
			}
			
			$address = UserAddress::find($addressid);
			$user_address = ""; 
			$address_type = "";
			if($address){
				$user_address = $address->name . ' ' . $address->area . ' ' .$address->house . ' ' .$address->landmark.'  '.$address->city.','.$address->state->name.','.$address->country->name.','.$address->pincode.',mobile:'.$address->mobile;
				
				$address_type = $address->address_type;
			}
			
			
			$uorder =  new UserOrder;
			$uorder->user_id = $user->id;
			$uorder->amount = $amtToBePaid;
			$uorder->total_amount = $total;
			$uorder->order_id = $txnid;
			$uorder->address = $user_address;
			$uorder->address_type = ($address->address_type)?$address->address_type:1;
			$uorder->shippping = $request->input('shippingc');
			
			if($method == "wallet"){
				$uorder->use_wallet = 1;

				$wall = Wallet::where('user_id',$user->id)->first();
				$wfamount = $wall->amount - $amtToBePaid;
				$uorder->wallet_amount = $amtToBePaid;
			}else{
				$uorder->use_wallet = 0;
				$uorder->wallet_amount = 0;
			}
			
			$uorder->status = 0;
			$uorder->save();
			
			foreach($cartItems as $item){
				$productid = explode("_",$item->id)[0];
				$order = new Order;
				$order->order_id = $uorder->id;
				$order->user_id = $user->id;
				$order->product_id = $productid;
				$order->name = $item->name;
				$order->size_id = $item->attributes->size_id;
				$order->color_id = $item->attributes->color_id;
				$order->qty = $item->quantity;
				$order->mrp_price = $item->attributes->mrp;
				$order->sale_price = $item->attributes->sale_price;
				$order->discount = 0;
				$order->discount_type = 0;
				$order->status = 0;
                
				$order->images = $item->attributes->image;
				$order->save();
			}
			
			$dis = new OrderDiscount;
			$dis->order_id = $uorder->id ;
			$dis->total = $total;
			
			if($coupon_discout != ""){
				$dis->discount = $coupon_discout;
			}else{
				$dis->discount = 0;
			}
			
			$dis->sub_total = $amtToBePaid;
			$dis->coupon = $coupon_name;
			
			/* echo '$coupon_discount '.$coupon_discount; die;
			if($coupon_discount){
				$dis->coupon_discount = $coupon_discount;
			} */
			
			$dis->coupon_discount = $coupon_discout;
			
			$dis->save();
			
			$pay = new Payment;
			$pay->user_id = $user->id;
			$pay->order_id = $uorder->id ;
			$pay->transaction_id = $txnid;
			$pay->type = 'Online';
			
			if($method == "cod"){
				$pay->type = 'cod'; 
			}else if($method == "wallet"){
				$pay->type = 'wallet'; 
			}else{
				$pay->type = 'online';
			}
			
			$pay->amount = $amtToBePaid;
			$pay->save();
			
			if ($pay->save()){
				DB::table('wallets')->where('user_id',$user->id)->update([
					'amount' => $wfamount
				]);
				
				$carttotal = \Cart::getTotal();
				$grandTotal  = $carttotal-$coupon_discout;
                $tax = ($grandTotal / 100) * 1.12;
                $grandTotal = $request->payableamount;
                
				$clr_cart = \Cart::clear(); 
				
				$dat = array();
				$dat['setting'] = Setting::first();
				$dat['single'] = Order::where(['user_id'=>$user->id,'order_id'=>$uorder->id])->first();
				$dat['user_address'] = $user_address;
				$dat['cart'] = $cartItems;
				$dat['shipp'] = $uorder->shippping;
				$dat['carttotal'] = $carttotal;
				$dat['tax'] = $tax;
				$dat['grandTotal'] = $grandTotal;
				$dat['mode'] = $pay->type;
				
				$this->sendMailInvoice($dat,$user->email,$uorder->order_id);
				
				return response()->json([
					'success' => true,
					'code' => 200,
					'message' => 'Order placed successfully.'
				]);
			}else{
				return response()->json([
					'success' => false,
					'code' => 201,
					'message' => 'Payment captured but something went wrong, while saving data.'
				]);
			}
		}     
    }
    
    function checkmail(){
        
        echo public_path('order-pdf');
        echo "<br>".asset('/'). 'order-pdf/order_10.pdf';
      
        $coupon_discout = 0;
        $cartItems = \Cart::getContent();
        $address = UserAddress::find(25);
        if($address){
				$user_address = $address->name . ' ' . $address->area . ' ' .$address->house . ' ' .$address->landmark.'  '.$address->city.','.$address->state->name.','.$address->country->name.','.$address->pincode.',mobile:'.$address->mobile;
			
			$address_type = $address->address_type;
		}
        $carttotal = \Cart::getTotal();
		$grandTotal  = $carttotal-$coupon_discout;
        $tax = $this->getTotalTax();
        $carttotal = $carttotal-$tax;
        $user = Auth::user();
        $dat = array();
    	$dat['setting'] = Setting::first();
    	$dat['single'] = Order::where(['user_id'=>$user->id,'order_id'=>'10'])->first();
    	$dat['user_address'] = $user_address;
    	$dat['cart'] = $cartItems;
    	$dat['shipp'] = 2;
    	$dat['carttotal'] = $carttotal;
    	$dat['tax'] = $tax;
    	$dat['grandTotal'] = $grandTotal;
    	$dat['mode'] = 'online';
    	$this->sendMailInvoice($dat,$user->email,'10');
    	echo "DONE";
    }

    function sendMailInvoice($data,$emalto,$order_id){
        
        $path = public_path('order-pdf');
        $filename = "order_{$order_id}";
        $pdf = \PDF::loadView('emails.invoice',$data)->save(''.$path.'/'.$filename.'.pdf');
        
        $output = Mail::send('emails.order-pdf',$data, function ($message) use ($emalto,$filename) {
        $message->from('info@myazatrendz.com', 'Myazatrendz');
        $message->to($emalto)->subject('Order Confirmation');
        $message->attach(public_path('order-pdf/'.$filename.'.pdf'));
        });
        
    }

    function thank(){
        return view('store.cart.thank');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                if($response->status === 'captured'){

                    $amount = floatval($response->amount / 100);
                    $amount = $amount + $request->wamount;
                    $user = Auth::user();

                    $address = UserAddress::find($request->address_id);
                    $user_address = $address->name . ' ' . $address->area . ' ' .$address->house . ' ' .$address->landmark.'  '.$address->city.','.$address->state->name.','.$address->country->name.','.$address->pincode.',mobile:'.$address->mobile;

                    $order_id = $request->orderid;
                    $carts = session('cart');
                    $total = 0;
                    $disc = 0;
                    $sub_total = 0;
                    $coupon = $request->has('coupon') ? $request->coupon : 0;
                    $coupon_discount = $request->has('discount') ? $request->discount : 0;

                    $uorder =  new UserOrder;
                    $uorder->user_id = $user->id;
                    $uorder->order_id = $order_id;
                    $uorder->amount = $amount;
                    $uorder->address = $user_address;
                    $uorder->address_type = $address->address_type;
                    $uorder->use_wallet = $request->usewallet == true ? 1 : 0;
                    $uorder->wallet_amount = $request->wamount;
                    $uorder->status = 0;
                    $uorder->save();

                    $wall = Wallet::where('user_id',$user->id)->first();
                    $wfamount = $wall->amount - $request->wamount;

                    DB::table('wallets')->where('user_id',$user->id)->update([
                        'amount' => $wfamount
                    ]);

                    foreach($carts as $cart){
                        $product = Product::find($cart['product_id']);
                        $order = new Order;
                        $order->order_id = $uorder->id;
                        $order->user_id = $user->id;
                        $order->product_id = $cart['product_id'];
                        $order->name = $cart['name'];
                        $order->size_id = $cart['size_id'];
                        $order->color_id = $cart['color_id'];
                        $order->qty = $cart['qty'];
                        $order->mrp_price = $cart['single_price'];
                        $order->sale_price = $cart['single_sales_price'];
                        $order->discount = $product->discount;
                        $order->discount_type = $product->discount_type;
                        $order->status = 0;
                        $order->images = $cart['product_images'][0];
                        $order->save();

                        if(isset($cart['gift'])){
                           $gift =  new OrderProductGift;
                           $gift->order_product_id = $order->id;
                           $gift->sender = $cart['gift']['sender'];
                           $gift->recipient = $cart['gift']['recipient'];
                           $gift->message = $cart['gift']['message'];
                           $gift->gift_type = $cart['gift']['type'];
                           $gift->save();
                        }

                        if(isset($cart['message'])){
                            $msg =  new OrderProductMessage;
                            $msg->order_product_id = $order->id;
                            $msg->sender = $cart['message']['sender'];
                            $msg->recipient = $cart['message']['recipient'];
                            $msg->message = $cart['message']['message'];
                            $msg->save();
                        }
                        $total += $cart['single_price'];
                        $disc += $cart['single_price'] - $cart['single_sales_price'];
                    }

                    $dis = new OrderDiscount;
                    $dis->order_id = $uorder->id ;
                    $dis->total = $total;
                    $dis->discount = $disc;
                    $dis->sub_total = $total - $disc - $coupon_discount;
                    $dis->coupon = $request->coupon;
                    $dis->coupon_discount = $coupon_discount;
                    $dis->save();

                    $pay = new Payment;
                    $pay->user_id = $user->id;
                    $pay->order_id = $uorder->id ;
                    $pay->transaction_id = $input['razorpay_payment_id'];
                    $pay->type = 'Online';
                    $pay->amount = $amount;
                    $pay->save();

                    session()->forget('cart');
                    return response()->json([
                        'success' => true,
                        'code' => 200,
                        'message' => 'Order placed'
                    ]);
                }
                else{
                    return response()->json([
                        'success' => false,
                        'code' => 403,
                        'message' => 'Payment failed, please try again!'
                    ]);
                }
            } catch (Exception $e) {
                return response()->json([
                    'success' => false,
                    'code' => 503,
                    'message' => $e->getMessage()
                ]);
            }
        }

        Session::put('success', 'Payment successful');
        return redirect()->back();
    }

    public function refund(Request $request)
    {
        try{
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $payId = $request->payment_id;
            $data = $api->payment->fetch($payId);

            if($data){
                if($data->status !== 'refunded'){
                    $contact = $data->contact;
                    $email = $data->email;
                    $desc = $data->description;
                    $card_id = $data->card_id;
                    $currency = $data->currency;
                    $amount = $data->amount;

                    $pay = Payment::where('transaction_id', $payId)->first();

                    $receipt = "$pay->id"."$pay->user_id";

                    $output = $api->payment->fetch($payId)->refund(array("amount"=> $amount,"speed"=>"optimum","receipt"=>$receipt));
                    dd($output);

                    $re = new Refund;
                    $re->refund_id = $output->id;
                    $re->payment_id = $output->payment_id;
                    $re->note = $request->note ? $request->note : null;
                    $re->status = $output->status;
                    $re->speed_requested = $output->speed_requested;
                    $re->updated_at = Carbon::now();
                    $re->save();


                    return response()->json([
                        'success' => true,
                        'code' => 200,
                        'message' => 'You request for refund is process. You getting refund within 24 hour. Thank you!',
                        'data' => $output
                    ]);
                }
                else{
                    return response()->json([
                        'success' => true,
                        'code' => 200,
                        'message' => 'You request for refund is already refunded.',
                    ]);
                }
            }


        }
        catch(Exception $ex){

           return response()->json([
               'success' => false,
               'code' => 503,
               'message' => $ex->getMessage(),
           ]);
        }
    }
	
	 function checkcart(){
        $cartItems = \Cart::getContent();
		
		if(count($cartItems) <= 0){
			return response()->json([
				'success' => false,
				'code' => 201,
				'message' => 'Cart is empty.'
			]);
		}else{	
			return response()->json([
				'success' => true,
				'code' => 200,
				'message' => 'Cart not empty.'
			]);
		}
	}

}
