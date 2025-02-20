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
                                    <input class="form-control" type="text" name="date" id="date" value="{{ $csHeader->prod_date }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                            <label for="shift" class="form-label">Shift</label>
                            <input type="text" class="form-control" name="shift" id="shift" value="{{ $csHeader->shift == 'A1' ? 'SHIFT 1 (Waktu 3)' : ($csHeader->shift == 'A2' ? 'SHIFT 2 (Waktu 3)' : ($csHeader->shift == 'A3' ? 'SHIFT 3 (Waktu 3)' : ($csHeader->shift == 'B1' ? 'SHIFT 1 (Waktu 2)' : ($csHeader->shift == 'B2' ? 'SHIFT 2 (Waktu 2)' : $csHeader->shift)))) }}" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                            <label for="line" class="form-label">Line</label>
                            <input type="text" class="form-control" name="line" id="line" value="{{ $csHeader->nama_homeline }}" readonly>
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
            @foreach ($csLine->sortBy('cs_op_pointspv_id') as $line)
                <div class="box">
                    <div class="box-header text-center">
                        <span class="badge bg-success">{{ $line->group_shift->time }}</span>
                    </div>
                    <div class="box-header">
                        <div class= "col-md-4 col-12">
                            <div class="form-group">
                                <label for="customer" class="form-label">{{ $line->pointspv->order_no }}. {{ $line->pointspv->name }}</label>
                                <div class="demo-radio-button">
                                    <input name="status_{{$line->id_cs_op_line}}" type="radio" data-id="{{ $line->id_cs_op_line}}" id="radio_ok_{{$line->id_cs_op_line}}" value="OK" class="update-status" {{ $line->status == 'OK' ? 'checked' : '' }}/>
                                    <label for="radio_ok_{{$line->id_cs_op_line}}">OK</label>
                                    <input name="status_{{$line->id_cs_op_line}}" type="radio" data-id="{{ $line->id_cs_op_line}}" id="radio_ng_{{$line->id_cs_op_line}}" value="NG" class="update-status" {{ $line->status == 'NG' ? 'checked' : '' }}/>
                                    <label for="radio_ng_{{$line->id_cs_op_line}}">NG</label>
                                </div>
                                <label class="col-form-label col-md-4"><span class="form-text text-muted">Uraian Masalah</span></label>
                                <div class="col-md-3">
                                    <input class="form-control update-desc" type="text" name="description_{{$line->id_cs_op_line}}" id="description_{{$line->id_cs_op_line}}" data-id="{{ $line->id_cs_op_line}}" value="{{ $line->description }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-4">
                </div>
                    <div class="col-4" style="text-align:center;">
                        <button type="submit" id="submit-complete" class="btn btn-primary" data-id="{{ $csHeader->id_cs_op_header}}">Submit</button>
                    </div>
            </div>
        </div>
    </section>
</div>
@endsection
