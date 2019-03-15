<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>@yield("title")</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
  <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/metisMenu.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/slicknav.min.css')}}">
  <!-- amchart css -->
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <!-- others css -->
  <link rel="stylesheet" href="{{URL::asset('assets/css/typography.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/default-css.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/styles.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/responsive.css')}}">
  <!-- modernizr css -->
  <script src="{{URL::asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Lcc Mamol</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user_get_home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user_get_post_index') }}">Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user_get_brand_index') }}">Brand</a>
          </li>
          <li class="nav-item dropdown">
            <p class="nav-link dropdown-toggle" data-toggle="dropdown">User<i class="fa fa-angle-down"></i></p>
            <div class="dropdown-menu">
              <a class="dropdown-item"  href="{{route('user_get_user_add') }}">Sign Up</a>
              <a class="dropdown-item" href="{{route('user_get_login') }}">Sign In</a>
           </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="preloader">
    <div class="loader"></div>
  </div>
  <!-- preloader area end -->
  @yield("content")
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; DongYanJun Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>
  <!-- jquery latest version -->
  <script src="{{URL::asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
  <!-- bootstrap 4 js -->
  <script src="{{URL::asset('assets/js/popper.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/metisMenu.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.slimscroll.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.slicknav.min.js')}}"></script>

  <!-- others plugins -->
  <script src="{{URL::asset('assets/js/plugins.js')}}"></script>
  <script src="{{URL::asset('assets/js/scripts.js')}}"></script>
</body>

</html>
