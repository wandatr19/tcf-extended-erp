@extends('layout.main')
@section('title', 'Monitoring LKH')

@section('header')
    @include('layout.header')
@endsection

@section('navbar')
    @include('layout.navbar_lkh')
@endsection

@section('main')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header d-flex justify-content-between">
                        <h4 class="box-title">Data LKH Stamping</h4>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info waves-effect" id="filter-lkh">
                                <i class="fa fa-filter"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table-lkh">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Part Number</th>
                                        <th rowspan="2">Customer</th>
                                        {{-- <th colspan="22" class="text-center">Item Defect</th> --}}
                                        <th rowspan="2" class="text-center">Dies Process</th>
                                        <th colspan="2" class="text-center">Act Check</th>
                                        <th colspan="5" class="text-center">Total Part (Pcs)</th>
                                        <th id="th-lkh" rowspan="2">Verifikasi</th>
                                    </tr>
                                    <tr>
                                        {{-- <th id="th-lkh">Hole T/A</th>
                                        <th id="th-lkh">Hole Mencuat</th>
                                        <th id="th-lkh">Hole Double Prc</th>
                                        <th id="th-lkh">Hole Geser</th>
                                        <th id="th-lkh">Hole Mengecil</th>
                                        <th id="th-lkh">Neck</th>
                                        <th id="th-lkh">Crack/Pecah</th>
                                        <th id="th-lkh">Gelombang/Keriput</th>
                                        <th id="th-lkh">Trimming Minus</th>
                                        <th id="th-lkh">Trimming Over</th>
                                        <th id="th-lkh">Trimming Mencuat</th>
                                        <th id="th-lkh">Bend Minus</th>
                                        <th id="th-lkh">Bend Over</th>
                                        <th id="th-lkh">Embose Geser</th>
                                        <th id="th-lkh">Double Embose</th>
                                        <th id="th-lkh">Penyok/Defoam</th>
                                        <th id="th-lkh">Kurang Stamp</th>
                                        <th id="th-lkh">Marking T/A</th>
                                        <th id="th-lkh">Material S/Speck</th>
                                        <th id="th-lkh">Baret/Scratch</th>
                                        <th id="th-lkh">Dent</th>
                                        <th id="th-lkh">Lain-lain</th> --}}
                                        <th id="th-lkh">Start</th>
                                        <th id="th-lkh">Finish</th>
                                        <th id="th-lkh">Sampling</th>
                                        <th id="th-lkh">Total Produksi</th>
                                        <th id="th-lkh">Part OK</th>
                                        <th id="th-lkh">Part Repair</th>
                                        <th id="th-lkh">Part Reject</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        {{-- <div class="d-flex justify-content-end" style="margin-left: 50px">
                            <table class="table table-bordered" style="width: 400px;">
                                <thead>
                                    <th class="text-center">Checked</th>
                                    <th class="text-center">Prepared</th>
                                </thead>
                                <tbody>
                                    <td>
                                        <div class="form-check text-center p-0">
                                            <button type="submit" class="btn btn-outline-primary" id="approved" name="approved" value="approved" >✔</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check text-center p-0">
                                            <button type="submit" class="btn btn-outline-primary" id="completed" name="completed" value="completed" >✔</button>
                                        </div>
                                    </td>
                                </tbody>
                                <tfoot>
                                    <th class="text-center">Leader</th>
                                    <th class="text-center">Inspector</th>
                                </tfoot>
                            </table>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
@include('lkh.modal-filter')
@endsection