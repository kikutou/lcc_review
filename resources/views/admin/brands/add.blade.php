@extends("layouts.admin.layout", ["type" => "brand", "action" => "add"])
<!-- layout继承，php7的函数特有简略表达[]，传递了2个值 -->

@section("title", "航空会社新規作成")


@section("content")
<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">航空会社の新規作成</h3>
              <form action="postlist" method="post">

                @csrf

                <!-- 航空会社名 -->
                <div class="form-group">
                  <label for="brand-name-text-input" class="col-form-label">航空会社名</label>
                  <input class="form-control" type="text" placeholder="航空会社名を入力してください" id="brand-name-text-input">
                </div>
                <!-- 航空会社URL -->
                <div class="form-group">
                  <label for="brand-url-text-input" class="col-form-label">航空会社サイト</label>
                  <input class="form-control" type="text" placeholder="航空会社サイトを入力してください" id="brand-url-text-input">
                </div>
                <!-- 航空会社紹介 -->
                <div class="form-group">
                  <label for="brand-introduction-text-input" class="col-form-label">紹介</label>
                  <textarea class="form-control" id="brand-introduction-text-input" rows="8" cols="80"></textarea>
                </div>

                <!-- 航空会社ロゴファイル -->
                <div class="form-group">
                  <label  class="col-form-label">航空会社ロゴ追加</label>
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="brand-logo-pic">
                      <label class="custom-file-label" for="brand-logo-pic">ロゴをせんたくしてください。</label>
                    </div>
                  </div>
                </div>

                <!-- 航空会社紹介ファイル -->
                <div class="form-group">
                  <label  class="col-form-label">航空会社紹介画像追加</label>
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="brand-image-pic">
                      <label class="custom-file-label" for="brand-image-pic">紹介画像をせんたくしてください。</label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <input class="btn btn-rounded btn-primary mb-3" type="submit" value="Submit">
                  <input type="reset" class="btn btn-rounded btn-danger mb-3" value="Reset">
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
