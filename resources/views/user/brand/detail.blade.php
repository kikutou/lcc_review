
@extends("layouts.user.layout", ["type" => "brand"])

@section("title", "航空会社詳細")

@section("content")

<meta charset="utf-8">
<link rel="stylesheet" href="{{ URL::asset('css/brand_css.css') }}">

<body align="center" bgcolor="LightSkyBlue">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">


          <div class=detaildiv>
            <div class=namepage>
              <div>
                <p class=name>{{ $brand->brand_name }}</p>
              </div>
              <div>
                <img src="{{ asset($brand->profile_picture) }}" alt="profile" width="300">
              </div>
              <div>
                <a href="{{$brand->home_page}}">{{ $brand->home_page }}</a>
              </div>
              </br>
              <div>
                <p class=introduction>{{ $brand->brand_introduction }}</p>
              </div>
            </div>
          </div>
              <div class="flights">
                @foreach($brand->flights as $flight)
                <div>
                 <p>便番号:{{ $flight->flight_number }}</p>
                </div>
                @endforeach

                @foreach($brand->flights as $flight)
                <div>
                 <p>出発空港:{{$flight->start_airport->airport_name }}</p>
                </div>
                @endforeach

                @foreach($brand->flights as $flight)
                <div>
                 <p>到着空港:{{ $flight->destination_airport->airport_name }}</p>
                </div>
                @endforeach

                @foreach($brand->flights as $flight)
                <div>
                 <p>出発時刻:{{ $flight->start_time }}</p>
                </div>
                @endforeach

                @foreach($brand->flights as $flight)
                <div>
                 <p>到着時刻:{{ $flight->destination_time }}</p>
                </div>
                @endforeach
              </div>

      </div>
    </div>
</div>
</body>

@endsection
