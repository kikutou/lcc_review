@extends("layouts.admin.layout", ["type" => "post", "action" => "add"])
<!-- layout继承，php7的函数特有简略表达[]，传递了2个值 -->

@section("title", "記事の追加")


@section("content")
<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">記事の新規作成</h3>
              <form action="{{ route('admin_post_post_add') }}" method="post" enctype="multipart/form-data">

                @csrf

                <!-- 記事名 -->
                <div class="form-group">
                  <label for="post-name-input" class="col-form-label">記事名</label>
                  <input class="form-control" type="text" placeholder="記事名を入力してください" id="post-name-input" name="post_name" value="{{old('post_name')}}">
                  @if($errors->has('post_name'))
                    <p>{{ $errors->first('post_name') }}</p>
                  @endif
                </div>
                <!-- 記事URL -->
                <div class="form-group">
                  <label for="post-url-input" class="col-form-label">記事サイト</label>
                  <input class="form-control" type="text" placeholder="記事サイトを入力してください" id="post-url-input" name="home_page" value="{{old('home_page')}}">
                  @if($errors->has('home_page'))
                    <p>{{ $errors->first('home_page') }}</p>
                  @endif
                </div>
                <!-- 記事紹介 -->
                <div class="form-group">
                  <label for="post-introduction-input" class="col-form-label">紹介</label>
                  <textarea class="form-control" id="post-introduction-input" rows="8" cols="80" name="post_introduction" value="{{old('post_introduction')}}"></textarea>
                  @if($errors->has('post_introduction'))
                    <p>{{ $errors->first('post_introduction') }}</p>
                  @endif
                </div>

                <!-- 記事ロゴファイル -->
              <div class="form-group">
                <label  class="col-form-label" for="post-logo-pic">ロゴ追加</label>
                <div class="input-group mb-3">
                  <input type="file" name="logo_picture" value="{{old('logo_picture')}}" id="post-logo-pic">
                    @if($errors->has('logo_picture'))
                      <p>{{ $errors->first('logo_picture') }}</p>
                    @endif
                </div>
              </div>

                <!-- 記事紹介ファイル -->
                <div class="form-group">
                  <label  class="col-form-label" for="post-image-pic">紹介画像追加</label>
                  <div class="input-group mb-3">
                      <input type="file" id="post-image-pic" name="profile_picture" value="{{old('profile_picture')}}">
                      @if($errors->has('profile_picture'))
                        <p>{{ $errors->first('profile_picture') }}</p>
                      @endif
                  </div>
                </div>

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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
