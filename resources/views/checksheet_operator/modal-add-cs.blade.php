<div class="modal fade" id="modal-add-checksheet">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Add Checksheet</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('checksheet-op-store')}}" method="POST" id="form-add-checksheet">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prod_date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="prod_date" id="prod_date">
                            </div>
                            <div class="form-group">
                                <label for="machine_add" class="form-label">Mesin</label>
                                <select class="form-control border" name="machine_add" id="machine_add" style="width: 100%;">
                                    <option value="">Pilih Mesin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shift_add" class="form-label">Shift</label>
                                <select class="form-control border" name="shift_add" id="shift_add" style="width: 100%;">
                                    <option value="">Pilih Shift</option>
                                    <option value="A1">SHIFT 1 (Waktu 3)</option>
                                    <option value="A2">SHIFT 2 (Waktu 3)</option>
                                    <option value="A3">SHIFT 3 (Waktu 3)</option>
                                    <option value="B1">SHIFT 1 (Waktu 2)</option>
                                    <option value="B2">SHIFT 2 (Waktu 2)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="line_add" class="form-label">Line</label>
                                <select class="form-control border" name="line_add" id="line_add" style="width: 100%;">
                                    <option value="">Pilih Line</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end gap-1">
                                    <button type="button" class="btn btn-secondary waves-effect" id="reset_checksheet">Reset</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" id="submit_checksheet">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
