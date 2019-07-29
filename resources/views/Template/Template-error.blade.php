<!DOCTYPE html>

<html lang="en-us" class="no-js">

<head>
    <meta charset="utf-8">
    <title>404 My Store</title>
    <meta name="description" content="Flat able 404 Error page design">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Codedthemes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets-admin/images/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/css/error.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets-admin/css/style.css')}}">
</head>

<body>

    <canvas id="dotty"></canvas>

    <!-- Your logo on the top left -->
    <a href="/" class="logo-link" title="back home">

        <img src="{{asset('assets-admin/images/logo2.png')}}" class="logo rounded bg-light z-depth-0 p-3" alt="Company's logo" />

    </a>

    <div class="content">

        <div class="content-box">

            <div class="big-content">

                <!-- Main squares for the content logo in the background -->
                <div class="list-square">
                    <span class="square"></span>
                    <span class="square"></span>
                    <span class="square"></span>
                </div>

                <!-- Main lines for the content logo in the background -->
                <div class="list-line">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>

                <!-- The animated searching tool -->
                <i class="fa fa-search" aria-hidden="true"></i>

                <!-- div clearing the float -->
                <div class="clear"></div>

            </div>

            <!-- Your text -->
            <h1>Oops! Error 404 not found.</h1>

            <p>The page you were looking for doesn't exist.<br>
            We think the page may have moved.</p>

        </div>

    </div>

    <footer class="light">
        <ul>
            <li><a href="javascript:history.back()">Back</a></li>
            <li><a href="#">Codedthemes</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        </ul>
    </footer>
    <script src="{{asset('assets-admin/plugins/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets-admin/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Mozaic plugin -->
    <script src="{{asset('assets-admin/js/mozaic.js')}}"></script>

</body>

</html>