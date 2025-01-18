@extends('layout.main')
@section('title', 'Monitoring LKH')
@section('main')
<div class="container-full">
    <!-- Content Header -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Monitoring LKH Stamping</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('lkh-main')}}">LKH Stamping</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Monitoring </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <form action="{{route('lkh-monitor')}}" method="GET" id="filterForm">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Tanggal Produksi</label>
                                            <input class="form-control" type="date" name="date" value="{{request('date')}}" id="date">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Shift</label>
                                        <select class="form-select" style="width: 100%;" id="shift" name="shift">
                                            <option value="" selected>Select Shift</option>
                                            <option value="1" {{ request('shift') == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ request('shift') == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ request('shift') == '3' ? 'selected' : '' }}>3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Line</label>
                                        <select class="form-select" style="width: 100%;" id="line" name="line">
                                            <option value="" selected>Select Line</option>
                                            <option value="1" {{ request('line') == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ request('line') == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ request('line') == '3' ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ request('line') == '4' ? 'selected' : '' }}>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div> --}}
                        </form>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table-lkh">
                                <thead class="table-primary">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Part Number</th>
                                        <th rowspan="2">Customer</th>
                                        <th colspan="22" class="text-center">Item Defect</th>
                                        <th colspan="6" class="text-center">Dies Process</th>
                                        <th colspan="2" class="text-center">Act Check</th>
                                        <th colspan="5" class="text-center">Total Part (Pcs)</th>
                                        <th id="th-lkh" rowspan="2">Verifikasi</th>
                                    </tr>
                                    <tr>
                                        <th id="th-lkh">Hole T/A</th>
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
                                        <th id="th-lkh">Lain-lain</th>
                                        <th id="th-lkh">OP 10</th>
                                        <th id="th-lkh">OP 20</th>
                                        <th id="th-lkh">OP 30</th>
                                        <th id="th-lkh">OP 40</th>
                                        <th id="th-lkh">OP 50</th>
                                        <th id="th-lkh">OP 60</th>
                                        <th id="th-lkh">Start</th>
                                        <th id="th-lkh">Finish</th>
                                        <th id="th-lkh">Sampling</th>
                                        <th id="th-lkh">Total Produksi</th>
                                        <th id="th-lkh">Part OK</th>
                                        <th id="th-lkh">Part Repair</th>
                                        <th id="th-lkh">Part Reject</th>
    
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($records as $record)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$record->part_no ?? 0}}</td>
                                        <td>{{$record->customer ?? 0}}</td>
                                        <td>{{$record->hole_ta ?? 0}}</td>
                                        <td>{{$record->hole_mencuat ?? 0}}</td>
                                        <td>{{$record->hole_doubleprc ?? 0}}</td>
                                        <td>{{$record->hole_geser ?? 0}}</td>
                                        <td>{{$record->hole_mengecil ?? 0}}</td>
                                        <td>{{$record->neck ?? 0}}</td>
                                        <td>{{$record->crack_p ?? 0}}</td>
                                        <td>{{$record->glmbg_krpt ?? 0}}</td>
                                        <td>{{$record->trim_min ?? 0}}</td>
                                        <td>{{$record->trim_over ?? 0}}</td>
                                        <td>{{$record->trim_mencuat ?? 0}}</td>
                                        <td>{{$record->bend_minus ?? 0}}</td>
                                        <td>{{$record->bend_over ?? 0}}</td>
                                        <td>{{$record->emb_geser ?? 0}}</td>
                                        <td>{{$record->double_emb ?? 0}}</td>
                                        <td>{{$record->penyok_defom ?? 0}}</td>
                                        <td>{{$record->krg_stamp ?? 0}}</td>
                                        <td>{{$record->marking_ta ?? 0}}</td>
                                        <td>{{$record->material_s ?? 0}}</td>
                                        <td>{{$record->baret_scratch ?? 0}}</td>
                                        <td>{{$record->dent ?? 0}}</td>
                                        <td>{{$record->others ?? 0}}</td>
                                        <td>{!! $record->dies_process === 'OP10' ? '<strong>&#10003;</strong>' : '' !!}</td>
                                        <td>{!! $record->dies_process === 'OP20' ? '<strong>&#10003;</strong>' : '' !!}</td>
                                        <td>{!! $record->dies_process === 'OP30' ? '<strong>&#10003;</strong>' : '' !!}</td>
                                        <td>{!! $record->dies_process === 'OP40' ? '<strong>&#10003;</strong>' : '' !!}</td>
                                        <td>{!! $record->dies_process === 'OP50' ? '<strong>&#10003;</strong>' : '' !!}</td>
                                        <td>{!! $record->dies_process === 'OP60' ? '<strong>&#10003;</strong>' : '' !!}</td>
                                        <td>{{substr($record->time_start,0,5)}}</td>
                                        <td>{{substr($record->time_finish,0,5)}}</td>
                                        
                                        <td>{{$record->sampling ?? 0}}</td>
                                        <td>{{$record->total_produksi ?? 0}}</td>
                                        <td>{{$record->part_ok ?? 0}}</td>
                                        <td>{{$record->part_repair ?? 0}}</td>
                                        <td>{{$record->part_reject ?? 0}}</td>
                                        <td>{{$record->verifikasi ?? 0}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="40" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end" style="margin-left: 50px">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
@endsection