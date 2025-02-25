<div class="modal fade" id="modal-edit-user">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Edit User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="form-edit-user" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id_user_edit" id="id_user_edit">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_edit" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name_edit" id="name_edit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email_edit" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email_edit" id="email_edit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_edit" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password_edit" id="password_edit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik_edit" class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik_edit" id="nik_edit">
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="org_edit" class="form-label">Organization</label>
                                <select class="form-control border" name="org_edit" id="org_edit" style="width: 100%;">
                                    <option value="">Pilih Org</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="div_edit" class="form-label">Division</label>
                                <select class="form-control border" name="div_edit" id="div_edit" style="width: 100%;">
                                    <option value="">Pilih Divisi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dept_edit" class="form-label">Department</label>
                                <select class="form-control border" name="dept_edit" id="dept_edit" style="width: 100%;">
                                    <option value="">Pilih Dept</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_edit" class="form-label">Section</label>
                                <select class="form-control border" name="section_edit" id="section_edit" style="width: 100%;">
                                    <option value="">Pilih Seksi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position_edit" class="form-label">Position</label>
                                <select class="form-control border" name="position_edit" id="position_edit" style="width: 100%;">
                                    <option value="">Pilih Posisi</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end gap-1">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" id="submit_edit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
