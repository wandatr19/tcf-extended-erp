<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/tcf-no-bg.png')}}">

    <title>Portal Quality - Home</title>
	@vite(['resources/sass/app.scss','resources/js/app.js','resources/css/app.css'])
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('eduadmin/main/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('eduadmin/main/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('eduadmin/main/css/skin_color.css')}}">
	<link rel="stylesheet" href="{{asset('eduadmin/assets/vendor_components/sweetalert2/dist/sweetalert2.css') }}">
	<link rel="stylesheet" href="{{ asset('eduadmin/assets/vendor_components/datatable/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('eduadmin/assets/vendor_plugins/select2-theme/select2-bootstrap-5-theme.min.css') }}">
	
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <header class="main-header">
        <nav class="navbar m-0 navbar-static-top">
            <div class="app-menu">
                <h4 class="mb-0 text-primary"><i class="ti-user"></i>
                    {{ Auth::user()->name ?? '' }}
                </h4>
            </div>
            <div class="navbar-custom-menu r-side">
                <ul class="nav navbar-nav">
                    <!-- User Account-->
                    <a href="{{route('logout')}}" title="Logout">
                        <button class="btn btn-danger">
                            <i class="fa fa-sign-out fa-1x"><span class="path1"></span><span class="path2"></span></i>
                        </button>
                    </a>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100" id="menu-container">
            <div class="col-12">
                <div class="row justify-content-center g-3">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
	
  <footer class="main-footer">
   
	  &copy; {{ date('Y') }} <a href="https://www.chatgpt.com/">Provided By ICT TCF</a>. All Rights Reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  
	
		
	
	<!-- Page Content overlay -->
	
	<!-- jQuery -->
	<script src="{{ asset('eduadmin/assets/vendor_plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('eduadmin/assets/vendor_components/apexcharts-bundle-new/dist/apexcharts.js') }}"></script>
	
	<!-- Vendor JS -->
	<script src="{{asset('eduadmin/main/js/vendors.min.js')}}"></script>
	<script src="{{asset('eduadmin/main/js/pages/chat-popup.js')}}"></script>
    <script src="{{asset('eduadmin/assets/icons/feather-icons/feather.min.js')}}"></script>

	<script src="{{asset('eduadmin/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	<script src="{{asset('eduadmin/assets/vendor_components/moment/min/moment.min.js')}}"></script>
	<script src="{{asset('eduadmin/assets/vendor_components/fullcalendar/fullcalendar.js')}}"></script>
	<script src="{{ asset('eduadmin/assets/vendor_components/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('eduadmin/assets/vendor_components/nestable/jquery.nestable.js') }}"></script>
	<script src="{{ asset('eduadmin/assets/vendor_components/sweetalert2/dist/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('eduadmin/assets/vendor_components/datatable/datatables.min.js') }}"></script>



	
	<!-- EduAdmin App -->
	{{-- <script src="{{asset('eduadmin/main/js/template.js')}}"></script> --}}
	{{-- <script src="{{asset('eduadmin/main/js/pages/calendar.js')}}"></script> --}}
	<script src="{{asset('eduadmin/assets/vendor_components/dropzone/dropzone.js')}}"></script>

	
</body>
</html>
