<?php 
$sizecount = \App\Models\Setting::where('id',1)->first();
?>
 <!--=====================================================
                      Mainpage Section End
    =========================================================-->
    <footer class="footer-section" id="footer-section">
        <div class="footer">
          <div class="footer-newsletter">
            <div class="footer-newsletter-outer">
                <div class="container">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">JOIN OUR NEWSLETTER</h3>
                        <form method="post" data-id="106" id="subcribe_form">
                            {!! Form::token() !!}
                            <div class="mc4wp-form-fields">
                                <div class="newsletter-off">
                                    <div class="newsletter-form">
                                        <p class="newsletter-input">
                                            <input type="email" name="email" placeholder="Your email address" required />
                                        </p>
                                        <p class="newsletter-submit">
                                            <input id="subcribe_form_id" class="btn btn-secondary" type="button" value="Subscribe" />
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
          <div class="footer-top">
            <div class="container-custom">
              <div class="footer-widget-outer">
                <div class="row">
                  <div class="footer-column footer-1 col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn"  data-wow-delay="0.3">
                    <div class="footer-widget">
                      <h4 class="footer-widget-title">Quick Links</h4>
                      <div class="menu-about-container">
                        <ul id="menu-about" class="">
                          <li><a href=" {{ url('about') }} ">About Us</a></li>
                          <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                          <!-- <li><a href="faqs.html">FAQ</a></li> -->
                          <!-- <li><a href="#">Stock Clearance Sale</a></li>
                          <li><a href="#">The Green Store</a></li>
                          <li><a href="#">Traditional Jaipuri Jewellery </a></li>
                          <li><a href="#">Packing Process</a></li> -->
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="footer-column footer-2 col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.5s">
                    <div class="footer-widget">
                      <h4 class="footer-widget-title">Information</h4>
                      <div class="menu-about-container">
                        <ul id="menu-about" class="">
                          <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                          <li><a href="{{url('terms-conditions')}}">Terms &amp; Conditions</a></li>
                          <li><a href="{{url('shipping-policy')}}">Shipping Policy</a></li>
                          <li><a href="{{url('return-policy')}}">Cancellation & Return Policy</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="footer-column footer-2  col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.7s">
                    <div class="footer-widget widget_nav_menu">
                      <h4 class="footer-widget-title">My Account</h4>
                      <div class="menu-my-account-container">
                        <ul id="menu-my-account" class="">
                          @if(!Auth::user())
                          <li><a href="{{ url('login') }}">Login/Signup</a></li>
                          @endif
                          @if(Auth::user())
                          <li><a href="{{url('/account/dashboard')}}">My account</a></li>
                          <li><a href="{{url('/account/orders')}}">Orders</a></li>
                          <li><a href="{{url('/account/wishlist')}}">Wishlist</a></li>
                          @endif
                          
                          <!-- <li><a href="#">Reward Program</a></li>
                          <li><a href="#">Bulk Buy </a></li> -->
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="footer-column footer-1 col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn"  data-wow-delay="0.9s">
                    <div class="footer-widget">
                      <div class="footer-social">
                        <h4 class="footer-widget-title">Follow Us</h4>
                        <ul class="footer-social-icon">
                          <li class="facebook"><a target="_blank" href="{{$sizecount->fb_link}}"><i class="fab fa-facebook-f"></i></a></li>
                          <li class="instagram"><a target="_blank" href="{{$sizecount->instagram_link}}"><i class="fab fa-instagram"></i></a></li>
                          <li class="pinterest"><a target="_blank" href="{{$sizecount->pinterest_link}}"><i class="fab fa-pinterest"></i></a></li>
                          <li class="twitter"><a target="_blank" href="{{$sizecount->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
                          <li class="youtube"><a target="_blank" href="{{$sizecount->whatsapp_link}}"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="footer-payment-widget footer-widget">
                      <h4 class="footer-widget-title">Payment Options</h4>
                      <div class="">
                        <img src="{{ asset('frontend-view/images/card-image.png') }}" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-bottom">
            <div class="container-custom">
              <div class="footer-bottom-outer">
                <div class="row">
                  <div class="footer-bottom-left col-md-6 col-sm-12 col-12">
                    <div class="copyright">
                      <p>&copy;2021 myazakurties. All Rights Reserved. Powered BY : <a href="https://dzoneindia.co.in/"
                          target="_blank">Dzone India</a></p>
                    </div>
                  </div>
                  <div class="footer-bottom-right col-md-6 col-sm-12 col-12">
                    <ul class="footer-menu">
                      <li><a href="{{url('disclaimer-policy')}}">Disclaimer Policy </a></li>
                      <li><a href="{{ url('contact-us') }}">Help</a></li>
                      <!--<li><a href="#">Site Map </a></li>-->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!--=====================================================
                                   Footer Section End
       =========================================================-->
      <div class="scroll-top">
        <a class="scroll-to-top" href="javascript:void(0);" id="scrolltop"><i class="fa fa-angle-up"></i></a>
      </div>
      
      <div class="whatsapp-call">
          <a target="_blank" href="https://wa.me/917737384209/?text=Hello Myazakurties" class=""> <i class="fab fa-whatsapp"></i> </a>
      </div>
      
      
      
      
      <div class="msg-call">
        <nav class="menu">
    <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open"/>
    <label class="menu-open-button" for="menu-open">
      <i class="far fa-comment-dots"></i>
    </label>
    <a target="_blank" href="mailto:info@myazakurties.com" class="menu-item"> <i class="fa fa-envelope"></i> </a>
    <a target="_blank" href="tel:917737384209" class="menu-item"> <i class="fa fa-phone"></i> </a>
  
  
  </nav>
  
  
  <!-- filters -->
  <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
      <defs>
        <filter id="shadowed-goo">
  
            <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
            <feGaussianBlur in="goo" stdDeviation="3" result="shadow" />
            <feColorMatrix in="shadow" mode="matrix" values="0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 1 -0.2" result="shadow" />
            <feOffset in="shadow" dx="1" dy="1" result="shadow" />
            <feBlend in2="shadow" in="goo" result="goo" />
            <feBlend in2="goo" in="SourceGraphic" result="mix" />
        </filter>
        <filter id="goo">
            <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10" />
            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
            <feBlend in2="goo" in="SourceGraphic" result="mix" />
        </filter>
      </defs>
  </svg>
  </div>
  
  
  
      <!-- whatsapp-call -->
      
      <!-- modal -->
    </div>
  
  <!-- Scripts FIle-->
    <script type="text/javascript" src="{{ asset('frontend-view/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend-view/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend-view/js/fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend-view/js/slick.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend-view/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend-view/js/function.js') }}"></script>
    <!--<script type="text/javascript" src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend-view/js/xzoom-script.js') }}"></script>-->
    <script type="text/javascript" src="{{ asset('frontend-view/js/jquery.miniNoty.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend-view/js/jssocials.min.js')}}"></script>
   <script>

