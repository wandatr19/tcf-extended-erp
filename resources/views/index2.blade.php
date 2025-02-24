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
	
<div class="wrapper">
	<div id="loader"></div>
    <header class="main-header">
        <nav class="navbar m-0 navbar-static-top">
            <div class="app-menu">
                <h4 class="mb-0 text-primary"><i class="ti-user"></i>
                </h4>
            </div>
            <div class="navbar-custom-menu r-side">
                <ul class="nav navbar-nav">
                    <!-- User Account-->
                    <li class="dropdown user user-menu">
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
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item btnLembur" href="#"><i
                                        class="ti-time text-muted me-2"></i>
                                    Slip Lembur
                                </a>
                                <div class="dropdown-divider"></div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
  <div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="box bg-primary-light">
                        <div class="box-body d-flex px-0">
                            <div class="flex-grow-1 p-30 flex-grow-1 bg-img dask-bg bg-none-md" style="background-position: right bottom; background-size: auto 100%; background-image: url('{{asset('eduadmin/images/svg-icon/color-svg/custom-1.svg')}}')">
                                <div class="row">
                                    <div class="col-12 col-xl-7">
                                        <h2>Selamat Datang di <strong>Portal Quality</strong></h2>
                                    </div>
                                    <div class="col-12 col-xl-5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <a href="{{route('lkh-input')}}"
                        class="box pull-up">
                        <div class="box-body position-relative">
                            <div class="d-flex align-items-center">
                                <div class="icon bg-primary-light rounded-circle w-60 h-60 text-center l-h-80">
                                    <span class="fs-30 fa fa-bar-chart"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span></span>
                                </div>
                                <div class="ms-15">
                                    <h5 class="mb-0">LKH Stamping</h5>
                                    <p class="text-fade fs-12 mb-0">Sistem Pencatatan Laporan Kerja Harian Stamping</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-12">
                    <a href="{{route('lppk-input')}}"
                        class="box pull-up">
                        <div class="box-body position-relative">
                            <div class="d-flex align-items-center">
                                <div class="icon bg-primary-light rounded-circle w-60 h-60 text-center l-h-80">
                                    <span class="fs-30 fa fa-wrench"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span></span>
                                </div>
                                <div class="ms-15">
                                    <h5 class="mb-0">LPPK</h5>
                                    <p class="text-fade fs-12 mb-0">Sistem Request Repair Komponen NG</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-12">
                    <a href="{{route('checksheet-op-data')}}"
                        class="box pull-up">
                        <div class="box-body position-relative">
                            <div class="d-flex align-items-center">
                                <div class="icon bg-primary-light rounded-circle w-60 h-60 text-center l-h-80">
                                    <span class="fs-30 fa fa-check-square-o"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span></span>
                                </div>
                                <div class="ms-15">
                                    <h5 class="mb-0">Checksheet Operator</h5>
                                    <p class="text-fade fs-12 mb-0">Checksheet untuk pengawasan operator</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-12">
                    <a href="{{route('master-user-index')}}"
                        class="box pull-up">
                        <div class="box-body position-relative">
                            <div class="d-flex align-items-center">
                                <div class="icon bg-primary-light rounded-circle w-60 h-60 text-center l-h-80">
                                    <span class="fs-30 fa  fa-user-circle-o"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span></span>
                                </div>
                                <div class="ms-15">
                                    <h5 class="mb-0">User Management</h5>
                                    <p class="text-fade fs-12 mb-0">Sistem manajemen data user</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
    
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
	<script src="{{asset('eduadmin/main/js/pages/calendar.js')}}"></script>
	<script src="{{asset('eduadmin/assets/vendor_components/dropzone/dropzone.js')}}"></script>

	
</body>
</html>
