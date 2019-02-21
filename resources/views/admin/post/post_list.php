@extends("layouts.admin.layout")

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
              <form action="postlist" method="post">
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
                  <label for="example-text-input" class="col-form-label">タイトル</label>
                  <input class="form-control" type="text" placeholder="タイトルを入力してください" id="example-text-input">
                </div>
                <div class="form-group">
                  <label  class="col-form-label">画像の追加</label>
                  <div class="input-group mb-3">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputGroupFile03">
                          <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="example-text-input" class="col-form-label">内容</label>
                  <textarea class="form-control" id="example-text-input" rows="8" cols="80"></textarea>
                </div>
                <input class="btn btn-rounded btn-primary mb-3" type="submit" value="Submit">
                <input type="reset" class="btn btn-rounded btn-danger mb-3" value="Reset">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
