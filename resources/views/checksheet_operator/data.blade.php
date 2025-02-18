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
                            <li class="breadcrumb-item active" aria-current="page">List Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header d-flex justify-content-between">
                        <h4 class="box-title">Data Checksheet Monitoring Operator</h4>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info waves-effect" id="add-checksheet">
                                <i class="icon-File-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table-checksheet-op">
                                <thead>
                                    <th>Doc No</th>
                                    <th>Shift</th>
                                    <th>Mesin</th>
                                    <th>Issued By</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>sasas</td>
                                        <td>sasas</td>
                                        <td>sasas</td>
                                        <td>sasas</td>
                                        <td>sasas</td>
                                        <td>sasas</td>
                                        <td>sasas</td>
                                    </tr>                                    
                                </tbody>                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@include('checksheet_operator.modal-add-cs')
@endsection