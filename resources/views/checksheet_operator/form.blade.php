@extends('layout.main')
@section('title', 'Input Checksheet')
@section('header')
    @include('layout.header')
@endsection

@section('navbar')
    @include('layout.navbar_csop')
@endsection

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
                                    <input class="form-control" type="text" name="date" id="date" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                            <label for="shift" class="form-label">Shift</label>
                            <input type="text" class="form-control" name="shift" id="shift" readonly>
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
                                <input type="text" class="form-control" name="machine" id="machine" readonly>
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
                            <label for="customer" class="form-label">4. Label status part terpasang</label>
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
                            <label for="customer" class="form-label">5. Pengecheckan Kualitas oleh Operator</label>
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
                            <label for="customer" class="form-label">6. WI terpasang & Operator konsisten mematuhi WI yang ada</label>
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
                            <label for="customer" class="form-label">7. Penempatan NG di Box Merah</label>
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
                            <label for="customer" class="form-label">8. Pengecheckan kestabilan setting</label>
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
                            <label for="customer" class="form-label">9. Label status part terpasang</label>
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
                            <label for="customer" class="form-label">10. Pengecheckan Kualitas oleh Operator</label>
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
                            <label for="customer" class="form-label">11. WI terpasang & Operator konsisten mematuhi WI yang ada</label>
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
                            <label for="customer" class="form-label">12. Penempatan NG di Box Merah</label>
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
                            <label for="customer" class="form-label">13. Pengecheckan kestabilan setting</label>
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
                            <label for="customer" class="form-label">14. Operator siap di Mesin & Alat Safety (APD)</label>
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
                            <label for="customer" class="form-label">15. Pengecheckan Kualitas oleh Operator</label>
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
                            <label for="customer" class="form-label">16. WI terpasang & Operator konsisten mematuhi WI yang ada</label>
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
                            <label for="customer" class="form-label">17. Label status part terpasang</label>
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
                            <label for="customer" class="form-label">18. Pengecheckan Kualitas oleh Operator</label>
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
                            <label for="customer" class="form-label">19. WI terpasang & Operator konsisten mematuhi WI yang ada</label>
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
                            <label for="customer" class="form-label">20. Penempatan NG di box merah</label>
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
                            <label for="customer" class="form-label">21. Pengecheckan ke</label>
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
