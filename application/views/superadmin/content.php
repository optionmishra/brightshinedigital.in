<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashcont"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><?= $page ?></li>
            <li class="breadcrumb-item"><a href="<?= base_url('superadmin/dashcont') ?>"><i class="fa fa-home fa-lg"></i> Home</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 p-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 p-2">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add-new-cont">add new</button>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered contTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Value</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-new-cont" tabindex="-1" role="dialog" aria-labelledby="add-new-cont" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Create New Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addContent" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_cont') ?>"
                      <div class="form-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer col-lg-12">
                            <button  class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
                            <button  class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="edit-cont" tabindex="-1" role="dialog" aria-labelledby="edit-cont" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="allowance-deduction">Update Content</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="update-cont" class="smooth-submit" enctype="" method="post" action="<?= base_url('admin_master/update_cont') ?>"
                          <div class="form-body">
                            <div class="row m-0 p-2">
                                <div class="col-lg-6 p-2">
                                    <div class="form-group">
                                        <label for="gettype">Type</label>
                                        <input type="text" class="form-control d-none" id="cont_id" name="id" required="true">
                                        <input type="text" class="form-control" id="cont_name" name="name" required="true" readonly>
                                       
                                    </div>
                                </div>
                                <div class="col-lg-4 p-2">
                                    <div class="form-group">
                                        <label for="cont_file">Upload File</label>
                                        <input type="file" class="form-control" id="cont_file" name="file_name" onchange="$('#cont_image').attr('src', window.URL.createObjectURL(this.files[0]))">
                                    </div>
                                </div>
                                <div class="col-lg-2 p-2">
                                    <img src="assets/img/no-img.png" id="cont_image" style="width: 60px">
                                </div>
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                        <label for="cont_value">Value</label>
                                        <textarea class="form-control" id="cont_value" name="value"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer col-lg-12">
                                <button  class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
                                <button  class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </main>





