@extends("layouts.admin.layout", ["type" => "user", "action" => "add"])

@section("title", "会員の新規作成")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-6 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">会員の新規作成</h3>
              <!-- form start -->
              <form action="{{route('admin_post_user_add')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email-input" class="col-form-label">メールアドレス</label>
                    <input class="form-control" type="email" value="{{old('mail')}}" id="email-input" name="mail">
                    @if($errors->has('mail'))
                      <p>{{ $errors->first('mail') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="">パスワード</label>
                    <input type="password" class="form-control" id="inputPassword" value="{{old('password')}}" placeholder="6桁～8桁のパスワードを入力してください。" name="password">
                    @if($errors->has('password'))
                      <p>{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="form-group">
                  <label for="nickname-input" class="col-form-label">ニックネーム</label>
                  <input class="form-control" type="text"  id="nickname-input" name="nickname" value="{{old('nickname')}}">
                  @if($errors->has('nickname'))
                    <p>{{ $errors->first('nickname') }}</p>
                  @endif
                </div>
                <!-- button -->
                <div class="row justify-content-md-center">
                    <div class="col col-lg-2">
                      <input class="btn btn-rounded btn-primary mb-3" type="submit" value="Submit">
                    </div>
                    <div class="col-md-auto">
                    </div>
                    <div class="col col-lg-2">
                      <input type="reset" class="btn btn-rounded btn-danger mb-3" value="Reset">
                    </div>
                </div>
              </form>
              <!-- form end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
