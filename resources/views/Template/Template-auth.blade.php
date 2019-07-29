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
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">
    <!-- Favicon icon -->

    <link rel="icon" href="{{asset('assets-admin/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    @yield('bootstrap')
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/icon/icofont/css/icofont.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/css/style.css')}}">

    @yield('header')

    <style type="text/css">
    .custom-img-bg {
      background-size: cover;
      background: url("{{asset('assets-web/images/home/banner.jpg')}}") no-repeat center center fixed;
      height: 100%;
    }
    @media only screen and (max-width: 992px) {
      .custom-img-bg {
        background: #f3f3f3 !important;
      } 
    }
  </style>

</head>

<body class="fix-menu">
  <section class="@stack('class') p-fixed d-flex text-center bg-primary custom-img-bg">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
      <div class="row">
        @yield('content')
      </div>
      <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
  </section>
  <!-- Required Jquery -->
  <script type="text/javascript" src="{{asset('assets-admin/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets-admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets-admin/plugins/tether/dist/js/tether.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets-admin/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- jquery slimscroll js -->
  <script type="text/javascript" src="{{asset('assets-admin/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
  <!-- modernizr js -->
  <script type="text/javascript" src="assets/plugins/modernizr/modernizr.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets-admin/plugins/modernizr/feature-detects/css-scrollbars.js')}}"></script>
  <!-- Custom js -->
  <script type="text/javascript" src="{{asset('assets-admin/js/script.js')}}"></script>
  <!-- color js -->
  <script type="text/javascript" src="{{asset('assets-admin/js/common-pages.js')}}"></script>

  @yield('footer')

  <script>
    $(document).ready(function() {
      $("#alert-failed").slideDown(600).delay(3000).slideUp(600);
    });
  </script>
</body>

</html>