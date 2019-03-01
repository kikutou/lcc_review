@extends("layouts.user.layout", ["type" => "post"])

@section("title", "記事一覧")

@section("content")
<!-- Page Content -->
<div class="container">

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
            <form action="#" method="post" novalidate="novalidate">
              <div class="row">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                      <select class="form-control search-slt" id="exampleFormControlSelect1">
                        <option>Select Category</option>
                        <option>Example one</option>
                        <option>Example one</option>
                        <option>Example one</option>
                        <option>Example one</option>
                        <option>Example one</option>
                        <option>Example one</option>
                      </select>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                      <select class="form-control search-slt" id="exampleFormControlSelect1">
                        <option>Select Brand</option>
                        <option>Example one</option>
                        <option>Example one</option>
                        <option>Example one</option>
                        <option>Example one</option>
                        <option>Example one</option>
                        <option>Example one</option>
                      </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                      <input type="text" class="form-control search-slt" placeholder="Enter Keyword">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                      <button type="button" class="btn btn-info wrn-btn">Search</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </section>
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
                <a href="#" class="badge badge-info">{{ $post->category->category_name }}</a><span><a href="#" class="badge badge-secondary">{{ $post->brand->brand_name }}</a></span>
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
