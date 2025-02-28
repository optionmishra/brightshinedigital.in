<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashsubject"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><?= $page ?></li>
            <li class="breadcrumb-item"><a href="<?= base_url('superadmin/dashsubject') ?>"><i class="fa fa-home fa-lg"></i> Home</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 p-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 p-2">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add-new-subject">add new</button>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered subjectTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>Subject Name</th>
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
    <div class="modal fade" id="add-new-subject" tabindex="-1" role="dialog" aria-labelledby="add-new-subject" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Create New Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addSubject" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_subject') ?>" <div class="form-body">
                    <div class="row m-0 p-2">
                        <div class="col-lg-6 p-2">
                            <div class="form-group">
                                <label for="name">Book Name</label>
                                <input type="text" class="form-control" id="name" name="name" required="true">
                            </div>
                        </div>
                        <div class="col-lg-6 p-2">
                            <div class="form-group">
                                <label for="subject">Select Subject *</label>
                                <select class="form-control" name="sid" id="subject" required="true">
                                    <option value="">Select Subject</option>
                                    <?php foreach ($msubject as $cou) : ?>
                                        <option value="<?= $cou->id ?>"><?= $cou->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 p-2">
                        <div class="col-lg-6 p-2">
                            <div class="form-group">
                                <label for="addBookClass">Select Series *</label>
                                <select class="form-control" name="series_id" id="seriesId" required="true">
                                    <option value="" disabled selected>Select Series</option>
                                    <?php foreach ($series_s as $series) : ?>
                                        <option value="<?= $series->id ?>"><?= $series->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 p-2">
                            <div class="form-group">
                                <label for="addBookClass">Select Class *</label>
                                <select class="form-control" name="class" id="addBookClass" required="true">
                                    <option value="">Select Class</option>
                                    <?php foreach ($classes as $class) : ?>
                                        <option value="<?= $class->id ?>"><?= $class->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 p-2">
                        <div class="col-lg-12 p-2">
                            <label for="">Select Categories</label>
                            <div class="row">
                                <?php foreach ($cat as $ca) : ?>
                                    <div class="col-md-6 form-check py-1">
                                        <input type="checkbox" name="categories[]" id="cat<?= $ca->id ?>" value="<?= $ca->id ?>">
                                        <label for="cat<?= $ca->id ?>" class="form-check-label"><?= $ca->name ?></label>
                                    </div>
                                <?php endforeach; ?>
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

    <div class="modal fade" id="edit-subject" tabindex="-1" role="dialog" aria-labelledby="edit-subject" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Update Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="update-subject" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_subject') ?>" <div class="form-body">
                    <div class="row m-0 p-2">
                        <div class="col-lg-6 p-2">
                            <div class="form-group">
                                <label for="getname">Book Name</label>
                                <input type="text" class="form-control d-none" id="subject_id" name="id" required="true">
                                <input type="text" class="form-control" id="getname" name="name" required="true">
                            </div>
                        </div>
                        <div class="col-lg-6 p-2">
                            <div class="form-group">
                                <label for="gsubject">Select Subject *</label>
                                <select class="form-control" name="sid" id="gsubject" required="true">
                                    <option value="">Select Subject</option>
                                    <?php foreach ($msubject as $cou) : ?>
                                        <option value="<?= $cou->id ?>"><?= $cou->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 p-2">
                        <div class="col-lg-6 p-2">
                            <div class="form-group">
                                <label for="addBookClass">Select Series *</label>
                                <select class="form-control" name="series_id" id="updateSeriesId" required="true">
                                    <option value="" disabled selected>Select Series</option>
                                    <?php foreach ($series_s as $series) : ?>
                                        <option value="<?= $series->id ?>"><?= $series->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 p-2">
                            <div class="form-group">
                                <label for="editBookClass">Select Class *</label>
                                <select class="form-control" name="class" id="editBookClass" required="true">
                                    <option value="">Select Class</option>
                                    <?php foreach ($classes as $class) : ?>
                                        <option value="<?= $class->id ?>"><?= $class->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 p-2">
                        <div class="col-lg-12 p-2">
                            <label for="">Select Categories</label>
                            <div class="row" id="categoriesCheck">
                                <?php foreach ($cat as $ca) : ?>
                                    <div class="col-md-6 form-check py-1">
                                        <input type="checkbox" name="categories[]" id="edit<?= $ca->id ?>" value="<?= $ca->id ?>">
                                        <label for="edit<?= $ca->id ?>" class="form-check-label"><?= $ca->name ?></label>
                                    </div>
                                <?php endforeach; ?>
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
</main>