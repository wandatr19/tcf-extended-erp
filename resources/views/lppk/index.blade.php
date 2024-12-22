@extends('layout.main')
@section('title', 'LPPK')
@section('main')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title">Laporan Permintaan Perbaikan Kualitas</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">LPPK</li>
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
                                <div class="me-15 bg-success h-50 w-50 l-h-60 rounded text-center">
                                    <span class="fa fa-pencil fs-24"><span class="path1"></span><span class="path2"></span></span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="{{route('lppk-input')}}" class="text-dark hover-primary mb-1 fs-16">Input Data LPPK</a>
                                    <span class="text-fade">Sistem Request LPPK Online</span>
                                </div>
                            </div>
                            <a href="{{route('lppk-input')}}">
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
                                <div class="me-15 bg-success h-50 w-50 l-h-60 rounded text-center">
                                    <span class="fa fa-check-square-o fs-24"><span class="path1"></span><span class="path2"></span></span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="{{route('lppk-monitor')}}" class="text-dark hover-primary mb-1 fs-16">Monitoring LPPK</a>
                                    <span class="text-fade">Input Proses Repair LPPK</span>
                                </div>
                            </div>
                            <a href="{{route('lppk-monitor')}}">
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
                                <div class="me-15 bg-success h-50 w-50 l-h-60 rounded text-center">
                                    <span class="fa fa-file-text fs-24"><span class="path1"></span><span class="path2"></span></span>
                                </div>
                                <div class="d-flex flex-column fw-500">
                                    <a href="{{route('lppk-logbook')}}" class="text-dark hover-primary mb-1 fs-16">Logbook LPPK</a>
                                    <span class="text-fade">List Data LPPK</span>
                                </div>
                            </div>
                            <a href="{{route('lppk-logbook')}}">
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