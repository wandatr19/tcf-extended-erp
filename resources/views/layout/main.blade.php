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

    <title>Portal Checksheet - @yield('title')</title>
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
	@yield('header')
	@yield('navbar')

	

  <!-- Content Wrapper. Contains page content -->
  	{{-- @if ($page == '')
	@endif --}}

  <div class="content-wrapper">
	  @yield('main')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   
	  &copy; {{ date('Y') }} <a href="https://www.chatgpt.com/">Provided By ICT TCF</a>. All Rights Reserved.
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
	{{-- <script src="{{asset('eduadmin/main/js/pages/dashboard.js')}}"></script> --}}
	<script src="{{asset('eduadmin/main/js/pages/calendar.js')}}"></script>
	<script src="{{asset('eduadmin/assets/vendor_components/dropzone/dropzone.js')}}"></script>

	<script>
		let loadingSwal;
		function loadingSwalShow() {
			loadingSwal = Swal.fire({
				imageHeight: 300,
				showConfirmButton: false,
				title: '<i class="fas fa-sync-alt fa-spin fs-80"></i>',
				allowOutsideClick: false,
				background: 'rgba(0, 0, 0, 0)'
			});
		}

		function loadingSwalClose() {
			loadingSwal.close();
		}

		function showToast(options) {
			const toast = Swal.mixin({
				toast: true,
				position: "top-end",
				showConfirmButton: false,
				timer: 2000, 
				timerProgressBar: true,
				didOpen: (toast) => {
				toast.onmouseenter = Swal.stopTimer;
				toast.onmouseleave = Swal.resumeTimer;
				}
			});

			toast.fire({
				icon: options.icon || "success",
				title: options.title
			});
		}

	</script>

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
		@vite(['resources/js/pages/checksheet_op/cs_op_form.js'])
	@endif
	@if ($page == 'checksheet-op-data')
		@vite(['resources/js/pages/checksheet_op/cs_op_data.js'])
	@endif
	@if ($page == 'checksheet-op-approve')
		@vite(['resources/js/pages/checksheet_op/cs_op_approve.js'])
	@endif

	@if ($page == 'master-user-index')
		@vite(['resources/js/pages/master_user/user_index.js'])
	@endif
	@if ($page == 'master-user-organization')
		@vite(['resources/js/pages/master_user/organization.js'])
	@endif
	@if ($page == 'master-user-division')
		@vite(['resources/js/pages/master_user/division.js'])
	@endif
	@if ($page == 'master-user-department')
		@vite(['resources/js/pages/master_user/department.js'])
	@endif
	@if ($page == 'master-user-section')
		@vite(['resources/js/pages/master_user/section.js'])
	@endif

	
</body>
</html>
