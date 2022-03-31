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
                  <li class="breadcrumb-item trail-begin"><a href="<?php echo e(url('')); ?>" rel="home"><span
                        itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name"><?php echo $cms->title; ?></span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- page-banner-section -->
      <div class="content-wrapper about_myaza">
        <div class="container">
          <div class="page-header text-center">
            <h1 class="page-title"><?php echo $cms->title; ?></h1>
          </div>
          <div class="content-area">
            <div class="content-section">
                <?php echo $cms->description; ?>
            </div>
          <!--content-area-->
        </div>
        <!--container-->
      </div>
      <!--content-wrapper-->
    </section>
    <!--=====================================================
                        Site Section End
    =========================================================-->
<?php echo $__env->make('frontend-view.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\xampp\htdocs\myazatrendz\resources\views/store/cms/index.blade.php ENDPATH**/ ?>