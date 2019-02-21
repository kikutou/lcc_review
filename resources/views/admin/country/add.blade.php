@extends("layouts.admin.layout", ["type" => "country", "action" => "add"])

@section("title", "国家の追加")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-6 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">国家の追加</h3>
              <!-- form start -->
              <form action="admin_get_country_index" method="post">
                <div class="form-group">
                  <label for="country-name-input" class="col-form-label">国家名</label>
                  <input class="form-control" type="text" placeholder="国家名を入力してください" id="country-name-input">
                </div>
                <div class="form-group">
                  <label for="country-rank-input" class="col-form-label">国家ランク</label>
                  <input class="form-control" type="text" placeholder="国家ランクを入力してください" id="country-rank-input">
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
