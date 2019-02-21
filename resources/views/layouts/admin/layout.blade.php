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
        <a href="index.html"><img src="{{ asset('assets/images/icon/logo.png') }}" alt="logo"></a>
        </div>
        </div>
        <div class="main-menu">
        <div class="menu-inner">
        <nav>
        <ul class="metismenu" id="menu">
        <li class="active">
        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
    <ul class="collapse">
        <li class="active"><a href="index.html">user</a></li>
    <li><a href="index2.html">post</a></li>
    </ul>
    </li>
    <li>
    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-book"></i><span>Post
    </span></a>
    <ul class="collapse">
        <li><a href="index.html">Post list</a></li>
        <li><a href="index3-horizontalmenu.html">New post</a></li>
        <li><a href="index3-horizontalmenu.html">Post manage</a></li>
    </ul>
    </li>
    <li>
    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>User</span></a>
    <ul class="collapse">
      <li><a href="barchart.html">User list</a></li>
      <li><a href="linechart.html">User manage</a></li>
    </ul>
    </li>
    <li>
    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-comments"></i><span>Comment</span></a>
    <ul class="collapse">
        <li><a href="accordion.html">Comment list</a></li>
        <li><a href="accordion.html">Comment manage</a></li>
    </ul>
    </li>
    <li>
    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-exchange-vertical"></i><span>Flight</span></a>
    <ul class="collapse">
        <li><a href="fontawesome.html">Flight list</a></li>
        <li><a href="themify.html">New flight</a></li>
        <li><a href="themify.html">Flight manage</a></li>
    </ul>
    </li>
    <li>
    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-link"></i><span>Brand</span></a>
    <ul class="collapse">
        <li><a href="table-basic.html">Brand list</a></li>
    <li><a href="table-layout.html">New brand</a></li>
    <li><a href="datatable.html">Brand manage</a></li>
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
