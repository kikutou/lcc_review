@extends("layouts.admin.layout", ["type" => "airport", "action" => "add"])
<!-- layout继承，php7的函数特有简略表达[]，传递了2个值 -->

@section("title", "空港情報の追加")


@section("content")
<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-6 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">空港情報の新規作成</h3>
              <form action="admin_get_airport_index" method="post">

                @csrf

                <!-- 空港名 -->
                <div class="form-group">
                  <label for="airport-name-text-input" class="col-form-label">空港名</label>
                  <input class="form-control" type="text" placeholder="空港名を入力してください" id="airport-name-text-input">
                </div>
                <!-- 都市名 -->
                <div class="form-group">
                  <label for="airport-city-name-text-input" class="col-form-label">都市名</label>
                  <input class="form-control" type="text" placeholder="都市名を入力してください" id="airport-city-name-text-input">
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
