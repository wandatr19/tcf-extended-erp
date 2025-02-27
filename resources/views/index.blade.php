@extends('layout.header_main')

@section('content')
<div class="container-full">
	<div class="row">
		<div class="col-xl-12 col-12">
			<div class="box bg-primary-light">
				<div class="box-body d-flex px-0">
					<div class="flex-grow-1 p-30 flex-grow-1 bg-img dask-bg bg-none-md" style="background-position: right bottom; background-size: auto 100%; background-image: url('{{asset('eduadmin/images/svg-icon/color-svg/custom-1.svg')}}')">
						<div class="row">
							<div class="col-12 col-xl-7">
								<h2>Selamat Datang di <strong>Portal Checksheet</strong></h2>
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
</div>
@endsection