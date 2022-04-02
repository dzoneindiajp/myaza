<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Size;
use App\Models\Pincode;
use App\Models\Color;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductVariation;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\Wishlist;
use App\Models\ProductReview;
use App\Models\Brand;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Auth;

class ProductController extends Controller
{
    public function index(Product $id){
        $variations=[];
        $product=$id;
        $sizes=Size::all();
        $colors=Color::all();
        $primaryvariation=$product->productProductVariations()->where('primary_variation',1)->first();
        $images=$product->productProductImages()->where('product_color_id',$primaryvariation->color_id)->get();
        $firstimage=$product->productProductImages()->where('product_color_id',$primaryvariation->color_id)->first();
        return view('front.product',compact('product','sizes','colors','primaryvariation','images','firstimage'));
    }

    function getvarsizes(Request $request){
        $html = '';
        $variaton = ProductVariation::join('sizes', 'sizes.id', '=', 'product_variations.size_id')->where(['product_variations.product_id'=>$request->input('product_id'),'product_variations.color_id'=>$request->input('pa_color')])->get();
        $count = 1;
        foreach($variaton as $r=>$scol){
            $ch = '';

            if($scol->single_price_quantity != "" && $scol->single_price_quantity != 0){
                if($count == 1){
                    $count = $count + 1;
                    $ch = 'checked';
                }
                $html .= '<li class="variable-item selected">
                    <input onchange="bringvariation()" '.$ch.' id="size_'.$scol->name.'" value="'.$scol->id.'" type="radio" name="pa_size">
                    <label  data-toggle="tooltip" for="size_'.$scol->name.'" title="'.$scol->name.'"><span style="position: relative;text-align: center;line-height: 35px;">'.$scol->name.'</span></label>
                </li>';
            }
        }
        return response()->json(['html'=>$html],200);
    }

    public function get_product_image(Request $request){
        $variaton = ProductVariation::where(['product_id'=>$request->input('product_id'),'color_id'=>$request->input('pa_color'),'size_id'=>$request->input('pa_size')])->first();
        $images=ProductImage::where('product_id',$request->input('product_id'))->where('product_color_id',$request->input('pa_color'))->get();

        return response()->json(['images'=>$images,'variation'=>$variaton],200);
    }
    
    public function info($id){
      $product = Product::find($id);

      $like = false;
      if(\Auth::check()){
          $like = Wishlist::where('product_id', $product->id)
                          ->where('user_id', \Auth::user()->id)
                          ->first() ? true : false;
      }

      $info = [];
      $info['id'] = $product->id;
      $info['category'] = $product->category->name;
      $info['sub_category'] = $product->sub_category->name;
      $info['subcategory_id'] = $product->sub_category->id;
      $info['child_category'] = $product->child_category !== null ?? $product->child_category->name ;
      $info['name'] = $product->name;
      $info['desc'] = $product->description;
      $info['detail'] = $product->details;
      $info['slug'] = $product->slug;
      $info['sku'] = $product->sku_code;
      $info['in_stock'] = $product->in_stock;
      $info['is_exclusive'] = $product->is_exclusive;
      $info['is_featured'] = $product->is_featured;
      $info['is_new'] = $product->is_new;
      $info['is_bulk'] = $product->is_bulk;
      $info['view_count'] = $product->view_count;
      $info['discount_type'] = $product->discount_type;
      $info['discount'] = $product->discount;
      $info['tax_rate'] = $product->tax_rate;
      $info['status'] = $product->status;
      $info['description'] = $product->description;
      $info['details'] = $product->details;
      $info['slug'] = $product->slug;


      $info['images'] = $product->productProductImages;
      $info['variations'] = $product->productProductVariations;
      $info['attributes'] = $product->productProductAttributes;


      $z = 0;
      $color = [];
      $size = [];
      foreach($info['variations'] as $var){
          if($var['primary_variation'] === 1){
            $z++;
            if($z === 1){
              $size = Size::find($var['size_id']);
              $color = Color::find($var['color_id']);
            }
            else{
                break;
            }
          }
      }

    $price = ProductVariation::where('color_id', $color->id)->where('size_id', $size->id)->where('product_id', $info['id'])->first();

      $images = ProductImage::where('product_id', $info['id'])->get();
      return response()->json([
        'success' => true,
        'code' => 200,
        'html' => view('store.popup.product', compact('info','like'))->render(),
        'message' => 'Product info retrieve successfully.',
        'product' => $info,
        'color' => $color,
        'size' => $size,
        'images' => $images,
        'price' => $price
      ]);
    }

