@extends('layout.main')
@section('title', 'Request LPPK')
@section('main')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Input LPPK</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('lppk-main')}}">LPPK</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Input </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <form action="#" id="form_lppk">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Detail Request</h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">No. LPPK</label>
                                            <input class="form-control" type="name" name="no_lppk" readonly id="no_lppk">
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Part No.</label>
                                            <input class="form-control" type="name" name="part_no">
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Part Name</label>
                                            <input class="form-control" type="name" name="part_name">
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Type</label>
                                            <input class="form-control" type="name" name="type">
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
                                            <input class="form-control" type="date" name="date">
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Material</label>
                                            <input class="form-control" type="name" name="date">
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Lot Material</label>
                                            <input class="form-control" type="name" name="date">
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Quantity</label>
                                            <input class="form-control" type="number" name="date">
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Problem Type</label>
                                            <input class="form-control" type="number" name="date">
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
                                        <textarea class="form-control" rows="6" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Gambar</label>
                                        <div class="dropzone" id="gambar_lppk">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                </div>
                    <div class="col-4" style="text-align:center;">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
            </div>
        </form>
    </section>
</div>
@endsection