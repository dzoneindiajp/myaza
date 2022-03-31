<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\VideoAdd;
use App\Models\Tlider;
use App\Models\Htext;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use App\Models\Size;
use App\Models\ProductReview;
use App\Models\NewArrivalBanner;
use App\Models\LatestBanner;
use App\Models\BestSellerBanner;
use DB, Auth;
use App\Models\Wishlist;
class HomeCntroller extends Controller
{
    public function index() {
        $i = 0;
        $trending = [];
        $banners = Slider::whereStatus('1')->latest()->get();
        $vbanners = VideoAdd::whereStatus('1')->latest()->get();
        $tbanners = Tlider::whereStatus('1')->latest()->limit(2)->get();
        
        $products = Product::where('is_exclusive',1)
                           ->where('status',1)
                           ->orderBy('created_at', 'desc')
                           ->paginate(20);
        $testimonials = Testimonial::latest()->get();
        $home_cat =Category::where('is_home',1)->take(5)->get();

        foreach($products as $pro){
            $i++;
            $trending[$i]['id'] = $pro->id;
            $trending[$i]['category'] = $pro->category->name;
            $trending[$i]['sub_category'] = (isset($pro->sub_category->name)) ? $pro->sub_category->name : '' ;
            $trending[$i]['child_category'] = $pro->child_category !== null ?? $pro->child_category->name ;
            $trending[$i]['name'] = $pro->name;
            $trending[$i]['desc'] = $pro->description;
            $trending[$i]['detail'] = $pro->details;
            $trending[$i]['slug'] = $pro->slug;
            $trending[$i]['sku'] = $pro->sku_code;
            $trending[$i]['in_stock'] = $pro->in_stock;
            $trending[$i]['is_exclusive'] = $pro->is_exclusive;
            $trending[$i]['is_featured'] = $pro->is_featured;
            $trending[$i]['is_new'] = $pro->is_new;
            $trending[$i]['is_bulk'] = $pro->is_bulk;
            $trending[$i]['view_count'] = $pro->view_count;
            $trending[$i]['discount_type'] = $pro->discount_type;
            $trending[$i]['discount'] = $pro->discount;
            $trending[$i]['tax_rate'] = $pro->tax_rate;
            $trending[$i]['status'] = $pro->status;
            $trending[$i]['reviews'] = $pro->reviews;
            $trending[$i]['rating'] =   count($pro->reviews) > 0  ?
                           ProductReview::where('product_id', $pro->id)->avg('rating')
                           : 0;
            $proimages = $pro->productProductImages;
            $variations = $pro->productProductVariations;
            $images = [];
            $sizes = [];
            $colors = [];
            // $tax_rate = "";
            $mrp_price = "";
            $sale_price = "";
            $wholesale_price = "";
            $wholesale_price = "";
            $wholesale_qty = "";
            $sortimages = [];
            $variationId = 0;

            foreach($variations as $var){
            $in = 0;
               if($var->primary_variation === 1){
                   $in++;
                   $size = (isset(Size::where('id',$var->size_id)->first()->name)) ? Size::where('id',$var->size_id)->first()->name : '';
                   array_push($sizes,$size);

                   $color = Color::where('id',$var->color_id)->first();

                   array_push($colors,$color->name);
                   foreach($proimages as $pro){
                       if($pro->product_color_id === $color->id){
                           array_push($sortimages, $pro->file_name);
                       }
                   }
                   if($in === 1){
                    $mrp_price = $var->single_price;
                    $sale_price = $var->single_sales_price;
                    $wholesale_price = $var->wholesale_price;
                    $wholesale_price = $var->wholesale_sales_price;
                    $wholesale_qty = $var->wholesale_price_quantity;
                    $variationId = $var->id;
                   }
               }
            }
            $likew = false;
            if(Auth::check()){
                
                $likew = (Wishlist::where('product_id', $pro->product_id)
                                ->where('user_id', Auth::user()->id)
                                ->where('variation_id', $variationId)
                                ->first()) ? 1 : 0;
            }
            $trending[$i]['images'] =  array_unique($sortimages);
            $trending[$i]['sizes'] = $sizes;
            $trending[$i]['colors'] = $colors;
            $trending[$i]['single_mrp_price'] =$mrp_price;
            $trending[$i]['single_sales_price'] = $sale_price;
            $trending[$i]['wholesale_mrp_price'] =$wholesale_price;
            $trending[$i]['wholesale_sales_price'] = $wholesale_price;
            $trending[$i]['wholesale_qty'] = $wholesale_qty;
            $trending[$i]['wishlist'] =$likew;
            $trending[$i]['variation_id'] =$variationId;

        }


        // $newarrivals = DB::table('banners_bestsellers')->where('type',1)->limit(3)->get();
        // $bestsellers = DB::table('banners_bestsellers')->where('type',0)->limit(3)->get();

        $newarrivals = NewArrivalBanner::limit(3)->get();
        $bestsellers = BestSellerBanner::limit(3)->get();
        $latestbanner = LatestBanner::first();
        
        $hotesale = [];
        $bylook = [];
        $n = 0;
        $looproducts = Product::where('is_sho_by_look',1)
                           ->where('status',1)
                           ->orderBy('created_at', 'desc')
                           ->limit(6)->get();

            foreach($looproducts as $pro){
            $n++;
            $bylook[$n]['id'] = $pro->id;
            $bylook[$n]['category'] = $pro->category->name;
            $bylook[$n]['sub_category'] = (isset($pro->sub_category->name)) ? $pro->sub_category->name : '' ;
            $bylook[$n]['child_category'] = $pro->child_category !== null ?? $pro->child_category->name ;
            $bylook[$n]['name'] = $pro->name;
            $bylook[$n]['desc'] = $pro->description;
            $bylook[$n]['detail'] = $pro->details;
            $bylook[$n]['slug'] = $pro->slug;
            $bylook[$n]['sku'] = $pro->sku_code;
            $bylook[$n]['in_stock'] = $pro->in_stock;
            $bylook[$n]['is_exclusive'] = $pro->is_exclusive;
            $bylook[$n]['is_featured'] = $pro->is_featured;
            $bylook[$n]['is_new'] = $pro->is_new;
            $bylook[$n]['is_bulk'] = $pro->is_bulk;
            $bylook[$n]['view_count'] = $pro->view_count;
            $bylook[$n]['discount_type'] = $pro->discount_type;
            $bylook[$n]['discount'] = $pro->discount;
            $bylook[$n]['tax_rate'] = $pro->tax_rate;
            $bylook[$n]['status'] = $pro->status;
            $bylook[$n]['reviews'] = $pro->reviews;
            $bylook[$n]['rating'] =   count($pro->reviews) > 0  ?
                            ProductReview::where('product_id', $pro->id)->avg('rating')
                            : 0;
            $proimages = $pro->productProductImages;
            $variations = $pro->productProductVariations;
            $images = [];
            $sizes = [];
            $colors = [];
            // $tax_rate = "";
            $mrp_price = "";
            $sale_price = "";
            $wholesale_price = "";
            $wholesale_price = "";
            $wholesale_qty = "";
            $sortimages = [];
            $variationId = 0;

            foreach($variations as $var){
                $in = 0;
                if($var->primary_variation === 1){
                    $in++;
                    $size = (isset(Size::where('id',$var->size_id)->first()->name)) ? Size::where('id',$var->size_id)->first()->name :'' ;
                    array_push($sizes,$size);

                    $color = Color::where('id',$var->color_id)->first();

                    array_push($colors,$color->name);
                    foreach($proimages as $pro){
                        if($pro->product_color_id === $color->id){
                            array_push($sortimages, $pro->file_name);
                        }
                    }

                    if($in === 1){
                        $mrp_price = $var->single_price;
                        $sale_price = $var->single_sales_price;
                        $wholesale_price = $var->wholesale_price;
                        $wholesale_price = $var->wholesale_sales_price;
                        $wholesale_qty = $var->wholesale_price_quantity;
                        $variationId = $var->id;
                    }
                }
            }
            $likew = false;
            if(Auth::check()){
                
                $likew = (Wishlist::where('product_id', $pro->product_id)
                                ->where('user_id', Auth::user()->id)
                                ->where('variation_id', $variationId)
                                ->first()) ? 1 : 0;
            }
            $bylook[$n]['images'] =  array_unique($sortimages);
            $bylook[$n]['sizes'] = $sizes;
            $bylook[$n]['colors'] = $colors;
            $bylook[$n]['single_mrp_price'] =$mrp_price;
            $bylook[$n]['single_sales_price'] = $sale_price;
            $bylook[$n]['wholesale_mrp_price'] =$wholesale_price;
            $bylook[$n]['wholesale_sales_price'] = $wholesale_price;
            $bylook[$n]['wholesale_qty'] = $wholesale_qty;
            $bylook[$n]['wishlist'] =$likew;
            $bylook[$n]['variation_id'] =$variationId;
        }
        $j = 0;
        $hproducts = Product::where('is_featured',1)
                           ->where('status',1)
                           ->orderBy('created_at', 'desc')
                           ->limit(12)->get();

            foreach($hproducts as $pro){
            $j++;
            $hotesale[$j]['id'] = $pro->id;
            $hotesale[$j]['category'] = $pro->category->name;
            $hotesale[$j]['sub_category'] = (isset($pro->sub_category->name)) ? $pro->sub_category->name : '' ;
            $hotesale[$j]['child_category'] = $pro->child_category !== null ?? $pro->child_category->name ;
            $hotesale[$j]['name'] = $pro->name;
            $hotesale[$j]['desc'] = $pro->description;
            $hotesale[$j]['detail'] = $pro->details;
            $hotesale[$j]['slug'] = $pro->slug;
            $hotesale[$j]['sku'] = $pro->sku_code;
            $hotesale[$j]['in_stock'] = $pro->in_stock;
            $hotesale[$j]['is_exclusive'] = $pro->is_exclusive;
            $hotesale[$j]['is_featured'] = $pro->is_featured;
            $hotesale[$j]['is_new'] = $pro->is_new;
            $hotesale[$j]['is_bulk'] = $pro->is_bulk;
            $hotesale[$j]['view_count'] = $pro->view_count;
            $hotesale[$j]['discount_type'] = $pro->discount_type;
            $hotesale[$j]['discount'] = $pro->discount;
            $hotesale[$j]['tax_rate'] = $pro->tax_rate;
            $hotesale[$j]['status'] = $pro->status;
            $hotesale[$j]['reviews'] = $pro->reviews;
            $hotesale[$j]['rating'] =   count($pro->reviews) > 0  ?
                           ProductReview::where('product_id', $pro->id)->avg('rating')
                           : 0;
            $proimages = $pro->productProductImages;
            $variations = $pro->productProductVariations;
            $images = [];
            $sizes = [];
            $colors = [];
            // $tax_rate = "";
            $mrp_price = "";
            $sale_price = "";
            $wholesale_price = "";
            $wholesale_price = "";
            $wholesale_qty = "";
            $sortimages = [];
            $variationId = 0;

            foreach($variations as $var){
                $in = 0;
                if($var->primary_variation === 1){
                    $in++;
                    $size = (isset(Size::where('id',$var->size_id)->first()->name)) ? Size::where('id',$var->size_id)->first()->name :'' ;
                    array_push($sizes,$size);

                    $color = Color::where('id',$var->color_id)->first();

                    array_push($colors,$color->name);
                    foreach($proimages as $pro){
                        if($pro->product_color_id === $color->id){
                            array_push($sortimages, $pro->file_name);
                        }
                    }

                    if($in === 1){
                        $mrp_price = $var->single_price;
                        $sale_price = $var->single_sales_price;
                        $wholesale_price = $var->wholesale_price;
                        $wholesale_price = $var->wholesale_sales_price;
                        $wholesale_qty = $var->wholesale_price_quantity;
                        $variationId = $var->id;
                    }
                }
            }
            $likew = false;
            if(Auth::check()){
                
                $likew = (Wishlist::where('product_id', $pro->product_id)
                                ->where('user_id', Auth::user()->id)
                                ->where('variation_id', $variationId)
                                ->first()) ? 1 : 0;
            }
            $hotesale[$j]['images'] =  array_unique($sortimages);
            $hotesale[$j]['sizes'] = $sizes;
            $hotesale[$j]['colors'] = $colors;
            $hotesale[$j]['single_mrp_price'] =$mrp_price;
            $hotesale[$j]['single_sales_price'] = $sale_price;
            $hotesale[$j]['wholesale_mrp_price'] =$wholesale_price;
            $hotesale[$j]['wholesale_sales_price'] = $wholesale_price;
            $hotesale[$j]['wholesale_qty'] = $wholesale_qty;
            $hotesale[$j]['wishlist'] =$likew;
            $hotesale[$j]['variation_id'] =$variationId;
        }


        $latest = [];
        $lproducts = Product::where('is_new',1)
                           ->where('status',1)
                           ->orderBy('created_at', 'desc')
                           ->limit(12)->get();
        $k = 0 ;
        foreach($lproducts as $pro){
            $latest[$k]['id'] = $pro->id;
            $latest[$k]['category'] = $pro->category->name;
            $latest[$k]['sub_category'] = (isset($pro->sub_category->name)) ? $pro->sub_category->name :'';
            $latest[$k]['child_category'] = $pro->child_category !== null ?? $pro->child_category->name ;
            $latest[$k]['name'] = $pro->name;
            $latest[$k]['desc'] = $pro->description;
            $latest[$k]['detail'] = $pro->details;
            $latest[$k]['slug'] = $pro->slug;
            $latest[$k]['sku'] = $pro->sku_code;
            $latest[$k]['in_stock'] = $pro->in_stock;
            $latest[$k]['is_exclusive'] = $pro->is_exclusive;
            $latest[$k]['is_featured'] = $pro->is_featured;
            $latest[$k]['is_new'] = $pro->is_new;
            $latest[$k]['is_bulk'] = $pro->is_bulk;
            $latest[$k]['view_count'] = $pro->view_count;
            $latest[$k]['discount_type'] = $pro->discount_type;
            $latest[$k]['discount'] = $pro->discount;
            $latest[$k]['tax_rate'] = $pro->tax_rate;
            $latest[$k]['status'] = $pro->status;
            $latest[$k]['reviews'] = $pro->reviews;
            $latest[$k]['rating'] =   count($pro->reviews) > 0  ?
                           ProductReview::where('product_id', $pro->id)->avg('rating')
                           : 0;
            $proimages = $pro->productProductImages;
            $variations = $pro->productProductVariations;
            $images = [];
            $sizes = [];
            $colors = [];
            $mrp_price = "";
            $sale_price = "";
            $wholesale_price = "";
            $wholesale_price = "";
            $wholesale_qty = "";
            $sortimages = [];
            $variationId = 0 ;

                
            foreach($variations as $var){
                $in = 0;
                if($var->primary_variation === 1){
                    $in++;
                    $size = (isset(Size::where('id',$var->size_id)->first()->name)) ? Size::where('id',$var->size_id)->first()->name : '' ;
                    array_push($sizes,$size);

                     $color = Color::where('id',$var->color_id)->first();

                   array_push($colors,$color->name);
                   foreach($proimages as $pro){
                       if($pro->product_color_id === $color->id){
                           array_push($sortimages, $pro->file_name);
                       }
                   }
                   if($in === 1){
                    $mrp_price = $var->single_price;
                    $sale_price = $var->single_sales_price;
                    $wholesale_price = $var->wholesale_price;
                    $wholesale_price = $var->wholesale_sales_price;
                    $wholesale_qty = $var->wholesale_price_quantity;
                    $variationId = $var->id;
                   }
                }
            }
            $likew = false;
            if(Auth::check()){
                
                $likew = (Wishlist::where('product_id', $pro->product_id)
                                ->where('user_id', Auth::user()->id)
                                ->where('variation_id', $variationId)
                                ->first()) ? 1 : 0;
            }
            $latest[$k]['images'] =  array_unique($sortimages);
            $latest[$k]['sizes'] = $sizes;
            $latest[$k]['colors'] = $colors;
            $latest[$k]['single_mrp_price'] =$mrp_price;
            $latest[$k]['single_sales_price'] = $sale_price;
            $latest[$k]['wholesale_mrp_price'] =$wholesale_price;
            $latest[$k]['wholesale_sales_price'] = $wholesale_price;
            $latest[$k]['wholesale_qty'] = $wholesale_qty;
            $latest[$k]['wishlist'] =$likew;
            $latest[$k]['variation_id'] =$variationId;
            $k++;
        }

        return view('frontend-view.home.index',compact('banners','tbanners','testimonials','home_cat','trending','hotesale','latest','newarrivals','bestsellers','latestbanner','bylook','vbanners'));
        
    }


