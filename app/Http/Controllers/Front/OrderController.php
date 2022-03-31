<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDiscount;
use App\Models\Payment;
use App\Models\Refund;
use App\Models\RefundReason;
use App\Models\UserOrder;
use Razorpay\Api\Api;
use App\Models\Wallet;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Size;
use App\Models\Pincode;
use App\Models\Color;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use DB,Auth,Hash ;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('user_orders')
                ->where('user_orders.user_id', Auth::user()->id)
                ->get();

        foreach($orders as $y){
            $y->items = DB::table('orders')->where('orders.order_id', $y->id)
            ->get();
        }
        $reasons = RefundReason::all();
        return view('store.orders.index', compact('orders','reasons'));
    }

    function detail(Request $request,$id){
        $orders = DB::table('user_orders')
                ->join('order_discounts', 'order_discounts.order_id', 'user_orders.id')
                ->join('payments', 'payments.order_id', 'user_orders.id')
                ->where('user_orders.id', $id)
                ->first();
        $orders->items = DB::table('orders')
            ->join('sizes', 'sizes.id', 'orders.size_id')
            ->join('colors', 'colors.id', 'orders.color_id')
            ->join('products', 'products.id', 'orders.product_id')
            ->select('products.name as pname', 'colors.name as cname', 'sizes.name as sname','orders.images as images','orders.qty as qty','orders.mrp_price as mrp_price')
            ->where('orders.order_id', $orders->order_id)
            ->get();
        
        
        return view('store.orders.detail', compact('orders'));
    }

    public function cancel_order(Request $request){

        $uorder = UserOrder::find($request->order_id);
       
        $payment = Payment::where('order_id', $request->order_id)->first();
        
        $wall = Wallet::where('user_id', Auth::user()->id)->first();
        $wfamount = ($wall)?$wall->amount+$uorder->amount:$uorder->amount;
        
        Wallet::updateOrCreate(
            ['user_id' => Auth::user()->id],
            ['amount' => $wfamount]
        );
        
        $re = new Refund;
        $re->refund_id = '';
        $re->refund_reason_id = $request->reason_id;
        $re->payment_id = $payment->id;
        $re->order_id = $request->order_id;
        $re->notes = $request->note;
        $re->status = '';
        $re->speed_requested = '';
        $re->updated_at = Carbon::now();
        $re->save(); 
        
        DB::table('user_orders')->where('user_id', Auth::user()->id)->update([
            'status' => 4
        ]);
        
        DB::table('return_cancel_orders')->insert([
            'user_id' => Auth::user()->id,
            'order_id' => $request->order_id,
            'type' => 'cancelled',
            'amount' => $uorder->amount,
            'action_time' => Carbon::now(),
        ]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => ''
        ]);
    }

    function profile(){
        $orders = DB::table('users')->where('id',Auth::user()->id)->first();
        return view('store.orders.profile', compact('orders'));
    }

    function delete_wishlist(Request $request){
        $user_id = Auth::user()->id;

        Wishlist::where('product_id',$request->p_id)->where('variation_id',$request->v_id)
                    ->where('user_id', $user_id)
                    ->delete();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => ''
        ]);
    }

    function updateinfo(Request $request){
        $user_id = Auth::user()->id;
        $ref = User::find($user_id);
        $ref->name = $request->input('name');
        $ref->email = $request->input('email');
        if($request->input('password')!=""){
            $ref->password = Hash::make($request->input('password'));
        }
        $ref->mobile = $request->input('mobile');
        $ref->save();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => ''
        ]);
    }

    function wishlist(){
        $wishlists = Wishlist::join('products','products.id','=', 'wishlists.product_id')
                    ->where('wishlists.user_id', Auth::user()->id)->get();
        
        foreach($wishlists as $r){
            $var = ProductVariation::join('sizes','sizes.id','=', 'product_variations.size_id')
                    ->join('colors','colors.id','=', 'product_variations.color_id')
                    ->where('product_variations.id',$r->variation_id)
                    ->select('colors.name as cname','sizes.name as sname','color_id')
                    ->first();
            $img = ProductImage::where('product_id',$r->product_id)->where('product_color_id',$var->color_id)->first();
            $r->image = $img->file_name;
            $r->size = $var->sname;
            $r->color = $var->cname;
        }
        return view('store.wishlist.index', compact('wishlists'));
    }
}
