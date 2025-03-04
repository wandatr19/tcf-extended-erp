@extends('layout.main')
@section('title', 'Data User Index')
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
                        <h4 class="box-title">Data User</h4>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success waves-effect" id="add-user">
                                <i class="fa fa-plus-square"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table-data-user">
                                <thead>
                                    <th>Name</th>
                                    <th>NIK</th>
                                    <th>Username</th>
                                    <th>Organization</th>
                                    <th>Division</th>
                                    <th>Department</th>
                                    <th>Section</th>
                                    <th>Position</th>
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
@include('master_user.modal-add-user')
@include('master_user.modal-edit-user')
@endsection