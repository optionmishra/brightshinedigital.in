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
                                <table class="table w-100 table-bordered twebuTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Full Name</th>
                                            <th>Mobile</th>
                                            <th>School</th>
                                            <th>Book</th>
                                            <th>Classes</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Address (School)</th>
                                            <th>Address (Personal)</th>
                                            <th>Pin Code</th>
                                            <th>Principal's Name</th>
                                            <th>Country</th>
                                            <th>Session Start</th>
                                            <th>Representative's Name</th>
                                            <th>Representative's Contact</th>
                                            <th>DOB</th>
                                            <th>Student Limit</th>
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
                    <h5 class="modal-title" id="allowance-deduction">Update Web Support Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tupdate-webu" class="smooth-submit" method="post" action="<?= base_url(
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

                            <div class="p-2 col-lg-4">
                                <div class="form-group">
                                    <label for="session_slot1">Board *</label>
                                    <select class="form-control" name="board" id="board" required="true">
                                        <option value="">Select</option>
                                        <?php foreach ($board as $cou): ?>
                                            <option value="<?= $cou->name ?>"><?= $cou->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="p-2 col-lg-12">
                                <div class="form-group">
                                    <label>Series *</label>
                                    <div class="row" id="ser_section">

                                        <p class="text-danger">Select board</p>
                                    </div>
                                </div>
                            </div>


                            <div class="p-2 col-lg-12">
                                <div class="form-group">
                                    <label>Classes *</label>
                                    <div class="row">

                                        <?php foreach ($classes as $class): ?>
                                            <div class="col-lg-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-control-custom cc" id="student_class_<?= $class->id ?>" name="class[]" value="<?= $class->id ?>">
                                                    <label class="form-check-label" for="student_class_<?= $class->id ?>">
                                                        <?= $class->name ?>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
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
</main>
