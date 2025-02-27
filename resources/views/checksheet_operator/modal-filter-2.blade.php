<div class="modal fade" id="modal-filter-checksheet" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Filter Checksheet</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="filter_date" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="filter_date" id="filter_date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="filter_machine" class="form-label">Mesin</label>
                            <select class="form-control border" name="filter_machine" id="filter_machine" style="width: 100%;">
                                <option value="">Pilih Mesin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="filter_shift" class="form-label">Shift</label>
                            <select class="form-control border" name="filter_shift" id="filter_shift" style="width: 100%;">
                                <option value="">Pilih Shift</option>
                                <option value="A1">SHIFT 1 (Waktu 3)</option>
                                <option value="A2">SHIFT 2 (Waktu 3)</option>
                                <option value="A3">SHIFT 3 (Waktu 3)</option>
                                <option value="B1">SHIFT 1 (Waktu 2)</option>
                                <option value="B2">SHIFT 2 (Waktu 2)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="filter_status" class="form-label">Status</label>
                            <select class="form-control border" name="filter_status" id="filter_status" style="width: 100%;">
                                <option value="">Pilih Status</option>
                                <option value="APPROVED">APPROVED</option>
                                <option value="COMPLETED">COMPLETED</option>
                                <option value="DRAFTED">DRAFTED</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end gap-1">
                                <button type="button" class="btn btn-secondary waves-effect" id="reset_filter">Reset</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light" id="submit_filter">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>