<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/logo-tcf.png')}}">

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
                <a href="{{route('dashboard')}}" class="logo">
                    <div class="logo-lg">
                        <span class="light-logo"><img src="{{asset('img/portal-qc-logo.png')}}" alt="logo"></span>
                    </div>
                  </a>
            </div>
            <div class="navbar-custom-menu r-side">
                <ul class="nav navbar-nav">
                    <!-- User Account-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="btn btn-light dropdown-toggle position-relative"
                            data-bs-toggle="dropdown" title="User">
                            <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                    style="font-size: 1rem;z-index:2;">
                                    <i class="ti-bell"></i>
                                </span>
                        </a>
                        <ul class="dropdown-menu animated flipInX">
                            <li class="user-body">
                                    <a class="dropdown-item btnProfile" href="#"><i
                                            class="ti-user text-muted me-2"></i>
                                        Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item btnKontrak" href="#"><i
                                            class="ti-write text-muted me-2"></i>
                                        Kontrak</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item btnAgendaLembur position-relative" href="#"><i
                                            class="ti-agenda text-muted me-2"></i>
                                        Agenda Lembur
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item btnLembur" href="#"><i
                                            class="ti-time text-muted me-2"></i>
                                        Slip Lembur
                                    </a>
                                    <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="ti-lock text-muted me-2"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
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
	<script src="{{asset('eduadmin/main/js/template.js')}}"></script>
	<script src="{{asset('eduadmin/main/js/pages/calendar.js')}}"></script>
	<script src="{{asset('eduadmin/assets/vendor_components/dropzone/dropzone.js')}}"></script>

	
</body>
</html>
