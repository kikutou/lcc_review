@extends("layouts.admin.layout", ["type" => "post", "action" => "add"])

@section("title", "航空会社の編集")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">航空会社の編集</h3>
              <!-- form start -->
              <form action="{{route('admin_post_post_edit', ['id' => $post->id])}}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="form-group">
                    <label for="post-name-input" class="col-form-label">航空会社名</label>
                    <input class="form-control" type="email" value="{{ old('post_name', $post->post_name) }}" id="post-name-input" name="post_name">
                    @if($errors->has('post_name'))
                      <p>{{ $errors->first('post_name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                  <label for="post-url-input" class="col-form-label">航空会社サイト</label>
                  <input class="form-control" type="text"  id="post-url-input" placeholder="ニックネームを10桁まで入力してください。" name="home_page" value="{{ $post->home_page }}">
                  @if($errors->has('home_page'))
                    <p>{{ $errors->first('home_page') }}</p>
                  @endif
                </div>
                <!-- 航空会社紹介 -->
                <div class="form-group">
                  <label for="post-introduction-input" class="col-form-label">紹介</label>
                  <textarea class="form-control" id="post-introduction-input" rows="8" cols="80" name="post_introduction" value="{{ $post->post-introduction }}"></textarea>
                  @if($errors->has('post_introduction'))
                    <p>{{ $errors->first('post_introduction') }}</p>
                  @endif
                </div>
                <!-- 航空会社ロゴファイル -->
                <div class="form-group">
                  <label  class="col-form-label">航空会社ロゴ追加</label>
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="post-logo-pic" name="logo_picture" value="{{ $post->logo_picture }}">
                      @if($errors->has('logo_picture'))
                        <p>{{ $errors->first('logo_picture') }}</p>
                      @endif
                      <label class="custom-file-label" for="post-logo-pic">ロゴをせんたくしてください。</label>
                    </div>
                  </div>
                </div>

                <!-- 航空会社紹介ファイル -->
                <div class="form-group">
                  <label  class="col-form-label">航空会社紹介画像追加</label>
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="post-image-pic" name="profile_picture" value="{{ $post->profile_picture }}">
                      @if($errors->has('profile_picture'))
                        <p>{{ $errors->first('profile_picture') }}</p>
                      @endif
                      <label class="custom-file-label" for="post-image-pic">紹介画像をせんたくしてください。</label>
                    </div>
                  </div>
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
