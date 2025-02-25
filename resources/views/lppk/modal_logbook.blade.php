<!-- modal Area -->
<div class="modal fade" id="modal-logbook-lppk">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Progress Repair LPPK</h4>
                <button type="button" class="btn-close btnCloseEdit" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data" id="form-input-progress">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id_lppk" id="id_lppk">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="no_lppk" class="form-label">No. LPPK</label>
                                <input type="text" class="form-control" name="no_lppk" id="no_lppk" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="part_code" class="form-label">Part Code</label>
                                <input type="text" class="form-control" name="part_code" id="part_code" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="part_name" class="form-label">Part Name</label>
                                <input class="form-control" type="text" name="part_name" id="part_name" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="part_type" class="form-label">Part Type</label>
                                <input class="form-control" type="text" name="part_type" id="part_type" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input class="form-control" type="text" name="quantity" id="quantity" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="problem_type" class="form-label">Problem Type</label>
                                <input class="form-control" type="text" name="problem_type" id="problem_type" readonly>
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
                                        <input type="text" class="form-control" name="problem_desc" id="problem_desc" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="text-center">Gambar</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td id="image_lppk"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="box-header">
                            <h4 class="box-title">Analisa Penyebab</h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="why_analyze" class="form-label">Why</label>
                                        <input class="form-control" type="text" name="why_analyze" id="why_analyze" >
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="temp_action" class="form-label">Temporary Action</label>
                                        <input class="form-control" type="text" name="temp_action" id="temp_action" >
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="perm_action" class="form-label">Permanent Action</label>
                                        <input class="form-control" type="text" name="perm_action" id="perm_action" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
