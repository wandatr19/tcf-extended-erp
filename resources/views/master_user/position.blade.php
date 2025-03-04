@extends('layout.main')
@section('title', 'Data Posisi')
@section('header')
    @include('layout.header')
@endsection

@section('navbar')
    @include('layout.navbar_user')
@endsection

@section('main')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header d-flex justify-content-between">
                        <h4 class="box-title">Data Posisi</h4>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success waves-effect" id="add-position">
                                <i class="fa fa-plus-square"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table-data-position">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Posisi</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection