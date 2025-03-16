<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Series</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><?= $page ?></li>
            <li class="breadcrumb-item"><a href="<?= base_url('superadmin/series') ?>"><i class="fa fa-home fa-lg"></i> Home</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="p-4 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="p-2 col-lg-12">
                            <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target="#add-new-series">Add</button>
                        </div>
                        <div class="p-2 col-lg-12">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered seriesTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Series Name</th>
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
    <div class="modal fade" id="add-new-series" tabindex="-1" role="dialog" aria-labelledby="add-new-series" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Create New Series</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addSeries" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_series') ?>">
                    <div class="form-body">
                        <div class="p-2 m-0 row">
                            <div class="p-2 col-lg-6">
                                <div class="form-group">
                                    <label for="name">Series Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required="true">
                                </div>
                            </div>

                            <div class="p-2 col-lg-12">
                                <label for="">Select Subjects</label>
                                <div class="p-2 row">
                                    <?php foreach ($subjects as $subject) : ?>
                                        <div class="py-1 col-lg-3 form-check">
                                            <input type="checkbox" name="subjects[]" id="<?= $subject->id ?>" value="<?= $subject->id ?>">
                                            <label for="<?= $subject->id ?>" class="form-check-label"><?= $subject->name ?></label>
                                        </div>
                                    <?php endforeach; ?>
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

    <div class="modal fade" id="edit-series" tabindex="-1" role="dialog" aria-labelledby="edit-series" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Update Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="update-series" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_series') ?>">
                    <div class="form-body">
                        <div class="p-2 m-0 row">
                            <div class="p-2 col-lg-6">
                                <div class="form-group">
                                    <label for="getname">Series Name</label>
                                    <input type="hidden" class="form-control" id="series_id" name="id" required="true">
                                    <input type="text" class="form-control" id="getname" name="name" required="true">
                                </div>
                            </div>

                            <div class="p-2 col-lg-12">
                                <label for="">Select Subjects</label>
                                <div class="p-2 row" id="updateSubjects">
                                    <?php foreach ($subjects as $subject) : ?>
                                        <div class="py-1 col-lg-3 form-check">
                                            <input type="checkbox" name="subjects[]" id="update<?= $subject->id ?>" value="<?= $subject->id ?>">
                                            <label for="update<?= $subject->id ?>" class="form-check-label"><?= $subject->name ?></label>
                                        </div>
                                    <?php endforeach; ?>
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