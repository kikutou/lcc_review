
@extends("layouts.user.layout", ["type" => "brand"])

@section("title", "航空会社一覧")

@section("content")

<meta charset="utf-8">
<link rel="stylesheet" href="{{ URL::asset('css/brand_css.css') }}">

<body align="center" bgcolor="LightSkyBlue">
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


    @foreach($brands as $brand)
    <div>
  <div>
    <table align="center">
        <tr>
           <td class="pic" rowspan="2"><img src="{{ asset($brand->logo_picture) }}" alt="logo" width="100" ></td>
           <td class="brand_namefont"><p><font>{{ $brand->brand_name }}</font></p></td>
        </tr>
        <tr>
          <td class="brand_homepage">{{ $brand->home_page }}</td>
        </tr>
    </table>
    <div class="intro">
      <p><?php echo substr("{$brand->brand_introduction}",0,30);?></p>
    </div>
  </div>





  </div>
    @endforeach
</div>
</div>
</div>
</body>

@endsection
