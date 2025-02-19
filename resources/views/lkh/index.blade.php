@extends('layout.main')
@section('title', 'LKH')

@section('main')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title">Laporan Kerja Harian Stamping</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">LKH Stamping</li>
                                </ol>
                            </nav>
                        </div>
                    </div>				
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="box mb-6 pull-up">
                    <div class="box-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="me-15 bg-warning h-50 w-50 l-h-60 rounded text-center">
                                    <span class="glyphicon glyphicon-pencil fs-24"><span class="path1"></span><span class="path2"></span></span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="{{route('lkh-input')}}" class="text-dark hover-primary mb-1 fs-16">Input Data LKH</a>
                                    <span class="text-fade">Sistem Input Data LKH Stamping Online</span>
                                </div>
                            </div>
                            <a href="{{route('lkh-input')}}">
                                <span class="icon-Arrow-right fs-24"><span class="path1"></span><span class="path2"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="box mb-6 pull-up">
                    <div class="box-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="me-15 bg-warning h-50 w-50 l-h-60 rounded text-center">
                                    <span class="glyphicon glyphicon-list-alt fs-24"><span class="path1"></span><span class="path2"></span></span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="{{route('lkh-monitor')}}" class="text-dark hover-primary mb-1 fs-16">Monitoring LKH</a>
                                    <span class="text-fade">Monitoring Proses LKH Stamping</span>
                                </div>
                            </div>
                            <a href="{{route('lkh-monitor')}}">
                                <span class="icon-Arrow-right fs-24"><span class="path1"></span><span class="path2"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection