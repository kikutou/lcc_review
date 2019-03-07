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
              <li class="nav-item">
                <a class="nav-link" href="{{route('user_get_user_add') }}">User</a>
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
    <!-- content -->
    <div class="site-blocks-cover email_mag" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row row-custom align-items-center">
          <div class="col-md-10">
            <h1 class="mb-2 text-black w-75"><span class="font-weight-bold">Largest LCC</span> Site On The Net</h1>
            <div class="job-search">
              <div class="tab-content bg-white p-4 rounded" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-job" role="tabpanel" aria-labelledby="pills-job-tab">

                  <div class="py-5 bg-secondary">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                          <h2 class="text-white h2 font-weihgt-normal mb-4">Post Subscribe</h2>
                        </div>
                      </div>
                      <form action="" method="post">
                        <div class="row">
                          <div class="col-md-9">
                            <input type="email" name="mail" class="form-control border-0 mb-3 mb-md-0" placeholder="メールアドレス">
                          </div>
                          <div class="col-md-3">
                            <button type="submit" class="btn btn-dark mb-3" height=" 45">購読する</button>
                          </div>
                        </div>

                        <div class="brand_check">
                          <div class="col-md-3">
                            <div class="text-black form_check_text">航空会社：</div>
                          </div>
                          <div class="row">
                            @foreach($brands as $brand)
                            <div class="col-md-auto">
                              <div class="custom-control custom-checkbox custom-control-inline">
                                  <input type="checkbox" name="brand_id" class="custom-control-input" id="{{ $brand->brand_name }}" value="{{ $brand->id }}">
                                  <label class="custom-control-label form_check_text" for="{{ $brand->brand_name }}">{{ $brand->brand_name }}</label>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>

                        <div class="category_check">
                          <div class="col-md-3">
                            <div class="text-black form_check_text">カテゴリー：</div>
                          </div>
                          <div class="row">
                            @foreach($categories as $category)
                            <div class="col-md-2">
                              <div class="custom-control custom-checkbox custom-control-inline">
                                  <input type="checkbox" name="category_id" class="custom-control-input" id="{{ $category->category_name }}" value="{{ $category->id }}">
                                  <label class="custom-control-label form_check_text" for="{{ $category->category_name }}">{{ $category->category_name }}</label>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>

                      </form>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- post list -->
    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-6" data-aos="fade" >
            <h2 class="text-black">Lcc Mamol <strong>Posts</strong> </h2>
          </div>
        </div>
        <div class="row hosting">
            @php $out=1 @endphp
            @foreach($posts as $post)
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="100">

            <div class="unit-3 h-100 bg-white">

              <div class="d-flex align-items-center mb-3 unit-3-heading">
                <a href="{{route('user_get_post_detail',['id'=> $post->id]) }}">
                  <img src="{{asset($post->picture)}}" alt="" width="100">
                </a>
                <h2 class="h5 post_title">{{ $post->title }}</h2>
              </div>
              <div class="unit-3-body">
                <a href="#" class="badge badge-info">{{ $post->category->category_name }}</a>
                @foreach($post->brands as $brand)
                <span>
                  <a href="#" class="badge badge-secondary">{{ $brand->brand_name }}</a>
                </span>
                @endforeach
                <p class="card-text">{{ $post->createdate }}</p>
              </div>
            </div>
          </div>
          @if($out>5)
            @break
          @else
            @php $out++ @endphp
          @endif
        @endforeach
        </div>

      </div>
    </div>
    <!-- end post list -->
    <!-- brand list -->
        <div class="site-section">
          <div class="container">
            <div class="row justify-content-center text-center mb-5">
              <div class="col-md-6" data-aos="fade" >
                <h2 class="text-black">Airline<strong>Companies</strong> </h2>
              </div>
            </div>

            <div class="row hosting">
              @define $out=1
              @foreach($brands as $brand)
            <div class="col-md-8 col-lg-8 mb-5 mb-lg-8 offset-lg-2" data-aos="fade" data-aos-delay="100">

              <div class="unit-3 h-100 bg-white">

                <div class="d-flex align-items-center mb-3 unit-3-heading">
                  <a href="{{route('user_get_brand_detail',['id'=> $brand->id]) }}">
                    <img src="{{asset($brand->logo_picture)}}" alt="" width="100">
                  </a>
                  <a href="{{route('user_get_brand_detail',['id'=> $brand->id]) }}">
                    <h2 class="h5 post_title">{{ $brand->brand_name }}</h2>
                  </a>
                </div>
                <div class="unit-3-body">
                  <p class="card-text">{{ $brand->intro($brand->brand_introduction) }}...</p>
                </div>
              </div>
            </div>
            @if($out>5)
              @break
            @else
              @define $out++
            @endif
          @endforeach
            </div>
          </div>
        </div>
        <!-- end brand list -->
    <!-- end content -->
  </div>
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
