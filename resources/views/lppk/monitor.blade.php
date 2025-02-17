@extends('layout.main')
@section('title', 'Monitoring LPPK')
@section('main')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Monitoring LPPK</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('lppk-main')}}">LPPK</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Monitoring </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end" style="margin-left: 50px">
                    <table class="table table-bordered" style="width: 250px;">
                        <thead>
                            <th colspan="2" class="text-center">Status</th>
                        </thead>
                        <tbody>
                            <td>
                                <div class="form-check text-center p-0">
                                    <button type="submit" class="btn btn-outline-success" id="approved" name="approved" value="approved"> <strong>OPEN</strong> </button>
                                </div>
                            </td>
                            <td>
                                <div class="form-check text-center p-0">
                                    <button type="submit" class="btn btn-outline-danger active" id="completed" name="completed" value="completed" > <strong>CLOSED</strong> </button>
                                </div>
                            </td>
                        </tbody>
                    </table>
                </div>

                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Detail Request (Diisi oleh Dept. Quality)</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">No. LPPK</label>
                                        <input class="form-control" type="name" name="no_lppk" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">Part No.</label>
                                        <input class="form-control" type="name" name="part_no" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">Part Name</label>
                                        <input class="form-control" type="name" name="part_name" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">Type</label>
                                        <input class="form-control" type="name" name="type" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">Customer</label>
                                    <select class="form-select" style="width: 100%;">
                                        <option selected="selected">PT Summit Adyawinsa Indonesia</option>
                                        <option>PT Exedy Manufacturing Indonesia</option>
                                        <option>PT Astra Daihatsu Motor</option>
                                        <option>PT Honda Prospect Motor</option>
                                        <option>PT Adyawinsa Plastics Indonesia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">Date</label>
                                        <input class="form-control" type="date" name="date" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">Material</label>
                                        <input class="form-control" type="name" name="date" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">Lot Material</label>
                                        <input class="form-control" type="name" name="lot_material" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">Quantity</label>
                                        <input class="form-control" type="number" name="quantity" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">Problem Type</label>
                                        <input class="form-control" type="number" name="problem_type" readonly>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="box-header">
                        <h4 class="box-title">Problem Description</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="6" name="description" readonly></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Gambar 1</th>
                                            <th class="text-center">Gambar 2</th>
                                            <th class="text-center">Gambar 3</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Analisa Penyebab</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label class="form-label">Why</label>
                                    <textarea class="form-control" rows="1" name="why"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label class="form-label">Temporary Action</label>
                                    <input type="text" name="temp_action" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label class="form-label">Permanent Action</label>
                                    <input type="text" name="perm_action" class="form-control">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="box-header">
                        <h4 class="box-title">Action Result</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Action</label>
                                    <div class="demo-radio-button">
                                        <input name="group5" type="radio" id="op10" class="with-gap radio-col-primary" checked />
                                        <label for="op10">Temporary</label>					
                                        <input name="group5" type="radio" id="op20" class="with-gap radio-col-primary" />
                                        <label for="op20">Permanent</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Deskripsi Perbaikan</label>
                                    <textarea class="form-control" rows="1" name="deskripsi_perbaikan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-header">
                        <h4 class="box-title">Trial Result</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="text-center">Ke-</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">OK</th>
                                            <th class="text-center">NG</th>
                                            <th class="text-center">QC</th>
                                            <th class="text-center">Dept. Lain</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>23/12/2024</td>
                                            <td>Y</td>
                                            <td>Mesin</td>
                                            <td>Yes</td>
                                            <td>Quality</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end" style="margin-left: 50px">
                <table class="table table-bordered" style="width: 400px;">
                    <thead>
                        <th class="text-center">Checked</th>
                        <th class="text-center">Repaired</th>
                    </thead>
                    <tbody>
                        <td>
                            <div class="form-check text-center p-0">
                                <button type="submit" class="btn btn-outline-primary active" id="approved" name="approved" value="approved" >✔</button>
                            </div>
                        </td>
                        <td>
                            <div class="form-check text-center p-0">
                                <button type="submit" class="btn btn-outline-primary" id="completed" name="completed" value="completed" >✔</button>
                            </div>
                        </td>
                    </tbody>
                    <tfoot>
                        <th class="text-center">QC Dept</th>
                        <th class="text-center">Inspector</th>
                    </tfoot>
                </table>
            </div>
        </div> 

    </section>

</div>


@endsection