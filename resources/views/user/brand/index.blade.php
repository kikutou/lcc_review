@extends("layouts.user.layout", ["type" => "brand"])

@section("title", "航空会社一覧")

@section("content")

    <link rel="stylesheet" href="{{ asset('css/brand_css.css') }}">

    <div class="container">

        <div class="row">

            <!-- /.col-lg-3 -->

            <div class="col-lg-12">
                <!-- search -->
                <div class="container">
                    <div class="row pt-1 pb-1">
                        <div class="col-lg-12">
                            <h4 class="text-center"></h4>
                        </div>
                    </div>
                </div>
                <section>
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://images.freeimages.com/images/large-previews/bd7/falloxbow-1058032.jpg"
                                     class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.freeimages.com/images/large-previews/bd7/falloxbow-1058032.jpg"
                                     class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.freeimages.com/images/large-previews/bd7/falloxbow-1058032.jpg"
                                     class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.freeimages.com/images/large-previews/bd7/falloxbow-1058032.jpg"
                                     class="d-block w-100" alt="">
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
                        <form action="{{ route('user_get_brand_index' )}}" method="get" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">

                                        <div class="col-lg-8 col-md-8 col-sm-12 p-0" id="iput-type">
                                            <input type="text" class="form-control search-slt" placeholder="キーワード"
                                                   name="keyword" value="{{ Request::get('keyword') }}">
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                            <button type="submit" class="btn btn-info wrn-btn">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- end search -->
                <!-- brand index -->
                @foreach($brands as $brand)
                    <div class="row">
                        <div class="col-lg-10 col-md-10 mb-4 offset-lg-1">
                            <div class="card h-100">
                                <!-- BODY -->
                                <div class="card-body">
                                    <div class="row">
                                        <!-- img -->
                                        <div class="col-lg-4 col-md-4 mb-4">
                                            <a href="{{route('user_get_brand_detail',['id'=> $brand->id]) }}"><img
                                                        class="brand_img" src="{{ asset($brand->logo_picture) }}"
                                                        alt="logo"></a>
                                        </div>
                                        <!-- name&URL -->
                                        <div class="col-lg-8 col-md-8 mb-4">
                                            <div class="brand_name">
                                                <h5 class="card-title">
                                                    会社名：<a href="{{route('user_get_brand_detail',['id'=> $brand->id]) }}">{{ $brand->brand_name }}</a>
                                                </h5>
                                            </div>
                                            <div class="brand_url">
                                                ホームページ：<a href="{{ $brand->home_page }}">{{ $brand->home_page }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end BODY -->
                                <!-- intro -->
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <p class="brand_intro">{!! nl2br($brand->brand_introduction) !!}</p>
                                    </div>
                                </div>
                                <!-- end intro -->
                            </div>
                        </div>
                    </div>
            @endforeach

            <!-- end brand index -->
            </div>
        </div>
    </div>


@endsection
