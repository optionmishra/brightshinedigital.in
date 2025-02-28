<?php foreach ($user as $print) : ?>
    <main class="app-content ">
        <div class="row user">
            <div class="col-md-12">
                <div class="profile row">
                    <div class="col-lg-3 pr-0">
                        <div class="info logo-preview">
                            <?php if (empty($print->dp)) { ?>
                                <img class="user-img mx-auto fit-image" src="<?= base_url('assets/img/3.png') ?>" id="logo_prof" style="margin-bottom:10px;">
                            <?php } else { ?>
                                <img class="user-img mx-auto fit-image" src="<?= base_url('assets/img/' . $print->dp . '') ?>" id="logo_prof" style="margin-bottom:10px;">
                            <?php } ?>
                            <div class="middle">
                                <label class="btn btn-sm btn-primary">
                                    <input type="file" id="logo_profile" name="logo_img" onchange="$('#logo_prof').attr('src', window.URL.createObjectURL(this.files[0]))" class="form-control-file border d-none">
                                    Choose Image For Edit
                                </label>
                            </div>
                            <h4 style="color:#fff;"><?= $print->fullname ?></h4>
                            <p style="color:#fff;"><?= $print->user_type ?></p>
                        </div>
                        <div class="pt-0 pb-4">
                            <div class="tile p-0">
                                <ul class="nav flex-column nav-tabs user-tabs">
                                    <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Personal Info</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Account Setting</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#user-edit" data-toggle="tab">Edit Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 pl-0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="user-timeline">
                                <div class="tile user-settings">
                                    <h4 class="line-head">Personal Information</h4>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label>Full Name</label>
                                            <input class="form-control" type="text" id="wpro_full_name" name="name" value="<?= $print->fullname ?>" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Address (School)</label>
                                            <input class="form-control" type="text" id="wpro_address" name="address" value="<?= $print->address ?>" disabled>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label>Pincode</label>
                                            <input class="form-control" type="text" id="wpro_pin" name="pin" value="<?= $print->pin ?>" disabled>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 mb-4">
                                            <label>Mobile No</label>
                                            <input class="form-control" type="text" id="wpro_mobile" name="mobile" value="<?= $print->mobile ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label>User Type</label>
                                            <input class="form-control" type="text" id="wpro_city" name="user_type" value="<?= $print->user_type ?>" disabled>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 mb-4">
                                            <label>Date Of Birth</label>
                                            <input class="form-control" type="text" id="wpro_dob" name="dob" value="<?= $print->dob ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Address (Personal)</label>
                                            <input class="form-control" type="text" id="wpro_address" name="addresss" value="<?= $print->addresss ?>" disabled>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-4">
                                            <label>Email (School)</label>
                                            <input class="form-control" type="text" id="wpro_dob" name="emails" value="<?= $print->email ?>" disabled>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-4 mb-4">
                                            <label>Board</label>
                                            <select class="form-control" name="board" id="board" required="true" disabled="true">
                                                <option value="<? echo $print->board_name ?>" selected><? echo $print->board_name ?></option>
                                                <!-- <option value="CBSE">CBSE</option> -->
                                                <!-- <option value="ICSE">ICSE</option> -->
                                            </select>
                                        </div>
                                    </div>




                                    <?php if ($print->country == '105') { ?>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Country</label>
                                                <input class="form-control" type="text" id="wpro_address" name="addresss" value="India" disabled>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-4 mb-4">
                                                <label>State</label>
                                                <?php
                                                foreach ($states as $value) {
                                                    if ($print->state == $value['id']) {
                                                        $state_name = $value['name'];
                                                    }
                                                }
                                                ?>

                                                <input class="form-control" type="text" id="wpro_dob" name="emails" value="<?= $state_name; ?>" disabled>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label>City</label>
                                                <input class="form-control" type="text" id="wpro_city" name="city" value="<?= $print->city ?>" disabled>
                                            </div>
                                        </div>
                                    <?php } else { ?>


                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Country</label>
                                                <input class="form-control" type="text" id="wpro_address" name="addresss" value="<?= $print->country ?>" disabled>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-4 mb-4">
                                                <label>state</label>

                                                <input class="form-control" type="text" id="wpro_dob" name="emails" value="<?= $print->oth_city; ?>" disabled>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label>City</label>
                                                <input class="form-control" type="text" id="wpro_city" name="city" value="<?= $print->oth_city ?>" disabled>
                                            </div>
                                        </div>

                                    <?php } ?>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Person/Referrel Name</label>
                                            <input class="form-control" type="text" id="wpro_address" name="addresss" value="<?= $print->referrel_name ?>" disabled>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-4 mb-4">
                                            <label>Person/Referrel Contact</label>
                                            <input class="form-control" type="text" id="wpro_dob" name="emails" value="<?= $print->referrel_mobile ?>" disabled>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label>Principal's Name</label>
                                            <input class="form-control" type="text" id="wpro_dob" name="emails" value="<?= $print->principal_name ?>" disabled>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Series</label>
                                            <textarea class="form-control" rows="10" type="text" id="wpro_address" name="addresss" disabled>
											<?php
                                            // $series = array(); old
                                            // $series = $print->subject; old
                                            $series = explode(',', $print->subject);
                                            foreach ($msubject as $sub) {
                                                if (in_array($sub->id, $series)) {
                                            ?>
											  <?php echo $sub->name . ','; ?>										
											
											<?php }
                                            } ?>
											</textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6 mb-4">
                                            <label>Classes</label>
                                            <textarea class="form-control" rows="10" type="text" id="wpro_address" name="addresss" disabled>
											<?php
                                            // $classes = array(); old
                                            $classes = explode(',', $print->classes);
                                            foreach ($classes as $class) {
                                                // if (!in_array($class->id, $classes)) {
                                            ?>
											  <?php echo 'Class' . $class . ','; ?>										
											
											<?php }
                                            // } 
                                            ?>
											</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="user-settings">
                                <div class="tile user-settings">
                                    <h4 class="line-head">Account Setting</h4>
                                    <form id="updateUserProfile" class="smooth-submit" method="post" action="<?= base_url('admin_master/wupdate_profile_account') ?>">
                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <label>Email</label>
                                                <input class="form-control" type="email" id="wpro_email" name="email" value="<?= $print->email ?>">
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
                            <div class="tab-pane fade" id="user-edit">
                                <div class="tile user-settings">
                                    <h4 class="line-head">Edit Profile</h4>
                                    <form id="wupdateUserPro" class="smooth-submit" method="post" action="<?= base_url('admin_master/wupdate_profile') ?>">
                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <label>Full Name</label>
                                                <input class="form-control" type="text" id="wpro_full_name" name="name" value="<?= $print->fullname ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Address (School)</label>
                                                <input class="form-control" type="text" id="wpro_address" name="address" value="<?= $print->address ?>">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label>Pincode</label>
                                                <input class="form-control" type="text" id="wpro_pin" name="pin" value="<?= $print->pin ?>">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-6 mb-4">
                                                <label>Mobile No</label>
                                                <input class="form-control" type="text" id="wpro_mobile" name="mobile" value="<?= $print->mobile ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label>City</label>
                                                <input class="form-control" type="text" id="wpro_city" name="city" value="<?= $print->city ?>">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-6 mb-4">
                                                <label>Date Of Birth</label>
                                                <input class="form-control" type="Date" id="wpro_dob" name="dob" value="<?= $print->dob ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address (Personal)</label>
                                                <input class="form-control" type="text" id="wpro_address" name="addresss" value="<?= $print->addresss ?>">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-6 mb-4">
                                                <label>Email (School)</label>
                                                <input class="form-control" type="text" id="wpro_dob" name="emails" value="<?= $print->emails ?>">
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
            </div>

        </div>
    </main>
<?php endforeach; ?>