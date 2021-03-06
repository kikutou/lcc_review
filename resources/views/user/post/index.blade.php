@extends("layouts.user.layout", ["type" => "post"])

@section("title", "記事一覧")

@section("content")
<link href="{{ URL::asset('css/post_css.css') }}" rel="stylesheet" type="text/css"/>
<!-- Page Content -->
<div class="container">
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

  <div class="row">

    <!-- /.col-lg-3 -->

    <div class="col-lg-12">
      <!-- search -->
      <div class="container">
        <div class="row pt-1 pb-1">
          <div class="col-lg-12">
            <h4 class="text-center"> </h4>
          </div>
        </div>
      </div>
      <section>
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://images.freeimages.com/images/large-previews/bd7/falloxbow-1058032.jpg" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
              <img src="https://images.freeimages.com/images/large-previews/bd7/falloxbow-1058032.jpg" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
              <img src="https://images.freeimages.com/images/large-previews/bd7/falloxbow-1058032.jpg" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
              <img src="https://images.freeimages.com/images/large-previews/bd7/falloxbow-1058032.jpg" class="d-block w-100" alt="">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </section>

      <section class="search-sec">
        <div class="container">
          <form action="{{ route('user_get_post_index' )}}" method="get" novalidate="novalidate">
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <select class="form-control search-slt" name="mtb_category_id">
                      <option value="">Select Category</option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}"
                        @if(old('mtb_category_id') == $category->id)
                        selected
                        @endif
                        >{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                      <select class="form-control search-slt" name="brand_id">
                        <option value="">Select Brand</option>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"
                          @if(Request::get('brand_id') == $brand->id)
                          selected
                          @endif
                          >{{ $brand->brand_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <input type="text" class="form-control search-slt" placeholder="Enter Keyword" name="key_word" value="{{ Request::get('key_word') }}">
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <button type="submit" class="btn btn-info wrn-btn">Search</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </section>
        <!-- end search -->
          <!-- post list -->
          <div class="row">
            @foreach($posts as $post)

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="{{route('user_get_post_detail',['id'=> $post->id]) }}"><img class="card-img-top" src="{{ asset($post->picture) }}" alt=""></a>
                <div class="card-body">
                  <h5 class="card-title">
                    <a href="{{ route('user_get_post_detail',['id'=> $post->id]) }}">{{ $post->title }}</a>
                  </h5>
                </div>
                <div class="card-footer">
                  <a href="#" class="badge badge-info">{{ $post->category->category_name }}</a>
                  @foreach($post->brands as $brand)
                  <span>
                    <a href="#" class="badge badge-secondary">{{ $brand->brand_name }}</a>
                  </span>
                  @endforeach
                  <p class="card-text">{{ $post->createdate }}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>

          <!-- /.row -->
          <!-- pagention -->
          <div class="row justify-content-md-center">
            <div class="col-md-auto">
              <div>{{ $posts->links() }}</div>
            </div>
          </div>

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->


    </div>
    <!-- /.container -->
    @endsection
