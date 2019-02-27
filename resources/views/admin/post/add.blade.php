@extends("layouts.admin.layout", ["type" => "post", "action" => "add"])
<!-- layout继承，php7的函数特有简略表达[]，传递了2个值 -->

@section("title", "記事の追加")


@section("content")
<div class="main-content-inner">
  <div class="row">
    <!-- Textual inputs start -->
    <div class="col-12 mt-5">
      <div class="card">
        <div class="card-body">
          <h3 class="header-title">記事の新規作成</h3>
          <form action="{{ route('admin_post_post_add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- 記事名 -->
            <div class="form-group">
              <label for="title-input" class="col-form-label">タイトル</label>
              <input class="form-control" type="text" placeholder="タイトルを入力してください" id="title-input" name="title" value="{{old('title')}}">
              @if($errors->has('title'))
              <p>{{ $errors->first('title') }}</p>
              @endif
            </div>
            <!-- 記事画像 -->
            <div class="form-group">
              <label  class="col-form-label" for="post-pic">画像追加</label>
              <div class="input-group mb-3">
                <input type="file" name="picture" value="{{old('picture')}}" id="post-pic">
                @if($errors->has('picture'))
                <p>{{ $errors->first('picture') }}</p>
                @endif
              </div>
            </div>
            <!-- 航空会社 -->
            <div class="form-group">
              <label class="col-form-label">航空会社</label>
              <select class="custom-select" name="brand_id">
                @foreach($brands as $brand)
                {{$brand_id = $brand->id}}
                <option value="{{ old('$brand->id')}}"
                  @if(old('brand_id') == $brand_id)
                  selected
                  @endif
                  >{{ $brand->brand_name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="row">
                <!-- カテゴリー -->
                <div class="form-group col-md-4">
                  <label class="col-form-label">カテゴリー</label>
                  <select class="custom-select" name="mtb_category_id">
                    @foreach($categories as $category)
                    {{$category_id = $category->id}}
                    <option value="{{ old('$category->id')}}"
                      @if(old('mtb_category_id') == $category_id)
                      selected
                      @endif
                      >{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- 管理員 -->
                  <div class="form-group col-md-4">
                    <label class="col-form-label">管理員</label>
                    <select class="custom-select" name="admin_id">
                      @foreach($admins as $admin)
                      {{$admin_id = $admin->id}}
                      <option value="{{ old('$admin->id')}}"
                        @if(old('admin_id') == $admin_id)
                        selected
                        @endif
                        >{{ $admin->admin_user }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <!-- 有効期間 -->
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">開始時間</label>
                        <input class="form-control" type="text" value="{{old('start_time')}}" name="start_time">
                        @if($errors->has('start_time'))
                        <p>{{ $errors->first('start_time') }}</p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">終了時間</label>
                        <input class="form-control " type="text" value="{{old('finish_time')}}" name="finish_time">
                        @if($errors->has('finish_time'))
                        <p>{{ $errors->first('finish_time') }}</p>
                        @endif
                      </div>
                    </div>
                  </div>

                  <!-- 内容 -->
                  <div class="form-group">
                    <label for="content-input" class="col-form-label">内容</label>
                    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                    <textarea name="content" class="form-control my-editor form-control" id="content-input" rows="8" cols="80">{!! old('content') !!}</textarea>
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
                    @if($errors->has('content'))
                    <p>{{ $errors->first('content') }}</p>
                    @endif
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
              </div>
            </div>

          </div>
        </div>
      </div>
      @endsection
