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
                                <label for="prod_date" class="form-label">Tanggal Produksi</label>
                                    <input class="form-control" type="date" name="prod_date" id="prod_date" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                            <label for="line" class="form-label">Shift</label>
                            <select class="form-select" style="width: 100%;" name="line" id="line" required>
                                <option selected="selected" disabled>Select Shift</option>
                                <option value="1">Shift A1</option>
                                <option value="2">Shift A2</option>
                                <option value="3">Shift A3</option>
                                <option value="4">Shift B1</option>
                                <option value="5">Shift B2</option>
                            </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                            <label for="shift" class="form-label">Line</label>
                            <select class="form-select" style="width: 100%;" name="shift" id="shift" required>
                                <option selected="selected" disabled>Select Line</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            </div>
                        </div>
                        <div class= "col-md-4 col-12">
                            <div class="form-group">
                                <label for="machine" class="form-label">Mesin</label>
                                <select class="form-select " name="machine" id="machine">
                                    <option value="">Select Mesin</option>
                                </select>
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
                            <label for="customer" class="form-label">Operator siap di Mesin dgn Alat Safety</label>
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
                            <label for="customer" class="form-label">WI terpasang & Operator konsisten mematuhi WI yang ada</label>
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
                            <label for="customer" class="form-label">Verifikasi setting dilakukan</label>
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
            <div class="box">
                <div class="box-header">
                    <span class="badge bg-primary">01:30</span>
                    <span class="badge bg-primary">09:35</span>
                    <span class="badge bg-primary">16:30</span>
                    <span class="badge bg-success">09:35</span>
                    <span class="badge bg-success">23:30</span>
                </div>
                <div class="box-header">
                    <div class= "col-md-4 col-12">
                        <div class="form-group">
                            <label for="customer" class="form-label">Label status part terpasang</label>
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
                            <label for="customer" class="form-label">Pengecheckan Kualitas oleh Operator</label>
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
                            <label for="customer" class="form-label">WI terpasang & Operator konsisten mematuhi WI yang ada</label>
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
                            <label for="customer" class="form-label">Penempatan NG di Box Merah</label>
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
                            <label for="customer" class="form-label">Pengecheckan kestabilan setting</label>
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
            <div class="box">
                <div class="box-header">
                    <span class="badge bg-primary">02:35</span>
                    <span class="badge bg-primary">11:00</span>
                    <span class="badge bg-primary">07:00</span>
                    <span class="badge bg-success">11:30</span>
                    <span class="badge bg-success">01:30</span>
                </div>
                <div class="box-header">
                    <div class= "col-md-4 col-12">
                        <div class="form-group">
                            <label for="customer" class="form-label">Label status part terpasang</label>
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
                            <label for="customer" class="form-label">Pengecheckan Kualitas oleh Operator</label>
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
                            <label for="customer" class="form-label">WI terpasang & Operator konsisten mematuhi WI yang ada</label>
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
                            <label for="customer" class="form-label">Penempatan NG di Box Merah</label>
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
                            <label for="customer" class="form-label">Pengecheckan kestabilan setting</label>
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
            <div class="box">
                <div class="box-header">
                    <span class="badge bg-primary">04:00</span>
                    <span class="badge bg-primary">12:35</span>
                    <span class="badge bg-primary">18:35</span>
                    <span class="badge bg-success">12:45</span>
                    <span class="badge bg-success">02:35</span>
                </div>
                <div class="box-header">
                    <div class= "col-md-4 col-12">
                        <div class="form-group">
                            <label for="customer" class="form-label">Operator siap di Mesin & Alat Safety (APD)</label>
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
                            <label for="customer" class="form-label">Pengecheckan Kualitas oleh Operator</label>
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
                            <label for="customer" class="form-label">WI terpasang & Operator konsisten mematuhi WI yang ada</label>
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
            <div class="box">
                <div class="box-header">
                    <span class="badge bg-primary">05:30</span>
                    <span class="badge bg-primary">14:00</span>
                    <span class="badge bg-primary">21:00</span>
                    <span class="badge bg-success">15:00</span>
                    <span class="badge bg-success">04:00</span>
                </div>
                <div class="box-header">
                    <div class= "col-md-4 col-12">
                        <div class="form-group">
                            <label for="customer" class="form-label">Label status part terpasang</label>
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
                            <label for="customer" class="form-label">Pengecheckan Kualitas oleh Operator</label>
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
                            <label for="customer" class="form-label">WI terpasang & Operator konsisten mematuhi WI yang ada</label>
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
                            <label for="customer" class="form-label">Penempatan NG di box merah</label>
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
                            <label for="customer" class="form-label">Pengecheckan ke</label>
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
