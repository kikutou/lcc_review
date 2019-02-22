@extends("layouts.admin.layout", ["type" => "brand", "action" => "index"])

@section("title", "航空会社の追加")


@section("content")

<div class="main-content-inner">
  <!-- table dark start -->
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">航空会社情報一覧</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table text-center">
              <thead class="text-uppercase bg-dark">
                <tr class="text-white">
                  <th scope="col">ID</th>
                  <th scope="col">航空会社名</th>
                  <th scope="col">航空会社サイト</th>
                  <th scope="col">航空会紹介文</th>
                  <th scope="col">航空会社ロゴ</th>
                  <th scope="col">航空会社紹介図</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>会社名</td>
                  <td>URL</td>
                  <td>紹介文</td>
                  <td>IMG</td>
                  <td>紹介図</td>
                  <td><i class="ti-pencil-alt">編集</i></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>会社名</td>
                  <td>URL</td>
                  <td>紹介文</td>
                  <td>IMG</td>
                  <td>紹介図</td>
                  <td><i class="ti-pencil-alt">編集</i></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>会社名</td>
                  <td>URL</td>
                  <td>紹介文</td>
                  <td>IMG</td>
                  <td>紹介図</td>
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
