
@extends("layouts.user.layout", ["type" => "brand"])

@section("title", "航空会社詳細")

@section("content")

<meta charset="utf-8">
<link rel="stylesheet" href="{{ URL::asset('css/brand_css.css') }}">

<body align="center" bgcolor="LightSkyBlue">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
          <!-- login check -->
        @if($login_check)
        <form action="{{ route('user_post_brand_detail', ['id' => $brand->id ]) }}" method=post>
          @csrf
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
          <!-- 只有设定了name才能在传递时用于传递数据 -->
          <div id="c-color">
          <div class="row">
            <div class="col-md-4">
            <p>サービス</p>
            <select class="" name="service">
              @for($i=5; $i>=1; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>


          <div class="col-md-4">
            <p>清潔感</p>
            <select class="" name="cleaness">
              @for($i=5; $i>=1; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>


          <div class="col-md-4">
            <p>飲食</p>
            <select class="" name="food">
              @for($i=5; $i>=1; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
        </div>

          <div class="row">
          <div class="col-md-4">
            <p>席の快適</p>
            <select class="" name="chair">
              @for($i=5; $i>=1; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>

          <div class="col-md-4">
          <p>エンターテインメント</p>
          <select class="" name="entertainment">
            @for($i=5; $i>=1; $i--)
              <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
        </div>


        <div class="col-md-4">
        <p>コストパフォーマンス</p>
        <select class="" name="cost">
          @for($i=5; $i>=1; $i--)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>
        </div>
      </div>
    </div>

      <div class="row" id="text-color">
      <div class="col-md-4">
      <p>コメントタイトル</p>
      <input type="text" name="comment_title">
      </div>

      <div class="col-md-8">
      <p>コメント内容</p>
<textarea name="comment_content" class="textarea-color">
</textarea>
          <div>
          <input type="submit" value="提出">
        </div>
      </div>
    </div>
    @else
    <div class="row justify-content-md-center loginbutton">
      <div class="col-md-8"><a href="{{route('user_get_login')}}" type="button" class="btn btn-secondary btn-md">ログイン</a></div>
    </div>
    <div class="row justify-content-md-center loginbutton">
      <div class="col-md-8">ログインしてからコメントをしてください。</div>
    </div>
    @endif
  </form>
        <div class="row" id="flights-color">

          @foreach($results as $result => $value)
          <div class="col-md-2">{{ $value['item_code'] }}</div>
          <div class="col-md-2">{{ $value['title'] }}</div>
          <div class="col-md-2">{{ $value['grade'] }}</div>
          @endforeach


          @foreach($comments as $comment => $value)
          <div class="col-md-6"><p>タイトル:{{ $value['title'] }}<p></div>
          <div class="col-md-6"><p>コメント:{{ $value['content'] }}</p></div>
          @endforeach

        </div>

              <div class="flights">
              <div class="row" id="flights-color">
                <div class="col-md-2">
                @foreach($brand->flights as $flight)
                 <p>便番号:{{ $flight->flight_number }}</p>
                @endforeach
              </div>
              <div class="col-md-2">
                @foreach($brand->flights as $flight)
                 <p>出発空港:{{$flight->start_airport->airport_name }}</p>
                @endforeach
              </div>
              <div class="col-md-2">
                @foreach($brand->flights as $flight)
                 <p>到着空港:{{ $flight->destination_airport->airport_name }}</p>
                @endforeach
              </div>
              <div class="col-md-3">
                @foreach($brand->flights as $flight)
                 <p>出発時刻:{{ $flight->start_time }}</p>
                @endforeach
              </div>
              <div class="col-md-3">
                @foreach($brand->flights as $flight)
                 <p>到着時刻:{{ $flight->destination_time }}</p>
                @endforeach
              </div>
            </div>

            </div>

      </div>
    </div>
  </div>

</body>

@endsection
