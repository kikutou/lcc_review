
@extends("layouts.user.layout", ["type" => "brand"])

@section("title", "航空会社詳細")

@section("content")

<meta charset="utf-8">

<body align="center" bgcolor="LightSkyBlue">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">

          @foreach($brands as $brand)
          <div>
              <div>
                <p><a href="{{route('admin_get_brand_detail',['id'=> $brand->id]) }}">{{ $brand->brand_name }}</p>
              </div>

              <div>
                <a>{{ $brand->home_page }}</a>
              </div>

              <div>
                <img src="{{ asset($brand->profile_picture) }}" alt="profile" width="150">
              </div>

              <div>
                <textera>{{ $brand->brand_introduction }}</textera>
              </div>
            </div>
          @endforeach
      </div>
    </div>
</div>
</body>

@endsection