    function xdetail($slug){
        $product = Product::where('slug', $slug)->first();
		
        $pvcolors = ProductVariation::where('product_id', $product->id)->groupBy('color_id')->pluck('color_id')->toArray();

        $pcolors = Color::where('status', '1')->whereIn('id', $pvcolors)->get();
       
        if(!$product){
            return view('errors.404');
        }
        $like = false;
        if(\Auth::check()){
            $like = Wishlist::where('product_id', $product->id)
                            ->where('user_id', \Auth::user()->id)
                            ->first() ? true : false;
        }

        $category_str = $product->category->name . '  ' .$product->sub_category->name. '  '.$product->child_category;
        $info = [];
        $info['id'] = $product->id;
        $info['category'] = $product->category->name;
        $info['category_slug'] = $product->category->slug;
        $info['sub_category'] = $product->sub_category->name;
        $info['sub_category_slug'] = $product->sub_category->slug;
        $info['child_category'] = $product->child_category ? $product->child_category->name : '' ;
        $info['child_category_slug'] = $product->child_category ? $product->child_category->slug : '' ;
        $info['brand'] = Brand::first();
        $info['care'] = $product->care_and_disclaimer !== null ? $product->care_and_disclaimer : '';
        $info['subcategory_id'] = $product->sub_category->id;
        $info['name'] = $product->name;
        $info['hsn'] = $product->hsn_code;
        $info['desc'] = $product->description;
        $info['need_help'] = $product->need_help;
        $info['detail'] = $product->details;
        $info['slug'] = $product->slug;
        $info['sku'] = $product->sku_code;
        $info['in_stock'] = $product->in_stock;
        $info['is_exclusive'] = $product->is_exclusive;
        $info['is_featured'] = $product->is_featured;
        $info['is_new'] = $product->is_new;
        $info['is_bulk'] = $product->is_bulk;
        $info['view_count'] = $product->view_count;
        $info['discount_type'] = $product->discount_type;
        $info['discount'] = $product->discount;
        $info['tax_rate'] = $product->tax_rate;
        $info['status'] = $product->status;
        $info['description'] = $product->description;
        $info['details'] = $product->details;
        $info['slug'] = $product->slug;
        $info['primary_variation'] = $product->primary_variation;
        $info['images'] = $product->productProductImages;
        $info['variations'] = $product->productProductVariations;
        $info['attributes'] = $product->productProductAttributes;
        $info['reviews'] = $product->reviews;
        $info['rating'] =   count($product->reviews) > 0  ?
        ProductReview::where('product_id', $product->id)->avg('rating')
                           : 0;
        $info['five']  = count($product->reviews) > 0  ?
        ProductReview::where('product_id', $product->id)->where('rating',5)->get()->count()
        : 0;

        

        $products = Product::where('sub_category_id',$product->sub_category_id)->limit(10)->get();
        $trending = [];
        $i = 0;

        foreach($products as $pro){
            $i++;
            $trending[$i]['id'] = $pro->id;
            $trending[$i]['category'] = $pro->category->name;
            $trending[$i]['sub_category'] = $pro->sub_category->name;
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
            $trending[$i]['discount_type'] = $pro->discount_type;
            $trending[$i]['discount'] = $pro->discount;
            $proimages = $pro->productProductImages;
            $variations = $pro->productProductVariations;
            $images = [];
            $mrp_price = "";
            $sale_price = "";
            $sortimages = [];
            $colors = [];
            $variationId = 0;

            foreach($variations as $var){
            $in = 0;
                if($var->primary_variation === 1){
                    $in++;
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
            $trending[$i]['single_mrp_price'] =$mrp_price;
            $trending[$i]['wishlist'] =$likew;
            $trending[$i]['variation_id'] =$variationId;
            $trending[$i]['single_sales_price'] = $sale_price;
        }
        return compact('info','pcolors','trending','product','like');
        
    }

    public function detail(Request $request,$slug){
        $product = Product::where('slug', $slug)->first();
        $cat = Category::where('slug', $slug)->first();
        if(isset($cat->id) || $slug == 'all'){
            $prods = Product::first();
            $categoryfilter=[];
            $colorfilter=[];
            $sizes=[];
            $sizefilter=[];
            $attributefilter=[];
            $categorysearch = $slug;
    
            $categories = Category::where('parent_id',0)->where('status',1)->get();
            $allcategories = Category::where('status',1)->get();
            $conditions = ['status' => 1];
            $catid = 0;
            $cat_id = 0;
            $catbanner = 'no';
            $catavail = true;
            $title = 'Products';
    
            if($categorysearch !== 'all'){
                 $catban = Category::where('slug', $categorysearch)->first();
                 if($catban){
                    $title = $catban->name;
                     $catbanner = $catban->image;
                 }else{
                     $catavail = false;
                 }
            }
            
            
            
            if(!$catavail){
                return view('errors.404');
            }
    
            if ($request->ajax()) { 
            
                $prods = Product::where('products.status',1);
                $cat = $request->category != '' ? $request->category : '';
                $sortby = $request->sortby;
                $catid = 0;
               
                // colors
                if($request->has('colors')){
                    if(count($request->colors) > 0){
                        $colors = $request->colors;
                        $prods = $prods->whereHas('productProductVariations', function (Builder $query)  use ($colors) {
                            $query->whereIn('color_id', $colors)->where("single_price_quantity", "!=", "");
                        });
                    }
                }
    
                // sizes
                if($request->has('sizes')){
                    if(count($request->sizes) > 0){
                        $sizes = $request->sizes;
                        $prods = $prods->whereHas('productProductVariations', function (Builder $query)  use ($sizes) {
                            $query->whereIn('size_id', $sizes)->where("single_price_quantity", "!=", "");
                        });
                    }
                }
    
                // attributes
                if($request->has('attributes')){ 
                    $attributes = $request->get('attributes');
                    if(count($request->get('attributes')) > 0){
                        $prods = $prods->whereHas('productProductAttributes', function (Builder $query)  use ($attributes) {
                            $query->whereIn('attribute_value_id', $attributes);
                        });
                    }
                    
                }
    
                // price
                if($request->has('prices')){
                    $prices = $request->prices;
    
                    if(count($prices) > 0){
    
                        foreach($prices as $price){
                            if($price === '<700'){
                                $price = 700;
                                $prods = $prods->whereHas('productProductVariations', function (Builder $query)  use ($price) {
                                    $query->where('single_sales_price','<', 700);
                                   });
                            }
                            elseif($price === '>700<1000'){
    
                                $prods = $prods->whereHas('productProductVariations', function (Builder $query) {
                                    $query->whereBetween('single_sales_price',[700, 1000]);
                                   });
                            }
                            elseif($price === '>1000<5000'){
                                $prods = $prods->whereHas('productProductVariations', function (Builder $query) {
                                    $query->whereBetween('single_sales_price',[1000, 5000]);
                                   });
                            }
                            elseif($price === '>5000'){
                                $prods = $prods->whereHas('productProductVariations', function (Builder $query) {
                                    $query->where('single_sales_price','>',5000);
                                   });
                            }
                        }
                    }
                }
    
                if($request->has('min_price') && $request->has('max_price') ){
                    if($request->min_price !== 'no' && $request->max_price !== 'no'){
                        $above = $request->min_price;
                        $below = $request->max_price;
                        $prods = $prods->whereHas('productProductVariations', function (Builder $query) use ($above, $below){
                            $query->whereBetween('single_sales_price',[$above, $below]);
    
                        });
                    }
                    else if($request->min_price !== "no" && $request->max_price === "no"){
                        $above = $request->min_price;
                        $prods = $prods->whereHas('productProductVariations', function (Builder $query) use ($above){
                            $query->where('single_sales_price','>',$above);
                        });
                    }
                    else if($request->min_price === "no" && $request->max_price !== "no"){
                        $below = $request->max_price;
                        $prods = $prods->whereHas('productProductVariations', function (Builder $query) use ($below){
                            $query->where('single_sales_price','<',$below);
                        });
                    }
                }
    
                // sorting
                if($sortby != 'no'){
                    if($sortby == 'cs'){
                        $prods = $prods->orderBy('view_count','desc');
                    }
                }
    
                if($cat != '' && $cat != 'all'){ 
                    $id = Category::where('slug',$cat)->first();
                    if($id){
                        $cat_id = $id->id;
                        $prods->where(function ($query) use ($cat_id){
                            $query->where('products.category_id', $cat_id)
                            ->orWhere('products.sub_category_id', $cat_id)->orWhere('products.sub_category_child_id', $cat_id);
                        });
                    }
                }
    
                if($request->has('search')){
                    if($request->search !== 'no'){
                        $prods = $prods->where(function ($query) use ($request){
                            $query->where('name','like','%'.$request->search.'%')
                            ->orWhere('sku_code','like','%'.$request->search.'%');
                        });
                        $catTopSearch  = Category::where('name','like','%'.$request->search.'%')->pluck('id')->toArray();
                        if(!empty($catTopSearch)){
                            $prods->where(function ($query) use ($catTopSearch){
                                $query->whereIn('category_id', $catTopSearch)
                                ->orWhereIn('sub_category_id', $catTopSearch)->orWhereIn('sub_category_child_id', $catTopSearch);
                            });
                        }
                    }
                }
                $propre = $prods->select('products.*');
               
                // echo $propre->toSql();
                // print_r($propre->getBindings());
    
                $prods = $propre->get();
               
                $i = 0;
                $searchproducts = [];
                foreach($prods as $pro){
    
                    $i++;
                    $searchproducts[$i]['id'] = $pro->id;
                    $searchproducts[$i]['category'] = $pro->category->name;
                    $searchproducts[$i]['sub_category'] = (isset($pro->sub_category->name))?$pro->sub_category->name:'';
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
                    $mrp_price = "";
                    $sale_price = "";
                    $wholesale_price = "";
                    $wholesale_price = "";
                    $wholesale_qty = "";
                    $selectedimg = [];
    
                        $newvariation = ProductVariation::where('product_id', $pro->id)->where("single_price_quantity", "!=", "");
                        if($request->has('sizes') && $request->has('colors')){
                            if(count($request->sizes) > 0 && count($request->colors) > 0){
                                $newvariation = $newvariation->whereIn('color_id', $request->colors)->orWhereIn('size_id',$request->sizes);
                            }
                        }
    
                        elseif($request->has('sizes')){
                            if(count($request->sizes) > 0){
                                $newvariation = $newvariation->whereIn('size_id',$request->sizes);
                            }
                        }
                        elseif($request->has('colors')){
                            if(count($request->colors) > 0){
                                $newvariation = $newvariation->whereIn('color_id',$request->colors);
                            }
                        }
    
                        if($request->has('prices')){
                            if($request->prices[0] === '<700'){
                                $newvariation = $newvariation->where('single_sales_price','<', 700);
                            }
                            elseif($request->prices[0] === '>700<1000'){
                                $newvariation = $newvariation->whereBetween('single_sales_price',[700, 1000]);
                            }
                            elseif($request->prices[0] === '>1000<5000'){
                                $newvariation = $newvariation->whereBetween('single_sales_price',[1000, 5000]);;
                            }
                            elseif($request->prices[0] === '>5000'){
                                $newvariation = $newvariation->where('single_sales_price','>', 700);
                            }
                        }
    
                        if($request->has('min_price') && $request->has('max_price') ){
                            if($request->min_price !== 'no' && $request->max_price !== 'no'){
                                $above = $request->min_price;
                                $below = $request->max_price;
                                $newvariation = $newvariation->whereBetween('single_sales_price',[$above, $below]);
                            }
                            else if($request->min_price !== "no" && $request->max_price === "no"){
                                $above = $request->min_price;
                                $newvariation = $newvariation->where('single_sales_price','>',$above);
                            }
                            else if($request->min_price === "no" && $request->max_price !== "no"){
                                $below = $request->max_price;
                                $newvariation = $newvariation->where('single_sales_price','<',$below);
                            }
                        }
                        
                        $newvariation = $newvariation->get();
                        $variationId = 0;
                        foreach($newvariation as $var){
                            $in = 0;
                            if($var->primary_variation === 1){
                                $in++;
                                $size = Size::where('id',$var->size_id)->first();
                                array_push($sizes,$size);
    
                                $color = Color::where('id',$var->color_id)->first();
                                array_push($colors,$color->name);
                                foreach($proimages as $imgp){
                                    if($imgp->product_color_id === $var->color_id){
                                        array_push($selectedimg,$imgp->file_name);
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
    
                    // }
                    $likew = false;
                    if(Auth::check()){
                        $likew = (Wishlist::where('product_id', $pro->id)
                                        ->where('user_id', Auth::user()->id)
                                        ->where('variation_id', $variationId)
                                        ->first()) ? 1 : 0;
                    }
                    $searchproducts[$i]['simage'] =  $selectedimg;
                    $searchproducts[$i]['variation_id'] =  $variationId;
                    $searchproducts[$i]['wishlist'] =$likew;
                    $searchproducts[$i]['images'] =  $proimages;
                    $searchproducts[$i]['sizes'] = $sizes;
                    $searchproducts[$i]['colors'] = $colors;
                    $searchproducts[$i]['single_mrp_price'] =$mrp_price;
                    $searchproducts[$i]['single_sales_price'] = $sale_price;
                    $searchproducts[$i]['wholesale_mrp_price'] =$wholesale_price;
                    $searchproducts[$i]['wholesale_sales_price'] = $wholesale_price;
                    $searchproducts[$i]['wholesale_qty'] = $wholesale_qty;
                    $searchproducts[$i]['reviews'] = $pro->reviews;
                    $searchproducts[$i]['rating'] =   count($pro->reviews) > 0  ?
                               ProductReview::where('product_id', $pro->id)->avg('rating')
                               : 0;
                }
    
                $html = '';
                foreach($allcategories as $all){
                    if($all->parentid === $catid){
                        $html .= '
                        <li>
                            <a href="'.url('shop').'?category='.$all->id.'">
                                <span class="label_txt">'.$all->name.'</span>
                                <span class="count_txt">';
    
                                    $catcount = \App\Models\Product::where('category_id', $all->id)->get();
                                    if($catcount){
                                        echo ($catcount->count());
                                    }
                                    else{
                                        echo (0);
                                    }
                        $html .= '
                                </span>
                            </a>
                        </li>
                        ';
                    }
                }
                
                if($sortby != 'no'){
                    $marks = array();
                    foreach ($searchproducts as $key => $row){
                        $marks[$key] = $row['single_sales_price'];
                    }
                    if($sortby == 'pasc'){
                         array_multisort($marks, SORT_ASC, $searchproducts);
                    }else if($sortby == 'pdesc'){
                        array_multisort($marks, SORT_DESC, $searchproducts);
                    }
                }
                
                
                $response = view('store.products.list',compact('searchproducts','prods'))->render();
                $count =  $propre->count();

                $searchproducts = [];
                $attarr = [];
                (object)$match = "";

                if($cat_id != "" || $cat_id > 0){
                    $match = \App\Models\MapAttribute::where('category_id','like','%'.$cat_id)->orWhere('sub_category_id','like','%'.$cat_id)->orWhere('sub_category_child_id','like','%'.$cat_id)->first();
                    
                    if($match){
                        
                        if($match->attributes && $match->is_attribute === 1){

                            foreach($match->attributes as $values){
                                array_push($attarr, $values['attributevalues'][0]);
                            }
                            
                          $selattrval = AttributeValue::whereIn('id', $attarr )->pluck('attribute_id')->toArray();
                          $selectedaatrs = Attribute::whereIn('id', $selattrval)->whereHas('attribute_values')->get();
                            /*echo "<pre>";
                            print_r($selectedaatrs);
                            die;*/
                          $selectedaatrs = Attribute::whereIn('id', $selattrval)->whereHas('attribute_values', function (Builder $query) use ($attarr){
                            $query->whereIn('id',$attarr);
                          })->get();

                        }
                    }
                }

                $attributes = view('store.products.attributes', compact('selectedaatrs', 'prods', 'cat_id', 'request'))->render();
               
                return response()->json([
                    'success' => true,
                    'data' => $response,
                    'attributes' => $attributes,
                    'count' => $count,
                    'categories' => $html
                ]);
            }
    
            $products = Product::query();
            $selectedaatrs = [];
            $attarr = [];
            (object)$match = "";
    
            if($categorysearch != 'all'){
                    $id = \App\Models\Category::where('slug',$categorysearch)->first();
                   
                    if($id){
                        $catid = $id->id;
                        $match = \App\Models\MapAttribute::where('category_id','like','%'.$catid)->orWhere('sub_category_id','like','%'.$catid)->orWhere('sub_category_child_id','like','%'.$catid)->first();
                        
                        if($match){
                            
                            if($match->attributes && $match->is_attribute === 1){
    
                                foreach($match->attributes as $values){
                                    array_push($attarr, $values['attributevalues'][0]);
                                }
                                
                              $selattrval = AttributeValue::whereIn('id', $attarr )->pluck('attribute_id')->toArray();
                              $selectedaatrs = Attribute::whereIn('id', $selattrval)->whereHas('attribute_values')->get();
                                /*echo "<pre>";
                                print_r($selectedaatrs);
                                die;*/
                              $selectedaatrs = Attribute::whereIn('id', $selattrval)->whereHas('attribute_values', function (Builder $query) use ($attarr){
                                $query->whereIn('id',$attarr);
                              })->get();
    
                            }
                        }
                        $products = $products->where('category_id', $id->id)->orWhere('sub_category_id', $id->id)->orWhere('deleted_at', '')->orWhere('sub_category_child_id', $id->id);
                        $categories=Category::where('parent_id',$categorysearch)->where('status',1)->get();
                    }
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
                $products=$products->orWhereIn('id',$ProductAttributesCustoms)->where('deleted_at','') ;
            }
            $sizes = Size::where('status', '1')->get();
            $colors = Color::where('status', '1')->get();
            $attributes=Attribute::where('status',1)->get();
            
            
            if($request->q){
                $products = $products->where('name', 'LIKE', '%'.$request->q.'%');
            }
            $products=$products->distinct();
            $products = $products->paginate(24)->appends(request()->query());
    
            $categories = Category::where('parent_id',0)->where('status',1)->get();
            
            $r =  compact('products','title','categories','categoryfilter','colors','colorfilter','sizes','sizefilter','attributes','attributefilter','catid','allcategories','categorysearch','catbanner','selectedaatrs','attarr','match');
            return view('store.search',$r);
        }elseif(isset($product->id)){
            $r = $this->xdetail($slug);
            return view('store.products.detail',$r);
        }else{
            return view('errors.404');
        }
    }
    
    function xcat($request,$dcat){
        $prods = Product::first();
        $categoryfilter=[];
        $colorfilter=[];
        $sizes=[];
        $sizefilter=[];
        $attributefilter=[];
        $categorysearch = $dcat;

        $categories = Category::where('parent_id',0)->where('status',1)->get();
        $allcategories = Category::where('status',1)->get();
        $conditions = ['status' => 1];
        $catid = 0;
        $catbanner = 'no';
        $catavail = true;
        $title = 'Products';

        if($categorysearch !== 'all'){
             $catban = Category::where('slug', $categorysearch)->first();
             if($catban){
                $title = $catban->name;
                 $catbanner = $catban->image;
             }else{
                 $catavail = false;
             }
        }
        
        
        
        if(!$catavail){
            return view('errors.404');
        }

        if ($request->ajax()) { 
        
            $prods = Product::where('products.status',1);
            $cat = $request->category != '' ? $request->category : '';
            $sortby = $request->sortby;
            $catid = 0;
           
            // colors
            if($request->has('colors')){
                if(count($request->colors) > 0){
                    $colors = $request->colors;
                    $prods = $prods->whereHas('productProductVariations', function (Builder $query)  use ($colors) {
                        $query->whereIn('color_id', $colors);
                    });
                }
            }

            // sizes
            if($request->has('sizes')){
                if(count($request->sizes) > 0){
                    $sizes = $request->sizes;
                    $prods = $prods->whereHas('productProductVariations', function (Builder $query)  use ($sizes) {
                        $query->whereIn('size_id', $sizes);
                    });
                }
            }

            // attributes
            if($request->has('attributes')){ 
                $attributes = $request->get('attributes');
                if(count($request->get('attributes')) > 0){
                    $prods = $prods->whereHas('productProductAttributes', function (Builder $query)  use ($attributes) {
                        $query->whereIn('attribute_value_id', $attributes);
                    });
                }
                
            }

            // price
            if($request->has('prices')){
                $prices = $request->prices;

                if(count($prices) > 0){

                    foreach($prices as $price){
                        if($price === '<700'){
                            $price = 700;
                            $prods = $prods->whereHas('productProductVariations', function (Builder $query)  use ($price) {
                                $query->where('single_sales_price','<', 700);
                               });
                        }
                        elseif($price === '>700<1000'){

                            $prods = $prods->whereHas('productProductVariations', function (Builder $query) {
                                $query->whereBetween('single_sales_price',[700, 1000]);
                               });
                        }
                        elseif($price === '>1000<5000'){
                            $prods = $prods->whereHas('productProductVariations', function (Builder $query) {
                                $query->whereBetween('single_sales_price',[1000, 5000]);
                               });
                        }
                        elseif($price === '>5000'){
                            $prods = $prods->whereHas('productProductVariations', function (Builder $query) {
                                $query->where('single_sales_price','>',5000);
                               });
                        }
                    }
                }
            }

            if($request->has('min_price') && $request->has('max_price') ){
                if($request->min_price !== 'no' && $request->max_price !== 'no'){
                    $above = $request->min_price;
                    $below = $request->max_price;
                    $prods = $prods->whereHas('productProductVariations', function (Builder $query) use ($above, $below){
                        $query->whereBetween('single_sales_price',[$above, $below]);

                    });
                }
                else if($request->min_price !== "no" && $request->max_price === "no"){
                    $above = $request->min_price;
                    $prods = $prods->whereHas('productProductVariations', function (Builder $query) use ($above){
                        $query->where('single_sales_price','>',$above);
                    });
                }
                else if($request->min_price === "no" && $request->max_price !== "no"){
                    $below = $request->max_price;
                    $prods = $prods->whereHas('productProductVariations', function (Builder $query) use ($below){
                        $query->where('single_sales_price','<',$below);
                    });
                }
            }

            // sorting
            if($sortby != 'no'){
                if($sortby == 'cs'){
                    $prods = $prods->orderBy('view_count','desc');
                }
            }

            if($cat != '' && $cat != 'all'){ 
                $id = Category::where('slug',$cat)->first();
                if($id){
                    $cat_id = $id->id;
                    $prods->where(function ($query) use ($cat_id){
                        $query->where('products.category_id', $cat_id)
                        ->orWhere('products.sub_category_id', $cat_id)->orWhere('products.sub_category_child_id', $cat_id);
                    });
                }
            }

            if($request->has('search')){
                if($request->search !== 'no'){
                    $prods = $prods->where(function ($query) use ($request){
                        $query->where('name','like','%'.$request->search.'%')
                        ->orWhere('sku_code','like','%'.$request->search.'%');
                    });
                    $catTopSearch  = Category::where('name','like','%'.$request->search.'%')->pluck('id')->toArray();
                    if(!empty($catTopSearch)){
                        $prods->where(function ($query) use ($catTopSearch){
                            $query->whereIn('category_id', $catTopSearch)
                            ->orWhereIn('sub_category_id', $catTopSearch)->orWhereIn('sub_category_child_id', $catTopSearch);
                        });
                    }
                }
            }
            $propre = $prods->select('products.*');
           
            // echo $propre->toSql();
            // print_r($propre->getBindings());

            $prods = $propre->paginate(24);
           
            $i = 0;
            $searchproducts = [];
            foreach($prods as $pro){

                $i++;
                $searchproducts[$i]['id'] = $pro->id;
                $searchproducts[$i]['category'] = $pro->category->name;
                $searchproducts[$i]['sub_category'] = (isset($pro->sub_category->name))?$pro->sub_category->name:'';
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
                $mrp_price = "";
                $sale_price = "";
                $wholesale_price = "";
                $wholesale_price = "";
                $wholesale_qty = "";
                $selectedimg = [];

                    $newvariation = ProductVariation::where('product_id', $pro->id);
                    if($request->has('sizes') && $request->has('colors')){
                        if(count($request->sizes) > 0 && count($request->colors) > 0){
                            $newvariation = $newvariation->whereIn('color_id', $request->colors)->orWhereIn('size_id',$request->sizes);
                        }
                    }

                    elseif($request->has('sizes')){
                        if(count($request->sizes) > 0){
                            $newvariation = $newvariation->whereIn('size_id',$request->sizes);
                        }
                    }
                    elseif($request->has('colors')){
                        if(count($request->colors) > 0){
                            $newvariation = $newvariation->whereIn('color_id',$request->colors);
                        }
                    }

                    if($request->has('prices')){
                        if($request->prices[0] === '<700'){
                            $newvariation = $newvariation->where('single_sales_price','<', 700);
                        }
                        elseif($request->prices[0] === '>700<1000'){
                            $newvariation = $newvariation->whereBetween('single_sales_price',[700, 1000]);
                        }
                        elseif($request->prices[0] === '>1000<5000'){
                            $newvariation = $newvariation->whereBetween('single_sales_price',[1000, 5000]);;
                        }
                        elseif($request->prices[0] === '>5000'){
                            $newvariation = $newvariation->where('single_sales_price','>', 700);
                        }
                    }

                    if($request->has('min_price') && $request->has('max_price') ){
                        if($request->min_price !== 'no' && $request->max_price !== 'no'){
                            $above = $request->min_price;
                            $below = $request->max_price;
                            $newvariation = $newvariation->whereBetween('single_sales_price',[$above, $below]);
                        }
                        else if($request->min_price !== "no" && $request->max_price === "no"){
                            $above = $request->min_price;
                            $newvariation = $newvariation->where('single_sales_price','>',$above);
                        }
                        else if($request->min_price === "no" && $request->max_price !== "no"){
                            $below = $request->max_price;
                            $newvariation = $newvariation->where('single_sales_price','<',$below);
                        }
                    }
                    
                    $newvariation = $newvariation->get();
                    $variationId = 0;
                    foreach($newvariation as $var){
                        $in = 0;
                        // if($var->primary_variation === 1){
                            $in++;
                            $size = Size::where('id',$var->size_id)->first();
                            array_push($sizes,$size);

                            $color = Color::where('id',$var->color_id)->first();
                            array_push($colors,$color->name);
                            foreach($proimages as $imgp){
                                if($imgp->product_color_id === $var->color_id){
                                    array_push($selectedimg,$imgp->file_name);
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
                        // }
                    }

                // }
                $likew = false;
                if(Auth::check()){
                    $likew = (Wishlist::where('product_id', $pro->id)
                                    ->where('user_id', Auth::user()->id)
                                    ->where('variation_id', $variationId)
                                    ->first()) ? 1 : 0;
                }
                $searchproducts[$i]['simage'] =  $selectedimg;
                $searchproducts[$i]['variation_id'] =  $variationId;
                $searchproducts[$i]['wishlist'] =$likew;
                $searchproducts[$i]['images'] =  $proimages;
                $searchproducts[$i]['sizes'] = $sizes;
                $searchproducts[$i]['colors'] = $colors;
                $searchproducts[$i]['single_mrp_price'] =$mrp_price;
                $searchproducts[$i]['single_sales_price'] = $sale_price;
                $searchproducts[$i]['wholesale_mrp_price'] =$wholesale_price;
                $searchproducts[$i]['wholesale_sales_price'] = $wholesale_price;
                $searchproducts[$i]['wholesale_qty'] = $wholesale_qty;
                $searchproducts[$i]['reviews'] = $pro->reviews;
                $searchproducts[$i]['rating'] =   count($pro->reviews) > 0  ?
                           ProductReview::where('product_id', $pro->id)->avg('rating')
                           : 0;
            }

            $html = '';
            foreach($allcategories as $all){
                if($all->parentid === $catid){
                    $html .= '
                    <li>
                        <a href="'.url('shop').'?category='.$all->id.'">
                            <span class="label_txt">'.$all->name.'</span>
                            <span class="count_txt">';

                                $catcount = \App\Models\Product::where('category_id', $all->id)->get();
                                if($catcount){
                                    echo ($catcount->count());
                                }
                                else{
                                    echo (0);
                                }
                    $html .= '
                            </span>
                        </a>
                    </li>
                    ';
                }
            }
            
            if($sortby != 'no'){
                $marks = array();
                foreach ($searchproducts as $key => $row){
                    $marks[$key] = $row['single_sales_price'];
                }
                if($sortby == 'pasc'){
                     array_multisort($marks, SORT_ASC, $searchproducts);
                }else if($sortby == 'pdesc'){
                    array_multisort($marks, SORT_DESC, $searchproducts);
                }
            }
            
            $response = view('store.products.list',compact('searchproducts','prods'))->render();
            $count =  $propre->count();

            return response()->json([
                'success' => true,
                'data' => $response,
                'count' => $count,
                'categories' => $html
            ]);
        }

        $products = Product::query();
        $selectedaatrs = [];
        $attarr = [];
        (object)$match = "";

        if($categorysearch != 'all'){
                $id = \App\Models\Category::where('slug',$categorysearch)->first();
               
                if($id){
                    $catid = $id->id;
                    $match = \App\Models\MapAttribute::where('category_id','like','%'.$catid)->orWhere('sub_category_id','like','%'.$catid)->orWhere('sub_category_child_id','like','%'.$catid)->first();
                    
                    if($match){
                        
                        if($match->attributes && $match->is_attribute === 1){

                            foreach($match->attributes as $values){
                                array_push($attarr, $values['attributevalues'][0]);
                            }
                            
                          $selattrval = AttributeValue::whereIn('id', $attarr )->pluck('attribute_id')->toArray();
                          $selectedaatrs = Attribute::whereIn('id', $selattrval)->whereHas('attribute_values')->get();
                            /*echo "<pre>";
                            print_r($selectedaatrs);
                            die;*/
                          $selectedaatrs = Attribute::whereIn('id', $selattrval)->whereHas('attribute_values', function (Builder $query) use ($attarr){
                            $query->whereIn('id',$attarr);
                          })->get();

                        }
                    }
                    $products = $products->where('category_id', $id->id)->orWhere('sub_category_id', $id->id)->orWhere('deleted_at', '')->orWhere('sub_category_child_id', $id->id);
                    $categories=Category::where('parent_id',$categorysearch)->where('status',1)->get();
                }
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
            $products=$products->orWhereIn('id',$ProductAttributesCustoms)->where('deleted_at','') ;
        }
        $sizes = Size::where('status', '1')->get();
        $colors = Color::where('status', '1')->get();
        $attributes=Attribute::where('status',1)->get();
        
        
        
        $products=$products->distinct();
        $products = $products->paginate(24)->appends(request()->query());

        $categories = Category::where('parent_id',0)->where('status',1)->get();
        
        return array('products','title','categories','categoryfilter','colors','colorfilter','sizes','sizefilter','attributes','attributefilter','catid','allcategories','categorysearch','catbanner','selectedaatrs','attarr','match');
    }
    
    
    public function addToCart(Request $request){
        $product = Product::findOrFail($request->input('product_id'));
        
        $variationId = ProductVariation::findOrFail($request->input('variation_id'));
        
        $images=ProductImage::where('product_id',$request->input('product_id'))->where('product_color_id',$request->input('pa_color'))->first();
        
        $mainid = $product->id.'_'.$variationId->id;
        
        $existing = \Cart::get($mainid);

        $coupons = Coupon::where('status',1);

        $coupons->where(function ($query) use ($product){
            $query->where('category_id', $product->category_id)
            //->orWhere('sub_category_id', 0)
            ->orWhere('sub_category_id',$product->sub_category_id);
        });

        $availableCoupons = $coupons->get();
        $availableCoupons = ($availableCoupons)?$availableCoupons:[];

        if(isset($existing['id'])){

            \Cart::update(
                $mainid,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $existing['quantity']+$request->input('quantity')
                    ],
                ]
            );

        }else{
            \Cart::add([
                'id' => $mainid,
                'name' => $product->name,
                'price' => $variationId->single_sales_price,
                'quantity' => $request->input('quantity'),
                'attributes' => array(
                    'image' => $images->file_name,
                    'variation_id'=>$variationId->id,
                    'product_id'=>$product->id,
                    'size_id'=>$request->input('pa_size'),
                    'color_id'=>$request->input('pa_color'),
                    'max_quantity'=>$variationId->single_price_quantity,
                    'sale_price'=>$variationId->single_sales_price,
                    'mrp'=>$variationId->single_price,
                    'sku_code'=>$product->sku_code,
                    'slug'=>$product->slug,
                    'coupons'=>$availableCoupons,
                    'tax_rate'=>$product->tax_rate,
                    'weight'=>$product->weight
                    )
            ]);
        }
        return response()->json(['is_added'=>true],200);
    }

}