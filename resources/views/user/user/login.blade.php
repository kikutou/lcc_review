@extends("layouts.user.user_layout")

@section("title","ログイン")

@section("content")
<div class="login-area login-s2">
  <div class="container">
    <div class="login-box ptb--100">
      <form action="{{ route('user_post_login') }}" method="POST">
        @csrf
        <!-- session message -->
        @if(Session::get("message"))
        <div class="row">
          <div class="alert alert-danger alert-dismissible fade show col-md-auto offset-md-2" role="alert">
            <strong>{{ Session::get("message") }}</strong>
          </div>
        </div>
        @endif
        <!-- end session -->
        <div class="login-form-head">
          <h4>ログイン</h4>
          <p>ログインしてください</p>
        </div>
        <div class="login-form-body">
          <div class="form-gp">
            <label for="exampleInputEmail1">メールアドレス</label>
            <input type="email" name="email" id="exampleInputEmail1">
            <i class="ti-email"></i>
          </div>
          <div class="form-gp">
            <label for="exampleInputPassword1">パスワード</label>
            <input type="password" name="password" id="exampleInputPassword1">
            <i class="ti-lock"></i>
          </div>
          <div class="row mb-4 rmber-area">
            <div class="col-6">
              <div class="custom-control custom-checkbox mr-sm-2">
                <input type="checkbox" class="custom-control-input" name="" id="customControlAutosizing">
                <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
              </div>
            </div>
            <div class="col-6 text-right">
              <a href="#">パスワードを忘れた場合</a>
            </div>
          </div>
          <div class="submit-btn-area">
            <button id="form_submit" type="submit">ログイン <i class="ti-arrow-right"></i></button>
          </div>
          <div class="form-footer text-center mt-5">
            <p class="text-muted">新規会員登録の方 <a href="{{ route('user_get_user_add') }}">新規作成</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- login area end -->
@endsection
