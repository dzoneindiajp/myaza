<?php echo $__env->make('frontend-view.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
.colour-colorDisplay {
width: 15px;
height: 15px;
border-radius: 50%;
display: inline-block;
margin-right: 3px;
border: 1px solid #cccccc;
margin-left: 7px;
}
.scrollable-menu {
    height: auto;
    max-height: 300px;
    overflow-x: hidden;
}
</style>
<!--=====================================================
                           Header Section End
        =========================================================-->
        <section class="site-content">
            <div class="page-banner-section">
                <div class="page-banner page-banner-bg">
                    <div class="container-custom">
                        <div class="page-banner-wrap">
                            <div role="navigation" aria-label="Breadcrumbs" class="breadcrumbs">
                                <ul class="breadcrumb-items">
                                    <li class="breadcrumb-item trail-begin"><a href="<?php echo e(url('/')); ?>" rel="home"><span
                                                itemprop="name">Home</span></a></li>
                                    <li class="breadcrumb-item trail-end"><span itemprop="name">Products</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page-banner-section -->
            <div class="content-wrapper">
                <div class="container-custom">
                    <div class="page-header text-center">
                        <h1 class="page-title"><?php echo $title ; ?></h1>
                    </div>
                  <!--  <div class="product-banner-image">-->
                  <!--    <img src="images/banner-cat.jpg" alt="">-->
                  <!--</div>-->
                  <div class="product-cat-page">
                    <div class="content-box">
                      <div class="product-sortby-filter">
                        <div class="filters">
                            <div class="filter-dropdown dropdown">
                                <button class="filter-dropdown-title" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Category</button>
                                <div class="filter-dropdown-menu dropdown-menu scrollable-menu">
                                    <ul class="layer-filter category-filter">
                                    <?php if($categories->count() > 0 && $catid === 0): ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(url('/')); ?>/<?php echo e($category->slug); ?>">
                                                <span class="label_txt"><?php echo e($category->name); ?></span>
                                                <span class="count_txt">
                                                    (
                                                    <?php
                                                    $catcount = \App\Models\Product::where('category_id', $category->id)->get();
                                                    if($catcount){
                                                        echo $catcount->count();
                                                    }
                                                    else{
                                                        echo 0;
                                                    }
                                                    ?>
                                                )
                                                </span>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <?php $__currentLoopData = $allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($all->parent_id === $catid): ?>
                                    <li>
                                    <a href="<?php echo e(url('/')); ?>/<?php echo e($all->slug); ?>">
                                        <span class="label_txt"><?php echo e($all->name); ?></span>
                                        <span class="count_txt">
                                            (
                                            <?php
                                            $catcount = \App\Models\Product::where('sub_category_id', $all->id)->orWhere('sub_category_child_id', $all->id)->get();
                                            if($catcount){
                                                echo $catcount->count();
                                            }
                                            else{
                                                echo 0;
                                            }
                                            ?>
                                        )
                                        </span>
                                    </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-dropdown dropdown">
                                <button class="filter-dropdown-title" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Color</button>
                                    <div class="filter-dropdown-menu dropdown-menu scrollable-menu">
                                    <ul class="layer-filter color-filter">
                                    <?php if($colors->count() > 0 && $match !== null): ?>
                                    <?php if($match !== null): ?>
                                    <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scolor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                                    //echo $scolor->id."<br>"; ?>
                                    <?php if($catid !== 0): ?>
                                    <?php if(in_array($scolor->id, $match->colors) && $match->is_color === 1): ?>
                                        <li class="active">
                                            <input type="checkbox" class="filter" id="color-<?php echo e($scolor->id); ?>" data-name="<?php echo e($scolor->name); ?>" data-id="<?php echo e($scolor->id); ?>">
                                            <span data-colorhex="<?php echo e($scolor->value); ?>" class="colour-label colour-colorDisplay" style="background-color: <?php echo e($scolor->value); ?>;"></span>
                                            <label for="color-<?php echo e($scolor->id); ?>" style="cursor:pointer"><?php echo e($scolor->name); ?>

                                            <span>(
                                                <?php
                                                    $data = DB::table('product_variations')->join('products','products.id','product_variations.product_id')->where('product_variations.color_id', $scolor->id)->where('products.status', 1)->where("single_price_quantity", "!=", "");;
                                                    $category = \App\Models\Category::where('slug',$categorysearch)->first();
                                                    if($catid !== 0){
                                                            $data->where(function ($query) use ($category){
                                                                $query->where('products.category_id', $category->id)
                                                                ->orWhere('products.sub_category_id', $category->id)->orWhere('products.sub_category_child_id', $category->id);
                                                            });
                                                    }
                                                    echo count($data->groupBy('products.id')->get());
                                                ?>    
                                            )</span>
                                            </label>
                                            <!-- <input class="color-option" name="color" value="" style="background: #000000;" type="button">
                                            <label for=""> Black (8) </label> -->
                                        </li>
                                    <?php endif; ?>
                                    <?php else: ?>
                                   
                                        <li class="active">
                                            <input type="checkbox" class="filter" id="color-<?php echo e($scolor->id); ?>" data-name="<?php echo e($scolor->name); ?>" data-id="<?php echo e($scolor->id); ?>">
                                            <span data-colorhex="<?php echo e($scolor->value); ?>" class="colour-label colour-colorDisplay" style="background-color: <?php echo e($scolor->value); ?>;"></span>
                                            <label for="color-<?php echo e($scolor->id); ?>" style="cursor:pointer"><?php echo e($scolor->name); ?>

                                            <span>(
                                                <?php
                                                    $data = DB::table('product_variations')->join('products','products.id','product_variations.product_id')->where('product_variations.color_id', $scolor->id)->where('products.status', 1)->where("single_price_quantity", "!=", "");;
                                                    $category = \App\Models\Category::where('slug',$categorysearch)->first();
                                                    if($catid !== 0){
                                                        $data->where(function ($query) use ($category){
                                                            $query->where('products.category_id', $category->id)
                                                            ->orWhere('products.sub_category_id', $category->id)->orWhere('products.sub_category_child_id', $category->id);
                                                        });
                                                    }
                                                    echo count($data->groupBy('products.id')->get());
                                                ?>    
                                            )</span>
                                            </label>
                                            <!-- <input class="color-option" name="color" value="" style="background: #000000;" type="button">
                                            <label for=""> Black (8) </label> -->
                                        </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-dropdown dropdown">
                                <button class="filter-dropdown-title" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Size</button>
                                <div class="filter-dropdown-menu dropdown-menu scrollable-menu">
                                    <ul class="layer-filter color-filter">
                                    <?php if($sizes->count() > 0): ?>
                                    <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($catid !== 0 && $match): ?>
                                    <?php if(in_array($size->id, $match->sizes) && $match->is_size === 1): ?>
                                        <li class="active">
                                        <input type="checkbox" class="filter" id="size-<?php echo e($size->id); ?>" data-name="<?php echo e($size->name); ?>" data-id="<?php echo e($size->id); ?>"><label for="size-<?php echo e($size->id); ?>" style="cursor:pointer"><?php echo e($size->name); ?><span>
                                            (
                                                <?php

                                                    $data = \DB::table('product_variations')->join('products','products.id','product_variations.product_id')->where('product_variations.size_id', $size->id)->where('products.status', 1)->where("product_variations.single_price_quantity", "!=", "");

                                                    if($catid !== 0){
                                                        $data->where(function ($query) use ($catid){
                                                            $query->where('products.category_id', $catid)
                                                            ->orWhere('products.sub_category_id', $catid)->orWhere('products.sub_category_child_id', $catid);
                                                        });
                                                    }

                                                    $sizecount = $data->groupBy('product_variations.product_id')->get();

                                                    if($sizecount){
                                                        echo count($sizecount);
                                                    }
                                                    else{
                                                        echo 0;
                                                    }
                                                ?>
                                            )</span></label>
                                        </li>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <li class="active">
                                        <input type="checkbox" class="filter" id="size-<?php echo e($size->id); ?>" data-name="<?php echo e($size->name); ?>" data-id="<?php echo e($size->id); ?>"><label for="size-<?php echo e($size->id); ?>" style="cursor:pointer"><?php echo e($size->name); ?><span>
                                            (
                                                <?php

                                                    $data = \DB::table('product_variations')->join('products','products.id','product_variations.product_id')->where('product_variations.size_id', $size->id)->where('products.status', 1);

                                                    if($catid !== 0){
                                                        $data->where(function ($query) use ($catid){
                                                            $query->where('products.category_id', $catid)
                                                            ->orWhere('products.sub_category_id', $catid)->orWhere('products.sub_category_child_id', $catid);
                                                        });
                                                    }

                                                    $sizecount = $data->groupBy('product_variations.product_id')->get();

                                                    if($sizecount){
                                                        echo count($sizecount);
                                                    }
                                                    else{
                                                        echo 0;
                                                    }
                                                ?>
                                            )</span></label>
                                        </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="filter-dropdown dropdown">
                                <button class="filter-dropdown-title" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Price</button>
                                <div class="filter-dropdown-menu dropdown-menu">
                                    <ul class="layer-filter color-filter">
                                        <li class="active">
                                            <input class="type-option" name="type" value="" type="checkbox">
                                            <label for=""> All</label>
                                        </li>
                                        <li>
                                            <input class="type-option" name="type" value="" type="checkbox">
                                            <label for=""> 1-500</label>
                                        </li>
                                        <li>
                                            <input class="type-option" name="type" value="" type="checkbox">
                                            <label for=""> 500-1000</label>
                                        </li>
                                        <li>
                                            <input class="type-option" name="type" value="" type="checkbox">
                                            <label for=""> 1001-2000</label>
                                        </li>
                                        <li>
                                            <input class="type-option" name="type" value="" type="checkbox">
                                            <label for=""> Above 2000</label>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="filter-toggle">
                                <div class="showall-filter">
                                    <button class="filter-open"><i class="fas fa-sliders-h"></i> More Filter </button>
                                    <button class="filter-hide d-none"><i class="fas fa-sliders-h"></i> Hide Filter </button>
                                </div>
                            </div>
                        </div>
                    
                        <div class="sortby">
                            <p class="product-count"><span class="product_counts">0</span> Items</p>
                            <div class="filter-dropdown dropdown">
                                <button class="filter-dropdown-title" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort
                                    By</button>
                                <div class="filter-dropdown-menu dropdown-menu">
                                    <ul class="layer-filter sort-filter">
                                        <li>
                                            <input name="orderby" id="popularity" value="cs" type="radio">
                                            <label for="popularity"> Popularity </label>
                                        </li>
                                        <!-- <li>
                                            <input name="orderby" id="date" value="" type="radio">
                                            <label for="date"> Latest </label>
                                        </li> -->
                                        <li>
                                            <input name="orderby" id="price" value="pasc" type="radio">
                                            <label for="price"> Price: low to high </label>
                                        </li>
                                        <li>
                                            <input name="orderby" id="price-desc" value="pdesc" type="radio">
                                            <label for="price-desc"> Price: high to low </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>                           
                            <div class="product-display-mode">
                                <span id="grid_large" class="active"><a href="javascript:void(0);" title="4 Column"><i
                                            class="fas fa-th"></i></a></span>
                                <span id="grid"><a href="javascript:void(0);" title="3 Column"><i class="fas fa-th-large"></i></a></span>
                            </div>
                        </div>
                      </div>
                      <!-- product-sortby-filter -->
                      <div class="row flex-row-reverse">
                          <div class="content-area col product_list_page"> 
                                
                              <!-- <div class="pagination">
                                <ul class="page-numbers">
                                  <li><a class="prev page-numbers" href="#">←</a></li>
                                  <li><a class="page-numbers" href="#">1</a></li>
                                  <li><span aria-current="page" class="page-numbers current">2</span></li>
                                  <li><a class="page-numbers" href="#">3</a></li>
                                  <li><a class="next page-numbers" href="#">→</a></li>
                              </ul>
                            </div> -->
                          </div>
                          <!--content-area-->
                          <div class="filter-sidebar product-sidebar-area">                          
                              <h3 class="filter-sidebar-heading">
                                  Filter By
                                  <span class="filter-sidebar-close"><i class="fas fa-times"></i></span>
                              </h3>
                              <div class="product-widget-type product-widget open">
                                  <h4 class="product-widget-title open">Category </h4>
                                  <ul class="product-widget-filter product-categories">
                                    <?php if($categories->count() > 0 && $catid === 0): ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(url('/')); ?>/<?php echo e($category->slug); ?>"><?php echo e($category->name); ?>

                                <?php
                                // $catcount = \App\Models\Product::where('sub_category_id', $all->id)->orWhere('sub_category_child_id', $all->id)->get();
                                // if($catcount){
                                //     echo $catcount->count();
                                // }
                                // else{
                                //     echo 0;
                                // }
                                ?>
                            </a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <?php $__currentLoopData = $allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($all->parent_id === $catid): ?>
                                        <li><a href="<?php echo e(url('/')); ?>/<?php echo e($all->slug); ?>"><?php echo e($all->name); ?>

                                <?php
                                // $catcount = \App\Models\Product::where('sub_category_id', $all->id)->orWhere('sub_category_child_id', $all->id)->get();
                                // if($catcount){
                                //     echo $catcount->count();
                                // }
                                // else{
                                //     echo 0;
                                // }
                                ?>
                            </a></li>        
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>                                  
                                  </ul>
                              </div>
                              <div class="product-widget-type product-widget open">
                                <h4 class="product-widget-title open">Price </h4>
                                <div class="product-widget-filter price-filter">
                                    <div id="slider-range"></div>
                                    <div class="price-range">
                                      <label for="amount">Range:</label>
                                      <input type="text" id="amount" readonly>
                                      <input type="hidden" id="above-price" oninput="validity.valid||(value='0');"  class="form-control">
                                        <input type="hidden" id="below-price" oninput="validity.valid||(value='1000');"  class="form-control">
                                    </div>
                                  </div>
                            </div>                           
                            <?php if($attributes->count() > 0): ?>
                            <?php if($catid !== 0): ?>
                                <?php if($attributes->count() > 0): ?>
                                    <?php $matches = \App\Models\MapAttribute::where('category_id','like','%'.$catid)->orWhere('sub_category_id','like','%'.$catid)->orWhere('sub_category_child_id','like','%'.$catid)->first(); ?>
                                    <?php $__currentLoopData = $selectedaatrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daatr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product-widget-type product-widget">
                                        <h4 class="product-widget-title"><?php echo e($daatr->name); ?></h4>
                                        <ul class="product-widget-filter product-categories">
                                            <?php if($daatr->attribute_values): ?>
                                                <?php $__currentLoopData = $daatr->attribute_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    <li>
                                                        <label class="container_category">
                                                            <input class="filter" id="attribute-<?php echo e($daatr->id); ?>" data-name="<?php echo e($daatr->id); ?>" data-id="<?php echo e($value->id); ?>" type="checkbox" > <?php echo e($value->value); ?>

                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </li>
                                                    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if($attributes->count() > 0): ?>
                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product-widget-type product-widget">
                                        <h4 class="product-widget-title"><?php echo e($attr->name); ?></h4>
                                        <ul class="product-widget-filter product-categories">
                                            <?php if($attr->attribute_values): ?>
                                                <?php $__currentLoopData = $attr->attribute_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <label class="container_category">
                                                            <input class="filter" id="attribute-<?php echo e($attr->id); ?>" data-name="<?php echo e($attr->id); ?>" data-id="<?php echo e($value->id); ?>" type="checkbox" > <?php echo e($value->value); ?>

                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endif; ?> 
                            <?php endif; ?>                      
                          </div>
                          <!--sidebar-section-->
                      </div>
                      <!--row-->
                    </div>  
                  </div>
                </div>
                <!--content-wrapper -->
            </div>
            <!--container-->
        </section>
        <!--=====================================================
                        Site Section End
         =========================================================-->
<script>
   var sortby = 'no';
   var colors = [];
   var sizes = [];
   var attributes = [];
   var prices = [];
   var min_price = 'no';
   var max_price = 'no';
   var page = 1;
   var homecategory = "<?php echo $categorysearch; ?>";
   const queryString = window.location.search;
   const urlParams = new URLSearchParams(queryString);
   const search = urlParams.get('q') !== null ? urlParams.get('q') : 'no';
   
   var category = "";
   
    $(document).ready(function(){
        $(document).on('click','.pagination a',function(event){
            event.preventDefault();
            $(document).find('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var url = $(this).attr('href');
            page = $(this).attr('href').split('page=')[1];
            getData(page);
        });
    });
   
    $(document).on('change','input[name="orderby"]', function(){
       sortby = $(this).val();
       getData(1);
    });
   
    $(document).on('change','[id^="color-"]', function(){
      colors = [];
      $('[id^="color-"]').each(function(){
         if($(this).is(':checked')){
           var id = $(this).attr('data-id');
           colors.push(id);
         }
       });
       getData(1);
    });
   
    $(document).on('change','[id^="size-"]', function(){
      sizes = [];
      $('[id^="size-"]').each(function(){
         if($(this).is(':checked')){
           var id = $(this).attr('data-id');
           sizes.push(id);
         }
       });
       getData(1);
    });
   
    $(document).on('change','[id^="attribute-"]', function(){
       attributes = [];
      $('[id^="attribute-"]').each(function(){
         if($(this).is(':checked')){
           var id = $(this).attr('data-id');
           var name = $(this).attr('data-name');
           attributes.push(id);
         }
       });
       getData(1);
    });
   
    function convertToSlug(Text) {
       return Text.toLowerCase().replace(/ /g, '-');
    }
   
    function getData(page) {
       category = homecategory;
      
      var mystr = (sortby !== 'no' ? '&sordby='+sortby : '' )+(search !== 'no' ? '&q='+search : '')+(colors.length > 0 ? '&colors='+colors : '')+(sizes.length > 0 ? '&sizes='+sizes : '')+(prices.length > 0 ? '&prices='+prices : '')+(attributes.length > 0 ? '&attributes='+attributes : '')+(min_price !==  'no' ? '&min_price='+min_price : '')+(max_price !==  'no' ? '&max_price='+max_price : '');
       if(mystr.length > 0){
           mystr = mystr.substring(1);
       }
   
       var durl = "<?php echo e(url('/')); ?>"+'/' + category + (mystr.length > 0 ? '?'+mystr : '');
   
        history.pushState({}, null, durl);
        new_url = "<?php echo e(url('/')); ?>"+`/${category}`;
        $.ajax({
            url : new_url,
            type : 'get',
            datatype : 'html',
            data : {category : category, page : page, sortby : sortby, colors : colors, sizes : sizes, attributes : attributes,prices : prices, min_price : min_price, max_price : max_price, search : search},
            beforeSend: function(){
               overlay.show();
            },
            success : function(data){
               
               $(document).find('.product_counts').html(data.count);
               $('.product_list_page').empty().html(data.data);
               overlay.hide();
            },
            error : function(err){
                console.log(err);
            }
        });
    }
   
   $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    getData(1);
   });
</script>
<?php echo $__env->make('frontend-view.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myazatrendz\resources\views/store/search.blade.php ENDPATH**/ ?>