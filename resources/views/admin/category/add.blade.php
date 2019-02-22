@extends("layouts.admin.layout", ["type" => "category", "action" => "add"])
<!-- layout继承，php7的函数特有简略表达[]，传递了2个值 -->

@section("title", "カテゴリの追加")


@section("content")
<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-6 col-ml-12">
      <div class="row">
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">カテゴリの新規作成</h3>
<<<<<<< HEAD
              <form action="admin_post_category_index" method="post">
=======
              <form action="{{ route('admin_post_category_add') }}" method="post">
>>>>>>> 48ac4510d9202b602d80d4936d9dd00135bd20b8

                @csrf

                <!-- カテゴリ名 -->
                <div class="form-group">
                  <label for="category-name-text-input" class="col-form-label">カテゴリ名</label>
                  <input class="form-control" type="text" placeholder="カテゴリ名を入力してください" id="category-name-text-input" name="category">
                  @if($errors->has('category'))
                    <p>{{ $errors->first('category') }}</p>
                  @endif
                </div>
                <!-- カテゴリ説明文 -->
                <div class="form-group">
                  <label for="categoryt-introduction-text-input" class="col-form-label">カテゴリ説明</label>
                  <input class="form-control" type="text" placeholder="カテゴリ説明文を入力してください" id="category-introduction-text-input" name="category_introduction">
                  @if($errors->has('category_introduction'))
                    <p>{{ $errors->first('category_introduction') }}</p>
                  @endif
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
