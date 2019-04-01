@extends("layouts.user.layout", ["type" => "post"])

@section("title", "記事情報")


@section("content")
  <link rel="stylesheet" href="{{ URL::asset('css/post_css.css') }}">
  <!-- session message -->
  @if(Session::get("message"))
  <div class="row">
      <div class="alert alert-success alert-dismissible fade show col-md-6 offset-md-3" role="alert">
        <strong>{{ Session::get("message") }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span class="fa fa-times"></span>
        </button>
      </div>
    </div>
  @endif
  <!-- session end -->
<div class="container">

  <!-- title -->
  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <div class="grid-col post_title">
        <h2>{{ $post->title }}</h2>
      </div>
    </div>
  </div>
  <!-- tag & date -->
  <div class="row">
    <div class="col">
      <div class="grid-col">
      </div>
    </div>
    <div class="col-md-auto">
      <div class="grid-col">
        <a href="{{ route('user_get_post_index' )}}" class="btn btn-info mb-3">{{ $post->category->category_name }}</a>
        @foreach($post->brands as $brand)
        <span>
          <a href="#" class="btn btn-secondary mb-3">{{ $brand->brand_name }}</a>
        </span>
        @endforeach
      </div>
    </div>
    <div class="col col-lg-2">
      <div class="grid-col">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="grid-col">
      </div>
    </div>
    <div class="col-md-auto">
      <div class="grid-col">{{ $post->createdate }}</div>
    </div>
    <div class="col col-lg-2">
      <div class="grid-col">
      </div>
    </div>
  </div>
  <!-- content -->
  <div class="row justify-content-md-center">
    <div class="col-md-auto">
      <div class="grid-col">
        <br><img src="{{asset($post->picture)}}" alt="post" width="500">
      </div>
    </div>
  </div>
  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <div class="grid-col post_content">
        <p>{!! $post->content !!}</p><br><br>
      </div>
    </div>
  </div>
  <!-- other posts -->
  <div class="otherpost">
    <!-- same_category_posts -->
    <p class="h4 otherpostbar">同じカテゴリーに関する記事</p>
    <div class="row">
      @define $out=1
      @foreach($same_category_posts as $same_category_post)
      @if($same_category_post->id != $post->id)
      <div class="col-lg-3 mb-4">
        <div class="card h-100">
          <a href="{{route('user_get_post_detail',['id'=> $same_category_post->id]) }}">
            <img class="card-img-top" src="{{asset($same_category_post->picture)}}" alt="">
          </a>
          <div class="card-body">
            <h5 class="card-title">

              <a href="{{ route('user_get_post_detail',['id'=> $same_category_post->id]) }}">{{ $same_category_post->title }}</a>
            </h5>
          </div>
          <div class="card-footer">
            <a href="#" class="badge badge-info">{{ $same_category_post->category->category_name }}</a>
            @foreach($post->brands as $brand)
            <span>
              <a href="#" class="badge badge-secondary">{{ $brand->brand_name }}</a>
            </span>
            @endforeach
            <p class="card-text">{{ $same_category_post->createdate }}</p>
          </div>
        </div>
      </div>
      @endif
      @if($out>4)
      @break
      @else
        @define $out++
      @endif
      @endforeach
    </div>
    <!-- same_brand_posts -->
    <p class="h4 otherpostbar">同じ航空会社に関する記事</p>
    <div class="row">
      @if($same_brand_posts)
        @define $out=1
        @foreach($same_brand_posts as $same_brand_post)
          @if($same_brand_post->id != $post->id)
            <div class="col-lg-3 mb-4">
              <div class="card h-100">
                <a href="{{route('user_get_post_detail',['id'=> $same_brand_post->id]) }}">
                  <img class="card-img-top" src="{{asset($same_brand_post->picture)}}" alt="">
                </a>
                <div class="card-body">
                  <h5 class="card-title">
                    <a href="{{ route('user_get_post_detail',['id'=> $same_brand_post->id]) }}">{{ $same_brand_post->title }}</a>
                  </h5>
                </div>
                <div class="card-footer">
                  <a href="#" class="badge badge-info">{{ $same_brand_post->category->category_name }}</a>
                  @foreach($post->brands as $brand)
                  <span>
                    <a href="#" class="badge badge-secondary">{{ $brand->brand_name }}</a>
                  </span>
                  @endforeach
                  <p class="card-text">{{ $same_brand_post->createdate }}</p>
                </div>

              </div>
            </div>
          @endif
          @if($out>4)
            @break
          @else
            @define $out++
          @endif
        @endforeach
      @else
      <p>　　同じ航空会社に関する記事がございません。</p>
      @endif
    </div>


    <!-- /other posts -->
  </div>


  <!-- comment area -->
  <p class="h4 otherpostbar">コメント</p>

  <!-- login check -->
  @if($login_check)
  <!-- comment form -->
  <form action="{{ route('user_post_post_detail', ['id'=> $post->id]) }}" method="POST">
  @csrf
  <input type="hidden" value="{{ $post->id }}" name="id">
    <!-- Grid row -->
    <div class="form-group row">
      <!-- Material input -->
      <label for="commenttitle" class="col-sm-1 col-form-label">タイトル</label>
      <div class="col-md-4">
        <div class="md-form mt-0">
          <input type="text" name="title" class="form-control" id="commenttitle" placeholder="Title">
        </div>
      </div>
    </div>
    <!-- Grid row -->

    <!-- Grid row -->
    <div class="form-group row">
      <!-- Material input -->
      <label for="contentarea" class="col-lg-1 col-form-label">内容</label>
      <div class="col-md-8">
        <div class="md-form mt-0">
          <textarea name="content" class="form-control" id="contentarea"></textarea>
        </div>
      </div>
    </div>
    <!-- Grid row -->

    <!-- Grid row -->
    <div class="form-group row">
      <div class="col-sm-2">
        <button type="submit" class="btn btn-secondary btn-md">提出</button>
      </div>
      <div class="custom-control custom-checkbox col-sm-2">
        <input type="checkbox" class="custom-control-input" name="anonymity" value="1" id="anonymitycheck">
        <label class="custom-control-label" for="anonymitycheck">匿名</label>
      </div>
    </div>
    <!-- Grid row -->
  </form>
  <!-- comment form -->
  @else

  <div class="row justify-content-md-center loginbutton">
    <div class="col-md-8"><a href="{{route('user_get_login')}}" type="button" class="btn btn-secondary btn-md">ログイン</a></div>
  </div>
  <div class="row justify-content-md-center loginbutton">
    <div class="col-md-8">ログインしてからコメントをしてください。</div>
  </div>
  @endif

  <!-- comment area end  -->
  <p class="h4 otherpostbar">コメント一覧</p>
  @if($comments)
  @define $out=1
  @foreach($comments as $key => $values)
  
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <div class="row">
      @foreach ($values['items'] as $item => $value) 
        @if($value['grade'] == 1)
          <div class="col-md-auto user_name">匿名さん</div>
        @else
          <div class="col-md-auto user_name">{{ $values['user_code']  }}</div>
        @endif
      @endforeach
      
        
      </div><br>
      <div class="comment_list">
        <div class="row">
          <div class="col-md-auto comment_title">タイトル：</div>
          <div class="col-md-8">{{ $values['title'] }}</div>
        </div>
        <div class="row">
          <div class="col-md-auto comment_title">内容：</div>
          <div class="col-md-8 comment_content">{!!  @nl2br($values['content']) !!}</div>
        </div>
      </div>
    </li>
  </ul>
  @if($out>10)
    @break
  @else
    @define $out++
  @endif
  @endforeach
  @else
  <ul class="list-group">
    <li class="list-group-item">
        <div class="row">
          <div class="col-md-auto comment_content">当記事に関するコメントがございません</div>
        </div>
      </div>
    </li>
  </ul>
  @endif
</div>
@endsection
