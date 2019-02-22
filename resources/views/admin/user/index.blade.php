@extends("layouts.admin.layout", ["type" => "user", "action" => "index"])

@section("title", "会員一覧")


@section("content")

<div class="main-content-inner">

  <!-- table dark start -->
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">会員一覧</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table text-center">
              <thead class="text-uppercase bg-dark">
                <tr class="text-white">
                  <th scope="col">ID</th>
                  <th scope="col">メールアドレス</th>
                  <th scope="col">会員番号</th>
                  <th scope="col">ニックネーム</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <th scope="row">{{ $user->id }}</th>
                  <td>{{ $user->mail }}</td>
                  <td>{{ $user->code }}</td>
                  <td>{{ $user->nickname }}</td>
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
