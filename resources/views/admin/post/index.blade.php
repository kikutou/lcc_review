@extends("layouts.admin.layout", ["type" => "post", "action" => "index"])

@section("title", "記事一覧")


@section("content")

<div class="main-content-inner">
  <!-- table dark start -->
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">記事情報一覧</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table text-center">
              <thead class="text-uppercase bg-dark">
                <tr class="text-white">
                  <th scope="col">ID</th>
                  <th scope="col">会社名</th>
                  <th scope="col">公式サイト</th>
                  <th scope="col">紹介</th>
                  <th scope="col">ロゴ</th>
                  <th scope="col">紹介図</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                <tr>
                  <th scope="row">{{ $post->id }}</th>
                  <td>{{ $post->post_name }}</td>
                  <td>{{ $post->home_page }}</td>
                  <td>{{ $post->post_introduction }}</td>
                  <td><img src="{{ asset($post->logo_picture) }}" alt="logo" width="100" ></td>
                  <td><img src="{{ asset($post->profile_picture) }}" alt="profile" width="200"></td>
                  <td><a href="{{ route('admin_get_post_edit',['id'=> $post->id]) }}"><i class="ti-pencil-alt">編集</i></a>
                    <a href="{{ route('admin_get_post_delete',['id'=> $post->id]) }}"><i class="ti-trash">削除</i></a>
                  </td>

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
