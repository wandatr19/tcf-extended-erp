@extends('layout.main')
@section('title', 'Logbook LPPK')
@section('main')
<div class="container-ful">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Logbook Monitoring LPPK</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('lppk-main')}}">LPPK</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Logbook </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="col-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="table-logbook-lppk">
                            <thead>
                                <tr>
                                    <th class="text-center">Part Name</th>
                                    <th class="text-center">Problem Desc</th>
                                    <th class="text-center">No. LPPK</th>
                                    <th class="text-center">Tanggal Dibuat</th>
                                    <th class="text-center">Target Close</th>
                                    <th class="text-center">Status Problem</th>
                                    <th class="text-center">Issued By</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
    </section>
</div>

@include('lppk.modal_logbook')


@endsection