<?php
$sizecount = \App\Models\Setting::where('id', 1)->first();
$parents = \App\Models\Category::where('parent_id', 0)
    ->where('is_menu', 1)
    ->where('status', 1)
    ->get();
$htext = \App\Models\Htext::whereStatus('1')
    ->latest()
    ->limit(4)
    ->get();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('file/' . $sizecount->favicon)); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(asset('file/' . $sizecount->favicon)); ?>" type="image/x-icon">
    <title><?php echo e($sizecount->company_name); ?></title>
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- CSS FIle-->
    <link rel="stylesheet" href="<?php echo e(asset('frontend-view/css/fontawesome.min.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('frontend-view/css/jquery-ui.min.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('frontend-view/css/animate.min.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('frontend-view/css/fancybox.min.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('frontend-view/css/slick.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('frontend-view/css/bootstrap.min.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('frontend-view/css/style.css')); ?>" type="text/css" />
    <!--<link rel="stylesheet" href="<?php echo e(asset('frontend-view/css/xzoom.css')); ?>" type="text/css" />-->
    <link rel="stylesheet" href="<?php echo e(asset('frontend-view/css/responsive.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('frontend-view/css/jssocials.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('frontend-view/css/jssocials-theme-classic.css')); ?>" type="text/css" />
    <!-- Js Library -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="<?php echo e(asset('frontend-view/js/jquery.elevatezoom.js')); ?>"></script>
    <style>
        #cover-spin {
            position: fixed;
            width: 100%;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.6);
            z-index: 9999;
            display: none;
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes  spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        #cover-spin::after {
            content: '';
            display: block;
            position: absolute;
            left: 48%;
            top: 40%;
            width: 40px;
            height: 40px;
            border-style: solid;
            border-color: #004e96;
            border-top-color: transparent;
            border-width: 4px;
            border-radius: 50%;
            -webkit-animation: spin .8s linear infinite;
            animation: spin .8s linear infinite;
        }

        .miniNoty {
            position: fixed;
            right: 10px;
            top: -10px;
            padding: 10px 15px;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            max-width: 300px;
            min-width: 200px;
            opacity: 0;
            z-index: 101;
            -webkit-transform: scale(1, 0);
            -moz-transform: scale(1, 0);
            -o-transform: scale(1, 0);
            -ms-transform: scale(1, 0);
            transform: scale(1, 0);
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s;
        }

        .miniNoty-show {
            top: 10px;
            opacity: 1;
            -webkit-transform: scale(1, 1);
            -moz-transform: scale(1, 1);
            -o-transform: scale(1, 1);
            -ms-transform: scale(1, 1);
            transform: scale(1, 1);
            z-index: 9999999;
        }

        .miniNoty-success {
            background: mediumseagreen;
            box-shadow: 0 2px 5px mediumseagreen;
        }

        .miniNoty-error {
            background: indianred;
            box-shadow: 0 2px 5px indianred;
        }

        .miniNoty-normal {
            background: lightgrey;
            box-shadow: 0 2px 5px lightgrey;
            color: #000;
        }

        .miniNoty-warning {
            background: goldenrod;
            box-shadow: 0 2px 5px goldenrod;
        }

    </style>
</head>

