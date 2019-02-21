@extends("layouts.admin.layout", ["type" => "country", "action" => "index"])

@section("title", "国家の追加")


@section("content")

<div class="main-content-inner">

  <!-- table dark start -->
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">国家一覧</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table text-center">
              <thead class="text-uppercase bg-dark">
                <tr class="text-white">
                  <th scope="col">ID</th>
                  <th scope="col">国家名</th>
                  <th scope="col">ランク</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Japan</td>
                  <td>1</td>
                  <td><i class="ti-pencil-alt">編集</i></td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Japan</td>
                  <td>1</td>
                  <td><i class="ti-pencil-alt">編集</i></td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Japan</td>
                  <td>1</td>
                  <td><i class="ti-pencil-alt">編集</i></td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Japan</td>
                  <td>1</td>
                  <td><i class="ti-pencil-alt">編集</i></td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Japan</td>
                  <td>1</td>
                  <td><i class="ti-pencil-alt">編集</i></td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- table dark end -->
</div>
@endsection
