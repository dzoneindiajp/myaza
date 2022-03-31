
<?php echo $__env->make('frontend-view.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="site-content">
    <div class="container">
        <div class="content-wrapper">
            <div class="jumbotron text-center">
              <h1 class="display-3">Thank You!</h1>
              <p class="lead">Your order has been placed</p>
              <p class="lead">For further instructions or any problem please contact customer care</p>
              <hr>
              <p>
                Having trouble? <a href="#">Contact us</a>
              </p>
              <p class="lead">
                <a class="btn btn-primary btn-sm" href="<?php echo e(url('/')); ?>" role="button">Continue to homepage</a>
              </p>
            </div>
        </div>
    </div>
</section>


<?php echo $__env->make('frontend-view.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myazatrendz\resources\views/store/cart/thank.blade.php ENDPATH**/ ?>