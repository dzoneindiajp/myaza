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
                  <li class="breadcrumb-item trail-begin"><a href="<?php echo e(url('/')); ?>" rel="home"><span
                        itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">Contact Us</span></li>
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
            <h1 class="page-title">Contact Us</h1>
          </div>
            <div class="content-area">
              <div class="contact-page-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14242.464848998903!2d75.7723984!3d26.8203463!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd9ee3578b103cf96!2sBaba%20Garments!5e0!3m2!1sen!2sin!4v1628670901620!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
              <div class="contact-info-section">
                <div class="contact-info">
                  <h3 class="contact-info-title">Contact Info</h3>
                  <ul>
                      <li>
                          <div class="contact-wrap">
                              <div class="contact-icon"> <i class="fa fa-map-marker-alt"></i> </div>
                              <div class="contact-text">
                                  <h5 class="contact-title">Address</h5>
                                  <p><?php echo $setting->address; ?></p>
                              </div>
                          </div>
                      </li>
                      <li>
                        <div class="contact-wrap">
                            <a href="tel:+91 7737384209" class="contact-icon"> <i class="fa fa-phone-alt"></i> </a>
                            <div class="contact-text">
                                <h5 class="contact-title">Phone</h5>
                                <p><a href="tel:+91 7737384209"><?php echo $setting->phone; ?></a></p>
                            </div>
                        </div>
                    </li>
                      <li>
                          <div class="contact-wrap">
                              <a href="mailto:<?php echo $setting->contact_us_email; ?>" class="contact-icon"> <i class="fa fa-envelope"></i> </a>
                              <div class="contact-text">
                                  <h5 class="contact-title">Email</h5>
                                  <p><a href="mailto:<?php echo $setting->contact_us_email; ?>"><?php echo $setting->contact_us_email; ?></a></p>
                              </div>
                          </div>
                      </li>
                  </ul>
                </div>
                <!--contact-info-->
                <div class="contact-page-form">
                  <h3 class="contact-form-title">Get in Touch With us!</h3>
                  <div class="form">
                      <form method="POST" action=""  role="form" id="contactus">
                          <?php echo csrf_field(); ?>
                          <div class="row">
                              <div class="form-group col-sm-6 col-12">
                                  <label>Name</label><input type="text" name="name" value="" size="40"
                                      class="form-control">
                              </div>
                              <div class="form-group col-sm-6 col-12">
                                  <label>Email</label><input type="email" name="email" value="" size="40"
                                      class="form-control">
                              </div>
                              <div class="form-group col-sm-6 col-12">
                                  <label>Phone</label><input type="tel" name="phone" value="" size="40"
                                      class="form-control">
                              </div>
                              <div class="form-group col-sm-6 col-12">
                                  <label>Subject</label><input type="text" name="subject" value="" size="40"
                                      class="form-control">
                              </div>
                              <div class="form-group col-sm-12 col-12">
                                  <label>Message</label><textarea name="message" cols="40" rows="10"
                                      class="form-control"></textarea>
                              </div>
                              <div class="form-submit col-sm-12 col-12">
                                  <input type="button" value="Submit" onclick="pushmail()" class="btn btn-secondary">
                              </div>
                          </div>
                        </form>
                     
                  </div>
                </div>
                <!-- contact-page-form -->
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

function capitalize(s){
    return s[0].toUpperCase() + s.slice(1);
}

function pushmail(){
  var form = $('#contactus');
  var r = 0;
  $.each(form.find('.form-control'),function(v){
      if($(this).val().trim() == ''){
        var g = capitalize($(this).attr('name'));
        notifyme('error',g+' is required');
        r = 1;
        return false;
      }
  });
  if(r == 0){
    $('#cover-spin').show(0);
    $.post("<?php echo e(route('contact-us_saved')); ?>",form.serialize(),function(v){
      $('#cover-spin').hide(0);
        if(v.code == 200){
          notifyme('success',v.message);
          $.each(form.find('.form-control'),function(v){
              $(this).val('');
          });
        }
    });
  }
}

</script>
  <?php echo $__env->make('frontend-view.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/myazatrendz/public_html/resources/views/frontend-view/home/contact-us.blade.php ENDPATH**/ ?>