@extends("layouts.user.layout", ["type" => "post"])

@section("title", "記事情報")


@section("content")
<div class="container">

  <!-- title -->
  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <div class="grid-col  post_title">
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
</div>

@endsection