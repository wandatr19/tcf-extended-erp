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

    <title>Portal Quality - @yield('title')</title>
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
	
<div class="wrapper">
	<div id="loader"></div>
	
  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
			<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
		</a>	
		<!-- Logo -->
		<a href="{{route('dashboard')}}" class="logo">
		  <!-- logo-->
		  <div class="logo-lg">
			  {{-- <span class="light-logo"><img src="{{asset('eduadmin/images/logo-dark-text.png')}}" alt="logo"></span> --}}
			  <span class="light-logo"><img src="{{asset('img/portal-qc-logo.png')}}" alt="logo"></span>
		  </div>
		</a>	
	</div>  
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item d-md-none">
				<a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu" role="button">
					<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
			    </a>
			</li>
		</ul> 
	  </div>
		
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">	
			<li class="btn-group nav-item d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
					<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>	  
		  <!-- Notifications -->
		  <li class="dropdown notifications-menu">
			<a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="Notifications">
			  <i class="icon-Notifications"><span class="path1"></span><span class="path2"></span></i>
			</a>
			<ul class="dropdown-menu animated bounceIn">

			  <li class="header">
				<div class="p-20">
					<div class="flexbox">
						<div>
							<h4 class="mb-0 mt-0">Notifications</h4>
						</div>
						<div>
							<a href="#" class="text-danger">Clear All</a>
						</div>
					</div>
				</div>
			  </li>

			  <li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu sm-scrol">
				  <li>
					<a href="#">
					  <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-primary"></i> Nunc fringilla lorem 
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
					</a>
				  </li>
				</ul>
			  </li>
			  <li class="footer">
				  <a href="#">View all</a>
			  </li>
			</ul>
		  </li>	
		  
	      <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="User">
				<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
				 <a class="dropdown-item" href="#"><i class="ti-user text-muted me-2"></i> Profile</a>
				 <a class="dropdown-item" href="#"><i class="ti-wallet text-muted me-2"></i> My Wallet</a>
				 <a class="dropdown-item" href="#"><i class="ti-settings text-muted me-2"></i> Settings</a>
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="{{route('logout')}}"><i class="ti-lock text-muted me-2"></i> Logout</a>
              </li>
            </ul>
          </li>	
		  
          <!-- Control Sidebar Toggle Button -->
			
        </ul>
      </div>
    </nav>
  </header>
  {{-- Sidebar --}}
<aside class="main-sidebar">
	<section class="sidebar position-relative">	
		<div class="multinav">
		<div class="multinav-scroll" style="height: 100%;">	
			<!-- sidebar menu-->
			<ul class="sidebar-menu" data-widget="tree">	
			  <li class="header">Dashboard & Input</li>
			  <li class="treeview">
				<a href="{{route('lkh-main')}}">
				  <i span class="fa fa-fw fa-file-text"><span class="path1"></span><span class="path2"></span></i>
				  <span>LKH Stamping</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-right pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li class="{{ $page == 'lkh-input' ? 'active' : '' }}"><a href="{{route('lkh-input')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Input LKH Stamping</a></li>
				  <li class="{{ $page == 'lkh-monitor' ? 'active' : '' }}"><a href="{{route('lkh-monitor')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Monitoring</a></li>
				</ul>
			  </li>
			  <li class="treeview">
				<a href="{{route('lppk-main')}}">
				  <i class="fa fa-wrench"><span class="path1"></span><span class="path2"></span></i>
				  <span>LPPK</span>
				  <span class="pull-right-container">
					<i class="fa fa-angle-right pull-right"></i>
				  </span>
				</a>
				<ul class="treeview-menu">
				  <li class="{{ $page == 'lppk-input' ? 'active' : '' }}"><a href="{{route('lppk-input')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Request Repair</a></li>
				  <li class="{{ $page == 'lppk-monitor' ? 'active' : '' }}"><a href="{{route('lppk-monitor')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List Repair</a></li>
				  <li class="{{ $page == 'lppk-logbook' ? 'active' : '' }}"><a href="{{route('lppk-logbook')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Logbook LPPK</a></li>
				</ul>
			  </li>
			  <li class="treeview">
				<a href="{{route('logout')}}">
					<i span class="mdi mdi-logout-variant"></i>
					<span class="text-danger"> <strong>Logout</strong> </span>
				</a>
			  </li>

			</ul>
		</div>
	  </div>
	</section>
</aside>

  <!-- Content Wrapper. Contains page content -->
  	@if ($page == '')
	@endif

  <div class="content-wrapper">
	  @yield('main')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   
	  &copy; 2024 <a href="https://www.chatgpt.com/">Provided By ICT TCF</a>. All Rights Reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  
</div>
<!-- ./wrapper -->
	
		
	
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
	<script src="{{asset('eduadmin/main/js/pages/dashboard.js')}}"></script>
	<script src="{{asset('eduadmin/main/js/pages/calendar.js')}}"></script>
	<script src="{{asset('eduadmin/assets/vendor_components/dropzone/dropzone.js')}}"></script>

	<!--  JS Pages -->
	@if ($page == 'lkh-input')
		@vite(['resources/js/pages/input_lkh.js'])
	@endif
	@if ($page == 'lppk-input')
		@vite(['resources/js/pages/input_lppk.js'])
	@endif
	@if ($page == 'lkh-monitor')
		@vite(['resources/js/pages/monitor_lkh.js'])
	@endif
	@if ($page == 'lppk-logbook')
		@vite(['resources/js/pages/logbook_lppk.js'])
	@endif
	@if ($page == 'checksheet-op-form')
		@vite(['resources/js/pages/cs_op_form.js'])
	@endif

	
</body>
</html>
