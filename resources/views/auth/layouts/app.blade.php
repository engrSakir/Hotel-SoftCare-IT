<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 13:37:12 GMT -->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="{{ $setting->meta_description }}" />
    <meta name="author" content="{{ $setting->meta_author }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $setting->name }} | @stack('title')</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- animate CSS-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Icons CSS-->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Custom Style-->
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet"/>
    <!--SweetAlert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!--====== AJAX ======-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @stack('header')

</head>

<body>
<!-- Start wrapper-->
<div id="wrapper">
    @yield('content')


    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
</div><!--wrapper-->

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 13:37:12 GMT -->
</html>