<body>
    <div id="cover-spin" style="display: none;"></div>
    <script>
        var overlay = $('#cover-spin');
    </script>
    <header class="header-section">
        <div class="header fixed">
            <div class="header-top">
                <div class="container-custom">
                    <div class="header-top-inner">
                        <div class="row">
                            <div class="header-top-left col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="header-announcement">
                                    <div class="header-announcement-carousel">
                                        <?php foreach($htext as $t){?>
                                        <marquee direction="left">
                                            <p class="announcement-item"><a href="#"><?php echo $t->text; ?></a></p>
                                        </marquee>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="header-top-right col-lg-6 col-md-6 col-sm-12 col-12">
                                <ul class="header-nav">
                                    <li><a href="<?php echo e(url('about')); ?>">About Us</a></li>
                                    <li><a href="<?php echo e(url('contact-us')); ?>">Contact Us</a></li>
                                    <!-- <li>
                      <div class="header-currency">
                        <form method="post" action="" class="currency-switcher-form">
                          <input type="hidden" name="currency-switcher" value="INR">
                          <select name="currency-switcher" data-width="100%" class="currency-switcher"
                            onchange="woocs_redirect(this.value); void(0);">
                            <option class="USD" value="USD">$ USD</option>
                            <option class="INR" value="INR" selected="selected">₹ INR</option>
                          </select>
                        </form>
                      </div>
                    </li> -->
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
                            <a class="logo-link" href="<?php echo e(url('/')); ?>"><img class="logo"
                                    src="<?php echo e(asset('file/' . $sizecount->logo)); ?>" alt="logo"></a>
                        </div>
                        <div class="header-search">
                            <div class="searchForm">
                                <form action="" method="get">
                                    <input type="text" name="s" class="search-input" placeholder="Search Products">
                                    <button class="btn btn-primary searchicon" id="searchbutton" type="button"><i
                                            class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="header-shop-menu">
                            <ul class="header-shop-link">
                                <li class="d-block d-md-none"><a class="search-icon" href="javascript:void(0);">
                                        <span class="shop-icon">
                                            <svg class="desktop-icon" viewBox="-3 -3 23 23" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g stroke-width="2">
                                                    <polygon
                                                        points="18.7071068 17.2928932 17.2928932 18.7071068 12.7628932 14.1771068 14.1771068 12.7628932">
                                                    </polygon>
                                                    <path
                                                        d="M8,16 C3.581722,16 0,12.418278 0,8 C0,3.581722 3.581722,0 8,0 C12.418278,0 16,3.581722 16,8 C16,12.418278 12.418278,16 8,16 Z M8,14 C11.3137085,14 14,11.3137085 14,8 C14,4.6862915 11.3137085,2 8,2 C4.6862915,2 2,4.6862915 2,8 C2,11.3137085 4.6862915,14 8,14 Z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="search-wrapper"> <a href="javascript:void(0);"
                                            class="search-cancel">Cancel</a>
                                        <div class="searchForm">
                                            <form action="" method="get">
                                                <input type="search" name="s" class="serach-input"
                                                    placeholder="Search Products">
                                                <button class="btn btn-primary searchicon" type="submit"><i
                                                        class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <?php if(!Auth::user()): ?>
                                    <li class="acoount-icon">
                                        <a class="account-toggle" href="<?php echo e(url('login')); ?>">
                                            <span class="shop-icon">
                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve">
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
                                                </svg>
                                            </span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Auth::user()): ?>
                                    <li class="acoount-icon dropdown">
                                        <a class="account-toggle" href="<?php echo e(route('user.dashboard')); ?>">
                                            <span class="shop-icon">
                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 512 512" xml:space="preserve">
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
                                        <ul class="login_user">
                                            <li class="login_user_title"><a
                                                    href="<?php echo e(url('account/profile')); ?>"><?php echo e(auth()->user()->name); ?><span></span></a>
                                            </li>
                                            <li><a href="<?php echo e(url('account/profile')); ?>">My Account</a></li>
                                            <li><a href="<?php echo e(url('account/orders')); ?>">Orders</a></li>
                                            <li><a href="<?php echo e(url('account/wishlist')); ?>">Wishlist</a></li>
                                            <li><a href="<?php echo e(url('store/logout')); ?>">Logout</a></li>
                                            
                                        </ul>
                                    </li>
                                <?php endif; ?>
                                <li class="shoping-icon">
                                    <?php if(!Auth::user()): ?>
                                        <a href="<?php echo e(url('login')); ?>">
                                            <span class="shop-icon"><svg viewBox="0 -28 512.001 512"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0" />
                                                </svg><span class="shop-number wishlist-number ">0</span></span> </a>
                                    <?php endif; ?>
                                    <?php if(Auth::user()): ?>
                                        <a href="<?php echo e(url('account/wishlist')); ?>">
                                            <span class="shop-icon"><svg viewBox="0 -28 512.001 512"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0" />
                                                </svg><span class="shop-number wishlist-number ">0</span></span> </a>
                                    <?php endif; ?>
                                </li>
                                <li class="cart-menu dropdown">
                                    <a href="<?php echo e(url('cart')); ?>" title="View your shopping cart"
                                        class="cart-contents">
                                        <span class="cart-icon">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 511.997 511.997"
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
                                                <span class="sidebar-cart-items"></span>
                                                <p class="mini-cart-buttons">
                                                    <a href="<?php echo e(url('cart')); ?>" class="button">View cart</a>
                                                    <a href="<?php echo e(route('checkout')); ?>"
                                                        class="button checkout">Checkout</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbar" aria-controls="navbar" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <i class="fa fa-align-right"></i>
                                    </button>
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
                                    <?php foreach($parents as $parent){ 
                      $child = \App\Models\Category::where('parent_id',$parent->id)->where('is_menu',1)->where('status',1); 
                     
                    ?>
                                    <li class="<?php echo $child->count() > 0 ? 'has-children' : ''; ?>">
                                        <a href="<?php echo url('/' . $parent->slug); ?>"><?php echo $parent->name; ?></a>
                                        <?php if($child->count()>0){ ?>
                                        <div class="mega-menu">
                                            <div class="mega-menu-area">
                                                <div class="mega-menu-items">
                                                    <div class="mega-submenu">
                                                        <div class="mega-submenu-column">
                                                            <ul class="mega-submenu-item">
                                                                <?php foreach($child->get() as $k=>$chi){ ?>
                                                                <?php if($k>0 && $k%8==0){ ?>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-submenu-column">
                                                            <ul class="mega-submenu-item">
                                                                <?php } ?>
                                                                <li><a
                                                                        href="<?php echo url('/' . $chi->slug); ?>"><?php echo $chi->name; ?></a>
                                                                </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="mega-submenu-img">
                                                        <img src="https://myazatrendz.com/frontend-view/images/megamenu_img.jpg"
                                                            alt="megamenu_img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php /**PATH D:\xampp\htdocs\myazatrendz\resources\views/frontend-view/includes/header.blade.php ENDPATH**/ ?>