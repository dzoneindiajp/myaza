<div class="sidebar-section col-md-3 col-sm-12 col-12">              
    <ul class="sidebar-account-menu">
      <li class="<?php echo e(Request::segment(2) == 'dashboard' ? 'active' : ''); ?>"><a href="<?php echo e(route('user.dashboard')); ?>"> <i class="fas fa-user"></i>My Account</a></li>
      <li  class="<?php echo e(Request::segment(2) == 'profile' ? 'active' : ''); ?>"><a href="<?php echo e(route('user.profile')); ?>"> <i class="fas fa-user"></i>My Profile</a></li>
      <!-- <li><a href="<?php echo e(route('user.orders')); ?>"> <i class="fas fa-address-book"></i>My Address</a></li> -->
      <li class="<?php echo e(Request::segment(2) == 'orders' ? 'active' : ''); ?>"><a href="<?php echo e(route('user.orders')); ?>"> <i class="fas fa-shopping-basket"></i>My Orders</a></li>
      <li class="<?php echo e(Request::segment(2) == 'wishlist' ? 'active' : ''); ?>"><a href="<?php echo e(route('user.wishlist')); ?>"> <i class="far fa-heart"></i>My Wishlist</a></li>
      <li class="<?php echo e(Request::segment(2) == 'referal' ? 'active' : ''); ?>"><a href="#"> <i class="far fa-heart"></i>My Referal</a></li> 
       <li class="<?php echo e(Request::segment(2) == 'wallet' ? 'active' : ''); ?>"><a href="#"> <i class="far fa-heart"></i>My Wallet</a></li> 
      
      <li><a class="logout" href="<?php echo e(route('user.logout')); ?>"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
    </ul>
  </div><?php /**PATH D:\xampp\htdocs\myaza\resources\views/store/orders/sidebar.blade.php ENDPATH**/ ?>