    public function load_featured_section(){
         $products=Product::orderBy('id','DESC')->get();
         $products->load('productProductImages');
        return response()->json($products,200);
    }

    public function load_exclusive_section(){
        $products=Product::orderBy('id','DESC')->get();
        $products->load('productProductImages');
       return response()->json($products,200);
    }

    public function load_bestseller_section(){
    $products=Product::orderBy('id','DESC')->get();
    $products->load('productProductImages');
     return response()->json($products,200);
   }



    public function search(Request $request)
    {
        $categoryfilter=[];
        $colorfilter=[];
        $sizes=[];
        $sizefilter=[];
        $attributefilter=[];
        $query = $request->q;
        $categories = Category::where('parent_id',0)->where('status',1)->get();
        $conditions = ['status' => 1];


        if ($request->ajax()) {

        $prods = Product::query();
        // $prods = Product::where('status',1)
        //                   ->orderBy('created_at', 'desc')
        //                   ->paginate(5);
        $count =  Product::where('status',1)->get()->count();
        $cat = $request->q != '' ? $request->q : '';
        $sortby = $request->sortby;
        if($cat != ''){
            $prods = $prods->Where('category_id', 'like', '%'.$cat.'%')->orWhere('sub_category_id', 'like', '%'.$cat.'%')->orWhere('sub_category_child_id', 'like', '%'.$cat.'%');
        }

        // colors
        if($request->has('colors')){
            foreach($request->colors as $color){
            $prods = $prods->with(['productProductVariations' => function ($query) use ($color){
                $query->where('color_id',$color);
            }]);
            }
        }

        // sizes
        if($request->has('sizes')){
            foreach($request->sizes as $size){
            $prods = $prods->with(['productProductVariations' => function ($query) use ($size) {
                $query->where('size_id',$size);
            }]);
            }
        }

        // sizes
        if($request->has('attributes')){


            foreach($request->attributes as $attribute){

            $prods = $prods->with(['productProductAttributes' => function ($query) use($attribute) {
                $query->where('attribute_id',$attribute['attr_id'])->where('attribute_value_id',$attribute['value_id']);
            }]);
            }
        }

        // sordting
        if($sortby != 'no'){
            if($sortby == 'plth'){
            $prods = $prods->with(['productProductVariations' => function ($query) {
                $query->orderBy('single_sales_price','asc');
            }]);
            }
            else if($sortby == 'phtl'){
            $prods = $prods->with(['productProductVariations' => function ($query) {
                $query->orderBy('single_sales_price','desc');
            }]);
            }
            else if($sortby == 'popular'){
                $prods = $prods->orderBy('view_count','desc');
            }
            else if($sortby == 'discount'){
                $prods = $prods->orderBy('discount','desc');
            }
            else{
                $prods = $prods->orderBy('id','desc');
            }
        }



        $prods = $prods->where('status',1)
                        ->paginate(5);

        $i = 0;
        $searchproducts = [];
        foreach($prods as $pro){

            $i++;
            $searchproducts[$i]['id'] = $pro->id;
            $searchproducts[$i]['category'] = $pro->category->name;
            $searchproducts[$i]['sub_category'] = $pro->sub_category->name;
            $searchproducts[$i]['child_category'] = $pro->child_category !== null ?? $pro->child_category->name ;
            $searchproducts[$i]['name'] = $pro->name;
            $searchproducts[$i]['desc'] = $pro->description;
            $searchproducts[$i]['detail'] = $pro->details;
            $searchproducts[$i]['slug'] = $pro->slug;
            $searchproducts[$i]['sku'] = $pro->sku_code;
            $searchproducts[$i]['in_stock'] = $pro->in_stock;
            $searchproducts[$i]['is_exclusive'] = $pro->is_exclusive;
            $searchproducts[$i]['is_featured'] = $pro->is_featured;
            $searchproducts[$i]['is_new'] = $pro->is_new;
            $searchproducts[$i]['is_bulk'] = $pro->is_bulk;
            $searchproducts[$i]['view_count'] = $pro->view_count;
            $searchproducts[$i]['discount_type'] = $pro->discount_type;
            $searchproducts[$i]['discount'] = $pro->discount;
            $searchproducts[$i]['tax_rate'] = $pro->tax_rate;
            $searchproducts[$i]['status'] = $pro->status;

            $proimages = $pro->productProductImages;
            $variations = $pro->productProductVariations;

            $images = [];
            $sizes = [];
            $colors = [];
            // $tax_rate = "";
            $mrp_price = "";
            $sale_price = "";
            $wholesale_price = "";
            $wholesale_price = "";
            $wholesale_qty = "";


            foreach($variations as $var){
                if($var->primary_variation === 1){
                    $size = Size::where('id',$var->size_id)->first()->name;
                    array_push($sizes,$size);

                    $color = Color::where('id',$var->color_id)->first()->name;
                    array_push($colors,$color);
                    $mrp_price = $var->single_price;
                    $sale_price = $var->single_sales_price;
                    $wholesale_price = $var->wholesale_price;
                    $wholesale_price = $var->wholesale_sales_price;
                    $wholesale_qty = $var->wholesale_price_quantity;
                }
            }

            $searchproducts[$i]['images'] =  $proimages;
            $searchproducts[$i]['sizes'] = $sizes;
            $searchproducts[$i]['colors'] = $colors;
            $searchproducts[$i]['single_mrp_price'] =$mrp_price;
            $searchproducts[$i]['single_sales_price'] = $sale_price;
            $searchproducts[$i]['wholesale_mrp_price'] =$wholesale_price;
            $searchproducts[$i]['wholesale_sales_price'] = $wholesale_price;
            $searchproducts[$i]['wholesale_qty'] = $wholesale_qty;

        }

        return response()->json([
            'success' => true,
            'data' => view('frontend.product_list',compact('searchproducts','prods'))->render(),
            'count' => $count
        ]);
        }
        $products = Product::query();
        if($query != null){
            $products = $products->where('name', 'like', '%'.$query.'%')->orWhere('category_id', 'like', '%'.$query.'%')->orWhere('sub_category_id', 'like', '%'.$query.'%')->orWhere('sub_category_child_id', 'like', '%'.$query.'%');
            $categories=Category::where('parent_id',$query)->where('status',1)->get();
        }
        if (isset($_GET['category_id']) && $_GET['category_id'] != null && $_GET['category_id'] !='undefined') {
            $categoryfilter=explode(",",$_GET['category_id']);
            $products=$products->orWhereIn('category_id',$categoryfilter);
        }
        if (isset($_GET['category_id']) && $_GET['category_id'] != null && $_GET['category_id'] !='undefined') {
            $categoryfilter=explode(",",$_GET['category_id']);
            $products=$products->orWhereIn('sub_category_id',$categoryfilter);
        }

        if (isset($_GET['category_id']) && $_GET['category_id'] != null && $_GET['category_id'] !='undefined') {
            $categoryfilter=explode(",",$_GET['category_id']);
            $products=$products->orWhereIn('sub_category_child_id',$categoryfilter);
        }
        if (isset($_GET['color']) && $_GET['color'] != null && $_GET['color'] !='undefined') {
            $colorfilter=explode(",",$_GET['color']);
            $variations=ProductVariation::whereIn('color_id',$colorfilter)->pluck('product_id');
            $products=$products->orWhereIn('id',$variations);
        }
        if (isset($_GET['size']) && $_GET['size'] != null && $_GET['size'] !='undefined') {
            $sizefilter=explode(",",$_GET['size']);
            $prod_id=array();
            $sizes=DB::table("product_variations")->select('product_id')->whereIn("size_id",$sizefilter)->get();
            foreach($sizes as $sz)
            {
                $prod_id[]=$sz->product_id;
            }

            $products=$products->orWhereIn('id',$prod_id);
        }
        if (isset($_GET['attributes']) && $_GET['attributes'] != null && $_GET['attributes'] !='undefined') {
            $attributefilter=explode(",",$_GET['attributes']);
            $ProductAttributesCustoms=ProductAttribute::whereIn('attribute_value_id',$attributefilter)->pluck('product_id');
            $products=$products->orWhereIn('id',$ProductAttributesCustoms);
        }
        $sizes = Size::where('status', '1')->get();
        $colors = Color::where('status', '1')->get();
        $attributes=Attribute::where('status',1)->get();
        if($query != null){
        $mycat = Category::where('id',$query)->first();

        $child = "";
        $subChild = "";
        $subsubChild = "";
        $parent = "";
        $primary = "";
        if($mycat->parent_id != 0){
            $sub= Category::where('id', $mycat->id)->first();
            $parent = $sub->name;
            if($sub){
            if($sub->parent_id != 0){
                $subsub = Category::where('id', $sub->parent_id)->first();
                if($subsub){
                $subChild = $subsub->name;
                if($subsub->parent_id != 0){
                    $subsubsub = Category::where('id', $subsub->parent_id)->first();
                    if($subsubsub){
                    if($subsubsub->parent_id != 0){
                        $subsubChild = $subsubsub->name;
                    }
                    else{
                        $primary = $subsubsub->name;
                    }
                    }
                }
                else{
                    $primary = $subsub->name;
                }
                }
            }
            else{
                $primary = $sub->name;
            }
            }
        }
        else{
            $primary = $mycat->name;
        }
        $mycat = $subsubChild. '      '.$subChild. '      '.$child. '      '.$parent;
        }
        else{
        $mycat = null;
        }

        $products=$products->distinct();
        $products = $products->paginate(12)->appends(request()->query());

        // return view('front.product_listing', compact('products', 'query','categories','categoryfilter','colors','colorfilter','sizes','sizefilter','attributes','attributefilter','mycat','primary'));

        $categories = Category::where('parent_id',0)->where('status',1)->get();

        return view('frontend.category', compact('products', 'query','categories','categoryfilter','colors','colorfilter','sizes','sizefilter','attributes','attributefilter','mycat','primary'));
    }

