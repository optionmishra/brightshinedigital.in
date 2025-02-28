<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashclasses"></i> Dashclasses</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><?= $page ?></li>
            <li class="breadcrumb-item"><a href="<?= base_url('superadmin/dashclasses') ?>"><i class="fa fa-home fa-lg"></i> Home</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 p-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 p-2">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add-new-classes">add new</button>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered classesTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Classes Name</th>
					    <th>Classes Position</th>
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
    <div class="modal fade" id="add-new-classes" tabindex="-1" role="dialog" aria-labelledby="add-new-classes" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Create New Classes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addClasses" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_classes') ?>"
                      <div class="form-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="name">Classes Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required="true">
                                </div>
				<div class="form-group">
                                    <label for="name">Classes Position</label>
                                    <input type="number" class="form-control" id="position" name="position" required="true">
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

        <div class="modal fade" id="edit-classes" tabindex="-1" role="dialog" aria-labelledby="edit-classes" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="allowance-deduction">Update Classes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="update-classes" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_classes') ?>"
                          <div class="form-body">
                            <div class="row m-0 p-2">
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                        <label for="getname">Classes Name</label>
                                        <input type="text" class="form-control d-none" id="classes_id" name="id" required="true">
                                        <input type="text" class="form-control" id="getname" name="name" required="true">
					</div>
					<div class="form-group">
					<label for="getname">Classes Position</label>
					<input type="text" class="form-control" id="getposition" name="getposition" required="true">
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




