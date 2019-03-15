@extends("")

@section("","")

@section("content")
  <!-- login area start -->
  <div class="login-area login-s2">
    <div class="container">
      <div class="login-box ptb--100">
        <form method="post" action="{{route('user_post_user_add')}}">
          @csrf
          <div class="login-form-head">
            <h4>管理員新規登録</h4>
            <p>管理員のご登録</p>
          </div>
          <div class="login-form-body">
            <div class="form-gp">
              <p>ニックネーム</p>
              @if($->(''))
              <strong>{{ $->('') }}</strong>
              @endif
              <input type="text" name="nickname" value="{{old('nickname')}}">
              <i class="fa fa-pencil-square-o"></i>
            </div>
            <div class="form-gp">
              <p>パスワード</p>
              @if($->(''))
              <strong>{{ $->('') }}</strong>
              @endif
              <input type="password" name="password">
              <i class="ti-lock"></i>
            </div>
                <div class="submit-btn-area">
                  <button id="form_submit" type="submit">提出 <i class="ti-arrow-right"></i></button>
                </div>
                <div class="form-footer text-center mt-5">
                  <p class="text-muted">既に登録の方はこちら <a href="{{ route('user_admin_get_login') }}">ログイン</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- login area end -->
@endsection
