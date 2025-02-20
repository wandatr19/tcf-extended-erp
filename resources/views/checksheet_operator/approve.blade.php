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
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header d-flex justify-content-between">
                        <h4 class="box-title">Approval Checksheet Operator</h4>
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