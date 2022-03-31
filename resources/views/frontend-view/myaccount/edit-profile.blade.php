@include('frontend-view.includes.header')
  <!--=====================================================
                          Header Section End
  =========================================================-->

  <section class="site-content bg-gray">
    <div class="page-banner-section">
      <div class="page-banner page-banner-bg">
        <div class="container">
          <div class="page-banner-wrap">
            <div role="navigation" aria-label="Breadcrumbs" class="breadcrumbs">
              <ul class="breadcrumb-items">
                <li class="breadcrumb-item trail-begin"><a href="index.html" rel="home"><span
                      itemprop="name">Home</span></a></li>
                <li class="breadcrumb-item trail-end"><span itemprop="name">Edit Profile</span></li>
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
          <h1 class="page-title">Edit Profile</h1>
        </div>
        <div class="row">
          <div class="sidebar-section col-md-3 col-sm-12 col-12">
            <ul class="sidebar-account-menu">
              <li><a href="{{ url('my-account') }}"> <i class="fas fa-user"></i>My Account</a></li>
              <li class="active"><a href="{{ url('my-profile') }}"> <i class="fas fa-user"></i>My Profile</a></li>
              <li><a href="{{ url('my-address') }}"> <i class="fas fa-address-book"></i>My Address</a></li>
              <li><a href="{{ url('my-orders') }}"> <i class="fas fa-shopping-basket"></i>My Orders</a></li>
              <li><a href="{{ url('my-wishlist') }}"> <i class="far fa-heart"></i>My Wishlist</a></li>
              <li><a href="{{ url('my-points') }}"> <i class="fas fa-tags"></i>My Points</a></li>
              <li><a href="{{ url('my-coupones') }}"> <i class="fas fa-tags"></i>My Coupons</a></li>
              <li><a class="logout" href="#"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
            </ul>
          </div>
          <!-- sidebar-section -->
          <div class="content-area col-md-9 col-sm-12 col-12">
            <div class="content-section">
              <div class="box-item">
                <div class="box-wrap box-border-bottom box-radius">
                  <div class="box-header"><h5 class="box-title">Profile Information</h5></div>
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-12">
                        <div class="myaccount-profileimg">
                          <img src="{{ asset('frontend-view/images/profile-img.jpg') }}" alt="">
                          <div class="myaccount-profileimg-edit">
                            <label for="profileimg-upload" class="profileimg-upload"><i class="fas fa-pencil-alt"></i></label>
                            <input id="profileimg-upload" type="file">
                          </div>
                          <div class="myaccount-name">Arjun Singh</div>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-12">
                        <form action="" method="post" role="form">
                          <h4>Personal Information</h4>
                          <div class="myaccount-row">
                            <div class="form-group col-sm-6 col-12">
                              <label>Full Name</label>
                              <input type="text" name="Name" value="Arjun Singh" class="form-control">
                            </div>
                            <div class="form-group col-sm-6 col-12">
                              <label>User Name</label>
                              <input type="text" name="username" value="arjun" class="form-control">
                            </div>
                            <div class="form-group col-sm-6 col-12">
                              <label>Email</label><input type="email" name="Email" value="arjun@gmail.com" class="form-control">
                            </div>
                            <div class="form-group col-sm-6 col-12">
                              <label>Phone No.</label>
                              <input type="tel" name="Phone" value="+91 123 456 7890" class="form-control">
                            </div>
                          </div>
                          <h4>Password Change</h4>
                          <div class="myaccount-row">
                            <div class="form-group col-sm-6 col-12">
                              <label>New Password</label><input type="password" name="new_password" value="New Password"
                                class="form-control">
                            </div>
                            <div class="form-group col-sm-6 col-12">
                              <label>Confirm New Password</label><input type="password" name="confirm_new_password"
                                value="Confirm New Password" class="form-control">
                            </div>
                          </div>
                          <div class="form-submit">
                            <input type="submit" value="Submit" class="btn btn-primary">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--content-area-->
        </div>
        <!-- row -->
      </div>
      <!--container-->
    </div>
    <!--content-wrapper-->
  </section>
  <!--=====================================================
                      Site Section End
  =========================================================-->
@include('frontend-view.includes.footer')
