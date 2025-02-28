<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><?= $page ?></li>
            <li class="breadcrumb-item"><a href="<?= base_url('superadmin/dashboard') ?>"><i class="fa fa-home fa-lg"></i> Home</a></li>
        </ul>
    </div>
    <?php foreach ($info as $infor) : ?>
        <form id="update-support" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_support') ?>" enctype="multipart/form-data">
            <div class="form-body">
                <div class="row m-0 p-2">
                    <div class="col-lg-9 p-2">
                        <div class="row m-0 p-2">
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="getsupport_title">Title</label>
                                    <input type="text" class="form-control" value="<?= $infor->title ?>" id="getsupport_title" name="title" required="true">
                                    <input type="text" value="<?= $infor->id ?>" class="form-control d-none" id="getsupport_id" name="id">
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="getsupport_board">Board</label>
                                    <select class="form-control" name="board" id="getsupport_board" required="true">
                                        <option value="<?= $infor->board ?>"><?= $infor->boardName ?></option>
                                        <option value="">--Select Board--</option>
                                        <?php foreach ($board as $bo) : ?>
                                            <option value="<?= $bo->id ?>"><?= $bo->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="getsupport_publication">Publication</label>
                                    <select class="form-control" name="publication" id="getsupport_publication" required="true">
                                        <option value="<?= $infor->publication ?>"><?= $infor->publicationName ?></option>
                                        <option value="">--Select Publication--</option>
                                        <?php foreach ($publication as $pub) : ?>
                                            <option value="<?= $pub->id ?>"><?= $pub->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="getsupport_msubject">Subject</label>
                                    <select class="form-control" name="msubject" id="getsupport_msubject" required="true">
                                        <option value="<?= $infor->msubject ?>"><?= $infor->msubjectName ?></option>
                                        <option value="">--Select Subject--</option>
                                        <?php foreach ($msubject as $sub) : ?>
                                            <option value="<?= $sub->id ?>"><?= $sub->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="getsupport_subject">Book</label>
                                    <select class="form-control" name="subject" id="getsupport_subject" required="true">
                                        <option value="<?= $infor->subject ?>"><?= $infor->subjectName ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="getsupport_class">Class</label>
                                    <select class="form-control" name="classes" id="getsupport_class" required="true">
                                        <option value="<?= $infor->classes ?>"><?= $infor->className ?></option>
                                        <option value="">--Select Class--</option>
                                        <?php foreach ($classes as $class) : ?>
                                            <option value="<?= $class->id ?>"><?= $class->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="uploadType">Upload Type</label>
                                    <select class="form-control" name="upload_type" id="uploadType">
                                        <option value="file" <?= $infor->file_url ? '' : 'selected'; ?>>File</option>
                                        <option value="url" <?= $infor->file_url ? 'selected' : ''; ?>>URL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 p-2" id="uploadFile">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="getsupport_image">Upload File</label>
                                        <input type="file" id="getsupport_image" name="support_image" class="form-control-file border">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 p-2" id="uploadURL">
                                <div class="form-group">
                                    <label for="support_image">Upload URL</label>
                                    <input type="url" id="support_url" name="support_url" class="form-control" value="<?= $infor->file_url ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="getsupport_icon">Upload Icon</label>
                                    <input type="file" id="getsupport_icon" name="support_icon" class="form-control-file border">
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="getsupport_edition">Edition</label>
                                    <select class="form-control" name="edition" id="getsupport_edition">
                                        <option value="<?= $infor->edition ?>"><?= $infor->edition ?></option>
                                        <option value="">--Select Edition--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="getsupport_year">Year</label>
                                    <select class="form-control" name="year" id="getsupport_year">
                                        <option value="<?= $infor->year ?>"><?= $infor->year ?></option>
                                        <option value="">--Select Edition Year--</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="getsupport_description">Description</label>
                                    <textarea class="form-control" id="getsupport_description" name="description"><?= $infor->description ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-2 p-2">
                                <span>States:</span>
                            </div>

                            <div class="col-lg-10 p-2">
                                <div class="row">
                                    <div class="col-lg-12 spe-ch">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-control-custom" id="checkAlln">
                                            <label class="form-check-label" for="checkAlln">
                                                Check All North Zone
                                            </label>
                                        </div>
                                    </div>
                                    <?php
                                    $permid_array = explode(',', $infor->states);
                                    ?>
                                    <?php foreach ($countn as $coun) : ?>
                                        <div class="col-lg-4">
                                            <div class="form-check">
                                                <input type="checkbox" <?= (in_array($coun->StateID, $permid_array)) ? 'checked' : '' ?> class="form-control-custom north" name="states[]" value="<?= $coun->StateID ?>">
                                                <label class="form-check-label">
                                                    <?= $coun->StateName ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-lg-12 spe-ch mt-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-control-custom" id="checkAllw">
                                            <label class="form-check-label" for="checkAllw">
                                                Check All West Zone
                                            </label>
                                        </div>
                                    </div>
                                    <?php foreach ($countw as $couw) : ?>
                                        <div class="col-lg-4">
                                            <div class="form-check">
                                                <input type="checkbox" <?= (in_array($couw->StateID, $permid_array)) ? 'checked' : '' ?> class="form-control-custom west" name="states[]" value="<?= $couw->StateID ?>">
                                                <label class="form-check-label">
                                                    <?= $couw->StateName ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-lg-12 spe-ch mt-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-control-custom" id="checkAlls">
                                            <label class="form-check-label" for="checkAlls">
                                                Check All South Zone
                                            </label>
                                        </div>
                                    </div>
                                    <?php foreach ($counts as $cous) : ?>
                                        <div class="col-lg-4">
                                            <div class="form-check">
                                                <input type="checkbox" <?= (in_array($cous->StateID, $permid_array)) ? 'checked' : '' ?> class="form-control-custom south" name="states[]" value="<?= $cous->StateID ?>">
                                                <label class="form-check-label">
                                                    <?= $cous->StateName ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-lg-12 spe-ch mt-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-control-custom" id="checkAlle">
                                            <label class="form-check-label" for="checkAlle">
                                                Check All East Zone
                                            </label>
                                        </div>
                                    </div>
                                    <?php foreach ($counte as $coue) : ?>
                                        <div class="col-lg-4">
                                            <div class="form-check">
                                                <input type="checkbox" <?= (in_array($coue->StateID, $permid_array)) ? 'checked' : '' ?> class="form-control-custom east" name="states[]" value="<?= $coue->StateID ?>">
                                                <label class="form-check-label">
                                                    <?= $coue->StateName ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 m-0 pt-5 sss">
                        Click Here for Download File Attachment:
                        <a href="assets/files/<?= $infor->file_name ?>"><?= $infor->file_name ?></a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary float-right">Save</button>
                </div>

        </form>
    <?php endforeach; ?>
</main>