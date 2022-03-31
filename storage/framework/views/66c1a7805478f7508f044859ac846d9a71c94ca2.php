

<!doctype html>
<html lang="en-US">
   <head>
      <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
      <title>Reset Password</title>
      <meta name="description" content="Reset Password">
      <style type="text/css">
         a:hover {text-decoration: underline !important;}
      </style>
   </head>
   <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
      <!--100% body table-->
      <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
         style="@import  url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
         <tr>
            <td>
               <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                  align="center" cellpadding="0" cellspacing="0">
                  <tr>
                     <td style="height:80px;">&nbsp;</td>
                  </tr>
                  <tr>
                     <td style="text-align:center;">
                        <a href="https://myazatrendz.com" title="logo" target="_blank">
                        <img width="60" src="https://myazatrendz.com/file/1643625391logo.png" title="logo" alt="logo">
                        </a>
                     </td>
                  </tr>
                  <tr>
                     <td style="height:20px;">&nbsp;</td>
                  </tr>
                  <tr>
                     <td>
                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                           style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                           <tr>
                              <td style="height:40px;">&nbsp;</td>
                           </tr>
                           <tr>
                              <td style="padding:0 35px;">
                                 <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">You have
                                    requested to reset your password
                                 </h1>
                                 <span
                                    style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                 <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                    We cannot simply send you your old password. A unique link to reset your
                                    password has been generated for you. To reset your password, click the
                                    following link and follow the instructions.
                                 </p>
                                 <a href="<?php echo e(url('/')); ?>/reset-password/<?php echo e($token); ?>" target="_blank"
                                    style="background:#004e96;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                                 Password</a>
                              </td>
                           </tr>
                           <tr>
                              <td style="height:40px;">&nbsp;</td>
                           </tr>
                        </table>
                     </td>
                  <tr>
                     <td style="height:20px;">&nbsp;</td>
                  </tr>
                  <tr>
                     <td style="text-align:center;">
                        <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>https://myazatrendz.com</strong></p>
                     </td>
                  </tr>
                  <tr>
                     <td style="height:80px;">&nbsp;</td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
      <!--/100% body table-->
   </body>
</html>
<?php echo $__env->make('frontend-view.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="site-content">
   <div class="page-banner-section">
      <div class="page-banner page-banner-bg">
         <div class="container">
            <div class="page-banner-wrap">
               <div role="navigation" aria-label="Breadcrumbs" class="breadcrumbs">
                  <ul class="breadcrumb-items">
                     <li class="breadcrumb-item trail-begin"><a href="index.html" rel="home"><span
                        itemprop="name">Home</span></a></li>
                     <li class="breadcrumb-item trail-end"><span itemprop="name">Verify Your Email Address</span></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="content-wrapper">
      <div class="container">
         <div class="page-header text-center">
            <h1 class="page-title">Verify Your Email Address</h1>
         </div>
         <div class="row">
            <div class="content-area col-md-12 col-sm-12 col-12">
               <div class="content-section">
                   <div class="card">
                       <div class="card-header">Verify Your Email Address</div>
                       <div class="card-body">
                          <?php if(session('resent')): ?>
                          <div class="alert alert-success" role="alert">
                             <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

                          </div>
                          <?php endif; ?>
                          <a href="<?php echo e(url('/')); ?>/reset-password/<?php echo e($token); ?>">Click Here</a>.
                       </div>
                    </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php echo $__env->make('frontend-view.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/customauth/verify.blade.php ENDPATH**/ ?>