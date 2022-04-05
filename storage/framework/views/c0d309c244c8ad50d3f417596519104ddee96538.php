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
                  <li class="breadcrumb-item trail-begin"><a href="<?php echo e(url('/')); ?>" rel="home"><span
                        itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">Cart</span></li>
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
            <h1 class="page-title">Cart</h1>
          </div>
          <div class="row">
            <div class="content-area col-12">
              <div class="content-section">
                <div class="row">
                    <?php if($isEmpty){ ?>
                    <div class="col-12" >
                      <img src="<?php echo e(asset('frontend-view/images/empty-cart.jpg')); ?>" style="width:100%">
                    </div>
                    <?php } ?>
                    <?php if(!$isEmpty){ ?>
                  <div class="col-lg-8 col-md-8 col-12">
                    <div class="cart-form-wrapper">
                      <!-- <div class="alert alert-warning" role="alert">
                        Minimum Order Amount is ₹1000.00
                      </div>
                      <div class="alert alert-success" role="alert">
                        Checkout now and earn <strong>170 Reward Points </strong>for this order
                      </div> -->
                      
                        <div class="cart-items" id="cart_group">
                          
                        <?php foreach($carts as $rt){ $url = url('/').'/'.$rt->attributes->slug;$image = asset('file').'/'.$rt->attributes->image; ?>
                          <?php $inw = (Auth::check())?\App\Models\Wishlist::where('variation_id',$rt->attributes->variation_id)->where('product_id',$rt->attributes->product_id)->where('user_id',Auth::user()->id)->count():0; ?>
                          <div class="cart-item">
                            <div class="cart-wrap">
                              <div class="cart-image">
                                <a href="<?php echo e($url); ?>"><img src="<?php echo e($image); ?>"></a>
                              </div>
                              <div class="cart-desc">
                                <p class="cart-title"><a href="<?php echo e($url); ?>"><?php echo e($rt->name); ?></a></p>
                                <p class="cart-meta"><span>Product Code : <?php echo e($rt->attributes->sku_code); ?></span></p>
                                <p class="cart-price price">
                                  <span class="new-price">₹<?php echo e($rt->price); ?></span>
                                </p>
                                <div class="cart-quantity">
                                  <div class="quantity-group">
                                    <a href="javascript:void(0)" class="dec qty-btn"></a>
                                    <input type="text" id="quantity" class="input-text qty" name="quantity" value="<?php echo e($rt->quantity); ?>"
                                      maxlength="<?php echo e($rt->attributes->max_quantity); ?>">
                                    <a href="javascript:void(0)" class="inc qty-btn"></a>
                                  </div>
                                  <p class="cart-subtotal"><span class="price">₹<?php echo e($rt->price*$rt->quantity); ?></span></p>
                                </div>
                                <label class="my-1">Coupons : </label>
                                <div class="cart-coupons mt-3 mb-2">
                                  <?php foreach($rt->attributes->coupons as $k=>$cou){ ?>
                                    <div onclick="myFunction('<?php echo $cou->code; ?>',1)" class="d-inline btn btn-outline-danger rounded<?php echo ($k>0)?'ml-1':'' ;?>"><?php echo $cou->code; ?></div>
                                  <?php } ?>
                                </div>
                              </div>
                              <div class="cart-action">
                                <div class="cart-action-button">
                                  <a href="javascript:void(0)" class="add-to-wishlist" onclick="doCartToWishlist($(this),'<?php echo $rt->attributes->variation_id; ?>','<?php echo $rt->attributes->product_id ; ?>')"  tabindex="-1">
                                    
                                    <i class="<?php echo ($inw == 1)?'fas':'far'; ?> fa-heart"></i>
                                    <span>Add to Wishlist</span>
                                  </a>
                                    <a href="javascript:void(0)" class="remove-item" title="Remove this item" onclick="removeItemFromSidebar($(this))" data-product_id="<?php echo e($rt->id); ?>"><i
                                      class="far fa-trash-alt"></i><span>Remove</span></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        </div>
                        <div class="cart-update">
                          <div class="cart-continue-shopping ">
                            <a  href="<?php echo e(url('/')); ?>" class="btn btn-outline-primary">Continue Shopping </a>
                          </div>
                          <!-- <div class="cart-update-btn">
                            <button type="submit" class="btn btn-primary">Cart2PDF</button>
                            <button type="submit" name="update_cart_action" value="update_qty" class="btn btn-primary action update">Update Shopping Cart</button>
                        </div> -->
                        </div>
                      
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-12">
                    <div class="cart-collaterals">
                    
                      <!-- <div class="reward-points">
                        <h5>Use Reward Points</h5>
                        <div class="custom-control custom-checkbox reward-points-group">
                          <input type="checkbox" class="custom-control-input" id="reward_points">
                          <label class="custom-control-label" for="reward_points"> ₹100.00</label>
                        </div>                        
                      </div> -->
                      <div class="cart-totals">
                        <h2>Cart totals</h2>
                        <div class="cart-totals-table">
                          <table class="shop-table" cellspacing="0">
                            <tbody>
                              <tr class="cart-subtotal">
                                <th>Base Value</th>
                                <td data-title="Base Value"> <span class="price subtotal-all">₹<?php echo $total ; ?></span> </td>
                              </tr>
                              
                              <tr class="tax-totals tax">
                                <th>GST</th>
                                <td data-title="GST" id="total_tax">₹<?php echo number_format($tax,2) ; ?></td>
                              </tr>
                              <tr class="order-total">
                                <th>Total</th>
                                <td data-title="Total"><strong><span class="price">₹<?php echo $grandTotal  ; ?></span></strong> </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="proceed-to-checkout">
                        <?php if(Auth::check()){ ?>
                            <a href="<?php echo e(route('checkout')); ?>" class="checkout-button button"> Proceed to checkout</a>
                          <?php }else{ ?>
                            <a href="<?php echo e(url('login')); ?>" class="checkout-button button"> Proceed to checkout</a>
                          <?php }?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <!--content-area-->
          </div>
          <!--row-->
        </div>
        <!--content-wrapper -->
      </div>
      <!--container-->
    </section>
    <!--=====================================================
                         Site Section End
    =========================================================-->
    <div class="modal fade" id="couponcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog couponcode-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="border-bottom:none;">
         <h5 class="modal-title" id="exampleModalLabel">Available Coupons</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body coupon-code-model">
         <div class="col-md-12 mt-4">
            <ul class="list-group">
              <?php foreach($coupons as $acou){ ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $acou->coupon_name; ?>
                <span class="btn btn btn-outline-danger" onclick="myFunction('<?php echo $acou->code; ?>',0)"><?php echo $acou->code; ?></span>
                </li>
              <?php } ?>
            </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Coupon code Modal start  -->
<script>
function myFunction(value,y) {
    navigator.clipboard.writeText(value);
    notifyme('success','Coupon copied');
} 
  function doCartToWishlist(b,vid,pid){
        $('#cover-spin').show(0);
        $.post("<?php echo e(url('wishlist')); ?>",{"_token": "<?php echo e(csrf_token()); ?>",'product_id':pid,'variation_id':vid},function(v){
            $('#cover-spin').hide(0);
            if(v.success){
                b.html('<i class="fas fa-heart"></i><span>Add to  Wishlist</span>');
                notifyme('success',v.message);
            }else{
                notifyme('error',v.message);
            }
            getwishlist();
        });
    }


</script>
<?php echo $__env->make('frontend-view.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myaza\resources\views/store/cart/index.blade.php ENDPATH**/ ?>