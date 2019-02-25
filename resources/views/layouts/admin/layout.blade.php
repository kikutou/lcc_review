<!doctype html>
<html class="no-js" lang="jp">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield("title")</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="{{ asset('admin/assets/images/icon/favicon.ico') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">

        <!-- amchart css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
        <!-- Start datatable css -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

        <!-- others css -->

        <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <!-- modernizr css -->
        <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    </head>

    <body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
        </div>
        <!-- preloader area end -->
        <!-- page container area start -->
        <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
        <div class="sidebar-header">
        <div class="logo">
        <a href="admin"><img src="{{ asset('assets/images/icon/logo.png') }}" alt="logo"></a>
        </div>
        </div>
        <div class="main-menu">
        <div class="menu-inner">
          <nav>
          <ul class="metismenu" id="menu">
            <li>
              <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>統計</span></a>
              <ul class="collapse">
                <li><a href="#">会員</a></li>
                <li><a href="#">記事</a></li>
            </ul>
          </li>
          <li
          @if(isset($type) && $type == "post")
            class="active"
          @endif
          >
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-book"></i><span>記事</span></a>
            <ul class="collapse">
              <li
              @if(isset($action) && $action == "index")
                class="active"
              @endif
              ><a href="{{ route('admin_get_post_index') }}">記事一覧</a></li>
              <li
              @if(isset($action) && $action == "add")
                class="active"
              @endif
              ><a href="{{ route('admin_get_post_add') }}">記事追加</a></li>
            </ul>
          </li>
          <li
          @if(isset($type) && $type == "user")
            class="active"
          @endif
          >
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>会員</span></a>
            <ul class="collapse">
              <li
              @if(isset($action) && $action == "index")
                class="active"
              @endif
              ><a href="{{ route('admin_get_user_index') }}">会員一覧</a></li>
              <li
              @if(isset($action) && $action == "add")
                class="active"
              @endif
              ><a href="{{ route('admin_get_user_add') }}">新規作成</a></li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-comments"></i><span>コメント</span></a>
            <ul class="collapse">
                <li><a href="#">コメント一覧</a></li>
            </ul>
          </li>
          <li
          @if(isset($type) && $type == "flight")
            class="active"
          @endif
          >
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-exchange-vertical"></i><span>フライト</span></a>
            <ul class="collapse">
                <li
                @if(isset($action) && $action == "index")
                  class="active"
                @endif
                ><a href="#">フライト一覧</a></li>
                <li
                @if(isset($action) && $action == "add")
                  class="active"
                @endif
                ><a href="#">新規作成</a></li>
            </ul>
          </li>
          <li
          @if(isset($type) && $type == "brand")
            class="active"
          @endif
          >
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-link"></i><span>航空会社</span></a>
            <ul class="collapse">
              <li
              @if(isset($action) && $action == "index")
                class="active"
              @endif
              ><a href="{{ route('admin_get_brand_index') }}">航空会社一覧</a></li>
              <li
              @if(isset($action) && $action == "add")
                class="active"
              @endif
              ><a href="{{ route('admin_get_brand_add') }}">新規作成</a></li>
            </ul>
          </li>
          <li
          @if(isset($type) && $type == "airport")
            class="active"
          @endif
          >
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-rss"></i><span>空港情報</span></a>
            <ul class="collapse">
              <li
              @if(isset($action) && $action == "index")
                class="active"
              @endif
              ><a href="{{ route('admin_get_airport_index') }}">空港情報一覧</a></li>
              <li
              @if(isset($action) && $action == "add")
                class="active"
              @endif
              ><a href="{{ route('admin_get_airport_add') }}">新規作成</a></li>
            </ul>
          </li>
          <li
          @if(isset($type) && $type == "category")
            class="active"
          @endif
          >
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-menu-alt"></i><span>カテゴリ</span></a>
            <ul class="collapse">
              <li
              @if(isset($action) && $action == "index")
                class="active"
              @endif
              ><a href="{{ route('admin_get_category_index') }}">カテゴリ一覧</a></li>
              <li
              @if(isset($action) && $action == "add")
                class="active"
              @endif
              ><a href="{{ route('admin_get_category_add') }}">新規作成</a></li>
            </ul>
          </li>
          <li
          @if(isset($type) && $type == "country")
            class="active"
          @endif
          >
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-map-alt"></i><span>国家</span></a>
            <ul class="collapse">
                <li
                @if(isset($action) && $action == "index")
                  class="active"
                @endif
                ><a href="{{ route('admin_get_country_index') }}">国家一覧</a></li>
                <li
                @if(isset($action) && $action == "add")
                  class="active"
                @endif
                ><a href="{{ route('admin_get_country_add') }}">国家追加</a></li>
            </ul>
          </li>
          <li
          @if(isset($type) && $type == "city")
            class="active"
          @endif
          >
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-location-pin"></i><span>都市</span></a>
            <ul class="collapse">
                <li
                @if(isset($action) && $action == "index")
                  class="active"
                @endif
                ><a href="{{ route('admin_get_city_index') }}">都市一覧</a></li>
                <li
                @if(isset($action) && $action == "add")
                  class="active"
                @endif
                ><a href="{{ route('admin_get_city_add') }}">都市追加</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    </div>
    </div>
    <!-- sidebar menu area end -->

    <!-- main content area start -->
    <div class="main-content">
      <!-- header area start -->
      <div class="header-area">
          <div class="row align-items-center">
              <!-- nav and search button -->
              <div class="col-md-6 col-sm-8 clearfix">
                  <div class="nav-btn pull-left">
                      <span></span>
                      <span></span>
                      <span></span>
                  </div>
                  <div class="search-box pull-left">
                      <form action="#">
                          <input type="text" name="search" placeholder="Search..." required>
                          <i class="ti-search"></i>
                      </form>
                  </div>
              </div>
              <!-- profile info & task notification -->
              <div class="col-md-6 col-sm-4 clearfix">
                  <ul class="notification-area pull-right">
                      <li id="full-view"><i class="ti-fullscreen"></i></li>
                      <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                      <li class="dropdown">
                          <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                              <span>2</span>
                          </i>
                          <div class="dropdown-menu bell-notify-box notify-box">
                              <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                              <div class="nofity-list">
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                      <div class="notify-text">
                                          <p>You have Changed Your Password</p>
                                          <span>Just Now</span>
                                      </div>
                                  </a>
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                      <div class="notify-text">
                                          <p>New Commetns On Post</p>
                                          <span>30 Seconds ago</span>
                                      </div>
                                  </a>
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                      <div class="notify-text">
                                          <p>Some special like you</p>
                                          <span>Just Now</span>
                                      </div>
                                  </a>
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                      <div class="notify-text">
                                          <p>New Commetns On Post</p>
                                          <span>30 Seconds ago</span>
                                      </div>
                                  </a>
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                      <div class="notify-text">
                                          <p>Some special like you</p>
                                          <span>Just Now</span>
                                      </div>
                                  </a>
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                      <div class="notify-text">
                                          <p>You have Changed Your Password</p>
                                          <span>Just Now</span>
                                      </div>
                                  </a>
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                      <div class="notify-text">
                                          <p>You have Changed Your Password</p>
                                          <span>Just Now</span>
                                      </div>
                                  </a>
                              </div>
                          </div>
                      </li>
                      <li class="dropdown">
                          <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                          <div class="dropdown-menu notify-box nt-enveloper-box">
                              <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                              <div class="nofity-list">
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb">
                                          <img src="assets/images/author/author-img1.jpg" alt="image">
                                      </div>
                                      <div class="notify-text">
                                          <p>Aglae Mayer</p>
                                          <span class="msg">Hey I am waiting for you...</span>
                                          <span>3:15 PM</span>
                                      </div>
                                  </a>
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb">
                                          <img src="assets/images/author/author-img2.jpg" alt="image">
                                      </div>
                                      <div class="notify-text">
                                          <p>Aglae Mayer</p>
                                          <span class="msg">When you can connect with me...</span>
                                          <span>3:15 PM</span>
                                      </div>
                                  </a>
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb">
                                          <img src="assets/images/author/author-img3.jpg" alt="image">
                                      </div>
                                      <div class="notify-text">
                                          <p>Aglae Mayer</p>
                                          <span class="msg">I missed you so much...</span>
                                          <span>3:15 PM</span>
                                      </div>
                                  </a>
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb">
                                          <img src="assets/images/author/author-img4.jpg" alt="image">
                                      </div>
                                      <div class="notify-text">
                                          <p>Aglae Mayer</p>
                                          <span class="msg">Your product is completely Ready...</span>
                                          <span>3:15 PM</span>
                                      </div>
                                  </a>
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb">
                                          <img src="assets/images/author/author-img2.jpg" alt="image">
                                      </div>
                                      <div class="notify-text">
                                          <p>Aglae Mayer</p>
                                          <span class="msg">Hey I am waiting for you...</span>
                                          <span>3:15 PM</span>
                                      </div>
                                  </a>
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb">
                                          <img src="assets/images/author/author-img1.jpg" alt="image">
                                      </div>
                                      <div class="notify-text">
                                          <p>Aglae Mayer</p>
                                          <span class="msg">Hey I am waiting for you...</span>
                                          <span>3:15 PM</span>
                                      </div>
                                  </a>
                                  <a href="#" class="notify-item">
                                      <div class="notify-thumb">
                                          <img src="assets/images/author/author-img3.jpg" alt="image">
                                      </div>
                                      <div class="notify-text">
                                          <p>Aglae Mayer</p>
                                          <span class="msg">Hey I am waiting for you...</span>
                                          <span>3:15 PM</span>
                                      </div>
                                  </a>
                              </div>
                          </div>
                      </li>
                      <li class="settings-btn">
                          <i class="ti-settings"></i>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <!-- header area end -->
      <!-- page title area start -->
      <div class="page-title-area">
          <div class="row align-items-center">
              <div class="col-sm-6">
                  <div class="breadcrumbs-area clearfix">
                      <h4 class="page-title pull-left">LCC Admin</h4>
                      <ul class="breadcrumbs pull-left">
                          <li><a href="admin">Home</a></li>
                          <li><span>
                            @if(isset($action) && $action == "index")
                              一覧
                            @endif
                            @if(isset($action) && $action == "add")
                              追加
                            @endif
                          </span></li>
                      </ul>
                  </div>
              </div>
              <div class="col-sm-6 clearfix">
                  <div class="user-profile pull-right">
                      <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                      <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i></h4>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Message</a>
                          <a class="dropdown-item" href="#">Settings</a>
                          <a class="dropdown-item" href="#">Log Out</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- page title area end -->
        @yield("content")

    </div>
    <!-- main content area end -->

    <!-- footer area start-->
    <footer>
    <div class="footer-area">
        <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
    </div>
    </footer>
    <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
    <ul class="nav offset-menu-tab">
        <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
    <li><a data-toggle="tab" href="#settings">Settings</a></li>
    </ul>
    <div class="offset-content tab-content">
        <div id="activity" class="tab-pane fade in show active">
        <div class="recent-activity">
        <div class="timeline-task">
        <div class="icon bg1">
        <i class="fa fa-envelope"></i>
        </div>
        <div class="tm-title">
        <h4>Rashed sent you an email</h4>
    <span class="time"><i class="ti-time"></i>09:35</span>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
    </p>
    </div>
    <div class="timeline-task">
        <div class="icon bg2">
        <i class="fa fa-check"></i>
        </div>
        <div class="tm-title">
        <h4>Added</h4>
        <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur.
    </p>
    </div>
    <div class="timeline-task">
        <div class="icon bg2">
        <i class="fa fa-exclamation-triangle"></i>
        </div>
        <div class="tm-title">
        <h4>You missed you Password!</h4>
    <span class="time"><i class="ti-time"></i>09:20 Am</span>
    </div>
    </div>
    <div class="timeline-task">
        <div class="icon bg3">
        <i class="fa fa-bomb"></i>
        </div>
        <div class="tm-title">
        <h4>Member waiting for you Attention</h4>
    <span class="time"><i class="ti-time"></i>09:35</span>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
    </p>
    </div>
    <div class="timeline-task">
        <div class="icon bg3">
        <i class="ti-signal"></i>
        </div>
        <div class="tm-title">
        <h4>You Added Kaji Patha few minutes ago</h4>
    <span class="time"><i class="ti-time"></i>01 minutes ago</span>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
    </p>
    </div>
    <div class="timeline-task">
        <div class="icon bg1">
        <i class="fa fa-envelope"></i>
        </div>
        <div class="tm-title">
        <h4>Ratul Hamba sent you an email</h4>
    <span class="time"><i class="ti-time"></i>09:35</span>
    </div>
    <p>Hello sir , where are you, i am egerly waiting for you.
                                                          </p>
                                                          </div>
                                                          <div class="timeline-task">
        <div class="icon bg2">
        <i class="fa fa-exclamation-triangle"></i>
        </div>
        <div class="tm-title">
        <h4>Rashed sent you an email</h4>
    <span class="time"><i class="ti-time"></i>09:35</span>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
    </p>
    </div>
    <div class="timeline-task">
        <div class="icon bg2">
        <i class="fa fa-exclamation-triangle"></i>
        </div>
        <div class="tm-title">
        <h4>Rashed sent you an email</h4>
    <span class="time"><i class="ti-time"></i>09:35</span>
    </div>
    </div>
    <div class="timeline-task">
        <div class="icon bg3">
        <i class="fa fa-bomb"></i>
        </div>
        <div class="tm-title">
        <h4>Rashed sent you an email</h4>
    <span class="time"><i class="ti-time"></i>09:35</span>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
    </p>
    </div>
    <div class="timeline-task">
        <div class="icon bg3">
        <i class="ti-signal"></i>
        </div>
        <div class="tm-title">
        <h4>Rashed sent you an email</h4>
    <span class="time"><i class="ti-time"></i>09:35</span>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
    </p>
    </div>
    </div>
    </div>
    <div id="settings" class="tab-pane fade">
        <div class="offset-settings">
        <h4>General Settings</h4>
    <div class="settings-list">
        <div class="s-settings">
        <div class="s-sw-title">
        <h5>Notifications</h5>
        <div class="s-swtich">
        <input type="checkbox" id="switch1" />
        <label for="switch1">Toggle</label>
        </div>
        </div>
        <p>Keep it 'On' When you want to get all the notification.</p>
    </div>
    <div class="s-settings">
        <div class="s-sw-title">
        <h5>Show recent activity</h5>
    <div class="s-swtich">
        <input type="checkbox" id="switch2" />
        <label for="switch2">Toggle</label>
        </div>
        </div>
        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
    </div>
    <div class="s-settings">
        <div class="s-sw-title">
        <h5>Show your emails</h5>
    <div class="s-swtich">
        <input type="checkbox" id="switch3" />
        <label for="switch3">Toggle</label>
        </div>
        </div>
        <p>Show email so that easily find you.</p>
    </div>
    <div class="s-settings">
        <div class="s-sw-title">
        <h5>Show Task statistics</h5>
    <div class="s-swtich">
        <input type="checkbox" id="switch4" />
        <label for="switch4">Toggle</label>
        </div>
        </div>
        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
    </div>
    <div class="s-settings">
        <div class="s-sw-title">
        <h5>Notifications</h5>
        <div class="s-swtich">
        <input type="checkbox" id="switch5" />
        <label for="switch5">Toggle</label>
        </div>
        </div>
        <p>Use checkboxes when looking for yes or no answers.</p>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="{{ asset("assets/js/vendor/jquery-2.2.4.min.js") }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset("assets/js/popper.min.js") }}"></script>
    <script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("assets/js/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("assets/js/metisMenu.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.slimscroll.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.slicknav.min.js") }}"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>


    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="{{ asset("assets/js/line-chart.js") }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset("assets/js/pie-chart.js") }}"></script>
    <!-- others plugins -->
    <script src="{{ asset("assets/js/plugins.js") }}"></script>
    <script src="{{ asset("assets/js/scripts.js") }}"></script>
    </body>

</html>
