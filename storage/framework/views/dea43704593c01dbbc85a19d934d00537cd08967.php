<?php echo $__env->make('frontend-view.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="wrapper">
    
    <!--=====================================================
                                Header Section End
        =========================================================-->

    <section class="home-site-content">
      <div class="slider-section">
        <div class="slider-carousel">
          <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="slider-item">
            <div class="slider-images">
              <img src="<?php echo asset('file/'.$banner->image.'');?>" />
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $vbanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="slider-item">
            <div class="slider-images">
              <video width="100%" id="theVideo_<?php echo e($p); ?>">
                <source src="<?php echo e(asset('/file/videos').'/'.$banner->video); ?>" />
              </video>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      <!--=====================================================
                             Slider Section End
              =========================================================-->
      <div class="usp-section section">
        <div class="container">
          <div class="usp-wrapper">
            <div class="row">
              <div class="usp-first usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.4s">
                <div class="usp-wrap">
                  <div class="usp-icon">
                    <i class="fas fa-shipping-fast"></i>
                  </div>
                  <div class="usp-content">
                    <h4 class="usp-title"> World-Wide Shipping </h4>
                    <p class="usp-desc">
                      We offer Worldwide shipping options through our website </p>
                  </div>
                </div>
              </div>
              <div class="usp-second usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.5s">
                <div class="usp-wrap">
                  <div class="usp-icon">
                    <i class="fas fa-money-bill-alt"></i>
                  </div>
                  <div class="usp-content">
                    <h4 class="usp-title">
                      3 Days returns </h4>
                    <p class="usp-desc">
                      Returns are accepted within 3 days from delivery </p>
                  </div>
                </div>
              </div>
              <div class="usp-third usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.6s">
                <div class="usp-wrap">
                  <div class="usp-icon">
                    <i class="fas fa-lock"></i>
                  </div>
                  <div class="usp-content">
                    <h4 class="usp-title">
                      Secure payments </h4>
                    <p class="usp-desc">
                      You can perform confidently the payment. it’s 100% secure. </p>
                  </div>
                </div>
              </div>
              <div class="usp-fourth usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.6s">
                <div class="usp-wrap">
                  <div class="usp-icon">
                    <i class="fas fa-handshake"></i>
                  </div>
                  <div class="usp-content">
                    <h4 class="usp-title">
                      Trust worthy </h4>
                    <p class="usp-desc">
                      We are verified supplier on alibaba.com for last 10 years. </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--=====================================================
                                    usp Section End
       =========================================================-->

       <div class="shop-offer-section shop-look section">
          <div class="container-custom">
              <div class="section-header text-center">
                <h2 class="section-title">Shop by Look</h2>
            </div>
            <div class="shop-offer-wrapper">
              <div class="row shop-offer-row">
                <?php foreach($bylook as $k=>$bl){ $mt = ($k>2)?'mt-3':'' ; ?>
                <div class="shop-offer-item col-lg-4 <?php echo  $mt ?> col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.3">
                  <div class="shop-offer-wrap">
                    <a href="<?php echo e(url('/')); ?>/<?php echo $bl['slug']; ?>">
                      <div class="shop-offer-image">
                        <img src="<?php echo isset($bl['images'][0])?asset('file/'.$bl['images'][0].''):asset('/assets/images/noimg.jpg') ;?>" alt="">
                      </div>
                      <div class="shop-offer-summery">
                        <h4 class="shop-offer-title"><?php echo $bl['name'] ;?></h4>
                        
                        <button href="<?php echo e(url('/')); ?>/<?php echo $bl['slug']; ?>" class="shop-offer-btn">Shop Now</buttona>
                      </div>
                    </a>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

       <!--=====================================================
                       product Section End
       =========================================================-->

       <div class="product-collection-section section">
        <div class="container-custom">
            <div class="section-header text-center">
                <h2 class="section-title">Shop by Category</h2>
            </div>

            <div class="product-collection-wrapper">
                <div class="product-carousel">
                  <?php $__currentLoopData = $home_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $home_cat_show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product-collection-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                        <div class="product-collection-wrap">
                            <div class="product-collection-image"><a href="<?php echo e(url('/').$home_cat_show->slug); ?>">
                                    <img src="<?php echo e(asset('file/'.$home_cat_show->image)); ?>" alt="" />
                                </a>
                            </div>
                            <div class="product-collection-summery">
                                <h4 class="product-collection-title"> <a href="<?php echo e(url('/').$home_cat_show->slug); ?>"><?php echo e(ucfirst($home_cat_show->name)); ?></a></h4>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
        </div>
      </div>
      <!--=====================================================
                      Product Category Section End
      =========================================================-->
      <div class="product-offer-section section">
        <div class="container-custom">
            <div class="section-header text-center">
                <h2 class="section-title">Trending Products</h2>
            </div>
            <div class="row product-offer-row">
            <?php foreach($tbanners as $tb){?>
                <div class="product-offer-item col-lg-6 col-md-6 col-sm-6">
                  <div class="product-offer-image">
                    <a href="<?php echo $tb->url; ?>"><img src="<?php echo asset('file/'.$tb->image.'');?>" alt=""></a>
                  </div>
                </div>
            <?php } ?>
      </div>
      </div>
    </div>
         <!--=====================================================
                      Product Category Section End
      =========================================================-->
      <div class="product-section section">
        <div class="container-custom">

          <div class="section-header">
            <h2 class="section-title">Trending Products</h2>
            <p class="section-description">Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas</p>
            <!-- <div class="section-view-all">
              <a class="view-all" href="#">View All</a>
            </div> -->
        </div>
            <div class="product-wrapper">
              <div class="products with-bg-white">
              <?php foreach($trending as $h=>$trend){ if($h<=12){ ?>
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="<?php echo e(url('/')); ?>/<?php echo $trend['slug']; ?>">
                              <img src="<?php echo isset($trend['images'][0])?asset('file/'.$trend['images'][0].''):asset('/assets/images/noimg.jpg') ;?>"  alt="">
                          </a>
                          <div class="product-label">
                              <?php if($trend['is_new'] == 1){ ?>
                                <span class="new-title">New</span>
                              <?php } ?>
                          </div>
                          <div class="product-action">
                              <a class="wishlist" href="javascript:void(0);" onclick="doRelatedToWishlist($(this),'<?php echo $trend['id']; ?>','<?php echo $trend['variation_id']; ?>')" title="Wishlist" data-toggle="tooltip" data-placement="top" title="Wishlist">
                              <?php echo ($trend['wishlist'])?'<i class="fas fa-heart"></i>':'<i class="far fa-heart"></i>'; ?>
                              </a>
                              <a href="<?php echo e(url('/')); ?>/<?php echo $trend['slug']; ?>" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">
                                  <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>
                              </a>
                              <a href="<?php echo e(url('/')); ?>/<?php echo $trend['slug']; ?>" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
                                  <i class="fa fa-eye"></i>
                              </a>
                          </div>
                      </div>
                      <div class="product-content">
                          <h3 class="product-title">
                              <a href="<?php echo e(url('/')); ?>/<?php echo $trend['slug']; ?>" ><?php echo $trend['name'] ;?></a>
                          </h3>
                          <div class="product-price">
                              <span class="new-price">₹<?php echo $trend['single_sales_price'] ; ?></span>
                              <?php if($trend['single_mrp_price']>$trend['single_sales_price']){ ?>
                                <span class="old-price">₹<?php echo $trend['single_mrp_price']; ?></span>
                              <?php } ?>
                          </div>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <?php }} ?>
              </div>
            </div>

            <?php if(count($trending) > 12): ?>
              <div class="col-md-12 text-center">
                <a href="<?php echo e(url('trending-products')); ?>" class="btn btn-primary">Read More</a>
              </div>
            <?php endif; ?>

        </div>
      </div>

      <div class="product-section section">
        <div class="container-custom">
          <div class="content-box">
            <div class="section-header">
                <h2 class="section-title">New Arrivals</h2>
                <p class="section-description">Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas</p>
                <?php // echo "<pre>"; print_r($latest); ?>
                <!-- <div class="section-view-all">
                  <a class="view-all" href="#">View All</a>
                </div> -->
            </div>
            <div class="product-wrapper">
              <div class="products product-carousel">
              <?php foreach($latest as $d=>$late){ if($d<6){ ?>
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="<?php echo e(url('/')); ?>/<?php echo $late['slug']; ?>">
                              <img src="<?php echo isset($late['images'][0])?asset('file/'.$late['images'][0].''):asset('/assets/images/noimg.jpg') ;?>"  alt="">
                          </a>
                          <div class="product-label">
                            <?php if($late['single_mrp_price']>$late['single_sales_price']){ ?>
                              <span class="sale-title2">Sale</span>
                            <?php } else if($late['is_new'] == 1){ ?>
                                <span class="new-title">New</span>
                            <?php } ?>
                            <?php if($late['discount'] != ""){ ?>
                              <span class="discount-title"><?php echo e($late['discount']); ?>% Off</span>
                            <?php } ?>
                          </div>
                          <div class="product-action">
                              <a class="wishlist" href="javascript:void(0);" onclick="doRelatedToWishlist($(this),'<?php echo $late['id']; ?>','<?php echo $late['variation_id']; ?>')" title="Wishlist" data-toggle="tooltip" data-placement="top" title="Wishlist">
                              <?php echo ($late['wishlist'])?'<i class="fas fa-heart"></i>':'<i class="far fa-heart"></i>'; ?>
                              </a>
                              <a href="<?php echo e(url('/')); ?>/<?php echo $late['slug']; ?>" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">
                                  <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>
                              </a>
                              <a href="<?php echo e(url('/')); ?>/<?php echo $late['slug']; ?>" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
                                  <i class="fa fa-eye"></i>
                              </a>
                          </div>
                      </div>
                      <div class="product-content">
                          <h3 class="product-title">
                              <a href="<?php echo e(url('/')); ?>/<?php echo $late['slug']; ?>" ><?php echo $late['name'] ;?></a>
                          </h3>
                          <div class="product-price">
                              <span class="new-price">₹<?php echo $late['single_sales_price'] ; ?></span>
                              <?php if($late['single_mrp_price']>$late['single_sales_price']){ ?>
                                <span class="old-price">₹<?php echo $late['single_mrp_price']; ?></span>
                              <?php } ?>
                          </div>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <?php }} ?>
              </div>
            </div>
          </div>
        </div>
      </div>

        <div class="product-section section">
          <div class="container-custom">
            <div class="section-header">
                <h2 class="section-title">Deal Of The Day</h2>
                <p class="section-description">Designs according to your requirements</p>
                <!-- <div class="section-view-all">
                  <a class="view-all" href="#">View All</a>
                </div> -->
            </div>
            <div class="product-wrapper">
              <div class="products with-bg-white product-carousel">
              <?php foreach($hotesale as $d=>$late){ if($d<12){  ?>
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="<?php echo e(url('/')); ?>/<?php echo $late['slug']; ?>">
                              <img src="<?php echo isset($late['images'][0])?asset('file/'.$late['images'][0].''):asset('/assets/images/noimg.jpg') ;?>"  alt="">
                          </a>
                          <div class="product-label">
                              <?php if($late['is_new'] == 1){ ?>
                                <span class="new-title">New</span>
                              <?php } ?>
                          </div>
                          <div class="product-action">
                              <a class="wishlist" href="javascript:void(0);" onclick="doRelatedToWishlist($(this),'<?php echo $late['id']; ?>','<?php echo $late['variation_id']; ?>')" title="Wishlist" data-toggle="tooltip" data-placement="top" title="Wishlist">
                              <?php echo ($late['wishlist'])?'<i class="fas fa-heart"></i>':'<i class="far fa-heart"></i>'; ?>
                              </a>
                              <a href="<?php echo e(url('/')); ?>/<?php echo $late['slug']; ?>" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">
                                  <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>
                              </a>
                              <a href="<?php echo e(url('/')); ?>/<?php echo $late['slug']; ?>" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
                                  <i class="fa fa-eye"></i>
                              </a>
                          </div>
                      </div>
                      <div class="product-content">
                          <h3 class="product-title">
                              <a href="<?php echo e(url('/')); ?>/<?php echo $late['slug']; ?>" ><?php echo $late['name'] ;?></a>
                          </h3>
                          <div class="product-price">
                              <span class="new-price">₹<?php echo $late['single_sales_price'] ; ?></span>
                              <?php if($late['single_mrp_price']>$late['single_sales_price']){ ?>
                                <span class="old-price">₹<?php echo $late['single_mrp_price']; ?></span>
                              <?php } ?>
                          </div>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <?php }} ?>
              </div>
            </div>
          </div>
        </div>
         <!--=====================================================
                      Product Section End
      =========================================================-->

      <div class="product-section section mintmeena-section">
        <div class="container-custom">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
              <div class="product-column-item">
                <a href="#">
                  <div class="product-column-image">
                    <img src="<?php echo e(asset('frontend-view/images/adv1.jpg')); ?>" alt="">
                  </div>
                </a>
              </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
              <div class="content-box">
                <div class="section-header">
                    <h2 class="section-title">Mint Meena Earrings</h2>
                    <p class="section-description">Glamorous earrings that’ll elevate your festive outfits</p>
                    <div class="section-view-all">
                      <a class="view-all" href="#">View All</a>
                    </div>
                </div>
                <div class="product-wrapper">
                  <div class="products  product-carousel-3">
                    <div class="product-item animate__animated animate__fadeInUp">
                      <div class="product-wrap">
                          <div class="product-image">
                              <a class="pro-img" href="#">
                                  <img src="<?php echo e(asset('frontend-view/images/1.jpg')); ?>"  alt="">
                              </a>
                              <div class="product-label">
                                  <span class="new-title">New</span>
                                  <span class="sale-title">-32%</span>
                              </div>
                              <div class="product-action">
                                  <a class="wishlist" href="javascript:void(0);" title="Wishlist" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                      <i class="fa fa-heart"></i>
                                  </a>
                                  <a href="javascript:void(0);" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">
                                      <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>
                                  </a>
                                  <a href="#" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
                                      <i class="fa fa-eye"></i>
                                  </a>
                              </div>
                          </div>
                          <div class="product-content">
                              <h3 class="product-title">
                                  <a href="#" >Sky Blue Color American Diamond Rose Gold Necklaces Set (CZN185SBLU)</a>
                              </h3>
                              <div class="product-price">
                                  <span class="new-price">₹4100.00</span>
                                  <span class="old-price">₹6000.00</span>
                              </div>
                          </div>
                      </div>
                    </div>
                    <!-- product-item -->
                    <div class="product-item animate__animated animate__fadeInUp">
                      <div class="product-wrap">
                          <div class="product-image">
                              <a class="pro-img" href="#">
                                  <img src="<?php echo e(asset('frontend-view/images/2.jpg')); ?>"  alt="">
                              </a>
                              <div class="product-action">
                                  <a class="wishlist" href="javascript:void(0);" title="Wishlist" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                      <i class="fa fa-heart"></i>
                                  </a>
                                  <a href="javascript:void(0);" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">
                                      <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>
                                  </a>
                                  <a href="#" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
                                      <i class="fa fa-eye"></i>
                                  </a>
                              </div>
                          </div>
                          <div class="product-content">
                              <h3 class="product-title">
                                  <a href="#" >Sky Blue Color American Diamond Rose Gold Necklaces Set (CZN185SBLU)</a>
                              </h3>
                              <div class="product-price">
                                  <span class="new-price">₹4100.00</span>
                              </div>
                          </div>
                      </div>
                    </div>
                    <!-- product-item -->
                    <div class="product-item animate__animated animate__fadeInUp">
                      <div class="product-wrap">
                          <div class="product-image">
                              <a class="pro-img" href="#">
                                  <img src="<?php echo e(asset('frontend-view/images/3.jpg')); ?>"  alt="">
                              </a>
                              <div class="product-action">
                                  <a class="wishlist" href="javascript:void(0);" title="Wishlist" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                      <i class="fa fa-heart"></i>
                                  </a>
                                  <a href="javascript:void(0);" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">
                                      <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>
                                  </a>
                                  <a href="#" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
                                      <i class="fa fa-eye"></i>
                                  </a>
                              </div>
                          </div>
                          <div class="product-content">
                              <h3 class="product-title">
                                  <a href="#" >Sky Blue Color American Diamond Rose Gold Necklaces Set (CZN185SBLU)</a>
                              </h3>
                              <div class="product-price">
                                  <span class="new-price">₹4100.00</span>
                              </div>
                          </div>
                      </div>
                    </div>
                    <!-- product-item -->
                    <div class="product-item animate__animated animate__fadeInUp">
                      <div class="product-wrap">
                          <div class="product-image">
                              <a class="pro-img" href="#">
                                  <img src="<?php echo e(asset('frontend-view/images/4.jpg')); ?>"  alt="">
                              </a>
                              <div class="product-label">
                                  <span class="new-title">New</span>
                                  <span class="sale-title">-32%</span>
                              </div>
                              <div class="product-action">
                                  <a class="wishlist" href="javascript:void(0);" title="Wishlist" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                      <i class="fa fa-heart"></i>
                                  </a>
                                  <a href="javascript:void(0);" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">
                                      <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>
                                  </a>
                                  <a href="#" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
                                      <i class="fa fa-eye"></i>
                                  </a>
                              </div>
                          </div>
                          <div class="product-content">
                              <h3 class="product-title">
                                  <a href="#" >Sky Blue Color American Diamond Rose Gold Necklaces Set (CZN185SBLU)</a>
                              </h3>
                              <div class="product-price">
                                  <span class="new-price">₹4100.00</span>
                                  <span class="old-price">₹6000.00</span>
                              </div>
                          </div>
                      </div>
                    </div>
                    <!-- product-item -->
                    <div class="product-item animate__animated animate__fadeInUp">
                      <div class="product-wrap">
                          <div class="product-image">
                              <a class="pro-img" href="#">
                                  <img src="<?php echo e(asset('frontend-view/images/5.jpg')); ?>"  alt="">
                              </a>
                              <div class="product-label">
                                  <span class="new-title">New</span>
                              </div>
                              <div class="product-action">
                                  <a class="wishlist" href="javascript:void(0);" title="Wishlist" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                      <i class="fa fa-heart"></i>
                                  </a>
                                  <a href="javascript:void(0);" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">
                                      <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>
                                  </a>
                                  <a href="#" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
                                      <i class="fa fa-eye"></i>
                                  </a>
                              </div>
                          </div>
                          <div class="product-content">
                              <h3 class="product-title">
                                  <a href="#" >Sky Blue Color American Diamond Rose Gold Necklaces Set (CZN185SBLU)</a>
                              </h3>
                              <div class="product-price">
                                  <span class="new-price">₹4100.00</span>
                                  <span class="old-price">₹6000.00</span>
                              </div>
                          </div>
                      </div>
                    </div>
                    <!-- product-item -->
                    <div class="product-item animate__animated animate__fadeInUp">
                      <div class="product-wrap">
                          <div class="product-image">
                              <a class="pro-img" href="#">
                                  <img src="<?php echo e(asset('frontend-view/images/6.jpg')); ?>"  alt="">
                              </a>
                              <div class="product-label">
                                <span class="sale-title">-32%</span>
                              </div>
                              <div class="product-action">
                                  <a class="wishlist" href="javascript:void(0);" title="Wishlist" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                      <i class="fa fa-heart"></i>
                                  </a>
                                  <a href="javascript:void(0);" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">
                                      <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>
                                  </a>
                                  <a href="#" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
                                      <i class="fa fa-eye"></i>
                                  </a>
                              </div>
                          </div>
                          <div class="product-content">
                              <h3 class="product-title">
                                  <a href="#" >Sky Blue Color American Diamond Rose Gold Necklaces Set (CZN185SBLU)</a>
                              </h3>
                              <div class="product-price">
                                  <span class="new-price">₹4100.00</span>
                                  <span class="old-price">₹6000.00</span>
                              </div>
                          </div>
                      </div>
                    </div>
                    <!-- product-item -->
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
       <!--=====================================================
                      Product Section End
      =========================================================-->

      <div class="testimonial-section section">
        <div class="container">
        <div class="section-header text-center">
          <h2 class="section-title">Customer Reviews</h2>
          <p class="section-description">What Our Customers Saying</p>
        </div>
        <div class="testimonial-carousel">
          <?php foreach($testimonials as $test){?>
          <div class="testimonial-item">
            <div class="testimonial-wrap">
              <div class="testimonial-content">
                <div class="testimonial-quote"><i class="fa fa-quote-left"></i></div>
                <p>
                  <?php echo $test->description ; ?>
                </p>
              </div>
              <div class="testimonail-image-title">
                <div class="testimonial-image">
                  <img src="<?php echo e(asset('file/'.$test->image)); ?>" alt="">
                </div>
                <div class="testimonial-title-wrap">
                  <h4 class="testimonial-title"> - <?php echo $test->full_name; ?></h4>
                  <p class="testimonial-meta"><?php echo $test->city; ?></p>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
      <!--=====================================================
                      Testimonial Section End
      =========================================================-->

      <div class="insta-title">
          <div class="container">
          FIND US ON INSTAGRAM <br> <a href="https://www.instagram.com/myazakurties/" target="_new">@myazakurties</a>
          </div>
      </div>

    <div class="product-section section">
        <div class="container-custom">
            <div class="product-wrapper">
              <div class="products with-bg-white insta-coursal">
               
              </div>
            </div>
        </div>
      </div>

      <div class="usp-section section free-shipping">
        <div class="container">
          <div class="usp-wrapper">
            <div class="row">
              <div class="usp-first usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.4s">
                <div class="usp-wrap">
                  <div class="usp-icon">
                    <i class="fas fa-shipping-fast"></i>
                  </div>
                  <div class="usp-content">
                    <h4 class="usp-title"> Free Shipment </h4>
                    <p class="usp-desc">
                      We offer Worldwide shipping options through our website </p>
                  </div>
                </div>
              </div>
              <div class="usp-second usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.5s">
                <div class="usp-wrap">
                  <div class="usp-icon">
                    <i class="fas fa-money-bill-alt"></i>
                  </div>
                  <div class="usp-content">
                    <h4 class="usp-title">
                      Gifts </h4>
                    <p class="usp-desc">
                      Returns are accepted within 3 days from delivery </p>
                  </div>
                </div>
              </div>
              <div class="usp-third usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.6s">
                <div class="usp-wrap">
                  <div class="usp-icon">
                    <i class="fas fa-lock"></i>
                  </div>
                  <div class="usp-content">
                    <h4 class="usp-title">
                      Safe Payment </h4>
                    <p class="usp-desc">
                      You can perform confidently the payment. it’s 100% secure. </p>
                  </div>
                </div>
              </div>
              <div class="usp-fourth usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.6s">
                <div class="usp-wrap">
                  <div class="usp-icon">
                    <i class="fas fa-handshake"></i>
                  </div>
                  <div class="usp-content">
                    <h4 class="usp-title">
                      Support </h4>
                    <p class="usp-desc">
                      We are verified supplier on alibaba.com for last 10 years. </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
   
  <!-- Wrapper -->

<?php echo $__env->make('frontend-view.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
  $(document).ready(function () {
    function isInView(el) {
      var rect = el.getBoundingClientRect();
      return !(rect.top > $(window).height() || rect.bottom < 0);
    }

    $(document).on("scroll", function() {
      $(".slick-active video").each(function() {
        if (isInView($(this)[0])) {
          if ($(this)[0].paused) $(this)[0].play();
        }
        else {
          if (!$(this)[0].paused) $(this)[0].pause();
        }
      });  
    });
  });
</script><?php /**PATH D:\xampp\htdocs\myaza\resources\views/frontend-view/home/index.blade.php ENDPATH**/ ?>