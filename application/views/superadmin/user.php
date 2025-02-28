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
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add-new-user">add new</button>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered userTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Name</th>
                                            <th>Mobile</th>
                                            <th>E-mail</th> 
                                            <th>User Level</th> 
                                            <th>Last Login</th>
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
    <div class="modal fade" id="add-new-user" tabindex="-1" role="dialog" aria-labelledby="add-new-user" aria-hidden="true">
        <div class="modal-dialog modal-xlg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Create New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addUser" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_user') ?>"
                      <div class="form-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-9 p-2">
                                <div class="row">
                                    <div class="col-lg-6 p-2">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>

                                            <input type="text" class="form-control" id="name" name="name" required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-2">
                                        <div class="form-group">
                                            <label for="level">User Level</label>
                                            <select class="form-control" name="level" id="level" required="true">
                                                <option value="">--Select Level--</option>
                                                <option value="Super Admin">Super Admin</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-2">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-2">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 p-2">
                                        <span>Permissions:</span>
                                    </div>
                                    <div class="col-lg-10 p-2">
                                        <div class="row">
                                            <?php foreach ($permissions as $permission): ?>
                                                <div class="col-lg-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-control-custom" id="<?= $permission->name ?>" name="permissions[]" value="<?= $permission->name ?>"> 
                                                        <label class="form-check-label" for="<?= $permission->name ?>">
                                                            <?= $permission->name ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="card">
                                    <div class="card-header">
                                        <span class="card-title">Profile Image</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 logo-preview" >
                                                <img src="<?= base_url('assets/img/upload.jpg') ?>" id="profile_img" class="mx-auto fit-image" alt="no image">
                                                <div class="middle">
                                                    <label class="btn btn-sm btn-primary">
                                                        <input type="file" id="" name="profile_img" onchange="$('#profile_img').attr('src', window.URL.createObjectURL(this.files[0]))" class="form-control-file border d-none">
                                                        Choose Image
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button  class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
                            <button  class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </form>
            </div>    
        </div>
</main>



