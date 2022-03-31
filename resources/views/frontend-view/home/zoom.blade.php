@include('frontend-view.includes.header')

<section class="site-content">
      <div class="page-banner-section">
        <div class="page-banner page-banner-bg">
          <div class="container">
            <div class="page-banner-wrap">
              <div role="navigation" aria-label="Breadcrumbs" class="breadcrumbs">
                <ul class="breadcrumb-items">
                  <li class="breadcrumb-item trail-begin"><a href="{{ url('/') }}" rel="home"><span
                        itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">About Us</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- page-banner-section -->
      <div class="content-wrapper about_myaza">
        <div class="container">
          <div class="page-header text-center">
            <h1 class="page-title">About Myaza History</h1>
          </div>
          <div class="content-area">
          <div class="single-product">
                  <div class="container-fluid">
                      <div class="single-product-details">
                          <div class="row">
                              <div class="col-md-6 col-sm-12">
                                  <div class="xzoom-container">
                                      <div class="xzoom-bigimg">
                                          <img class="xzoom" id="xzoom-default" src="http://localhost/laravel/vasvi/file/1638449534TIwDZfnF.jpg" xoriginal="http://localhost/laravel/vasvi/file/1638449534TIwDZfnF.jpg" />
                                      </div>          
                                      <div class="xzoom-thumbs">
                                        <a href="http://localhost/laravel/vasvi/file/1638449534TIwDZfnF.jpg"><img class="xzoom-gallery" width="100" src="http://localhost/laravel/vasvi/file/1638449534TIwDZfnF.jpg"  xpreview="http://localhost/laravel/vasvi/file/1638449534TIwDZfnF.jpg" title="The Hve Closet"></a>

                                        <a href="http://localhost/laravel/vasvi/frontend-view/images/product_img_orginal1.jpg"><img class="xzoom-gallery" width="100" src="http://localhost/laravel/vasvi/frontend-view/images/product_img_view1.jpg" title="The Hve Closet"></a>

                                      </div>
                                    </div> 
                              </div>                              
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
   

@include('frontend-view.includes.footer')