    function zoom(){
        return view('frontend-view.home.zoom');
    }

    
    public function trending_products(){
        $i = 0;
        $trending = [];
        $products = Product::where('is_exclusive',1)
                           ->where('status',1)
                           ->orderBy('created_at', 'desc')
                           ->get();

        foreach($products as $pro){
            $i++;
            $trending[$i]['id'] = $pro->id;
            $trending[$i]['category'] = $pro->category->name;
            $trending[$i]['sub_category'] = (isset($pro->sub_category->name)) ? $pro->sub_category->name : '' ;
            $trending[$i]['child_category'] = $pro->child_category !== null ?? $pro->child_category->name ;
            $trending[$i]['name'] = $pro->name;
            $trending[$i]['desc'] = $pro->description;
            $trending[$i]['detail'] = $pro->details;
            $trending[$i]['slug'] = $pro->slug;
            $trending[$i]['sku'] = $pro->sku_code;
            $trending[$i]['in_stock'] = $pro->in_stock;
            $trending[$i]['is_exclusive'] = $pro->is_exclusive;
            $trending[$i]['is_featured'] = $pro->is_featured;
            $trending[$i]['is_new'] = $pro->is_new;
            $trending[$i]['is_bulk'] = $pro->is_bulk;
            $trending[$i]['view_count'] = $pro->view_count;
            $trending[$i]['discount_type'] = $pro->discount_type;
            $trending[$i]['discount'] = $pro->discount;
            $trending[$i]['tax_rate'] = $pro->tax_rate;
            $trending[$i]['status'] = $pro->status;
            $trending[$i]['reviews'] = $pro->reviews;
            $trending[$i]['rating'] =   count($pro->reviews) > 0  ?
                           ProductReview::where('product_id', $pro->id)->avg('rating')
                           : 0;
            $proimages = $pro->productProductImages;
            $variations = $pro->productProductVariations;
            $images = [];
            $sizes = [];
            $colors = [];
            // $tax_rate = "";
            $mrp_price = "";
            $sale_price = "";
            $wholesale_price = "";
            $wholesale_price = "";
            $wholesale_qty = "";
            $sortimages = [];
            $variationId = 0;

            foreach($variations as $var){
            $in = 0;
               if($var->primary_variation === 1){
                   $in++;
                   $size = (isset(Size::where('id',$var->size_id)->first()->name)) ? Size::where('id',$var->size_id)->first()->name : '';
                   array_push($sizes,$size);

                   $color = Color::where('id',$var->color_id)->first();

                   array_push($colors,$color->name);
                   foreach($proimages as $pro){
                       if($pro->product_color_id === $color->id){
                           array_push($sortimages, $pro->file_name);
                       }
                   }
                   if($in === 1){
                    $mrp_price = $var->single_price;
                    $sale_price = $var->single_sales_price;
                    $wholesale_price = $var->wholesale_price;
                    $wholesale_price = $var->wholesale_sales_price;
                    $wholesale_qty = $var->wholesale_price_quantity;
                    $variationId = $var->id;
                   }
               }
            }
            $likew = false;
            if(Auth::check()){
                
                $likew = (Wishlist::where('product_id', $pro->product_id)
                                ->where('user_id', Auth::user()->id)
                                ->where('variation_id', $variationId)
                                ->first()) ? 1 : 0;
            }
            $trending[$i]['images'] =  array_unique($sortimages);
            $trending[$i]['sizes'] = $sizes;
            $trending[$i]['colors'] = $colors;
            $trending[$i]['single_mrp_price'] =$mrp_price;
            $trending[$i]['single_sales_price'] = $sale_price;
            $trending[$i]['wholesale_mrp_price'] =$wholesale_price;
            $trending[$i]['wholesale_sales_price'] = $wholesale_price;
            $trending[$i]['wholesale_qty'] = $wholesale_qty;
            $trending[$i]['wishlist'] =$likew;
            $trending[$i]['variation_id'] =$variationId;

        }

        return view('frontend-view.trending-products',compact('trending'));

    }
}
