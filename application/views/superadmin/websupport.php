<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashsupport"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><?= $page ?></li>
            <li class="breadcrumb-item"><a href="<?= base_url('superadmin/dashsupport') ?>"><i class="fa fa-home fa-lg"></i> Home</a></li>
        </ul>
    </div>
    <input type="text" value="<?= $this->uri->segment(3) ?>" class="form-control d-none" id="supportt_type" name="ttype">
    <div class="row">
        <div class="p-4 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="p-2 col-lg-12 spa">
                            <button type="button" class="float-right m-2 btn btn-primary" data-toggle="modal" data-target="#add-new-support">add new</button>
                            <button type="button" class="float-right m-2 btn btn-success" data-toggle="modal" data-target="#batch-upload">Batch Websupport Upload</button>
                            <a class="float-right m-2 btn btn-outline-primary" href="superadmin/batch_upload_instructions" target="_blank">Batch Websupport Upload Instructions</a>
                            <button type="button" class="btn btn-danger" id="delete-support-all">Delete Selected</button>
                        </div>
                        <div class="p-2 col-lg-12">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered supportTables">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="">
                                                    <input type="checkbox" class="form-control-custom" id="selAll">
                                                    <label class="form-check-label" for="selAll">
                                                        All
                                                    </label>
                                                </div>
                                            </th>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Board</th>
                                            <th>Publication</th>
                                            <th>Class</th>
                                            <th>Book</th>
                                            <th>Edition</th>
                                            <th>Year</th>
                                            <th>Date</th>
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
</main>
<div class="modal fade" id="add-new-support" tabindex="-1" role="dialog" aria-labelledby="add-new-support" aria-hidden="true">
    <div class="modal-dialog modal-xlg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="allowance-deduction">Create New Support</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addSupport" class="" method="post" action="" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="p-2 m-0 row">
                        <div class="p-2 col-lg-4">
                            <div class="form-group">
                                <label for="support_title">Title</label>
                                <input type="text" class="form-control" id="support_title" name="title" required="true">
                                <input type="text" value="<?= $this->uri->segment(3) ?>" class="form-control d-none" id="support_type" name="type">
                            </div>
                        </div>
                        <div class="p-2 col-lg-4">
                            <div class="form-group">
                                <label for="support_board">Board</label>
                                <select class="form-control" name="board" id="support_board" required="true">
                                    <option value="">--Select Board--</option>
                                    <?php foreach ($board as $bo) : ?>
                                        <option value="<?= $bo->id ?>"><?= $bo->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 col-lg-4">
                            <div class="form-group">
                                <label for="support_publication">Publication</label>
                                <select class="form-control" name="publication" id="support_publication" required="true">
                                    <option value="">--Select Publication--</option>
                                    <?php foreach ($publication as $pub) : ?>
                                        <option value="<?= $pub->id ?>"><?= $pub->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 col-lg-2">
                            <div class="form-group">
                                <label for="support_msubject">Subject</label>
                                <select class="form-control" name="msubject" id="support_msubject" required="true">
                                    <option value="">--Select Subject--</option>
                                    <?php foreach ($msubject as $sub) : ?>
                                        <option value="<?= $sub->id ?>"><?= $sub->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 col-lg-4">
                            <div class="form-group">
                                <label for="support_subject">Book</label>
                                <select class="form-control" name="subject" id="support_subject" required="true">
                                    <option value="">--Select Book--</option>

                                </select>
                            </div>
                        </div>

                        <div class="p-2 col-lg-2">
                            <div class="form-group">
                                <label for="support_class">Class</label>
                                <select class="form-control" name="classes" id="support_class" required="true">
                                    <option value="">--Select Class--</option>
                                    <?php foreach ($classes as $class) : ?>
                                        <option value="<?= $class->id ?>"><?= $class->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 col-lg-4">
                            <div class="form-group">
                                <label for="upType">Upload Type</label>
                                <select class="form-control" name="up_type" id="upType">
                                    <option value="file">File</option>
                                    <option value="url">URL</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 col-lg-4" id="upFile">
                            <div class="form-group">
                                <label for="support_image">Upload File</label>
                                <input type="file" id="support_image" name="support_image" class="border form-control-file">
                            </div>
                        </div>
                        <div class="p-2 col-lg-4" id="upURL">
                            <div class="form-group">
                                <label for="support_image">Upload URL</label>
                                <input type="text" id="support_url" name="support_url" class="form-control">
                            </div>
                        </div>
                        <div class="p-2 col-lg-4">
                            <div class="form-group">
                                <label for="support_image">Upload Icon</label>
                                <input type="file" id="book_image" name="book_image" class="border form-control-file">
                            </div>
                        </div>
                        <div class="p-2 col-lg-4">
                            <div class="form-group">
                                <label for="support_edition">Edition</label>
                                <select class="form-control" name="edition" id="support_edition">
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
                        <div class="p-2 col-lg-4">
                            <div class="form-group">
                                <label for="support_year">Year</label>
                                <select class="form-control" name="year" id="support_year">
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
                        <div class="p-2 col-lg-12">
                            <div class="form-group">
                                <label for="support_description">Description</label>
                                <textarea class="form-control" id="support_description" name="description"></textarea>
                            </div>
                        </div>
                        <div class="p-2 col-lg-2">
                            <span>States:</span>
                        </div>
                        <div class="p-2 col-lg-10">
                            <div class="row">
                                <div class="col-lg-12 spe-ch">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-control-custom" id="checkAlln">
                                        <label class="form-check-label" for="checkAlln">
                                            Check All North Zone
                                        </label>
                                    </div>
                                </div>
                                <?php foreach ($countn as $coun) : ?>
                                    <div class="col-lg-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-control-custom north" name="states[]" value="<?= $coun->StateID ?>">
                                            <label class="form-check-label">
                                                <?= $coun->StateName ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="mt-2 col-lg-12 spe-ch">
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
                                            <input type="checkbox" class="form-control-custom west" name="states[]" value="<?= $couw->StateID ?>">
                                            <label class="form-check-label">
                                                <?= $couw->StateName ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="mt-2 col-lg-12 spe-ch">
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
                                            <input type="checkbox" class="form-control-custom south" name="states[]" value="<?= $cous->StateID ?>">
                                            <label class="form-check-label">
                                                <?= $cous->StateName ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="mt-2 col-lg-12 spe-ch">
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
                                            <input type="checkbox" class="form-control-custom east" name="states[]" value="<?= $coue->StateID ?>">
                                            <label class="form-check-label">
                                                <?= $coue->StateName ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <div class="" id="progressBar"></div>
                    </div>

                    <div class="modal-footer col-lg-12">
                        <button class="float-right btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button class="float-right btn btn-primary upload-video">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Batch Upload -->

