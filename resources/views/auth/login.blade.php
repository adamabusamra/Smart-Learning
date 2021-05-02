<!DOCTYPE html>
<html lang="zxx">
  <!-- Mirrored from keenitsolutions.com/products/html/educavo/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Jan 2021 21:34:39 GMT -->

  <head>
    <!-- meta tag -->
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <!-- responsive tag -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/fav-orange.png')}}">
    <!-- Bootstrap v4.4.1 css -->
    <link rel="stylesheet" type="text/css" href="{{asset ('assets/css/bootstrap.min.css')}}">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css')}}">
    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}">
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/off-canvas.css')}}">
    <!-- linea-font css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/linea-fonts.css')}}">
    <!-- flaticon css  -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/flaticon.css')}}">
    <!-- magnific popup css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/magnific-popup.css')}}">
    <!-- Main Menu css -->
    <link rel="stylesheet" href="{{asset('assets/css/rsmenu-main.css')}}">
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/rs-spacing.css')}}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- This stylesheet dynamically changed from style.less -->
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
  </head>

  <body class="defult-home">
    <!--Preloader area start here-->
    <div id="loader" class="loader orange-color">
      <div class="loader-container">
        <div class="loader-icon">
          <img src="{{asset('assets/images/pre-logo1.png')}}" alt="" />
        </div>
      </div>
    </div>
    <!--Preloader area End here-->

    <!-- My Account Section Start -->
    <div class="rs-login pt-100 pb-100 md-pt-70 md-pb-70">
      <div class="container">
        <div class="noticed">
          <div class="main-part">
            <div class="method-account">
              <!--begin::Logo-->
              <a href="#" class="login-logo pb-xl-10 pb-7" style="margin-left: -20px">
                <img src="{{asset ('assets/media/logos/logo.png')}}" class="mb-5" alt="" width="280" />
              </a>
              <!--end::Logo-->
              <h2 class="login">Admin Login</h2>
              <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="text-left">
                  @error('email')
                  <span class="text-danger text-left">{{ $message }}</span>
                  @enderror
                  @if ($errors->has('bad-cred'))
                  <span class="text-danger text-left">{{ $errors->first('bad-cred') }}</span>
                  @endif
                  <input type="email" name="email" placeholder="E-mail" value="{{old('email')}}" />
                  @error('password')
                  <span class="text-danger text-left">{{ $message }}</span>
                  @enderror
                  <input type="password" name="password" placeholder="Password" />
                </div>
                <button type="submit" class="readon submit-btn">login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- My Account Section End -->
    <!-- Main content End -->

    <!-- start scrollUp  -->
    <div id="scrollUp" class="orange-color">
      <i class="fa fa-angle-up"></i>
    </div>
    <!-- End scrollUp  -->

    <!-- Search Modal Start -->
    <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="flaticon-cross"></span>
      </button>
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="search-block clearfix">
            <form>
              <div class="form-group">
                <input class="form-control" placeholder="Search Here..." type="text" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Search Modal End -->
    <!-- modernizr js -->
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js')}}"></script>
    <!-- jquery latest version -->
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <!-- Bootstrap v4.4.1 js -->
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Menu js -->
    <script src="{{ asset('assets/js/rsmenu-main.js')}}"></script>
    <!-- op nav js -->
    <script src="{{ asset('assets/js/jquery.nav.js')}}"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- Slick js -->
    <script src="{{ asset('assets/js/slick.min.js')}}"></script>
    <!-- isotope.pkgd.min js -->
    <script src="{{ asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <!-- imagesloaded.pkgd.min js -->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/js/wow.min.js')}}"></script>
    <!-- Skill bar js -->
    <script src="{{ asset('assets/js/skill.bars.jquery.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js')}}"></script>
    <!-- counter top js -->
    <script src="{{ asset('assets/js/waypoints.min.js')}}"></script>
    <!-- video js -->
    <script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js')}}"></script>
    <!-- magnific popup js -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- plugins js -->
    <script src="{{ asset('assets/js/plugins.js')}}"></script>
    <!-- contact form js -->
    <script src="{{ asset('assets/js/contact.form.js')}}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js')}}"></script>
  </body>

  <!-- Mirrored from keenitsolutions.com/products/html/educavo/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Jan 2021 21:34:39 GMT -->

</html>