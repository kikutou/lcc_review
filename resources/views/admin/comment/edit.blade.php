@extends("layouts.admin.layout", ["type" => "comment"])

@section("title", "コメントの編集")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">コメントの編集</h3>
              <!-- form start -->
              <form action="{{route('admin_post_comment_edit', ['id' => $comment->id])}}" method="post" >
                @csrf
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                <!-- ユーザーコード -->
                <div class="form-group">
                  <label for="user-code" class="col-form-label">ユーザーコード</label>
                  <select class="custom-select" name="user_id" id="user-code">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}"
                      @if(old('user_id', $comment->user_id) == $user->id)
                      selected
                      @endif
                      >{{ $user->code }}</option>
                      @endforeach
                    </select>
                  </div>


                  <div class="row">
                    <!-- 航空会社 -->
                    <div class="form-group col-md-4">
                      <label class="col-form-label">航空会社</label>
                      <select class="custom-select" name="brand_id">
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"
                          @if(old('brand_id', $comment->brand_id) == $brand->id)
                          selected
                          @endif
                          >{{ $brand->brand_name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <!-- 航路 -->
                      <div class="form-group col-md-4">
                        <label class="col-form-label">航路</label>
                        <select class="custom-select" name="flight_id">
                          @foreach($flights as $flight)
                          <option value="{{ $flight->id }}"
                            @if(old('flight_id', $comment->flight_id) == $flight->id)
                            selected
                            @endif
                            >{{ $flight->flight_number }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>


                      <!-- level comment 1-->
                      <div class="row">
                        <!-- サービス -->
                        <div class="form-group col-md-4">
                          <label class="col-form-label">サービス</label>
                          <select class="custom-select" name="service">
                            <option value="1" @if(old('service', $comment->service) == "1") selected @endif>とても良い</option>
                            <option value="2" @if(old('service', $comment->service) == "2") selected @endif>良い</option>
                            <option value="3" @if(old('service', $comment->service) == "3") selected @endif>普通</option>
                            <option value="4" @if(old('service', $comment->service) == "4") selected @endif>悪い</option>
                            <option value="5" @if(old('service', $comment->service) == "5") selected @endif>とても悪い</option>
                          </select>
                        </div>
                        <!-- 清潔感 -->
                        <div class="form-group col-md-4">
                          <label class="col-form-label">清潔感</label>
                          <select class="custom-select" name="clean">
                            <option value="1" @if(old('clean', $comment->clean) == "1") selected @endif>とても良い</option>
                            <option value="2" @if(old('clean', $comment->clean) == "2") selected @endif>良い</option>
                            <option value="3" @if(old('clean', $comment->clean) == "3") selected @endif>普通</option>
                            <option value="4" @if(old('clean', $comment->clean) == "4") selected @endif>悪い</option>
                            <option value="5" @if(old('clean', $comment->clean) == "5") selected @endif>とても悪い</option>
                          </select>
                        </div>
                        <!-- 飲食 -->
                        <div class="form-group col-md-4">
                          <label class="col-form-label">飲食</label>
                          <select class="custom-select" name="food">
                            <option value="1" @if(old('food', $comment->food) == "1") selected @endif>とても良い</option>
                            <option value="2" @if(old('food', $comment->food) == "2") selected @endif>良い</option>
                            <option value="3" @if(old('food', $comment->food) == "3") selected @endif>普通</option>
                            <option value="4" @if(old('food', $comment->food) == "4") selected @endif>悪い</option>
                            <option value="5" @if(old('food', $comment->food) == "5") selected @endif>とても悪い</option>
                          </select>
                        </div>
                      </div>

                      <!-- level comment 2-->
                      <div class="row">
                        <!-- 座席の快適 -->
                        <div class="form-group col-md-4">
                          <label class="col-form-label">座席の快適</label>
                          <select class="custom-select" name="seat">
                            <option value="1" @if(old('seat', $comment->seat) == "1") selected @endif>とても良い</option>
                            <option value="2" @if(old('seat', $comment->seat) == "2") selected @endif>良い</option>
                            <option value="3" @if(old('seat', $comment->seat) == "3") selected @endif>普通</option>
                            <option value="4" @if(old('seat', $comment->seat) == "4") selected @endif>悪い</option>
                            <option value="5" @if(old('seat', $comment->seat) == "5") selected @endif>とても悪い</option>
                          </select>
                        </div>
                        <!-- エンターテインメント -->
                        <div class="form-group col-md-4">
                          <label class="col-form-label">エンターテインメント</label>
                          <select class="custom-select" name="entertainment">
                            <option value="1" @if(old('entertainment', $comment->entertainment) == "1") selected @endif>とても良い</option>
                            <option value="2" @if(old('entertainment', $comment->entertainment) == "2") selected @endif>良い</option>
                            <option value="3" @if(old('entertainment', $comment->entertainment) == "3") selected @endif>普通</option>
                            <option value="4" @if(old('entertainment', $comment->entertainment) == "4") selected @endif>悪い</option>
                            <option value="5" @if(old('entertainment', $comment->entertainment) == "5") selected @endif>とても悪い</option>
                          </select>
                        </div>
                        <!-- コストパフォーマンス -->
                        <div class="form-group col-md-4">
                          <label class="col-form-label">コストパフォーマンス</label>
                          <select class="custom-select" name="cost_performance">
                            <option value="1" @if(old('cost_performance', $comment->cost_performance) == "1") selected @endif>とても良い</option>
                            <option value="2" @if(old('cost_performance', $comment->cost_performance) == "2") selected @endif>良い</option>
                            <option value="3" @if(old('cost_performance', $comment->cost_performance) == "3") selected @endif>普通</option>
                            <option value="4" @if(old('cost_performance', $comment->cost_performance) == "4") selected @endif>悪い</option>
                            <option value="5" @if(old('cost_performance', $comment->cost_performance) == "5") selected @endif>とても悪い</option>
                          </select>
                        </div>
                      </div>

                      <!-- 感想 -->
                      <div class="form-group">
                        <label for="content-input" class="col-form-label">コメント内容</label>
                        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                        <textarea name="comment" class="form-control my-editor form-control" id="content-input" rows="8" cols="80">{!! old('comment', $comment->comment) !!}</textarea>
                        <script>
                          var editor_config = {
                            path_absolute : "/",
                            selector: "textarea.my-editor",
                            plugins: [
                              "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                              "searchreplace wordcount visualblocks visualchars code fullscreen",
                              "insertdatetime media nonbreaking save table contextmenu directionality",
                              "emoticons template paste textcolor colorpicker textpattern"
                            ],
                            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                            relative_urls: false,
                            file_browser_callback : function(field_name, url, type, win) {
                              var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                              var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                              var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                              if (type == 'image') {
                                cmsURL = cmsURL + "&type=Images";
                              } else {
                                cmsURL = cmsURL + "&type=Files";
                              }

                              tinyMCE.activeEditor.windowManager.open({
                                file : cmsURL,
                                title : 'Filemanager',
                                width : x * 0.8,
                                height : y * 0.8,
                                resizable : "yes",
                                close_previous : "no"
                              });
                            }
                          };

                          tinymce.init(editor_config);
                        </script>
                        @if($errors->has('comment'))
                        <p>{{ $errors->first('comment') }}</p>
                        @endif
                      </div>


                      <!-- 審査状況 -->
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label class="col-form-label">審査状況</label>
                          <select class="custom-select" name="mtb_inspect_status_id">
                            @foreach($inspect_statuses as $inspect_status)
                            <option value="{{ $inspect_status->id }}"
                              @if(old('mtb_inspect_status_id', $comment->mtb_inspect_status_id) ==  $inspect_status->id)
                              selected
                              @endif
                              >{{ $inspect_status->inspect_status }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <!-- 審査メモ -->
                        <div class="form-group">
                          <label for="memo-input" class="col-form-label">審査メモ</label>
                          <input class="form-control" type="text" placeholder="審査メモを入力してください" id="memo-input" name="inspect_memo" value="{{old('inspect_memo', $comment->inspect_memo)}}">
                        </div>

                      <!-- button -->
                      <div class="row justify-content-md-center">
                        <div class="col col-lg-2">
                          <input class="btn btn-rounded btn-primary mb-3" type="submit" value="Submit">
                        </div>
                        <div class="col-md-auto">
                        </div>
                        <div class="col col-lg-2">
                          <input type="reset" class="btn btn-rounded btn-danger mb-3" value="Reset">
                        </div>
                      </div>
                    </form>
                    <!-- form end -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
