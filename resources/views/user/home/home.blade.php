@extends("layouts.user.home_layout")
@section("content")

    <!-- content -->
    <div class="site-blocks-cover email_mag" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">

            <div class="row row-custom align-items-center">
                <div class="col-md-10">
                    <h1 class="mb-2 text-black w-75"><span class="font-weight-bold">Largest LCC</span> Site On The Net
                    </h1>
                    <div class="job-search">
                        <div class="tab-content bg-white p-4 rounded" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-job" role="tabpanel"
                                 aria-labelledby="pills-job-tab">

                                <div class="py-5 bg-secondary">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-white h2 font-weihgt-normal mb-4">Post Subscribe</h2>
                                            </div>
                                        </div>
                                        <form action="{{ route('user_post_home') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <input type="email" name="mail"
                                                           class="form-control border-0 mb-3 mb-md-0"
                                                           placeholder="メールアドレス">
                                                    @if($errors->has('mail'))
                                                        <p class="text-black form_check_text">{{ $errors->first('mail') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-dark mb-3" height=" 45">購読する
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="brand_check">
                                                <div class="col-md-auto">
                                                    <div class="text-black form_check_text">航空会社：
                                                        @if($errors->has('brand_ids'))
                                                            <p class="text-black form_check_text">{{ $errors->first('brand_ids') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @foreach($brands as $brand)
                                                        <div class="col-md-auto">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" name="brand_ids[]"
                                                                       class="custom-control-input"
                                                                       id="{{ $brand->brand_name }}"
                                                                       value="{{ $brand->id }}"
                                                                       checked
                                                                >
                                                                <label class="custom-control-label form_check_text"
                                                                       for="{{ $brand->brand_name }}">{{ $brand->brand_name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="category_check">
                                                <div class="col-md-auto">
                                                    <div class="text-black form_check_text">カテゴリー：
                                                        @if($errors->has('category_ids'))
                                                            <p class="text-black form_check_text">{{ $errors->first('category_ids') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @foreach($categories as $category)
                                                        <div class="col-md-2">
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" name="category_ids[]"
                                                                       class="custom-control-input"
                                                                       id="{{ $category->category_name }}"
                                                                       value="{{ $category->id }}"
                                                                       checked
                                                                >
                                                                <label class="custom-control-label form_check_text"
                                                                       for="{{ $category->category_name }}">{{ $category->category_name }}</label>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <!-- session message -->
                                @if(Session::get("message"))
                                    <div class="row">
                                        <div class="alert alert-success alert-dismissible fade show col-md-6 offset-md-3"
                                             role="alert">
                                            <strong>{{ Session::get("message") }}</strong>
                                        </div>
                                    </div>
                            @endif
                            <!-- end session -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- post list -->
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-6" data-aos="fade">
                    <h2 class="text-black">Lcc Scanner <strong>Posts</strong></h2>
                </div>
            </div>
            <div class="row hosting">
                @php $out=1 @endphp
                @foreach($posts as $post)
                    <a href="{{route('user_get_post_detail',['id'=> $post->id]) }}">
                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="100">
                            <div class="unit-3 h-100 bg-white">
                                <div class="d-flex align-items-center mb-3 unit-3-heading">
                                    <img src="{{asset($post->picture)}}" alt="" width="100">
                                    <h2 class="h5 post_title">{{ $post->title }}</h2>
                                </div>
                                <div class="unit-3-body">
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
                    </a>
                    @if($out>5)
                        @break
                    @else
                        @php $out++ @endphp
                    @endif
                @endforeach
            </div>

        </div>
    </div>
    <!-- end post list -->
    <!-- brand list -->
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-6" data-aos="fade">
                    <h2 class="text-black">Airline<strong>Companies</strong></h2>
                </div>
            </div>

            <div class="row hosting">
                @php($out=1)
                @foreach($brands as $brand)
                    <div class="col-md-8 col-lg-8 mb-5 mb-lg-8 offset-lg-2" data-aos="fade" data-aos-delay="100">

                        <div class="unit-3 h-100 bg-white">

                            <div class="d-flex align-items-center mb-3 unit-3-heading">
                                <a href="{{route('user_get_brand_detail',['id'=> $brand->id]) }}">
                                    <img src="{{asset($brand->logo_picture)}}" alt="" width="100">
                                </a>
                                <a href="{{route('user_get_brand_detail',['id'=> $brand->id]) }}">
                                    <h2 class="h5 post_title">{{ $brand->brand_name }}</h2>
                                </a>
                            </div>
                            <div class="unit-3-body">
                                <p class="card-text">{{ $brand->intro($brand->brand_introduction) }}...</p>
                            </div>
                        </div>
                    </div>
                    @if($out>5)
                        @break
                    @else
                        @php($out++)
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- end brand list -->
    <!-- end content -->
    </div>
@endsection
