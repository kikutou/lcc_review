@extends("layouts.user.user_layout")

@section("title","会員新規")

@section("content")
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
              @if($errors->has('email'))
              <strong>{{ $errors->first('email') }}</strong>
              @endif
              <input type="email" name="email" value="{{old('email')}}">
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
                        <div class="form-gp">
                          <p for="subscribe">メルマガ購読</p>
                          <input type="checkbox" id="subscribe" name="subscribe" value ="1" @if (old('subscribe') == "1") {{ 'checked' }} @endif>
                          <i class=ti-info-alt></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end 折叠 -->
                <div class="submit-btn-area">
                  <button id="form_submit" type="submit">提出 <i class="ti-arrow-right"></i></button>
                </div>
                <div class="form-footer text-center mt-5">
                  <p class="text-muted">既に会員の方はこちら <a href="{{ route('user_get_login') }}">ログイン</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- login area end -->
@endsection
