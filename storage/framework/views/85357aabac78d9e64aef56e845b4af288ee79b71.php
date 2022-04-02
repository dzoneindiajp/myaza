<?php echo $__env->make('frontend-view.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--=====================================================
                            Header Section End
    =========================================================-->
   
    <section class="site-content">
      <div class="page-banner-section">
        <div class="page-banner page-banner-bg">
          <div class="container">
            <div class="page-banner-wrap">
              <div role="navigation" aria-label="Breadcrumbs" class="breadcrumbs">
                <ul class="breadcrumb-items">
                  <li class="breadcrumb-item trail-begin"><a href="<?php echo e(url('/')); ?>" rel="home"><span
                        itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">My Account</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- page-banner-section -->
      <div class="content-wrapper">
        <div class="container">
          <div class="page-header text-center">
            <h1 class="page-title">My Account</h1>
          </div>
          <div class="row">

            <?php echo $__env->make('store.orders.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <div class="content-area col-md-9 col-sm-12 col-12">
              <div class="content-section">
                <h3>Welcome!</h3>
                <h5>Hi, <?php echo $user->name; ?>!</h5>
                <p>Today is a great day to check your account page. You can check <a href="<?php echo e(route('user.orders')); ?>">your last orders</a> or have a look to <a href="<?php echo e(route('user.wishlist')); ?>">your wishlist. </a><br>Or maybe you can <strong>start to shop</strong> and check our latest offers ?</p>
               <div class="row">                 
                 <div class="box-item col-lg-4 col-md-4 col-sm-6 col-6">
                  <div class="box-wrap box-radius box-border-bottom account-box">                              
                    <div class="box-body">
                      <a href="<?php echo e(route('user.orders')); ?>">
                        <div class="account-box-image">
                          <img src="<?php echo e(asset('file')); ?>/icon-order.png" alt="">
                          <div class="account-box-count"><?php echo $orders; ?></div>
                        </div>
                        <h5>My Orders</h5>
                      </a>
                    </div>
                  </div>
                 </div><!-- box-item  -->
                 
                 <div class="box-item col-lg-4 col-md-4 col-sm-6 col-6">
                  <div class="box-wrap box-radius box-border-bottom account-box">                              
                    <div class="box-body">
                      <a href="<?php echo e(route('user.profile')); ?>">
                        <div class="account-box-image">
                          <img src="<?php echo e(asset('file')); ?>/icon-profile.png" alt="">
                        </div>
                        <h5>My Profile</h5>
                      </a>
                    </div>
                  </div>
                 </div><!-- box-item  -->
                 <div class="box-item col-lg-4 col-md-4 col-sm-6 col-6">
                  <div class="box-wrap box-radius box-border-bottom account-box">                              
                    <div class="box-body">
                      <a href="<?php echo e(route('user.wishlist')); ?>">
                        <div class="account-box-image">
                          <img src="<?php echo e(asset('file')); ?>/icon-wishlist.png" alt="">
                          <div class="account-box-count"><?php echo $whis; ?></div>
                        </div>
                        <h5>My Wishlist</h5>
                      </a>
                    </div>
                  </div>
                 </div><!-- box-item  -->
               </div>
              </div>
            </div>
            <!--content-area-->
          </div>
          <!-- row -->
        </div>
        <!--container-->
      </div>     
      <!--content-wrapper-->
    </section>
    <!--=====================================================
                        Site Section End
    =========================================================-->
<?php echo $__env->make('frontend-view.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myaza\resources\views/store/users/dashboard.blade.php ENDPATH**/ ?>