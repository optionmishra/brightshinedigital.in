<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashsubject"></i> Dashboard</h1>
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
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#madd-new-summative">add new</button>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered summativeQues">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Series</th>
                                            <th>Class</th>
                                            <th>Question</th>
                                            <th>Mark</th>
                                            <th>Created By</th>
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
    <div class="modal fade" id="madd-new-summative" tabindex="-1" role="dialog" aria-labelledby="madd-new-summative" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Create New Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addsummativeQuestion" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_summativeQuestion') ?>"
                      <div class="form-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="name">Series</label>
                                    <select class="form-control" id="series" name="series" required="true">
                                        <option>Select</option>
                                        <?php foreach ($msubject as $sub): ?>
                                            <option value="<?= $sub->id ?>"><?= $sub->name ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="name">Class</label>
                                    <select class="form-control" id="class" name="class" required="true">
                                    <option>Select</option>
                                    <?php foreach ($classes as $class): ?>
                                            <option value="<?= $class->id ?>"><?= $class->name ?></option>
                                        <?php endforeach; ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="name">Question</label>
                                    <textarea  class="form-control" id="name" name="name" rows="4" required="true"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="name">Marks</label>
                                    <input type="number" class="form-control" id="marks" name="marks" required="true">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer col-lg-12">
                            <button  class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
                            <button  class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="summative-QuestionEdit" tabindex="-1" role="dialog" aria-labelledby="summative-QuestionEdit" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="allowance-deduction">Update Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="summative-QuestionUpdate" class="smooth-submit" method="post" action="<?= base_url('admin_master/mupdate_summativeQuestion') ?>"
                          <div class="form-body">
                            <div class="row m-0 p-2">
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                        <label for="getname"></label>
                                        <input type="hidden" class="form-control d-none" id="summativeQuestion_id" name="id" required="true">
                                    </div>
                                </div>

                                <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="name">Series</label>
                                    <select class="form-control" id="summativegetseries" name="series" required="true">
                                        <option>Select</option>
                                        <?php foreach ($msubject as $sub): ?>
                                            <option value="<?= $sub->id ?>"><?= $sub->name ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="name">Class</label>
                                    <select class="form-control" id="summativegetclass" name="class" required="true">
                                    <option>Select</option>

                                        <?php foreach ($classes as $class): ?>
                                            <option value="<?= $class->id ?>"><?= $class->name ?></option>
                                        <?php endforeach; ?>

                                    </select> 

                                </div>
                            </div>
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="summativegetname">Question</label>
                                    <textarea  class="form-control" id="summativegetname" name="name" rows="4" required="true"></textarea>
                                </div>
                            </div>


                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="summativegetmarks">Marks</label>
                                    <input type="number" class="form-control" id="summativegetmarks" name="marks" required="true">
                                </div>
                            </div>
                                
                            </div>
                            <div class="modal-footer col-lg-12">
                                <button  class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
                                <button  class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </main>




