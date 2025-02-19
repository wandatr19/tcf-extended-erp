@extends('layout.main')
@section('title', 'Input Checksheet')
@section('main')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Checksheet Operator</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('lkh-main')}}">Checksheet Operator</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Input</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">
                        <span class="form-text text-muted">
                            Diisi oleh Leader Shift
                        </span>
                    </h5>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class= "col-md-4 col-12">
                            <div class="form-group">
                                <label for="date" class="form-label">Tanggal Produksi</label>
                                    <input class="form-control" type="text" name="date" id="date" value="{{ $csHeader->prod_date }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                            <label for="shift" class="form-label">Shift</label>
                            <input type="text" class="form-control" name="shift" id="shift" value="{{ $csHeader->shift }}" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                            <label for="line" class="form-label">Line</label>
                            <input type="text" class="form-control" name="line" id="line" readonly>
                            </div>
                        </div>
                        <div class= "col-md-4 col-12">
                            <div class="form-group">
                                <label for="machine" class="form-label">Mesin</label>
                                <input type="text" class="form-control" name="machine" id="machine" value="{{ $csHeader->nama_mesin }}"  readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <span class="badge bg-primary">23:50</span>
                    <span class="badge bg-primary">07:35</span>
                    <span class="badge bg-primary">15:35</span>
                    <span class="badge bg-success">07:35</span>
                    <span class="badge bg-success">22:00</span>
                </div>
                <div class="box-header">
                    <div class= "col-md-4 col-12">
                        <div class="form-group">
                            <label for="customer" class="form-label">1. Operator siap di Mesin dgn Alat Safety</label>
                            <div class="demo-radio-button">
                                <input name="group1" type="radio" id="radio_1" checked />
                                <label for="radio_1">OK</label>
                                <input name="group1" type="radio" id="radio_2" />
                                <label for="radio_2">NG</label>
                            </div>
                            <label class="col-form-label col-md-4"><span class="form-text text-muted">Uraian Masalah</span></label>
                            <div class="col-md-3">
                                <input class="form-control" type="text" name="description" id="description">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-header">
                    <div class= "col-md-4 col-12">
                        <div class="form-group">
                            <label for="customer" class="form-label">2. WI terpasang & Operator konsisten mematuhi WI yang ada</label>
                            <div class="demo-radio-button">
                                <input name="group1" type="radio" id="radio_1" checked />
                                <label for="radio_1">OK</label>
                                <input name="group1" type="radio" id="radio_2" />
                                <label for="radio_2">NG</label>
                            </div>
                            <label class="col-form-label col-md-4"><span class="form-text text-muted">Uraian Masalah</span></label>
                            <div class="col-md-3">
                                <input class="form-control" type="text" name="description" id="description">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class= "col-md-4 col-12">
                        <div class="form-group">
                            <label for="customer" class="form-label">3. Verifikasi setting dilakukan</label>
                            <div class="demo-radio-button">
                                <input name="group1" type="radio" id="radio_1" checked />
                                <label for="radio_1">OK</label>
                                <input name="group1" type="radio" id="radio_2" />
                                <label for="radio_2">NG</label>
                            </div>
                            <label class="col-form-label col-md-4"><span class="form-text text-muted">Uraian Masalah</span></label>
                            <div class="col-md-3">
                                <input class="form-control" type="text" name="description" id="description">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
