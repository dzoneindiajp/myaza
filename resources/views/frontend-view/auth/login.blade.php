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
                    {{-- index url / --}}
                  <li class="breadcrumb-item trail-begin"><a href="{{ url('/') }}" rel="home"><span itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">Sign In</span></li>
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
            <h1 class="page-title">Sign In</h1>
          </div>
            <div class="content-area">
              <div class="content-section">
                <div class="loginregister-page">
                  <div class="loginregister-header">
                      <h3>Login</h3>
                      <p>Enter your email address to sign in.</p>
                  </div>
                  <div class="loginregister-body">
                     @if (session('message'))
                         <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                     <form method="post" action="{{ route('store.login') }}"  id="registeration">
                            @csrf
                          <div class="form-group required">
                              <label for="email">Email address</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                          </div>
                          <div class="form-group required">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                          </div>
                          <div class="form-forgot-pass">
                              <a href="{{ url('forgot-password') }}" class="forgot-pass">Forgot Password?</a>
                          </div>
                          <div class="form-submit">
                              <button type="button" onclick="checkforlogin($(this))" class="btn btn-primary">Submit</button>
                          </div>
                      </form>

                      <div class="login-social">
                          <p class="login-social-title"><strong> OR SIGN IN USING </strong></p>
                          <div class="social">
                              <ul class="social-icon">
                                  <li class="facebook"><a target="_blank" href={{ url('/redirect/facebook') }}><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
                                  <li class="google"><a target="_blank" href="{{ url('/redirect/google') }}"><i class="fab fa-google"></i><span>Google</span></a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="loginregister-now">
                          <h4>Do not have an account?</h4>
                          <a href="{{ url('sign-up') }}" class="account-link register">Sign Up?</a>
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
    <!--=====================================================
                        Site Section End
    =========================================================-->
   
  <!-- Wrapper -->
<script>
  function checkforlogin(v){
    if($('#email').val() == ""){
      notifyme('error','Email is required');
      return false;
    }
    if($('#password').val() == ""){
      notifyme('error','Password is required');
      return false;
    }
    $('#cover-spin').show(0);
    $.post("{{ route('store.login') }}",$('#registeration').serialize(),function(x){
      $('#cover-spin').hide(0);
      if(x.code == 200){
          if(x.back && x.back!=""){
              window.location.href = x.back;
          }else{
              window.location.href = "{{route('user.dashboard')}}";
          }
      }else{
        notifyme('error',x.message);
        return false;
      }
    });
  }
</script>
@include('frontend-view.includes.footer')
