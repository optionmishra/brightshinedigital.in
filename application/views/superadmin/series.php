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
        <div class="col-lg-12 p-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 p-2">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add-new-series">Add</button>
                        </div>
                        <div class="col-lg-12 p-2">
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
                        <div class="row m-0 p-2">
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
                            <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="name">Series Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required="true">
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
                        <div class="row m-0 p-2">
                            <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="gsubject">Select Subject *</label>
                                    <select class="form-control" name="sid" id="gseries" required="true">
                                        <option value="">Select Subject</option>
                                        <?php foreach ($msubject as $cou) : ?>
                                            <option value="<?= $cou->id ?>"><?= $cou->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="getname">Series Name</label>
                                    <input type="hidden" class="form-control" id="series_id" name="id" required="true">
                                    <input type="text" class="form-control" id="getname" name="name" required="true">
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