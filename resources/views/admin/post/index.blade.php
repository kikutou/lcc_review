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
                  <th scope="col">画像</th>
                  <th scope="col">カテゴリー</th>
                  <th scope="col">管理員</th>
                  <th scope="col">作成日</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                <tr>
                  <th scope="row"><a href="{{route('admin_get_post_detail',['id'=> $post->id]) }}">{{ $post->id }}</a></th>
                  <td>{{ $post->title }}</td>
                  <td><img src="{{ asset($post->picture) }}" alt="picture" width="100"></td>
                  <td>{{ $post->category->category_name }}</td>
                  <td>{{ $post->admin->admin_user }}</td>
                  <td>{{ $post->createdate }}</td>
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
