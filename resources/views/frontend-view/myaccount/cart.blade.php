@include('frontend-view.includes.header')
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
                    {{--indexx  --}}
                  <li class="breadcrumb-item trail-begin"><a href="{{ url('/') }}" rel="home"><span
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
                  <div class="col-lg-8 col-md-8 col-12">
                    <div class="cart-form-wrapper">
                      <div class="alert alert-warning" role="alert">
                        Minimum Order Amount is ₹1000.00
                      </div>
                      <div class="alert alert-success" role="alert">
                        Checkout now and earn <strong>170 Reward Points </strong>for this order
                      </div>
                      <form class="cart-form" action="cart" method="post">
                        <div class="cart-items">
                          <div class="cart-item">
                            <div class="cart-wrap">
                              <div class="cart-image">
                                <a href="{{ url('product-detail') }}"><img src="{{ asset('frontend-view/images/kurti2.jpg') }}"></a>
                              </div>
                              <div class="cart-desc">
                                <p class="cart-title"><a href="{{ url('product-detail') }}>Women Printed Cotton A-line Kurta</a></p>
                                <p class="cart-meta"><span>Product Code : 75001PP01</span></p>
                                <p class="cart-price price">
                                  <span class="new-price">₹410.00</span>
                                </p>
                                <div class="cart-quantity">
                                  <div class="quantity-group">
                                    <a href="javascript:void(0)" class="dec qty-btn"></a>
                                    <input type="text" id="quantity" class="input-text qty" name="quantity" value="1"
                                      maxlength="50">
                                    <a href="javascript:void(0)" class="inc qty-btn"></a>
                                  </div>
                                  <p class="cart-subtotal"><span class="price">₹410.00</span></p>
                                </div>
                              </div>
                              <div class="cart-action">
                                <div class="cart-action-button">
                                  <a href="#" class="add-to-wishlist" tabindex="-1"><i
                                      class="far fa-heart"></i><span>Add to Wishlist</span></a>
                                  <a href="#" class="remove-item" title="Remove this item" data-product_id="86"><i
                                      class="far fa-trash-alt"></i><span>Remove</span></a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--cart-item-->
                          <div class="cart-item">
                            <div class="cart-wrap">
                              <div class="cart-image">
                                <a href="product-detail.html"><img src="{{ asset('frontend-view/images/kurti4.jpg') }}"></a>
                              </div>
                              <div class="cart-desc">
                                <p class="cart-title"><a href="product-detail.html">Women Printed Cotton A-line Kurta</a></p>
                                <p class="cart-meta"><span>Product Code : 75001PP01</span></p>
                                <p class="cart-price price">
                                  <span class="new-price">₹400.00</span>
                                </p>
                                <div class="cart-quantity">
                                  <div class="quantity-group">
                                    <a href="javascript:void(0)" class="dec qty-btn"></a>
                                    <input type="text" id="quantity" class="input-text qty" name="quantity" value="1"
                                      maxlength="50">
                                    <a href="javascript:void(0)" class="inc qty-btn"></a>
                                  </div>
                                  <p class="cart-subtotal"><span class="price">₹400.00</span></p>
                                </div>
                              </div>
                              <div class="cart-action">
                                <div class="cart-action-button">
                                  <a href="#" class="add-to-wishlist" tabindex="-1"><i
                                      class="far fa-heart"></i><span>Add to Wishlist</span></a>
                                  <a href="#" class="remove-item" title="Remove this item" data-product_id="86"><i
                                      class="far fa-trash-alt"></i><span>Remove</span></a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--cart-item-->
                          <div class="cart-item">
                            <div class="cart-wrap">
                              <div class="cart-image">
                                <a href="{{ url('product-detail') }}"><img src="{{ asset('frontend-view/images/kurti3.jpg') }}"></a>
                              </div>
                              <div class="cart-desc">
                                <p class="cart-title"><a href="{{ url('product-detail') }}">Women Printed Cotton A-line Kurta</a></p>
                                <p class="cart-meta"><span>Product Code : 75001PP01</span></p>
                                <p class="cart-price price">
                                  <span class="new-price">₹410.00</span>
                                  <span class="old-price">₹2100.00</span>
                                </p>
                                <div class="cart-quantity">
                                  <div class="quantity-group">
                                    <a href="javascript:void(0)" class="dec qty-btn"></a>
                                    <input type="text" id="quantity" class="input-text qty" name="quantity" value="1"
                                      maxlength="50">
                                    <a href="javascript:void(0)" class="inc qty-btn"></a>
                                  </div>
                                  <p class="cart-subtotal"><span class="price">₹410.00</span></p>
                                </div>
                              </div>
                              <div class="cart-action">
                                <div class="cart-action-button">
                                  <a href="#" class="add-to-wishlist" tabindex="-1"><i
                                      class="far fa-heart"></i><span>Add to Wishlist</span></a>
                                  <a href="#" class="remove-item" title="Remove this item" data-product_id="86"><i
                                      class="far fa-trash-alt"></i><span>Remove</span></a>
                                </div>
                              </div>
                            </div>
                            <!--cart-item-->
                          </div>
                        </div>
                        <div class="cart-update">
                          <div class="cart-continue-shopping ">
                            <button type="submit" class="btn btn-outline-primary"> Continue Shopping </button>
                          </div>
                          <div class="cart-update-btn">
                            <button type="submit" class="btn btn-primary">Cart2PDF</button>
                            <button type="submit" name="update_cart_action" value="update_qty" class="btn btn-primary action update">Update Shopping Cart</button>
                        </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-8 col-12">
                    <div class="cart-collaterals">
                      <div class="coupon">
                        <label for="coupon_code">Apply Coupon Code</label>
                        <div class="coupon-group">
                          <input type="text" name="coupon_code" class="input-text" id="coupon_code" value=""
                            placeholder="Coupon code">
                          <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply</button>
                        </div>
                      </div>
                      <div class="reward-points">
                        <h5>Use Reward Points</h5>
                        <div class="custom-control custom-checkbox reward-points-group">
                          <input type="checkbox" class="custom-control-input" id="reward_points">
                          <label class="custom-control-label" for="reward_points"> ₹100.00</label>
                        </div>
                      </div>
                      <div class="cart-totals">
                        <h2>Cart totals</h2>
                        <div class="cart-totals-table">
                          <table class="shop-table" cellspacing="0">
                            <tbody>
                              <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td data-title="Subtotal"> <span class="price">₹1220.00</span> </td>
                              </tr>
                              <tr class="shipping-totals shipping">
                                <th>Shipping</th>
                                <td data-title="Shipping">Free</td>
                              </tr>
                              <tr class="order-total">
                                <th>Total</th>
                                <td data-title="Total"><strong><span class="price">₹1220.00</span></strong> </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="proceed-to-checkout">
                          <a href="{{ url('checkout') }}" class="checkout-button button"> Proceed to checkout</a>
                        </div>
                      </div>
                    </div>
                  </div>
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
    
    <!--=====================================================
                                 Footer Section End
     =========================================================-->
    
    <!-- <div id="loader" class="loader"></div> -->
 

<!-- filters -->


@include('frontend-view.includes.footer')
