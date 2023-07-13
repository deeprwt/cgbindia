<!DOCTYPE html>
<html lang="en" class="dark-theme ColorLessIcons">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- Vector CSS -->
	<link href="{{ url('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<!--plugins-->
	<link href="{{ url('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ url('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ url('assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ url('assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{ url('assets/css/icons.css') }}" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{ url('assets/css/app.css') }}" />
	<link rel="stylesheet" href="{{ url('assets/css/dark-sidebar.css') }}" />
	<link rel="stylesheet" href="{{ url('assets/css/dark-theme.css') }}" />
    @yield('head')
</head>

<body>
	
	<!-- wrapper -->
	<div class="wrapper">
		@include('admin.layout.nav.side')
		<!--end sidebar-wrapper-->
		<!--header-->
		@include('admin.layout.nav.top')
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
				
					@yield('main')
				
					
					
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
		<div class="footer">
			<p class="mb-0">Eupheus © 2021 All Rights Reserved.
			</p>
		</div>
		<!-- end footer -->
	</div>
	<!-- end wrapper -->
	<!--start switcher-->

	<!--end switcher-->
	<!-- JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ url('assets/js/jquery.min.js') }}"></script>
	<script src="{{ url('assets/js/popper.min.js') }}"></script>
	<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ url('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ url('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<!-- Vector map JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{ url('assets/js/index.js') }}"></script>
	<!-- App JS -->
	<script src="{{ url('assets/js/app.js') }}"></script>

    @yield('js')
</body>

</html>