<div class="modal fade" id="batch-upload" tabindex="-1" role="dialog" aria-labelledby="batch-upload" aria-hidden="true">
    <div class="modal-dialog modal-xlg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="allowance-deduction">Batch Websupport Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="batch-upload-step1">
                <strong class="p-2">Step 1: Generate CSV file</strong>
                <form id="upload_and_generate_csv" class="upload_and_generate_csv" method="post" action="" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="p-2 m-0 row">
                            <!-- <div class="p-2 col-lg-4">
                            <div class="form-group">
                                <label for="support_title">Title</label>
                                <input type="text" class="form-control" id="support_title" name="title" required="true">
                                <input type="text" value="<?= $this->uri->segment(3) ?>" class="form-control d-none" id="support_type" name="type">
                            </div>
                        </div> -->
                            <div class="p-2 col-lg-2">
                                <div class="form-group">
                                    <label for="batch_support_board">Board</label>
                                    <select class="form-control" name="board" id="batch_support_board" required="true">
                                        <option value="">--Select Board--</option>
                                        <?php foreach ($board as $bo) : ?>
                                            <option value="<?= $bo->id ?>"><?= $bo->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="p-2 col-lg-3">
                                <div class="form-group">
                                    <label for="batch_support_publication">Publication</label>
                                    <select class="form-control" name="publication" id="batch_support_publication" required="true">
                                        <option value="">--Select Publication--</option>
                                        <?php foreach ($publication as $pub) : ?>
                                            <option value="<?= $pub->id ?>"><?= $pub->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="p-2 col-lg-3">
                                <div class="form-group">
                                    <label for="batch_support_msubject">Subject</label>
                                    <select class="form-control" name="subject" id="batch_support_msubject" required="true">
                                        <option value="">--Select Subject--</option>
                                        <?php foreach ($msubject as $sub) : ?>
                                            <option value="<?= $sub->id ?>"><?= $sub->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="p-2 col-lg-4">
                                <div class="form-group">
                                    <label for="batch_support_subject">Book</label>
                                    <select class="form-control" name="book" id="batch_support_subject" required="true">
                                        <option value="">--Select Book--</option>

                                    </select>
                                </div>
                            </div>

                            <div class="p-2 col-lg-2">
                                <div class="form-group">
                                    <label for="batch_support_class">Class</label>
                                    <select class="form-control" name="class" id="batch_support_class" required="true">
                                        <option value="">--Select Class--</option>
                                        <?php foreach ($classes as $class) : ?>
                                            <option value="<?= $class->id ?>"><?= $class->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="p-2 col-lg-4">
                            <div class="form-group">
                                <label for="upType">Upload Type</label>
                                <select class="form-control" name="up_type" id="upType">
                                    <option value="file">File</option>
                                    <option value="url">URL</option>
                                </select>
                            </div>
                        </div> -->
                            <!-- <div class="p-2 col-lg-4" id="upURL">
                            <div class="form-group">
                                <label for="support_image">Upload URL</label>
                                <input type="text" id="support_url" name="support_url" class="form-control">
                            </div>
                        </div> -->
                            <div class="p-2 col-lg-4">
                                <div class="form-group">
                                    <label for="batch_category">Support Category</label>
                                    <select class="form-control" name="support_category" id="batch_category" required>
                                        <?php foreach ($cat as $category) : ?>
                                            <option value="<?= $category->id ?>" <?= $this->uri->segment(3) === $category->id ? 'selected' : ''; ?>><?= $category->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="p-2 col-lg-3">
                                <div class="form-group">
                                    <label for="batch_support_edition">Edition</label>
                                    <select class="form-control" name="edition" id="batch_support_edition" required>
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
                            <div class="p-2 col-lg-3">
                                <div class="form-group">
                                    <label for="batch_support_year">Year</label>
                                    <select class="form-control" name="year" id="batch_support_year" required>
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
                            <div class="p-2 col-lg-12">
                                <div class="form-group">
                                    <label for="batch_support_description">Description</label>
                                    <textarea class="form-control" id="batch_support_description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="p-2 col-lg-12">
                                <span>States:</span>
                                <div class="row">
                                    <div class="col-lg-12 spe-ch">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-control-custom" id="batch_checkAlln">
                                            <label class="form-check-label" for="batch_checkAlln">
                                                Check All North Zone
                                            </label>
                                        </div>
                                    </div>
                                    <?php foreach ($countn as $coun) : ?>
                                        <div class="col-lg-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-control-custom north" name="states[]" value="<?= $coun->StateID ?>">
                                                <label class="form-check-label">
                                                    <?= $coun->StateName ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="mt-2 col-lg-12 spe-ch">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-control-custom" id="batch_checkAllw">
                                            <label class="form-check-label" for="batch_checkAllw">
                                                Check All West Zone
                                            </label>
                                        </div>
                                    </div>
                                    <?php foreach ($countw as $couw) : ?>
                                        <div class="col-lg-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-control-custom west" name="states[]" value="<?= $couw->StateID ?>">
                                                <label class="form-check-label">
                                                    <?= $couw->StateName ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="mt-2 col-lg-12 spe-ch">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-control-custom" id="batch_checkAlls">
                                            <label class="form-check-label" for="batch_checkAlls">
                                                Check All South Zone
                                            </label>
                                        </div>
                                    </div>
                                    <?php foreach ($counts as $cous) : ?>
                                        <div class="col-lg-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-control-custom south" name="states[]" value="<?= $cous->StateID ?>">
                                                <label class="form-check-label">
                                                    <?= $cous->StateName ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="mt-2 col-lg-12 spe-ch">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-control-custom" id="batch_checkAlle">
                                            <label class="form-check-label" for="batch_checkAlle">
                                                Check All East Zone
                                            </label>
                                        </div>
                                    </div>
                                    <?php foreach ($counte as $coue) : ?>
                                        <div class="col-lg-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-control-custom east" name="states[]" value="<?= $coue->StateID ?>">
                                                <label class="form-check-label">
                                                    <?= $coue->StateName ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>

                            <div class="p-2 col-lg-4" id="upFile">
                                <div class="form-group">
                                    <label for="batch_upload_file">Upload Support File (zip)</label>
                                    <input type="file" id="batch_upload_file" name="support_files" class="border form-control-file" required>
                                </div>
                            </div>
                            <div class="p-2 col-lg-4">
                                <div class="form-group">
                                    <label for="batch_upload_icon">Upload Icon File (zip)</label>
                                    <input type="file" id="batch_upload_icon" name="icon_files" class="border form-control-file" required>
                                </div>
                            </div>
                            <!-- <div class="p-4 mt-auto ml-auto col-lg-4">
                            <button type="button" class="btn btn-success">Upload & Generate CSV File</button>
                        </div> -->

                            <div class="" id="batch-upload-progressBar"></div>
                        </div>

                        <div class="modal-footer col-lg-12">
                            <button class="float-right btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button class="float-right btn btn-primary upload-video">Upload & Generate CSV File</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="batch-upload-step2">
                <strong class="p-2">Step 2: Upload CSV file</strong>
                <form id="upload_and_generate_preview" class="upload_and_generate_preview" method="post" action="" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="p-2 m-0 row">
                            <div class="p-2 col-lg-6">
                                <p>1. Download, Verify and Update CSV file</p>
                                <a href="#" class="btn btn-sm btn-primary" id="downloadCSV" download="">Download CSV</a>
                            </div>
                            <div class="p-2 col-lg-6">
                                <div class="form-group">
                                    <label for="upload_updated_csv">2. Upload Updated CSV File</label>
                                    <input class="border form-control-file" type="file" name="updated_csv_file" id="upload_updated_csv" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer col-lg-12">
                            <button class="float-right btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button class="float-right btn btn-primary upload-video">Upload & Generate Preview</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="batch-upload-step3">
                <strong class="p-2">Step 3: Preview and Final Submit</strong>
                <div class="p-2 col-lg-12">
                    <div class="table-responsive">
                        <table class="table w-100 table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Board</th>
                                    <th>Publication</th>
                                    <th>Subject</th>
                                    <th>Class</th>
                                    <th>Book</th>
                                    <th>Support File</th>
                                    <th>Icon File</th>
                                    <th>Description</th>
                                    <th>Support Category</th>
                                    <th>Edition</th>
                                    <th>Year</th>
                                    <th>States</th>
                                    <th>File URL</th>
                                </tr>
                            </thead>
                            <tbody id="csv_preview">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer col-lg-12">
                    <button class="float-right btn btn-danger" data-dismiss="modal">Cancel</button>
                    <form id="batch_support_upload_final_submit" class="batch_support_upload_final_submit" method="post" action="" enctype="multipart/form-data">
                        <button class="float-right btn btn-primary upload-video">Final Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/batch-support-upload.js"></script>