@extends("layouts.admin.layout", ["type" => "post", "action" => "index"])

@section("title", "記事一覧")


@section("content")

<div class="main-content-inner">

  <!-- table dark start -->
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">記事一覧</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table text-center">
              <thead class="text-uppercase bg-dark">
                <tr class="text-white">
                  <th scope="col">ID</th>
                  <th scope="col">タイトル</th>
                  <th scope="col">作成日</th>
                  <th scope="col">カテゴリ</th>
                  <th scope="col">航空会社</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Japan</td>
                  <td>2000/01/21</td>
                  <td>sale</td>
                  <td>peach</td>
                  <td><i class="ti-pencil-alt">編集</i></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Japan</td>
                  <td>2000/01/21</td>
                  <td>sale</td>
                  <td>peach</td>
                  <td><i class="ti-pencil-alt">編集</i></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Japan</td>
                  <td>2000/01/21</td>
                  <td>sale</td>
                  <td>peach</td>
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
