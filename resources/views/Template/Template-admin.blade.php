<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Codedthemes">
    <meta name="keywords" content="flat ui, admin flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Codedthemes">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('assets-admin/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Themify font -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/icon/icofont/css/icofont.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/pages/flag-icon/flag-icon.min.css')}}">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/pages/menu-search/css/component.css')}}">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/plugins/animate.css/animate.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/css/style.css')}}">
    <!--color css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/css/linearicons.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/css/simple-line-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/css/jquery.mCustomScrollbar.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/plugins/DataTables/Responsive-2.2.1/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/plugins/DataTables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    @yield('header')
    <style type="text/css">
    #notification{
      display: none;
    }
    th, td{
      white-space: normal;
    }
  </style>
</head>

<body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
    <div class="ball-scale">
      <div></div>
    </div>
  </div>
  <!-- Pre-loader end -->

  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

      <nav class="navbar header-navbar pcoded-header" style="background-color: #0277bd;">
        <div class="navbar-wrapper">
          <div class="navbar-logo" data-navbar-theme="theme4">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
              <i class="ti-menu"></i>
            </a>
            <a class="mobile-search morphsearch-search" href="#">
              <i class="ti-search"></i>
            </a>
            <a href="#!">
              <img class="img-fluid" src="{{asset('assets-admin/images/logo.png')}}" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
              <i class="ti-more"></i>
            </a>
          </div>
          <div class="navbar-container container-fluid m-0">
            <div>
              <ul class="nav-left">
                <li>
                  <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>
                <li>
                  <a class="main-search morphsearch-search" href="#">
                    <!-- themify icon -->
                    <i class="ti-search"></i>
                  </a>
                </li>
                <li>
                  <a href="#!" onclick="javascript:toggleFullScreen()">
                    <i class="ti-fullscreen"></i>
                  </a>
                </li>
                <li class="mega-menu-top">
                  <a href="#">
                    Mega
                    <i class="ti-angle-down"></i>
                  </a>
                  <ul class="show-notification row">
                    <li class="col-sm-3">
                      <h6 class="mega-menu-title">Popular Links</h6>
                      <ul class="mega-menu-links">
                        <li><a href="form-elements-component.html">Form Elements</a></li>
                        <li><a href="button.html">Buttons</a></li>
                        <li><a href="map-google.html">Maps</a></li>
                        <li><a href="#!">Contact Cards</a></li>
                        <li><a href="user-profile.html">User Information</a></li>
                        <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                      </ul>
                    </li>
                    <li class="col-sm-3">
                      <h6 class="mega-menu-title">Mailbox</h6>
                      <ul class="mega-mailbox">
                        <li>
                          <a href="#" class="media">
                            <div class="media-left">
                              <i class="ti-folder"></i>
                            </div>
                            <div class="media-body">
                              <h5>Data Backup</h5>
                              <small class="text-muted">Store your data</small>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="#" class="media">
                            <div class="media-left">
                              <i class="ti-headphone-alt"></i>
                            </div>
                            <div class="media-body">
                              <h5>Support</h5>
                              <small class="text-muted">24-hour support</small>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="#" class="media">
                            <div class="media-left">
                              <i class="ti-dropbox"></i>
                            </div>
                            <div class="media-body">
                              <h5>Drop-box</h5>
                              <small class="text-muted">Store large amount of data in one-box only
                              </small>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="#" class="media">
                            <div class="media-left">
                              <i class="ti-location-pin"></i>
                            </div>
                            <div class="media-body">
                              <h5>Location</h5>
                              <small class="text-muted">Find Your Location with ease of use</small>
                            </div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="col-sm-3">
                      <h6 class="mega-menu-title">Gallery</h6>
                      <div class="row m-b-20">
                        <div class="col-sm-4"><img class="img-fluid img-thumbnail" src="{{asset('assets-admin/images/mega-menu/01.jpg')}}" alt="Gallery-1">
                        </div>
                        <div class="col-sm-4"><img class="img-fluid img-thumbnail" src="{{asset('assets-admin/images/mega-menu/02.jpg')}}" alt="Gallery-2">
                        </div>
                        <div class="col-sm-4"><img class="img-fluid img-thumbnail" src="{{asset('assets-admin/images/mega-menu/03.jpg')}}" alt="Gallery-3">
                        </div>
                      </div>
                      <div class="row m-b-20">
                        <div class="col-sm-4"><img class="img-fluid img-thumbnail" src="{{asset('assets-admin/images/mega-menu/04.jpg')}}" alt="Gallery-4">
                        </div>
                        <div class="col-sm-4"><img class="img-fluid img-thumbnail" src="{{asset('assets-admin/images/mega-menu/05.jpg')}}" alt="Gallery-5">
                        </div>
                        <div class="col-sm-4"><img class="img-fluid img-thumbnail" src="{{asset('assets-admin/images/mega-menu/06.jpg')}}" alt="Gallery-6">
                        </div>
                      </div>
                      <button class="btn btn-primary btn-sm btn-block">Browse Gallery</button>
                    </li>
                                        <!-- <li class="col-sm-3">
                                            <h6 class="mega-menu-title">Contact Us</h6>
                                            <div class="mega-menu-contact">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-3 col-form-label">Name</label>
                                                    <div class="col-9">
                                                        <input class="form-control" type="text" placeholder="Artisanal kale" id="example-text-input">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input1" class="col-3 col-form-label">Email</label>
                                                    <div class="col-9">
                                                        <input class="form-control" type="email" placeholder="Enter your E-mail Id" id="example-search-input1">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-search-input2" class="col-3 col-form-label">Contact</label>
                                                    <div class="col-9">
                                                        <input class="form-control" type="number" placeholder="+91-9898989898" id="example-search-input2">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleTextarea" class="col-3 col-form-label">Message</label>
                                                    <div class="col-9">
                                                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                          </li> -->
                                        </ul>
                                      </li>
                                    </ul>


                                    <ul class="nav-right">
                                <!-- <li class="header-notification lng-dropdown">
                                    <a href="#" id="dropdown-active-item">
                                        <i class="flag-icon flag-icon-gb m-r-5"></i> English
                                    </a>
                                    <ul class="show-notification">
                                        <li>
                                            <a href="#" data-lng="en">
                                                <i class="flag-icon flag-icon-gb m-r-5"></i> English
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-lng="es">
                                                <i class="flag-icon flag-icon-es m-r-5"></i> Spanish
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-lng="pt">
                                                <i class="flag-icon flag-icon-pt m-r-5"></i> Portuguese
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-lng="fr">
                                                <i class="flag-icon flag-icon-fr m-r-5"></i> French
                                            </a>
                                        </li>
                                    </ul>
                                  </li> -->

                                  <li class="header-notification">
                                    <a href="#!">
                                      <i class="ti-bell"></i>
                                      <span class="badge">5</span>
                                    </a>
                                    <ul class="show-notification">
                                      <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                      </li>
                                      <li>
                                        <div class="media">
                                          <img class="d-flex align-self-center" src="{{asset('assets-admin/images/user.png')}}" alt="Generic placeholder image">
                                          <div class="media-body">
                                            <h5 class="notification-user">John Doe</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                          </div>
                                        </div>
                                      </li>
                                      <li>
                                        <div class="media">
                                          <img class="d-flex align-self-center" src="{{asset('assets-admin/images/user.png')}}" alt="Generic placeholder image">
                                          <div class="media-body">
                                            <h5 class="notification-user">Joseph William</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                          </div>
                                        </div>
                                      </li>
                                      <li>
                                        <div class="media">
                                          <img class="d-flex align-self-center" src="{{asset('assets-admin/images/user.png')}}" alt="Generic placeholder image">
                                          <div class="media-body">
                                            <h5 class="notification-user">Sara Soudein</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                          </div>
                                        </div>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="header-notification">
                                    <a href="#!" class="displayChatbox">
                                      <i class="ti-comments"></i>
                                      <span class="badge">9</span>
                                    </a>
                                  </li>
                                  <li class="user-profile header-notification">
                                    <a href="#!">
                                      <img src="{{asset('images/user/'.Session::get('login_admin.photo'))}}" alt="User-Profile-Image">
                                      <span>{{ Session::get("login_admin.username") }}</span>
                                      <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                      <li>
                                        <a href="#!">
                                          <i class="ti-settings"></i> Settings
                                        </a>
                                      </li>
                                      <li>
                                        <a href="user-profile.html">
                                          <i class="ti-user"></i> Profile
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#!">
                                          <i class="ti-email"></i> My Messages
                                        </a>
                                      </li>
                                      <li>
                                        <a href="auth-lock-screen.html">
                                          <i class="ti-lock"></i> Lock Screen
                                        </a>
                                      </li>
                                      <li>
                                        <a href="{{ route('admin-logout') }}">
                                          <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                      </li>
                                    </ul>
                                  </li>
                                </ul>
                            <!-- <div class="upgrade-button m-r-10 f-right">
                                <a href="https://themeforest.net/item/flat-able-bootstrap-4-admin-template/19842250?s_rank=1" class="icon-circle txt-white btn btn-sm btn-warning upgrade-button">
                                    <span>Upgrade To Pro</span>
                                </a>
                              </div> --> 

                              <!-- search -->
                              <div id="morphsearch" class="morphsearch">
                                <form class="morphsearch-form">
                                  <input class="morphsearch-input" type="search" placeholder="Search..." />
                                  <button class="morphsearch-submit" type="submit">Search</button>
                                </form>
                                <div class="morphsearch-content">

                                </div>
                                <!-- /morphsearch-content -->
                                <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
                              </div>
                              <!-- search end -->
                            </div>
                          </div>
                        </div>
                      </nav>

                        @includeIf($menu)

                    <!-- DIV CONTENT BODY -->
                    <div class="main-body">

                        @yield('content')

                    </div>
                    <!-- END DIV CONTENT BODY -->

                  </div>
                  <!--<div id="styleSelector">-->

                    <!--</div>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('assets-admin/plugins/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-admin/plugins/tether/dist/js/tether.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('assets-admin/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('assets-admin/plugins/modernizr/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-admin/plugins/modernizr/feature-detects/css-scrollbars.js')}}"></script>
<!-- classie js -->
<script type="text/javascript" src="{{asset('assets-admin/plugins/classie/classie.js')}}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('assets-admin/pages/dashboard/custom-dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('assets-admin/js/script.js')}}"></script>
<script src="{{asset('assets-admin/js/pcoded.min.js')}}"></script>
<script src="{{asset('assets-admin/js/demo-12.js')}}"></script>
<script src="{{asset('assets-admin/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('assets-admin/js/jquery.mousewheel.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
<!-- DataTables -->
<script type="text/javascript" src="{{asset('assets-admin/plugins/DataTables/datatables.min.js')}}"></script>

<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>

@yield('footer')

</body>

</html>
