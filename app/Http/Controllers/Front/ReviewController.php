<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use Auth;

class ReviewController extends Controller
{
    public function reviews($id){
        $reviews = ProductReview::where('product_id', $id)->orderBy('id','desc')->paginate(5);

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Successfully retrieve.',
            'html' => view('store.partials.reviews', compact('reviews'))->render(),
            'count' => ProductReview::where('product_id', $id)->get()->count(),
            'rating' => ProductReview::where('product_id', $id)->where('rating', 5)->get()->count(),
            'avg' => ProductReview::where('product_id', $id)->avg('rating')
        ]);
    }

    public function store(Request $request)
    {
      
        $customer_image = $request->file('customer_image');
        $imageName = time().rand(0000,9999).'.'.$customer_image->extension();
        $customer_image->move(public_path('file'),$imageName);

        $product_id = $request->product_id;
        $title = $request->title;
        $rating = $request->rating_value;
        $comment = $request->comment;
        $recommend  = 0;
        $user_id = (Auth::user())?Auth::user()->id:0;
        
        if($user_id>0){
            $review = new ProductReview;
            $review->product_id = $product_id;
            $review->title = $title;
            $review->rating = $rating;
            $review->customer_image = $imageName;
            $review->comment = $comment;
            $review->recommend = $recommend;
            $review->user_id = $user_id;
            $review->save();

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Insert review successfully.',
    
            ]);
        }else{
            return response()->json([
                'success' => false,
                'code' => 200,
                'message' => 'Please login before rating this product',
    
            ]); 
        }
    }

    public function show($id){
        $reviews = ProductReview::where('product_id', $id)->orderBy('id','desc')->paginate(10);
        foreach($reviews as $review){
            dd($review->users);
        }
    }


    public function destroy($id)
    {
        ProductReview::where('id', $id)->delete();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Review deleted successfully.',
        ]);
    }
}