$(function(){
        $(document).on('click','#searchbutton', function(e){
          //e.preventDefault();
          var search = $('.search-input').val().trim();
          if(search != ''){
              location.href = `{{url('/all?q=${search}')}}`;
          }

      });
  });
  
if($("#share").length>0){
    $("#share").jsSocials({
            showLabel: false,
            showCount: false,
            shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest"]
    });
}
  
$('#subcribe_form_id').on('click',function(){
	   var form = $('#subcribe_form');
	   if(form.find('input[name="email"]').val().trim()==""){
	       
	       notifyme('error','Email is required');
	       
	       return false;
	   }
	   $.post("{{route('subscribes.store')}}",form.serialize(),function(v){
	       var x = v;
	       if(x.code == '503'){
	           notifyme('error',x.message);
	       }else if(x.code == '200'){
	           notifyme('success',x.message);
	           form.find('input[name="email"]').val('');
	       }
	   });
	});

     function notifyme(type,msg){
	    $.miniNoty(msg,type);
		  return false;
    }
     function updatesidebaritems(b=0){
            $('#cover-spin').show(0);
            $.get("{{url('cart/setsidehtml/')}}",{'b':b},function(v){
                $('.sidebar-cart-items').html(v.html);
                $('.cart-number-items').html(v.qty);
                if(b == 1){
                    $('.modal_items').html(v.modal);
                    $('.model_price').html('₹'+v.carttotal);
                }
                if($('#cart_group').length>	0){
                    $('.order-total').find('.price').html('₹'+v.grandTotal);
                    $('#total_tax').html('₹'+v.tax);
                }
                $('#cover-spin').hide(0);
            });
    	}
    	
    	function removeItemFromSidebar(x){
    	    $('#cover-spin').show(0);
    	    $.get("{{url('cart/removeitemsidebar/')}}",{'id':x.attr('data-product_id')},function(v){
            if($('#payment').length>0){
              window.location.href = window.location.href;
            }
    	        notifyme('success','Item removed');
    	        $('#cover-spin').hide(0);
              updatesidebaritems(0);
              if($('#cart_group').length>	0){
                x.parents('.cart-action').parent('.cart-wrap').parent('.cart-item').remove();
                $('.subtotal-all').html('₹'+v.carttotal);
                $('.cart-number-items').html(v.qty);
                $('.order-total').find('.price').html('₹'+v.grandTotal);
                if($('.cart-item').length==0){
                  window.location.href = window.location.href;
                }
              }
    	    });
    	}
    	
    	  $(document).ready(function(){ 
            updatesidebaritems(0);
            getwishlist();
            setinstafeed();
        });
        
        function setinstafeed(){
            if($('.home-site-content').length>0){
              $.get("{{url('/store/instapost')}}",{'id':''},function(v){
                  if(v.code == 200){
                    var t = '';
                      $.each(v.html,function(x,b){
                          t +='<div class="product-item animate__animated animate__fadeInUp">';
                          t +='<div class="product-wrap">';
                          t +='<div class="product-image">';
                          t +='<a class="pro-img" href="#">';
                          t +='<img src="'+b+'"  alt="">';
                          t +='</a>';
                          t +='</div>';
                          t +='</div>';
                          t +='</div>';
                      });
                      $('.insta-coursal').html(t);
                      $('.insta-coursal').slick({ 
                          dots: true,
                          infinite: true,
                          speed: 300,
                          slidesToShow: 4,
                          slidesToScroll: 1, 
                          autoplay: true,
                          autoplaySpeed: 3000, 
                          pauseOnHover:false,
                          arrows: false,
                          prevArrow: '<div class="slick-prev"><i class="fas fa-angle-left"></i></div>',
                          nextArrow: '<div class="slick-next"><i class="fas fa-angle-right"></i></div>',
                          responsive: [
                          {
                            breakpoint: 991,
                            settings: {
                            slidesToShow: 3,
                            }
                          },
                          {
                            breakpoint: 767,
                            settings: {
                            slidesToShow: 2,
                            }
                          },
                          {
                            breakpoint: 575,
                            settings: {
                            slidesToShow: 1,   
                            }
                          } 
                          ]
                        });
                  }else{
                    $('.insta-coursal').parents('.product-section').remove();
                  }
              });
            }
        }

        function doRelatedToWishlist(b,pid,vid){
            $('#cover-spin').show(0);
            $.post("{{url('wishlist')}}",{"_token": "{{ csrf_token() }}",'product_id':pid,'variation_id':vid},function(v){
                $('#cover-spin').hide(0);
                if(v.success){
                    b.html('<i class="fas fa-heart"></i>');
                    notifyme('success',v.message);
                }else{
                    if(v.code == 201){
                        window.location.href = "{{ url('login') }}";
                    }else{
                        notifyme('error',v.message);    
                    }
                }
                getwishlist();
            });
        }

      function getwishlist(){
        $.get("{{url('wishlists/getiems')}}",{'id':0},function(v){
              $('.wishlist-number').html(v.data.length);
        });
      }
      
    	function updateCartItemQuantity(qty,id,parent){
    	    $('#cover-spin').show(0);
    	     $.get("{{url('cart/updateqty/')}}",{'id':id,'qty':qty},function(v){
    	        notifyme('success','Item quantity updated');
    	        $('#cover-spin').hide(0);
              updatesidebaritems(0);
              parent.find('.cart-subtotal').find('.price').html('₹'+v.itemtotal);
              $('.subtotal-all').html('₹'+v.carttotal);
              $('.cart-number-items').html(v.qty);
              applyc(1);
    	    });
    	}
      $(document).ready(function(){
          //$("#myModal").modal('show');
      });

  </script>
   <div id="myModal" class="modal welcome_img fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <img src="{{ asset('frontend-view/images/welcome_img.jpg') }}" alt="">
                  <div class="email_subscribe">
                  <div class="input-group">
                       <input type="email" class="form-control" placeholder="Enter your email">
                       <span class="input-group-btn">
                       <button class="btn btn-theme" type="submit"><i class="far fa-paper-plane"></i></button>
                       </span>
                        </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  
  </body>
  </html>
  