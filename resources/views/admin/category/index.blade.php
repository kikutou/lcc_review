@extends("layouts.admin.layout", ["type" => "categry", "action" => "index"])

@section("title", "カテゴリの追加")


@section("content")

<div class="main-content-inner">

  <!-- table dark start -->
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">カテゴリ一覧</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table text-center">
              <thead class="text-uppercase bg-dark">
                <tr class="text-white">
                  <th scope="col">ID</th>
                  <th scope="col">カテゴリ名</th>
                  <th scope="col">カテゴリ説明</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                  <th scope="row">{{ $category->id }}</th>
                  <td>{{ $category->category }}</td>
                  <td>{{ $category->category_introduction }}</td>
                  <td><i class="ti-pencil-alt">編集</i></td>
                </tr>
                @endforeach

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
