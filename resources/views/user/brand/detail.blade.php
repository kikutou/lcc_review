@extends("layouts.user.layout", ["type" => "brand"])

@section("title", "航空会社詳細")

@section("content")

    <link rel="stylesheet" href="{{ asset('css/brand_css.css') }}">

    <div class="detail" class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class=detaildiv>
                    <div class="namepage">
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


                <!-- login check -->
                @if($login_check)
                    <form action="{{ route('user_post_brand_detail', ['id' => $brand->id ]) }}" method=post>
                        @csrf

                        <!-- 只有设定了name才能在传递时用于传递数据 -->
                        <div id="c-color">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>サービス</p>
                                    <div class="rating">
                                        @for($i=5; $i>=1; $i--)
                                            <span class="star" name="service" value="{{ $i }}">&#9733;</span>
                                        @endfor
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <p>清潔感</p>
                                    <div class="rating">
                                        @for($i=5; $i>=1; $i--)
                                            <span class="star" name="cleaness" value="{{ $i }}">&#9733;</span>
                                        @endfor
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <p>飲食</p>
                                    <div class="rating">
                                        @for($i=5; $i>=1; $i--)
                                            <span class="star" name="food" value="{{ $i }}">&#9733;</span>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <p>席の快適</p>
                                    <div class="rating">
                                        @for($i=5; $i>=1; $i--)
                                            <span class="star" name="chair" value="{{ $i }}">&#9733;</span>
                                        @endfor
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <p>エンターテインメント</p>
                                    <div class="rating">
                                        @for($i=5; $i>=1; $i--)
                                            <span class="star" name="entertainment" value="{{ $i }}">&#9733;</span>
                                        @endfor
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <p>コストパフォーマンス</p>
                                    <div class="rating">
                                        @for($i=5; $i>=1; $i--)
                                            <span class="star" name="cost" value="{{ $i }}">&#9733;</span>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script language="javascript" type="text/javascript">
                        $('.star').on('click', function(){
                            $('.star').addClass('selected');
                            var count = $(this).attr('name');
                            for (var i=0; i<count-1; i++){
                                $('.star').eq(i).removeClass('selected');
                            }
                        });
                        </script>



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
                    </form>
                @else
                    <div class="row justify-content-md-center loginbutton">
                        <div class="col-md-8"><a href="{{route('user_get_login')}}" type="button"
                            class="btn btn-secondary btn-md">ログイン</a></div>
                        </div>
                        <div class="row justify-content-md-center loginbutton">
                            <div class="col-md-8">ログインしてからコメントをしてください。</div>
                        </div>
                    @endif



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


    @endsection
