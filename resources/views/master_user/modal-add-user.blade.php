<div class="modal fade" id="modal-add-user">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Add User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('master-user-store')}}" method="POST" id="form-add-user">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employee_name" class="form-label">Nama Karyawan</label>
                                <input type="text" class="form-control" name="employee_name" id="employee_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_name" class="form-label">Username</label>
                                <input type="text" class="form-control" name="user_name" id="user_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email_add" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email_add" id="email_add">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_add" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password_add" id="password_add">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik_add" class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik_add" id="nik_add">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="org_add" class="form-label">Organization</label>
                                <select class="form-control border" name="org_add" id="org_add" style="width: 100%;">
                                    <option value="">Pilih Org</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="div_add" class="form-label">Division</label>
                                <select class="form-control border" name="div_add" id="div_add" style="width: 100%;">
                                    <option value="">Pilih Divisi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dept_add" class="form-label">Department</label>
                                <select class="form-control border" name="dept_add" id="dept_add" style="width: 100%;">
                                    <option value="">Pilih Dept</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_add" class="form-label">Section</label>
                                <select class="form-control border" name="section_add" id="section_add" style="width: 100%;">
                                    <option value="">Pilih Seksi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position_add" class="form-label">Position</label>
                                <select class="form-control border" name="position_add" id="position_add" style="width: 100%;">
                                    <option value="">Pilih Posisi</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end gap-1">
                                    <button type="button" class="btn btn-secondary waves-effect" id="reset_add">Reset</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" id="submit_add">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
