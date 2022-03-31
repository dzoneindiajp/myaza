<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth, DB;

class WishlistController extends Controller{
    
    public function index(Request $request){
      if(!Auth::user()){
         return redirect('/login');
      }
       $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();

       return view('store.wishlist.index', compact('wishlists'));
    }

    function getiems(){
      if(!Auth::user()){
         $wishlists = [];
         return response()->json([
            'success' => false,
            'code' => 200,
            'message' => 'Please Login first',
            'data' => $wishlists
         ]);
      }else{
         $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
         return response()->json([
            'success' => true,
            'code' => 200,
            'message' => '',
            'data' => $wishlists
         ]);
      }
      exit;
    }

    public function store(Request $request){
         if(!Auth::check()){
            return response()->json([
               'success' => false,
               'code' => 201,
               'message' => 'Please Login first',
               'data' => 0
            ]);
         }else{
            $wishlist = Wishlist::where('product_id',$request->product_id)
                              ->where('user_id', Auth::user()->id)
                              ->where('variation_id', $request->variation_id)
                              ->first();
            if($wishlist){
                  $wishlists = Wishlist::where('user_id', Auth::user()->id)
                                    ->count();
                  return response()->json([
                     'success' => false,
                     'code' => 200,
                     'message' => 'Product already exist in wishlist.',
                     'data' => $wishlists
                  ]);
            }else{
               $wish =  new Wishlist;
               $wish->user_id = Auth::user()->id;
               $wish->product_id = $request->product_id;
               $wish->variation_id = $request->variation_id;
               $wish->save();

               $wishlists = Wishlist::where('user_id', Auth::user()->id)
                                    ->count();

               return response()->json([
                  'success' => true,
                  'code' => 200,
                  'message' => 'Product added to wishlist.',
                  'data' => $wishlists
               ]);
            }
         }
    }


    public function destroy($id)
    {
        $product_id = $id;
        $user_id = Auth::user()->id;

        Wishlist::where('product_id',$product_id)
                    ->where('user_id', $user_id)
                    ->delete();

        $wishlists = Wishlist::where('user_id', $user_id)->get();

        return response()->json([
        'success' => true,
        'code' => 200,
        'message' => 'Product remove from wishlist successfully.',
        'data' => $wishlists
        ]);
    }
}
