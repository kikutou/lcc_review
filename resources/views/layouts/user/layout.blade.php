<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield("title")</title>

  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <!-- Custom styles for this template -->
<link rel="stylesheet" href="{{ URL::asset('css/css.css') }}">

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
          <li class="nav-item
          @if(isset($type) && $type == 'home')
            active
          @endif"
          >
            <a class="nav-link" href="{{ route('user_get_home') }}">Home</a>
          </li>
          <li class="nav-item
          @if(isset($type) && $type == 'post')
            active
          @endif"
          >
            <a class="nav-link" href="{{ route('user_get_post_index') }}">Post</a>
          </li>
          <li class="nav-item
          @if(isset($type) && $type == 'brand')
            active
          @endif"
          >
            <a class="nav-link" href="{{ route('user_get_brand_index') }}">Brand</a>
          </li>
          <li class="nav-item dropdown">
            <button class="dropdown-toggle btn btn-outline nav-item" type="button" data-toggle="dropdown">
                User
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('user_get_user_add') }}">新規会員</a>
              <a class="dropdown-item" href="#">ログイン</a>
            </div>

          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    @yield("content")

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; DongYanJun Website 2019</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

  </html>
