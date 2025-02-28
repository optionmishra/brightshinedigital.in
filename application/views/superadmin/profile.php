<?php foreach ($row as $print): ?> 
    <main class="app-content">
        <div class="row user">
            <div class="col-md-12">
                <div class="profile">
                    <div class="info logo-preview"><img class="user-img mx-auto fit-image" src="<?= base_url('assets/img/' . $print->profile_img . '') ?>" id="logo_img_school">
                        <div class="middle">
                            <label class="btn btn-sm btn-primary">
                                <input type="file" id="logo_img_schooll" name="logo_img" onchange="$('#logo_img_school').attr('src', window.URL.createObjectURL(this.files[0]))" class="form-control-file border d-none">
                                Choose Image For Edit
                            </label>
                        </div>
                        <h4><?= $print->name ?></h4>
                        <p><?= $print->level ?></p>
                    </div>
                    <div class="cover-image"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Personal Info</a></li>
                        <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Account Setting</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="user-timeline">
                        <div class="tile user-settings">
                            <h4 class="line-head">Personal Information</h4>
                            <form id="updateUserPro" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_profile') ?>">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label>Full Name</label>
                                        <input class="form-control" type="text" id="pro_full_name" name="name" value="<?= $print->name ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Secret Word</label>
                                        <input class="form-control" type="text" id="pro_secret_word" name="secret_word" value="<?= $print->secret_word ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label>Email</label>
                                        <input class="form-control" type="email" id="pro_email" name="email" value="<?= $print->email ?>">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6 mb-4">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" id="pro_mobile" name="mobile" value="<?= $print->mobile ?>">
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="user-settings">
                        <div class="tile user-settings">
                            <h4 class="line-head">Account Setting</h4>
                            <form id="updateUserProfile" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_profile_account') ?>">
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <label>Username</label>
                                        <input class="form-control" type="text" name="username" value="<?= $print->username ?>" required="true">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label>Password</label>
                                        <input class="form-control" value="" title="Password must contain at least 6 characters, including UPPER/lowercase and numbers" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="password" onchange="
                                            this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                            if (this.checkValidity())
                                                form.cpassword.pattern = RegExp.escape(this.value);
                                           ">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6 mb-4">
                                        <label>Confirm Password</label>
                                        <input class="form-control" title="Please enter the same Password as above" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="cpassword" onchange="
                                            this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                           ">
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php endforeach; ?>