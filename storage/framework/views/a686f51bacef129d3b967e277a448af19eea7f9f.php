<?php echo $__env->make('frontend-view.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="wrapper">
   
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
                    
                  <li class="breadcrumb-item trail-begin"><a href="<?php echo e(url('/')); ?>" rel="home"><span itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">Sign In</span></li>
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
            <h1 class="page-title">Sign In</h1>
          </div>
            <div class="content-area">
              <div class="content-section">
                <div class="loginregister-page">
                  <div class="loginregister-header">
                      <h3>Login</h3>
                      <p>Enter your email address to sign in.</p>
                  </div>
                  <div class="loginregister-body">
                     <?php if(session('message')): ?>
                         <div class="alert alert-success" role="alert">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?>
                     <form method="post" action="<?php echo e(route('store.login')); ?>"  id="registeration">
                            <?php echo csrf_field(); ?>
                          <div class="form-group required">
                              <label for="email">Email address</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                          </div>
                          <div class="form-group required">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                          </div>
                          <div class="form-forgot-pass">
                              <a href="<?php echo e(url('forgot-password')); ?>" class="forgot-pass">Forgot Password?</a>
                          </div>
                          <div class="form-submit">
                              <button type="button" onclick="checkforlogin($(this))" class="btn btn-primary">Submit</button>
                          </div>
                      </form>

                      <div class="login-social">
                          <p class="login-social-title"><strong> OR SIGN IN USING </strong></p>
                          <div class="social">
                              <ul class="social-icon">
                                  <li class="facebook"><a target="_blank" href=<?php echo e(url('/redirect/facebook')); ?>><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
                                  <li class="google"><a target="_blank" href="<?php echo e(url('/redirect/google')); ?>"><i class="fab fa-google"></i><span>Google</span></a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="loginregister-now">
                          <h4>Do not have an account?</h4>
                          <a href="<?php echo e(url('sign-up')); ?>" class="account-link register">Sign Up?</a>
                      </div>
                  </div>
              </div>
              </div>
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
   
  <!-- Wrapper -->
<script>
  function checkforlogin(v){
    if($('#email').val() == ""){
      notifyme('error','Email is required');
      return false;
    }
    if($('#password').val() == ""){
      notifyme('error','Password is required');
      return false;
    }
    $('#cover-spin').show(0);
    $.post("<?php echo e(route('store.login')); ?>",$('#registeration').serialize(),function(x){
      $('#cover-spin').hide(0);
      if(x.code == 200){
          if(x.back && x.back!=""){
              window.location.href = x.back;
          }else{
              window.location.href = "<?php echo e(route('user.dashboard')); ?>";
          }
      }else{
        notifyme('error',x.message);
        return false;
      }
    });
  }
</script>
<?php echo $__env->make('frontend-view.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\xampp\htdocs\myazatrendz\resources\views/frontend-view/auth/login.blade.php ENDPATH**/ ?>