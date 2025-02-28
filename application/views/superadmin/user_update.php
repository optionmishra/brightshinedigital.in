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
<?php foreach ($info as $infor): ?>
    <form id="update-user" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_user') ?>"
          <div class="form-body">
            <div class="row m-0 p-2">
                <div class="col-lg-6 p-2">
                    <div class="form-group">
                        <label for="getname">Full Name</label>
                        <input type="text" class="form-control d-none" value="<?= $infor->id ?>" id="user_id" name="id" >
                        <input type="text" class="form-control" value="<?= $infor->name ?>" id="getname" name="getname" required="true">
                    </div>
                </div>
                <div class="col-lg-6 p-2">
                    <div class="form-group">
                        <label for="getlevel">User Level</label>
                        <select class="form-control" name="getlevel" id="getlevel" required="true">
                            <option value="<?= $infor->level ?>"><?= $infor->level ?></option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 p-2">
                    <div class="form-group">
                        <label for="getmobile">Mobile</label>
                        <input type="text" value="<?= $infor->mobile ?>" class="form-control" id="getmobile" name="getmobile" required="true">
                    </div>
                </div>
                <div class="col-lg-6 p-2">
                    <div class="form-group">
                        <label for="getemail">Email</label>
                        <input type="text" class="form-control" value="<?= $infor->email ?>" id="getemail" name="getemail" required="true">
                    </div>
                </div>
                <div class="col-lg-2 p-2">
                    <span>Permissions:</span>
                </div>
                <div class="col-lg-10 p-2">
                    <div class="row">
                        <?php
                        $permid_array = explode(',', $infor->permissions);
                        foreach ($permissions as $key => $permission):
                            ?>
                            <div class="col-lg-4">
                                <div class="form-check">
                                    <input type="checkbox" <?= (in_array($permission->name, $permid_array)) ? 'checked' : '' ?> class="form-control-custom" id="<?= $permission->name ?>" name="permissions[]" value="<?= $permission->name ?>"> 
                                    <label class="form-check-label" for="<?= $permission->name ?>">
                                        <?= $permission->name ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
                <button  class="btn btn-primary float-right">Save</button>
            </div>
       
    </form>
<?php endforeach; ?>
</main>