<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>{{ $setting->name }} | @stack('title') </title>
	<link rel="icon" href="./images/icon.png" type="image" sizes="16x16">

	<!-- Bootstrap -->
	<link href="{{ asset('frontend-assets/css/bootstrap.min.css') }}" rel="stylesheet" />
	<!-- Main styles -->
	<link href="{{ asset('frontend-assets/css/style.css') }}" rel="stylesheet" />
	<!--<link rel="stylesheet/less" href="css/style.less" />-->
	<!-- IE styles -->
	<link href="{{ asset('frontend-assets/css/ie.css') }}" rel="stylesheet" />
	<!-- Font Awesome -->
	<link href="{{ asset('frontend-assets/css/font-awesome.min.css') }}" rel="stylesheet" />
	<!-- OWL Carousel -->
	<link href="{{ asset('frontend-assets/css/owl.carousel.css') }}" rel="stylesheet" />
	<!-- Jquery UI -->
	<link href="{{ asset('frontend-assets/css/jquery-ui.css') }}" rel="stylesheet" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
        <!--SweetAlert 2-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <!--====== AJAX ======-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	<body>
    <!--facebook commenting plugin Start-->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=990996317978620&autoLogAppEvents=1" nonce="0iiDZfq1"></script>
    <!--facebook commenting plugin End-->
		<!-- Overlay preloader-->
		<div class="htlfndr-loader-overlay"></div>
        <div class="htlfndr-wrapper">
            @include('frontend.layouts.header')

            <!-- Start of main content -->
            <main role="main">
            @yield('content')

            </main>
            <!-- End of main content -->

            <!-- Start of the Footer -->
            @include('frontend.layouts.footer')
        </div><!-- .htlfndr-wrapper -->


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="{{ asset('/frontend-assets/js/jquery-1.11.3.min.js') }}"></script>
		<!-- Include Jquery UI script file -->
		<script src="{{ asset('/frontend-assets/js/jquery-ui.min.js') }}"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!-- Include Query UI Touch Punch is a small hack that enables the use
		 of touch events on sites using the jQuery UI user interface library. -->
		<script src="{{ asset('/frontend-assets/js/jquery.ui.touch-punch.min.js') }}"></script>
		<script src="{{ asset('/frontend-assets/js/bootstrap.min.js') }}"></script>
		<!-- Include Owl Carousel script file -->
		<script src="{{ asset('/frontend-assets/js/owl.carousel.min.js') }}"></script>
		<!-- Include main script file -->
		<script src="{{ asset('/frontend-assets/js/script.js') }}"></script>
		<!--<script src="js/less.min.js" ></script> -->
    @stack('footer')
	</body>
</html>
