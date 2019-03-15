<!DOCTYPE html>
<html lang="jp">
  <head>
    <title>ホームページ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/animate.css')}}">

    <link rel="stylesheet" href="{{URL::asset('assets/css/fl-bigmug-line.css')}}">

    <link rel="stylesheet" href="{{URL::asset('assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/home_css.css')}}">

  </head>
  <body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <!-- Navigation -->
    <header class="site-navbar py-1" role="banner">
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
                <a class="nav-link active" href="{{ route('user_get_home') }}">Home</a>
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
    </header>
    <!-- end Navigation -->
@yield("content")
 <!-- Footer -->
 <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; DongYanJun Website 2019</p>
    </div>
  </footer>
  <!-- /.container -->

  <script src="{{URL::asset('assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery-ui.js')}}"></script>
  <script src="{{URL::asset('assets/js/popper.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.stellar.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.countdown.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/aos.js')}}"></script>

  <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&libraries=places&callback=initAutocomplete"
        async defer></script>

  <script src="{{URL::asset('assets/js/main.js')}}"></script>

  </body>
</html>
