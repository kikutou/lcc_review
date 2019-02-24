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
              <h3 class="header-title">空港情報の追加</h3>
              <form action="admin_post_airport_index" method="post">

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
