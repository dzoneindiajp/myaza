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
                    
                  <li class="breadcrumb-item trail-begin"><a href="<?php echo e(url('/')); ?>" rel="home"><span itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">Sign Up</span></li>
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
            <h1 class="page-title">Sign Up</h1>
          </div>
            <div class="content-area">
              <div class="content-section">
                <div class="loginregister-page register-wrap">
                  <div class="loginregister-header">
                      <h3>Register</h3>
                      <p>Create an account to latest Update.</p>
                  </div>
                  <div class="loginregister-body">
                    <form method="post" action="<?php echo e(route('frontview.register')); ?>" id="registeration">
                            <?php echo csrf_field(); ?>
                      <div class="form-row">
                        <div class="form-group required col-sm-6 col-12">
                          <label for="name">Name</label>
                          <input type="text" class="form-control required" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group required col-sm-6 col-12">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control required" id="email" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group required col-sm-6 col-12">
                          <label for="phone_number">Mobile Number</label>
                          <input type="tel" class="form-control required" id="mobile" name="mobile" placeholder="Mobile Number">
                        </div>
                        
                        <div class="form-group col-sm-6 col-12">
                            <label for="country">Country</label>
                            <select class="form-control" onchange="getstates($(this).val())" name="country"  id="country" class="block mt-1 w-full">
                                  <option value="" selected="selected">Select Country</option>
                               <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                          
                        </div>
                        <div class="form-group col-sm-6 col-12">
                            <label for="state">State</label>
                            <select class="form-control" name="state" onchange="getcity($(this).val())" id="state" class="block mt-1 w-full">
                                  <option value="" selected="selected">Select State</option>
                           </select>
                          
                        </div>
                        <div class="form-group col-sm-6 col-12">
                          <label for="city">City</label>
                          <select class="form-control" name="city_id"  id="city_id" class="block mt-1 w-full">
                                  <option value="" selected="selected">Select City</option>
                           </select>
                        </div>
                        <div class="form-group col-sm-6 col-12">
                          <label for="city">Postal Code</label>
                          <input type="text" class="form-control" id="postcode"name="postcode" placeholder="Postal Code">
                        </div>
                        <div class="form-group col-sm-6 col-12">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                        <div class="form-group col-sm-6 col-12">
                          <label for="address2">Address 2</label>
                          <input type="text" class="form-control" id="address2" name="address2" placeholder="Address 2">
                        </div>
                        <div class="form-group col-sm-6 col-12">
                          <label for="phone_number">Referal Code</label>
                          <input type="text" class="form-control " id="referral_code" name="referral_code" placeholder="Referal Code">
                        </div>
                        <!--<div class="form-group col-sm-6 col-12">-->
                        <!--  <label for="gst">GST Number</label>-->
                        <!--  <input type="text" class="form-control" id="gst" placeholder="GST Number">-->
                        <!--</div>-->
                        <div class="form-group required col-sm-6 col-12">
                          <label for="password">Password</label>
                          <input type="password" class="form-control required" required id="passwordfiled" name="password" placeholder="Password">
                          <span toggle="#passwordfiled" class="fa fa-eye toggle-password"></span>
                        </div>
                        <div class="form-group required col-sm-6 col-12">
                          <label for="password">Confirm Password</label>
                          <input type="password" class="form-control required" name="confirm-password"  id="confirm_password" placeholder="Conform Password">
                          <span toggle="#confirm_password" class="fa fa-eye toggle-password"></span>
                        </div>
                      </div>
                      <div class="form-submit">
                          <button type="button" onclick="registeration()" class="btn btn-primary">Create an account</button>
                      </div>
                    </form>
                    <div class="login-social">
                        <p class="login-social-title"><strong> OR SIGN IN USING </strong></p>
                        <div class="social">
                            <ul class="social-icon">
                                <li class="facebook"><a target="_blank" href="<?php echo e(url('/redirect/facebook')); ?>"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
                                <li class="google"><a target="_blank" href="<?php echo e(url('/redirect/google')); ?>"><i class="fab fa-google"></i><span>Google</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="loginregister-now">
                        <h4>Already have an account?</h4>
                        <a href="<?php echo e(url('login')); ?>" class="account-link login">Sign in?</a>
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
<script>
function capitalize(s){
    return s[0].toUpperCase() + s.slice(1);
}

function getstates(v){
   if(v>0){
      $('#cover-spin').show(0);
      $.get("<?php echo e(route('checkout.states')); ?>",{'id':v},function(x){
         $('#cover-spin').hide(0);
         var bn = '<option value="">Select an option…</option>';
         $.each(x.sta,function(m,n){
            bn +='<option value="'+n.id+'">'+n.name+'</option>';
         });
         $('#state').empty().append(bn);
      });
   }
}

function getcity(v){
   if(v>0){
      $('#cover-spin').show(0);
      $.get("<?php echo e(route('checkout.city')); ?>",{'id':v},function(x){
         $('#cover-spin').hide(0);
         var bn = '<option value="">Select an option…</option>';
         $.each(x.sta,function(m,n){
            bn +='<option value="'+n.id+'">'+n.name+'</option>';
         });
         $('#city_id').empty().append(bn);
      });
   }
}

function registeration(){
  var form = $('#registeration');
  var r = 0;
  $.each(form.find('input.required'),function(v){
      if($(this).val().trim() == ''){
        var g = capitalize($(this).attr('name'));
        notifyme('error',g+' is required');
        r = 1;
        return false;
      }
  });
  if(r == 0){
    if($('#passwordfiled').val().trim() != $('#confirm_password').val().trim()){
        notifyme('error','Both password should match');
        r = 1;
        return false;
    }
  }
  if(r == 0){
    $('#cover-spin').show(0);
    $.post("<?php echo e(route('frontview.register')); ?>",form.serialize(),function(v){
      $('#cover-spin').hide(0);
        if(v.code == 200){
          notifyme('success',v.message);
          $.each(form.find('.form-control'),function(v){
              $(this).val('');
          });
          window.setTimeout(function() {
              window.location.href = " <?php echo e(route('frontview.login')); ?> ";
          }, 5000);
        }else{
           
            notifyme('error','Something went wrong, Please try again later');
            
        }
    }).fail(function(n){
        $('#cover-spin').hide(0);
        if(n.responseJSON.errors){
            notifyme('error',n.responseJSON.errors.email);
        }else{
            notifyme('error','Something went wrong, Please try again later');
        }
      });
  }
}
</script>
<?php echo $__env->make('frontend-view.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/myazatrendz/public_html/resources/views/frontend-view/auth/register.blade.php ENDPATH**/ ?>