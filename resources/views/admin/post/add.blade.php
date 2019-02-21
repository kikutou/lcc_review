@extends("layouts.admin.layout", ["type" => "post", "action" => "add"])

@section("title", "記事の新規作成")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-6 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">記事の新規作成</h3>
              <!-- form start -->
              <form action="{{'route(admin/post/index)'}}" method="post">
                <div class="form-group">
                  <label class="col-form-label">記事種類の選択</label>
                  <select class="custom-select">
                    <option selected="selected">ー</option>
                    <option value="categories">セール</option>
                    <option value="2">イベント</option>
                    <option value="3">レポート</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-form-label">航空会社の選択</label>
                  <select class="custom-select">
                    <option selected="selected">ー</option>
                    <option value="brands">ジェットスター</option>
                    <option value="2">ピーチ</option>
                    <option value="3">ジェットスター</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="title-input" class="col-form-label">タイトル</label>
                  <input class="form-control" type="text" placeholder="タイトルを入力してください" id="title-input">
                </div>
                <div class="form-group">
                  <label  class="col-form-label">画像の追加</label>
                  <div class="input-group mb-3">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="add_post_img">
                          <label class="custom-file-label" for="add_post_img">Choose file</label>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="post_content_input" class="col-form-label">内容</label>
                  <textarea class="form-control" id="post_content_input" rows="8" cols="80"></textarea>
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
