<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><?= $page ?></li>
            <li class="breadcrumb-item">
                <a href="<?= base_url(
                    "superadmin/dashboard"
                ) ?>"><i class="fa fa-home fa-lg"></i> Home</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="p-4 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="p-2 col-lg-12">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered webuTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Full Name</th>
                                            <th>Mobile</th>
                                            <th>Class</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Address</th>
                                            <th>Pin Code</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Teacher Code</th>
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


    <div class="modal fade" id="edit-webu" tabindex="-1" role="dialog" aria-labelledby="edit-webu" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Update Web Support User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="update-webu" class="smooth-submit" method="post" action="<?= base_url(
                    "admin_master/update_webu"
                ) ?>">
                    <div class="form-body">
                        <div class="p-2 m-0 row">
                            <div class="p-2 col-lg-6">
                                <div class="form-group">
                                    <label for="webu_name">Full Name</label>
                                    <input type="text" class="form-control d-none" id="webu_id" name="id" required="true">
                                    <input type="text" class="form-control" id="webu_name" name="name" required="true">
                                </div>
                            </div>
                            <div class="p-2 col-lg-6">
                                <div class="form-group">
                                    <label for="webu_mobile">Mobile</label>
                                    <input type="text" class="form-control" id="webu_mobile" name="mobile" required="true">
                                </div>
                            </div>
                            <div class="p-2 col-lg-6">
                                <div class="form-group">
                                    <label for="webu_email">Email</label>
                                    <input type="email" class="form-control" id="webu_email" name="email" required="true">
                                    <div id="getemail_descc"></div>
                                </div>
                            </div>
                            <div class="p-2 col-lg-6">
                                <div class="form-group">
                                    <label for="webu_pin">Pin Code</label>
                                    <input type="text" class="form-control" id="webu_pin" name="pin">
                                </div>
                            </div>
                            <div class="p-2 col-lg-12">
                                <div class="form-group">
                                    <label for="webu_address">Address</label>
                                    <textarea class="form-control" id="webu_address" name="address"></textarea>
                                </div>
                            </div>
                            <div class="p-2 col-lg-4">
                                <div class="form-group">
                                    <label for="webu_city">City</label>
                                    <input type="text" class="form-control" id="webu_city" name="city">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer col-lg-12">
                            <button class="float-right btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button class="float-right btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
