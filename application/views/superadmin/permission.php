<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><?= $page ?></li>
            <li class="breadcrumb-item"><a href="<?= base_url('superadmin/dashboard') ?>"><i class="fa fa-home fa-lg"></i> Home</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 p-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 p-2">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add-new-permission">add new</button>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered permissionTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Permission Name</th>
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
    <div class="modal fade" id="add-new-permission" tabindex="-1" role="dialog" aria-labelledby="add-new-permission" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Create New Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addPermission" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_permission') ?>"
                      <div class="form-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="name">Permission Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required="true">
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

        <div class="modal fade" id="edit-permission" tabindex="-1" role="dialog" aria-labelledby="edit-permission" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="allowance-deduction">Update Permission</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="update-permission" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_permission') ?>"
                          <div class="form-body">
                            <div class="row m-0 p-2">
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                        <label for="getname">Permission Name</label>
                                        <input type="text" class="form-control d-none" id="permission_id" name="id" required="true">
                                        <input type="text" class="form-control" id="getname" name="name" required="true">
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



