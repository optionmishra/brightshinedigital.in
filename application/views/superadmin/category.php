<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashcategory"></i> Dashboard</h1>
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
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add-new-category">add new</button>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered categoryTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Order</th>
                                            <th>Allow</th>
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
    <div class="modal fade" id="add-new-category" tabindex="-1" role="dialog" aria-labelledby="add-new-category" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Create New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addCategory" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_category') ?>" <div class="form-body">
                    <div class="row m-0 p-2">
                        <div class="col-lg-6 p-2">
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name" required="true">
                            </div>
                        </div>
                        <div class="col-lg-6 p-2">
                            <div class="form-group">
                                <label for="student_state">Allow *</label>
                                <select class="form-control" name="allow" required="true">
                                    <option value="">--Select--</option>
                                    <option value="Student">Student</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="Demo">Demo</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer col-lg-12">
                        <button class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary float-right">Save</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="edit-category" tabindex="-1" role="dialog" aria-labelledby="edit-category" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="update-category" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_category') ?>">
                    <div class="form-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="getname">Category Name</label>
                                    <input type="text" class="form-control d-none" id="category_id" name="id" required="true">
                                    <input type="text" class="form-control" id="getname" name="name" required="true">
                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="getname">Allow User</label>
                                    <select class="form-control" name="allow" id="allow_per" required="true">
                                        <option value="Student">Student</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Both">Both</option>
                                        <option value="Demo">Demo</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer col-lg-12">
                        <button class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary float-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>