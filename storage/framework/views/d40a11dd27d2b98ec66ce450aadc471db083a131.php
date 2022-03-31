<?php echo $__env->make('frontend-view.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="wrapper">
    
    <section class="home-site-content">
        
      <div class="product-section section">
        <div class="container-custom">

          <div class="section-header">
            <h2 class="section-title">Trending Products</h2>
            <p class="section-description">Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas</p>
        </div>
            <div class="product-wrapper">
              <div class="products with-bg-white">
              <?php foreach($trending as $h=>$trend){ ?>
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
                <?php } ?>
              </div>
            </div>


        </div>
      </div>

    </section>
   
  <!-- Wrapper -->

<?php echo $__env->make('frontend-view.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myazatrendz\resources\views/frontend-view/trending-products.blade.php ENDPATH**/ ?>