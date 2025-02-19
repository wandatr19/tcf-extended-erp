@extends('layout.main')
@section('title', 'Input LKH')

@section('header')
    @include('layout.header')
@endsection

@section('navbar')
    @include('layout.navbar_lkh')
@endsection

@section('main')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Input LKH Stamping</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('lkh-main')}}">LKH Stamping</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Input </li>
                        </ol>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form action="{{route('lkh-store')}}" method="POST" id="form-lkh">
            @csrf
            <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">Detail Laporan Harian</h4>  
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
                            <label for="line" class="form-label">Line</label>
                            <select class="form-select" style="width: 100%;" name="line" id="line" required>
                                <option selected="selected" disabled>Select Line</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                            <label for="shift" class="form-label">Shift</label>
                            <select class="form-select" style="width: 100%;" name="shift" id="shift" required>
                                <option selected="selected" disabled>Select Shift</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            </div>
                        </div>
                        <div class= "col-md-4 col-12">
                            <div class="form-group">
                                <label for="customer" class="form-label">Customer</label>
                                <select class="form-select " name="customer" id="customer">
                                    <option value="">Pilih Customer</option>
                                </select>
                            </div>
                        </div>
                        <div class= "col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label">Part Name</label>
                                <select class="form-select " name="part_no" id="part_no">
                                    <option value="">Pilih Part</option>
                                </select>
                            </div>
                        </div>
                        <div class= "col-md-2 col-12">
                            <div class="form-group">
                                <label for="time_start" class="form-label">Actual Check (Start)</label>
                                <input class="form-control" type="time" name="time_start" id="time_start" required>
                            </div>
                        </div>
                        <div class= "col-md-2 col-12">
                            <div class="form-group">
                                <label for="time_finish" class="form-label">Actual Check (Finish)</label>
                                <input class="form-control" type="time" name="time_finish" id="time_finish" required>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- /.box-body -->
                
                <div class="box-header">
                    <h4 class="box-title">Item Defects</h4>  
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label for="hole_ta" class="col-form-label col-md-4">Hole T/A</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="hole_ta" id="hole_ta">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label for="hole_tembus" class="col-form-label col-md-4">Hole T/Tembus</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="hole_tembus" id="hole_tembus">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Hole Mencuat</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="hole_mencuat" id="hole_mencuat">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Hole Geser</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="hole_geser" id="hole_geser">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Hole Double Prc</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="hole_doubleprc" id="hole_doubleprc">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Hole Mengecil</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="hole_mengecil" id="hole_mengecil">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Neck</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="neck" id="neck">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Crack/Pecah</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="crack_p" id="crack_p">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Gelombang/Keriput</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="glmbg_krpt" id="glmbg_krpt">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Triming Minus</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="trim_min" id="trim_min">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Triming Over</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="trim_over" id="trim_over">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Triming Mencuat</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="trim_mencuat" id="trim_mencuat">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Bend Minus</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="bend_min" id="bend_min">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Bend Over</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="bend_over" id="bend_over">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Embose Geser</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="emb_geser" id="emb_geser">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Double Embose</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="double_emb" id="double_emb">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Penyok/Defoam</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="penyok_defom" id="penyok_defom">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Kurang Stamp</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="krg_stamp" id="krg_stamp">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Marking T/A</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="marking_ta" id="marking_ta">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Material S/Speck T/A</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="material_s" id="material_s">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Baret/Scratch</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="baret_scratch" id="baret_scratch">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Dent</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="dent" id="dent">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Lain-lain</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="others" id="others">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-header">
                    <h4 class="box-title">Dies Process</h4>  
                </div>
                <div class="box-body">
                    <div class="demo-radio-button">
                        <input name="dies_process" type="radio" id="op10" class="with-gap radio-col-primary" checked value="OP10"/>
                        <label for="op10">OP 10</label>					
                        <input name="dies_process" type="radio" id="op20" class="with-gap radio-col-primary" value="OP20"/>
                        <label for="op20">OP 20</label>
                        <input name="dies_process" type="radio" id="op30" class="with-gap radio-col-primary" value="OP30"/>
                        <label for="op30">OP 30</label>
                        <input name="dies_process" type="radio" id="op40" class="with-gap radio-col-primary" value="OP40"/>
                        <label for="op40">OP 40</label>
                        <input name="dies_process" type="radio" id="op50" class="with-gap radio-col-primary" value="OP50"/>
                        <label for="op50">OP 50</label>
                        <input name="dies_process" type="radio" id="op60" class="with-gap radio-col-primary" value="OP60"/>
                        <label for="op60">OP 60</label>
                    </div>
                </div>
                <div class="box-header">
                    <h4 class="box-title">Total Part (Pcs)</h4>  
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Sampling (S-M-E)</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="sampling">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Total Produksi</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="total_prod" id="total_prod">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Part OK</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="part_ok" id="part_ok" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Part Repair</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="part_repair">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Part Reject</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="part_reject" id="part_reject" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Verifikasi (LS/CS)</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="verifikasi">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- /.box-body -->
            <!-- /.box -->
            </div>
            <div class="row">
                <div class="col-4">
                </div>
                    <div class="col-4" style="text-align:center;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </form>
      </div>
    </section>
  </div>
@endsection