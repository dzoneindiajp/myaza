<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <title>Myaza Kurties Official Website</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <!-- CSS FIle-->
  <link rel="stylesheet" href="{{ asset('front_assets/css/fontawesome.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('front_assets/css/jquery-ui.min.css')}}" type="text/css" />   
  <link rel="stylesheet" href="{{ asset('front_assets/css/animate.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('front_assets/css/fancybox.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('front_assets/css/slick.css')}}"type="text/css" />
  <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('front_assets/css/style.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('front_assets/css/responsive.css')}}" type="text/css" />
  <!-- Js Library -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
  <div class="wrapper">
    <header class="header-section">
      <div class="header fixed">
        <div class="header-top">
          <div class="container-custom">
            <div class="header-top-inner">
              <div class="row">
                <div class="header-top-left col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="header-announcement">
                    <div class="header-announcement-carousel">
                      <p class="announcement-item"><a href="#">Reach out via call/ WhatsApp for personal shopping experience</a></p>
                      <p class="announcement-item"><a href="#">Free Shipping All Over India</a></p>
                      <p class="announcement-item"><a href="#">Reach out via call/ WhatsApp for personal shopping experience</a></p>
                    </div>
                  </div>
                </div>
                <div class="header-top-right col-lg-6 col-md-4 col-sm-12 col-12">
                  <ul class="header-nav">
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact-us.html">Contact Us</a></li> 
                    <li>
                      <div class="header-currency">
                        <form method="post" action="" class="currency-switcher-form">
                          <input type="hidden" name="currency-switcher" value="INR">
                          <select name="currency-switcher" data-width="100%" class="currency-switcher"
                            onchange="woocs_redirect(this.value); void(0);">
                            <option class="USD" value="USD">$ USD</option>
                            <option class="INR" value="INR" selected="selected">??? INR</option>
                          </select>
                        </form>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header-middle">
          <div class="container-custom">
            <div class="header-row">
              <div class="header-logo">
                <a class="logo-link" href="{{url('/')}}"><img class="logo" src="{{ asset('front_assets/images/logo.png')}}" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                  aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <div class="header-search">
                <div class="searchForm">
                  <form action="" method="get">
                    <input type="search" name="s" class="serach-input" placeholder="Search Products">
                    <button class="btn btn-primary searchicon" type="submit"><i class="fa fa-search"></i></button>
                  </form>
                </div>
              </div>
              <div class="header-shop-menu">
                <ul class="header-shop-link">
                  <li class="d-block d-md-none"><a class="search-icon" href="javascript:void(0);">
                      <span class="shop-icon">
                        <svg class="desktop-icon" viewBox="-3 -3 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <g stroke-width="2">
                            <polygon points="18.7071068 17.2928932 17.2928932 18.7071068 12.7628932 14.1771068 14.1771068 12.7628932"></polygon>
                            <path d="M8,16 C3.581722,16 0,12.418278 0,8 C0,3.581722 3.581722,0 8,0 C12.418278,0 16,3.581722 16,8 C16,12.418278 12.418278,16 8,16 Z M8,14 C11.3137085,14 14,11.3137085 14,8 C14,4.6862915 11.3137085,2 8,2 C4.6862915,2 2,4.6862915 2,8 C2,11.3137085 4.6862915,14 8,14 Z"></path>
                          </g>
                        </svg>
                      </span>
                    </a>
                    <div class="search-wrapper"> <a href="javascript:void(0);" class="search-cancel">Cancel</a>
                      <div class="searchForm">
                        <form action="" method="get">
                          <input type="search" name="s" class="serach-input" placeholder="Search Products">
                          <button class="btn btn-primary searchicon" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                      </div>
                    </div>
                  </li>
                  <li class="acoount-icon dropdown">
                    <a class="account-toggle" href="javascript:void(0);" data-toggle="modal" data-target="#loginregister">
                      <span class="shop-icon">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                          <g>
                            <g>
                              <path
                                d="M256,288.389c-153.837,0-238.56,72.776-238.56,204.925c0,10.321,8.365,18.686,18.686,18.686h439.747 c10.321,0,18.686-8.365,18.686-18.686C494.56,361.172,409.837,288.389,256,288.389z M55.492,474.628 c7.35-98.806,74.713-148.866,200.508-148.866s193.159,50.06,200.515,148.866H55.492z" />
                            </g>
                          </g>
                          <g>
                            <g>
                              <path
                                d="M256,0c-70.665,0-123.951,54.358-123.951,126.437c0,74.19,55.604,134.54,123.951,134.54s123.951-60.35,123.951-134.534 C379.951,54.358,326.665,0,256,0z M256,223.611c-47.743,0-86.579-43.589-86.579-97.168c0-51.611,36.413-89.071,86.579-89.071 c49.363,0,86.579,38.288,86.579,89.071C342.579,180.022,303.743,223.611,256,223.611z" />
                            </g>
                          </g>
                        </svg></span>
                    </a>
                    <div class="account-menu dropdown-menu dropdown-menu-right">
                      <p class="pl-3 m-2">Hi John!</p>
                      <ul class="account-menu-list">
                        <li><a href="#"><i class="fa fa-user"></i>My Account </a> </li>
                        <li><a href="#"><i class="fa fa-address-book"></i>My Address </a> </li>
                        <li><a href="#"><i class="fa fa-shopping-basket"></i>My Orders </a> </li>
                        <li><a href="#"><i class="far fa-heart"></i>My Wishlist </a> </li>
                        <li><a href="#"><i class="fa fa-tags"></i>My Coupons </a> </li>
                        <li class="logout"><a href="javascript:void(0);"><i class="fa fa-sign-out"></i>Log out</a> </li>
                      </ul>
                    </div>
                  </li>
                  <li class="shoping-icon">
                    <a href="my-wishlist.html">
                      <span class="shop-icon"><svg viewBox="0 -28 512.001 512" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0" />
                        </svg><span class="shop-number wishlist-number ">0</span></span> </a>
                  </li>
                  <li class="cart-menu dropdown">
                    <a href="cart.html" title="View your shopping cart" class="cart-contents">
                      <span class="cart-icon">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.997 511.997"
                          style="enable-background:new 0 0 511.997 511.997;" xml:space="preserve">
                          <g>
                            <g>
                              <path d="M405.387,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84
                                          S440.588,362.612,405.387,362.612z M405.387,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536
                                          c14.083,0,25.536,11.453,25.536,25.536S419.47,451.988,405.387,451.988z" />
                            </g>
                          </g>
                          <g>
                            <g>
                              <path
                                d="M507.927,115.875c-3.626-4.641-9.187-7.348-15.079-7.348H118.22l-17.237-72.12c-2.062-8.618-9.768-14.702-18.629-14.702
                                      H19.152C8.574,21.704,0,30.278,0,40.856s8.574,19.152,19.152,19.152h48.085l62.244,260.443
                                      c2.062,8.625,9.768,14.702,18.629,14.702h298.135c8.804,0,16.477-6.001,18.59-14.543l46.604-188.329
                                      C512.849,126.562,511.553,120.516,507.927,115.875z M431.261,296.85H163.227l-35.853-150.019h341.003L431.261,296.85z" />
                            </g>
                          </g>
                          <g>
                            <g>
                              <path d="M173.646,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84
                                  S208.847,362.612,173.646,362.612z M173.646,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536
                                  s25.536,11.453,25.536,25.536S187.729,451.988,173.646,451.988z" />
                            </g>
                          </g>
                        </svg><span class="cart-count cart-number-items">1</span></span>
                    </a>
                    <div class="cart-dropdown">
                      <div class="widget-shopping-cart">
                        <div class="widget-shopping-cart-content">
                          <ul class="mini-cart">
                            <li class="mini-cart-item">
                              <a href="javascript:void(0);" class="remove remove_from_cart_button" aria-label="Remove this item"
                                data-product_id="1876">??</a>
                              <a href="#"><img src="images/kurti3.jpg" alt="">Women Printed Cotton A-line Kurta </a>
                              <span class="quantity">1 ?? <span class="mini-cart-price"><span class="price">???410.00</span></span></span>
                            </li>
                            <li class="mini-cart-item">
                              <a href="javascript:void(0);" class="remove remove_from_cart_button" aria-label="Remove this item" data-product_id="1876">??</a>
                              <a href="#"><img src="images/kurti9.jpg" alt="">Women Printed Cotton A-line KurtaMalti Cushion Cover Set of Two -Reversible </a>
                              <span class="quantity">1 ?? <span class="mini-cart-price"><span class="price">???400.00</span> </span></span>
                            </li>
                          </ul>
                          <p class="mini-cart-total">
                            <strong>Subtotal:</strong> <span class="mini-cart-price"><span class="price">???810.00</span> </span>
                          </p>
                          <p class="mini-cart-buttons">
                            <a href="cart.html" class="button">View cart</a>
                            <a href="checkout.html" class="button checkout">Checkout</a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="header-outer header-fixed">
          <div class="container-fluid">
            <div class="header-menu navbar-expand-lg navbar-dark">
              <nav class="nav-menu">
                <div id="navbar" class="collapse navbar-collapse">
                  <ul class="navbar-nav">
                    <li><a href="product-list.html">New Arrivals</a></li>
                    <li class="has-children"><a href="javascript:void(0);">Women</a>  
                      <div class="mega-menu">
                        <div class="mega-menu-area">                         
                            <div class="mega-menu-items">                              
                              <div class="mega-submenu">
                                    <div class="mega-submenu-column">
                                      <h4 class="mega-menu-title">Women</h4>
                                      <ul class="mega-submenu-item">
                                        <li><a href="product-list.html">Dresses</a></li>
                                        <li><a href="product-list.html">Kurta Sets</a></li>
                                        <li><a href="product-list.html">Lehenga</a></li>
                                        <li><a href="product-list.html">Coordinated Sets</a></li>
                                        <li><a href="product-list.html">Night Wear</a> </li>
                                        <li><a href="product-list.html">Home Textile</a></li>
                                        <li><a href="product-list.html">Bags</a></li>
                                      </ul>
                                    </div>
                                    <div class="mega-submenu-column">
                                      <h4 class="mega-submenu-title">Collection</h4>
                                      <ul class="mega-submenu-item">
                                        <li><a href="product-list.html">Dresses</a></li>
                                        <li><a href="product-list.html">Kurta Sets</a></li>
                                        <li><a href="product-list.html">Lehenga</a></li>
                                        <li><a href="product-list.html">Coordinated Sets</a></li>
                                        <li><a href="product-list.html">Night Wear</a> </li>
                                        <li><a href="product-list.html">Home Textile</a></li>
                                        <li><a href="product-list.html">Bags</a></li>
                                      </ul>
                                    </div>
                                    <div class="mega-submenu-column">
                                      <h4 class="mega-submenu-title">Body Type</h4>
                                      <ul class="mega-submenu-item">
                                        <li><a href="product-list.html">Dresses</a></li>
                                        <li><a href="product-list.html">Kurta Sets</a></li>
                                        <li><a href="product-list.html">Lehenga</a></li>
                                        <li><a href="product-list.html">Coordinated Sets</a></li>
                                        <li><a href="product-list.html">Night Wear</a> </li>
                                        <li><a href="product-list.html">Home Textile</a></li>
                                        <li><a href="product-list.html">Bags</a></li>
                                      </ul>
                                    </div>
                                  </div>
                              <div class="mega-submenu-img">
                                  <img src="{{ asset('front_assets/images/megamenu_img.jpg')}}" alt="">
                              </div>      
                            </div>                           
                        </div>
                      </div>
                    </li>
                    <li class="has-children"><a href="javascript:void(0);">Men</a>  
                      <div class="mega-menu">
                        <div class="mega-menu-area">                         
                            <div class="mega-menu-items">                              
                              <div class="mega-submenu">
                                    <div class="mega-submenu-column">
                                      <h4 class="mega-menu-title">Men</h4>
                                      <ul class="mega-submenu-item">
                                        <li><a href="product-list.html">Dresses</a></li>
                                        <li><a href="product-list.html">Casual Shirt</a></li>
                                        <li><a href="product-list.html">Formal Shirt</a></li>
                                        <li><a href="product-list.html">Pents</a></li>
                                        <li><a href="product-list.html">Night Wear</a> </li>
                                        <li><a href="product-list.html">Home Textile</a></li>
                                        <li><a href="product-list.html">Purse</a></li>
                                      </ul>
                                    </div>
                                    <div class="mega-submenu-column">
                                      <h4 class="mega-submenu-title">Collection</h4>
                                      <ul class="mega-submenu-item">
                                        <li><a href="product-list.html">Dresses</a></li>
                                        <li><a href="product-list.html">Kurta Sets</a></li>
                                        <li><a href="product-list.html">Lehenga</a></li>
                                        <li><a href="product-list.html">Coordinated Sets</a></li>
                                        <li><a href="product-list.html">Night Wear</a> </li>
                                        <li><a href="product-list.html">Home Textile</a></li>
                                        <li><a href="product-list.html">Bags</a></li>
                                      </ul>
                                    </div>
                                    <div class="mega-submenu-column">
                                      <h4 class="mega-submenu-title">Body Type</h4>
                                      <ul class="mega-submenu-item">
                                        <li><a href="product-list.html">Dresses</a></li>
                                        <li><a href="product-list.html">Kurta Sets</a></li>
                                        <li><a href="product-list.html">Lehenga</a></li>
                                        <li><a href="product-list.html">Coordinated Sets</a></li>
                                        <li><a href="product-list.html">Night Wear</a> </li>
                                        <li><a href="product-list.html">Home Textile</a></li>
                                        <li><a href="product-list.html">Bags</a></li>
                                      </ul>
                                    </div>
                                  </div>
                              <div class="mega-submenu-img">
                                  <img src="{{ asset('front_assets/images/megamenu_img_men.jpg')}}" alt="">
                              </div>      
                            </div>                           
                        </div>
                      </div>
                    </li> 
                    <li><a href="product-list.html">Western Wear</a></li>
                    <li><a href="product-list.html">Night Wear</a></li>
                    <li><a href="product-list.html">Sale</a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--=====================================================
                                Header Section End
        =========================================================-->

    <section class="home-site-content">
      <div class="slider-section">
        <div class="slider-carousel">
          <div class="slider-item">
            <div class="slider-images">
              <img src="{{ asset('front_assets/images/slider-img6.jpg')}}" />
            </div>
          </div>
          <div class="slider-item">
            <div class="slider-images">
              <img src="{{ asset('front_assets/images/slider-img2.jpg')}}" />
            </div>
          </div>
          <div class="slider-item">
            <div class="slider-images">
              <img src="{{ asset('front_assets/images/slider-img5.jpg')}}" />
            </div>
          </div>
          <div class="slider-item">
            <div class="slider-images">
              <img src="{{ asset('front_assets/images/slider-img1.jpg')}}" />
            </div>
          </div>
          <div class="slider-item">
            <div class="slider-images">
              <img src="{{ asset('front_assets/images/slider-img4.jpg')}}" />
            </div>
          </div>
          <div class="slider-item">
            <div class="slider-images">
              <img src="{{ asset('front_assets/images/slider-img3.jpg')}}" />
            </div>
          </div>
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
                      You can perform confidently the payment. it???s 100% secure. </p>
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
                <div class="shop-offer-item col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.3">
                  <div class="shop-offer-wrap">
                    <a href="#">
                      <div class="shop-offer-image">
                        <img src="{{ asset('front_assets/images/kurti2.jpg')}}" alt="">
                      </div>
                      <div class="shop-offer-summery">
                        <h4 class="shop-offer-title">Rayon Gown Kurta</h4>
                        <p class="shop-offer-content">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod</p>
                        <button href="#" class="shop-offer-btn">Shop Now</buttona>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="shop-offer-item col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.3">
                  <div class="shop-offer-wrap">
                    <a href="#">
                      <div class="shop-offer-image">
                        <img src="{{ asset('front_assets/images/kurti9.jpg')}}" alt="">
                      </div>
                      <div class="shop-offer-summery">
                        <h4 class="shop-offer-title">Kurta Palazzo</h4>
                        <p class="shop-offer-content">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod</p>
                        <button href="#" class="shop-offer-btn">Shop Now</button>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="shop-offer-item col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.3">
                  <div class="shop-offer-wrap">
                    <a href="#">
                      <div class="shop-offer-image">
                        <img src="{{ asset('front_assets/images/kurti5.jpg')}}" alt="">
                      </div>
                      <div class="shop-offer-summery">
                        <h4 class="shop-offer-title">Frontslit Kurta</h4>
                        <p class="shop-offer-content">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod</p>
                        <button href="#" class="shop-offer-btn">Shop Now</button>
                      </div>
                    </a>
                  </div>
                </div>
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
                    <div class="product-collection-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                        <div class="product-collection-wrap">
                            <div class="product-collection-image"><a href="#">
                                    <img src="{{ asset('front_assets/images/kurti2.jpg')}}" alt="" />
                                </a>
                            </div>
                            <div class="product-collection-summery">
                                <h4 class="product-collection-title"> <a href="#">Rayon Gown Kurta</a></h4>                                                             
                            </div>
                        </div>
                    </div>
                    <div class="product-collection-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                      <div class="product-collection-wrap">
                          <div class="product-collection-image"><a href="#">
                                  <img src="{{ asset('front_assets/images/kurti4.jpg')}}" alt="" />
                              </a>
                          </div>                         
                          <div class="product-collection-summery">
                            <h4 class="product-collection-title"> <a href="#">Flared Kurta</a></h4>                                                         
                        </div>
                      </div>
                    </div>
                    <div class="product-collection-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                      <div class="product-collection-wrap">
                          <div class="product-collection-image"><a href="#">
                                  <img src="{{ asset('front_assets/images/kurti5.jpg')}}" alt="" />
                              </a>
                          </div>                         
                          <div class="product-collection-summery">
                            <h4 class="product-collection-title"> <a href="#">Frontslit Kurta</a></h4>                                                        
                        </div>
                      </div>
                    </div>
                    <div class="product-collection-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                      <div class="product-collection-wrap">
                          <div class="product-collection-image"><a href="#">
                                  <img src="{{ asset('front_assets/images/kurti9.jpg')}}" alt="" />
                              </a>
                          </div>                         
                          <div class="product-collection-summery">
                            <h4 class="product-collection-title"> <a href="#">Kurta Palazzo</a></h4>                                                         
                        </div>
                      </div>
                  </div>
                  <div class="product-collection-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                    <div class="product-collection-wrap">
                        <div class="product-collection-image"><a href="#">
                                <img src="{{ asset('front_assets/images/kurti7.jpg')}}" alt="" />
                            </a>
                        </div>                       
                        <div class="product-collection-summery">
                          <h4 class="product-collection-title"> <a href="#">Straight Kurta</a></h4>                                                       
                      </div>
                    </div>
                  </div>
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
        <div class="product-offer-item col-lg-6 col-md-6 col-sm-6  col-6">
          <div class="product-offer-image">
            <a href="#"><img src="{{ asset('front_assets/images/image-1.jpg')}}" alt=""></a>
          </div>
        </div>
         <div class="product-offer-item col-lg-6 col-md-6 col-sm-6  col-6">
          <div class="product-offer-image">
            <a href="#"><img src="{{ asset('front_assets/images/image-2.jpg')}}" alt=""></a>
          </div>
        </div>
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
            <div class="section-view-all">
              <a class="view-all" href="#">View All</a>
            </div>
        </div>
            <div class="product-wrapper">
              <div class="products with-bg-white product-carousel">
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti10.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span>                
                              <span class="old-price">???6000.00</span>                
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti8.jpg')}}" alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span> 
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti3.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span> 
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti6.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span>                
                              <span class="old-price">???6000.00</span>                
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti1.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span>                
                              <span class="old-price">???6000.00</span>                
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti6.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span>                
                              <span class="old-price">???6000.00</span>                
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
              </div>
            </div>          
        </div>   
      </div>
       <!--=====================================================
                      Product Section End
      =========================================================-->

       <div class="product-category-section section">
        <div class="container-custom">
            <div class="section-header">
                <h2 class="section-title">Shop by Category</h2>
                <div class="section-view-all">
                <div class="section-arrows">
                  <div class="arrow prev"><i class="fas fa-angle-left"></i></div>
                  <div class="arrow next"><i class="fas fa-angle-right"></i></div>
                </div>
                </div>
            </div> 
            
            <div class="product-category-wrapper">
                <div class="product-category-carousel">
                    <div class="product-category-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                        <div class="product-category-wrap">
                            <div class="product-category-image"><a href="#">
                                    <img src="{{ asset('front_assets/images/kurti2.jpg')}}" alt="" />
                                </a>
                            </div>
                            <div class="product-category-summery">
                                <h4 class="product-category-title"> <a href="#">Earrings</a></h4>
                                <div class="product-category-content">
                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="product-category-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                      <div class="product-category-wrap">
                          <div class="product-category-image"><a href="#">
                                  <img src="{{ asset('front_assets/images/kurti4.jpg')}}" alt="" />
                              </a>
                          </div>                         
                          <div class="product-category-summery">
                            <h4 class="product-category-title"> <a href="#">Rings</a></h4>
                            <div class="product-category-content">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>                               
                        </div>
                      </div>
                    </div>
                    <div class="product-category-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                      <div class="product-category-wrap">
                          <div class="product-category-image"><a href="#">
                                  <img src="{{ asset('front_assets/images/kurti5.jpg')}}" alt="" />
                              </a>
                          </div>                         
                          <div class="product-category-summery">
                            <h4 class="product-category-title"> <a href="#">Necklaces</a></h4>
                            <div class="product-category-content">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>                               
                        </div>
                      </div>
                    </div>
                    <div class="product-category-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                      <div class="product-category-wrap">
                          <div class="product-category-image"><a href="#">
                                  <img src="{{ asset('front_assets/images/kurti10.jpg')}}" alt="" />
                              </a>
                          </div>                         
                          <div class="product-category-summery">
                            <h4 class="product-category-title"> <a href="#">Mangalsutra</a></h4>
                            <div class="product-category-content">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>                               
                        </div>
                      </div>
                  </div>
                  <div class="product-category-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                    <div class="product-category-wrap">
                        <div class="product-category-image"><a href="#">
                                <img src="{{ asset('front_assets/images/kurti6.jpg')}}" alt="" />
                            </a>
                        </div>                       
                        <div class="product-category-summery">
                          <h4 class="product-category-title"> <a href="#">Bangles</a></h4>
                          <div class="product-category-content">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                          </div>                               
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
      </div>
      <!--=====================================================
                      Product Category Section End
      =========================================================-->

      <div class="product-section section">
        <div class="container-custom">
          <div class="content-box">
            <div class="section-header">
                <h2 class="section-title">New Arrivals</h2>
                <p class="section-description">Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas</p>
                <div class="section-view-all">
                  <a class="view-all" href="#">View All</a>
                </div>
            </div>
            <div class="product-wrapper">
              <div class="products product-carousel">
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti2.jpg')}}" alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span>                
                              <span class="old-price">???6000.00</span>                
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti4.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span> 
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti5.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span> 
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti10.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span>                
                              <span class="old-price">???6000.00</span>                
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti6.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span>                
                              <span class="old-price">???6000.00</span>                
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti9.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span>                
                              <span class="old-price">???6000.00</span>                
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
       <!--=====================================================
                      Product Section End
      =========================================================-->
        <!--<div class="shop-offer-section section">-->
        <!--  <div class="container-custom">-->
        <!--    <div class="shop-offer-wrapper">-->
        <!--      <div class="row shop-offer-row">-->
        <!--        <div class="shop-offer-item col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.3">-->
        <!--          <div class="shop-offer-wrap">-->
        <!--            <a href="#">-->
        <!--              <div class="shop-offer-image">-->
        <!--                <img src="images/kurti2.jpg" alt="">-->
        <!--              </div>-->
        <!--              <div class="shop-offer-summery">-->
        <!--                <h4 class="shop-offer-title">Rayon Gown Kurta</h4>-->
        <!--                <p class="shop-offer-content">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod</p>-->
        <!--                <button href="#" class="shop-offer-btn">Shop Now</buttona>-->
        <!--              </div>-->
        <!--            </a>-->
        <!--          </div>-->
        <!--        </div>-->
        <!--        <div class="shop-offer-item col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.3">-->
        <!--          <div class="shop-offer-wrap">-->
        <!--            <a href="#">-->
        <!--              <div class="shop-offer-image">-->
        <!--                <img src="images/kurti9.jpg" alt="">-->
        <!--              </div>-->
        <!--              <div class="shop-offer-summery">-->
        <!--                <h4 class="shop-offer-title">Kurta Palazzo</h4>-->
        <!--                <p class="shop-offer-content">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod</p>-->
        <!--                <button href="#" class="shop-offer-btn">Shop Now</button>-->
        <!--              </div>-->
        <!--            </a>-->
        <!--          </div>-->
        <!--        </div>-->
        <!--        <div class="shop-offer-item col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.3">-->
        <!--          <div class="shop-offer-wrap">-->
        <!--            <a href="#">-->
        <!--              <div class="shop-offer-image">-->
        <!--                <img src="images/kurti5.jpg" alt="">-->
        <!--              </div>-->
        <!--              <div class="shop-offer-summery">-->
        <!--                <h4 class="shop-offer-title">Frontslit Kurta</h4>-->
        <!--                <p class="shop-offer-content">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod</p>-->
        <!--                <button href="#" class="shop-offer-btn">Shop Now</button>-->
        <!--              </div>-->
        <!--            </a>-->
        <!--          </div>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
           <!--=====================================================
                      Shop Section End
      =========================================================-->

        <div class="product-section section">
          <div class="container-custom">           
            <div class="section-header">
                <h2 class="section-title">Deal Of The Day</h2>
                <p class="section-description">Designs according to your requirements</p>
                <div class="section-view-all">
                  <a class="view-all" href="#">View All</a>
                </div>
            </div>
            <div class="product-wrapper">
              <div class="products with-bg-white product-carousel">
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti1.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span>                
                              <span class="old-price">???6000.00</span>                
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti2.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span> 
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti3.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span> 
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti4.jpg')}}" alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span>                
                              <span class="old-price">???6000.00</span>                
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti5.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span>                
                              <span class="old-price">???6000.00</span>                
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti6.jpg')}}"  alt="">
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
                              <a href="#" >Women Printed Cotton A-line Kurta</a>
                          </h3>           
                          <div class="product-price">
                              <span class="new-price">???4100.00</span>                
                              <span class="old-price">???6000.00</span>                
                          </div> 
                      </div>
                  </div>
                </div>
                <!-- product-item -->
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
                    <img src="{{ asset('front_assets/images/adv1.jpg')}}" alt="">
                  </div>                  
                </a>
              </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
              <div class="content-box">
                <div class="section-header">
                    <h2 class="section-title">Mint Meena Earrings</h2>
                    <p class="section-description">Glamorous earrings that???ll elevate your festive outfits</p>
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
                                  <img src="{{ asset('front_assets/images/1.jpg')}}"  alt="">
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
                                  <span class="new-price">???4100.00</span>                
                                  <span class="old-price">???6000.00</span>                
                              </div> 
                          </div>
                      </div>
                    </div>
                    <!-- product-item -->
                    <div class="product-item animate__animated animate__fadeInUp">
                      <div class="product-wrap">
                          <div class="product-image">
                              <a class="pro-img" href="#">
                                  <img src="{{ asset('front_assets/images/2.jpg')}}"  alt="">
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
                                  <span class="new-price">???4100.00</span> 
                              </div> 
                          </div>
                      </div>
                    </div>
                    <!-- product-item -->
                    <div class="product-item animate__animated animate__fadeInUp">
                      <div class="product-wrap">
                          <div class="product-image">
                              <a class="pro-img" href="#">
                                  <img src="{{ asset('front_assets/images/3.jpg')}}" alt="">
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
                                  <span class="new-price">???4100.00</span> 
                              </div> 
                          </div>
                      </div>
                    </div>
                    <!-- product-item -->
                    <div class="product-item animate__animated animate__fadeInUp">
                      <div class="product-wrap">
                          <div class="product-image">
                              <a class="pro-img" href="#">
                                  <img src="{{ asset('front_assets/images/4.jpg')}}"  alt="">
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
                                  <span class="new-price">???4100.00</span>                
                                  <span class="old-price">???6000.00</span>                
                              </div> 
                          </div>
                      </div>
                    </div>
                    <!-- product-item -->
                    <div class="product-item animate__animated animate__fadeInUp">
                      <div class="product-wrap">
                          <div class="product-image">
                              <a class="pro-img" href="#">
                                  <img src="{{ asset('front_assets/images/5.jpg')}}"  alt="">
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
                                  <span class="new-price">???4100.00</span>                
                                  <span class="old-price">???6000.00</span>                
                              </div> 
                          </div>
                      </div>
                    </div>
                    <!-- product-item -->
                    <div class="product-item animate__animated animate__fadeInUp">
                      <div class="product-wrap">
                          <div class="product-image">
                              <a class="pro-img" href="#">
                                  <img src="{{ asset('front_assets/images/6.jpg')}}"  alt="">
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
                                  <span class="new-price">???4100.00</span>                
                                  <span class="old-price">???6000.00</span>                
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
          <div class="testimonial-item">
            <div class="testimonial-wrap">
              <div class="testimonial-content">
                <div class="testimonial-quote"><i class="fa fa-quote-left"></i></div>
                <p>
                  you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.
                </p>
              </div>
              <div class="testimonail-image-title">
                <div class="testimonial-image">
                  <img src="{{ asset('front_assets/images/testimonial-img-1.png')}}" alt="">
                </div>
                <div class="testimonial-title-wrap">
                  <h4 class="testimonial-title"> -  Mark Jecno</h4>  
                  <p class="testimonial-meta">Designer</p>
                </div>
              </div>
            </div>
          </div> 
          <!-- testimonial-item -->
          <div class="testimonial-item">
            <div class="testimonial-wrap">
              <div class="testimonial-content">
                <div class="testimonial-quote"><i class="fa fa-quote-left"></i></div>
                <p>
                  you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.
                </p>
              </div>
              <div class="testimonail-image-title">
                <div class="testimonial-image">
                  <img src="{{ asset('front_assets/images/testimonial-img-2.jpg')}}" alt="">
                </div>
                <div class="testimonial-title-wrap">
                  <h4 class="testimonial-title"> -  Mark Jecno</h4>  
                  <p class="testimonial-meta">Designer</p>
                </div>
              </div>
            </div>
          </div> 
          <!-- testimonial-item -->
          <div class="testimonial-item">
            <div class="testimonial-wrap">
              <div class="testimonial-content">
                <div class="testimonial-quote"><i class="fa fa-quote-left"></i></div>
                <p>
                  you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.
                </p>
              </div>
              <div class="testimonail-image-title">
                <div class="testimonial-image">
                  <img src="images/testimonial-img-1.png" alt="">
                </div>
                <div class="testimonial-title-wrap">
                  <h4 class="testimonial-title"> -  Mark Jecno</h4>  
                  <p class="testimonial-meta">Designer</p>
                </div>
              </div>
            </div>
          </div> 
          <!-- testimonial-item -->
          <div class="testimonial-item">
            <div class="testimonial-wrap">
              <div class="testimonial-content">
                <div class="testimonial-quote"><i class="fa fa-quote-left"></i></div>
                <p>
                  you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.
                </p>
              </div>
              <div class="testimonail-image-title">
                <div class="testimonial-image">
                  <img src="{{ asset('front_assets/images/testimonial-img-2.jpg')}}" alt="">
                </div>
                <div class="testimonial-title-wrap">
                  <h4 class="testimonial-title"> -  Mark Jecno</h4>  
                  <p class="testimonial-meta">Designer</p>
                </div>
              </div>
            </div>
          </div> 
          <!-- testimonial-item -->
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
      
    <!--  <div class="testimonial-section section"> -->
 
    <!--    <div class="row mx-auto my-auto">-->
    <!--    <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">-->
    <!--        <div class="carousel-inner w-100" role="listbox">-->
    <!--            <div class="carousel-item active">-->
    <!--                <img class="d-block col-3 img-fluid" src="images/kurti5.jpg" alt="">-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img class="d-block col-3 img-fluid" src="images/kurti2.jpg" alt="">-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img class="d-block col-3 img-fluid" src="images/kurti3.jpg" alt="">-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img class="d-block col-3 img-fluid" src="images/kurti1.jpg" alt="">-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img class="d-block col-3 img-fluid" src="images/kurti2.jpg" alt="">-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img class="d-block col-3 img-fluid" src="images/kurti8.jpg" alt="">-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">-->
    <!--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
    <!--            <span class="sr-only">Previous</span>-->
    <!--        </a>-->
    <!--        <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">-->
    <!--            <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
    <!--            <span class="sr-only">Next</span>-->
    <!--        </a>-->
    <!--    </div>-->
    <!--</div>-->
 
    <!--  </div>-->
    
    <div class="product-section section">
        <div class="container-custom">
            <div class="product-wrapper">
              <div class="products with-bg-white product-carousel">
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti10.jpg')}}"  alt="">
                          </a>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti8.jpg')}}"  alt="">
                          </a>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti3.jpg')}}"  alt="">
                          </a>                          
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti6.jpg')}}" alt="">
                          </a>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti1.jpg')}}"  alt="">
                          </a>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{ asset('front_assets/images/kurti6.jpg')}}"  alt="">
                          </a>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
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
                      You can perform confidently the payment. it???s 100% secure. </p>
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
                      <form method="post" data-id="106">
                          <div class="mc4wp-form-fields">
                              <div class="newsletter-off">                                  
                                  <div class="newsletter-form">
                                      <p class="newsletter-input">
                                          <input type="email" name="EMAIL" placeholder="Your email address" required />
                                      </p>
                                      <p class="newsletter-submit">
                                          <input class="btn btn-secondary" type="submit" value="Subscribe" />
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
                        <li><a href="about.html">About Us</a></li>                        
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                        <li><a href="faqs.html">FAQ</a></li>                       
                        <li><a href="#">Stock Clearance Sale</a></li> 
                        <li><a href="#">The Green Store</a></li> 
                        <li><a href="#">Traditional Jaipuri Jewellery </a></li> 
                        <li><a href="#">Packing Process</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="footer-column footer-2 col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.5s">
                  <div class="footer-widget">
                    <h4 class="footer-widget-title">Information</h4>
                    <div class="menu-about-container">
                      <ul id="menu-about" class="">  
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>                        
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Shipping Policy</a></li>
                        <li><a href="#">Cancellation & Return Policy</a></li>
                        <li><a href="#">Payment Policy</a></li>
                        <li><a href="#">Dispute Resolution</a></li>
                        <li><a href="#">Genuine Quality product</a></li> 
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="footer-column footer-2  col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.7s">
                  <div class="footer-widget widget_nav_menu">
                    <h4 class="footer-widget-title">My Account</h4>
                    <div class="menu-my-account-container">
                      <ul id="menu-my-account" class="">
                        <li><a href="signin.html">Login/Signup</a></li>                       
                        <li><a href="my-account.html">My account</a></li>
                        <li><a href="my-account.html">My account</a></li>
                        <li><a href="my-orders.html">Orders</a></li>
                        <li><a href="my-wishlist.html">Wishlist</a></li>
                        <li><a href="#">Reward Program</a></li>
                        <li><a href="#">Bulk Buy </a></li> 
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="footer-column footer-1 col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn"  data-wow-delay="0.9s">
                  <div class="footer-widget">
                    <div class="footer-social">
                      <h4 class="footer-widget-title">Follow Us</h4>
                      <ul class="footer-social-icon">
                        <li class="facebook"><a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="instagram"><a target="_blank" href="#"><i class="fab fa-instagram"></i></a></li>
                        <li class="pinterest"><a target="_blank" href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li class="twitter"><a target="_blank" href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="youtube"><a target="_blank" href="#"><i class="fab fa-youtube"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="footer-payment-widget footer-widget">
                    <h4 class="footer-widget-title">Payment Options</h4>
                    <div class="">
                      <img src="{{ asset('front_assets/images/card-image.png')}}" alt="">
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
                    <li><a href="#">Disclaimer Policy </a></li>   
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Site Map </a></li>   
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
    <!-- <div id="loader" class="loader"></div> -->
    <!--<div class="whatsapp-call">-->
    <!--  <div class="d-none d-md-block">-->
    <!--    <a target="_blank" href="https://web.whatsapp.com/send?phone=+91123456789&amp;text=Hi, I had some queries."-->
    <!--      class="whatsapp"> <i class="fab fa-whatsapp"></i></a>-->
    <!--  </div>-->
      
    <!--  <div class="d-md-none">-->
    <!--    <a target="_blank" href="https://api.whatsapp.com/send?phone=+91123456789&amp;text=Hi, I had some queries."-->
    <!--      class="whatsapp"> <i class="fab fa-whatsapp"></i> </a>-->
    <!--  </div>-->
    <!--</div>-->
    
    
    <div class="msg-call">
      <nav class="menu">
  <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open"/>
  <label class="menu-open-button" for="menu-open">
    <i class="far fa-comment-dots"></i>
  </label>
  
  <a target="_blank" href="https://wa.me/917737384209/?text=Hello Myazakurties" class="menu-item"> <i class="fab fa-whatsapp"></i> </a>
  <a target="_blank" href="mailto:info@myazakurties.com" class="menu-item"> <i class="fa fa-envelope"></i> </a>
  <a target="_blank" href="tel:0773738420" class="menu-item"> <i class="fa fa-phone-alt"></i> </a>
  

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
    <div class="modal fade loginregister-modal" id="loginregister" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered" role="document">
          <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <div class="modal-body">
                  <div class="modal-login loginregister-area">
                      <div class="loginregister-header">
                          <h3>Sign in</h3>
                          <p>Enter your email address to sign in.</p>
                      </div>
                      <div class="loginregister-body">
                          <form action="">
                              <div class="form-group">
                                  <label for="email">Email address</label>
                                  <input type="email" class="form-control" id="email" placeholder="Enter email">
                              </div>
                              <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password" class="form-control" id="password" placeholder="Password">
                              </div>
                              <div class="form-forgot-pass">
                                  <a href="forget-password.html" class="forgot-pass">Forgot Password?</a>
                              </div>
                              <div class="form-submit">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                          </form>
  
                          <div class="login-social">
                              <p class="login-social-title"><strong> OR SIGN IN USING </strong></p>
                              <div class="social">
                                  <ul class="social-icon">
                                      <li class="facebook"><a target="_blank" href="#"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
                                      <li class="google"><a target="_blank" href="#"><i class="fab fa-google"></i><span>Google</span></a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="loginregister-now">
                              <h4>Do not have an account?</h4>
                              <a href="#" class="account-link register">Sign Up?</a>
                          </div>
                      </div>
                  </div>
                  <div class="modal-register d-none loginregister-area">
                      <div class="loginregister-header">
                          <h3>Signup</h3>
                          <p>Create an account to latest Update.</p>
                      </div>
                      <div class="loginregister-body">
                          <form action="">
                              <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control" id="name" placeholder="Name">
                              </div>
                              <div class="form-group">
                                  <label for="email">Email address</label>
                                  <input type="email" class="form-control" id="email" placeholder="Enter email">
                              </div>
                              <div class="form-group">
                                  <label for="phone_number">Phone Number</label>
                                  <input type="tel" class="form-control" id="phone_number" placeholder="Phone Number">
                              </div>
                              <div class="form-group">
                                <label for="phone_number">Referal Code</label>
                                <input type="text" class="form-control" id="referal" placeholder="Referal Code">
                              </div>
                              <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password" class="form-control" id="passwordfiled" placeholder="Password">
                                  <span toggle="#passwordfiled" class="fa fa-eye toggle-password"></span>
                              </div>
                              <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="confirm_password" placeholder="Conform Password">
                                <span toggle="#confirm_password" class="fa fa-eye toggle-password"></span>
                              </div>                          
                              <div class="form-submit">
                                  <button type="submit" class="btn btn-primary">Create an account</button>
                              </div>
                          </form>
                          <div class="login-social">
                              <p class="login-social-title"><strong> OR SIGN IN USING </strong></p>
                              <div class="social">
                                  <ul class="social-icon">
                                      <li class="facebook"><a target="_blank" href="#"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
                                      <li class="google"><a target="_blank" href="#"><i class="fab fa-google"></i><span>Google</span></a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="loginregister-now">
                              <h4>Already have an account?</h4>
                              <a href="#" class="account-link login">Sign in?</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- modal -->   
  </div>
  <!-- Wrapper -->
  <!-- Scripts FIle-->
  <script type="text/javascript" src="{{ asset('front_assets/js/wow.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('front_assets/js/jquery-ui.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('front_assets/js/fancybox.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('front_assets/js/slick.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('front_assets/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('front_assets/js/function.js')}}"></script>
 
 
 <script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
 <div id="myModal" class="modal welcome_img fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
				<img src="{{ asset('front_assets/images/welcome_img.jpg')}}" alt="">
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