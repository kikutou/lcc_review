<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ユーザー登録</title>
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
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('user_get_user_add') }}">User</a>
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
  <!-- login area start -->
  <div class="login-area login-s2">
    <div class="container">
      <div class="login-box ptb--100">
        <form method="post" action="{{route('user_post_user_add')}}">
          @csrf
          <div class="login-form-head">
            <h4>会員新規登録</h4>
            <p>ご登録、誠にありがとうございます。</p>
          </div>
          <div class="login-form-body">
            <div class="form-gp">
              <p>メールアドレス</p>
              @if($errors->has('mail'))
              <strong>{{ $errors->first('mail') }}</strong>
              @endif
              <input type="email" name="mail" value="{{old('mail')}}">
              <i class="ti-email"></i>
            </div>
            <div class="form-gp">
              <p>パスワード</p>
              @if($errors->has('password'))
              <strong>{{ $errors->first('password') }}</strong>
              @endif
              <input type="password" name="password">
              <i class="ti-lock"></i>
            </div>
            <div class="form-gp">
              <p>ニックネーム</p>
              @if($errors->has('nickname'))
              <strong>{{ $errors->first('nickname') }}</strong>
              @endif
              <input type="text" name="nickname" value="{{old('nickname')}}">
              <i class="fa fa-pencil-square-o"></i>
            </div>

            <!-- 会员详细情报  折叠部分 -->
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <button type="button" class="btn btn-outline-dark mb-3 offset-md-3" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      会員詳細情報登録</button>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <div class="form-gp">
                        <p for="name">名前</p>
                        <input type="text" id="name" value="{{old('name')}}" name="name">
                        <i class="ti-user"></i>
                      </div>
                      <div class="form-gp">
                        <p for="prefecture">所在地</p>
                        <select id="prefecture" name="mtb_address_prefecture_id" class="custom-select col-md-8">
                          <option value=""> </option>
                          @foreach($prefectures as $prefecture)
                          <option value="{{ $prefecture->id}}"
                            @if(old('mtb_address_prefecture_id') == $prefecture->id)
                            selected
                            @endif
                            >{{ $prefecture->value }}</option>
                            @endforeach
                          </select>
                          <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="form-gp">
                          <p for="address">詳細住所</p>
                          <input type="text" id="address" name="address_detail" value="{{old('address_detail')}}">
                          <i class="fa fa-map-o"></i>
                        </div>
                        <div class="form-gp">
                          <div class="input-group">
                            <p for="birthday">生年月日</p>
                            <input class="form-control" name="birthday" type="date" id="birthday" value="{{old('birthday')}}">
                            <i class="ti-calendar"></i>
                          </div>
                        </div>
                        <div class="form-gp">
                          <p for="gender">性別</p>
                          <select id="gender" name="gender_flg" class="custom-select col-md-8">
                            <option value="1" @if (old('gender_flg') == "1") {{ 'selected' }} @endif>ー</option>
                            <option value="2" @if (old('gender_flg') == "2") {{ 'selected' }} @endif>男性</option>
                            <option value="3" @if (old('gender_flg') == "3") {{ 'selected' }} @endif>女性</option>
                          </select>
                          <i class="fa fa-venus-mars"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end 折叠 -->
                <div class="submit-btn-area">
                  <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                </div>
                <div class="form-footer text-center mt-5">
                  <p class="text-muted">Already have an account? <a href="#">Sign in</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- login area end -->
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
