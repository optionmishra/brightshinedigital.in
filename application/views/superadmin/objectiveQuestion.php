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
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#madd-new-objective">add new</button>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered objectiveQues">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Series</th>
                                            <th>Class</th>
                                            <th>Question</th>
                                            <th>Option A</th>
                                            <th>Option B</th>
                                            <th>Option C</th>
                                            <th>Option D</th>
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
    <div class="modal fade" id="madd-new-objective" tabindex="-1" role="dialog" aria-labelledby="madd-new-objective" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Create New Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addobjectiveQuestion" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_objectiveQuestion') ?>"
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
                            
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Option A</label>
                                    <input  class="form-control" id="option_a" name="option_a" required="true">
                                </div>
                            </div>
                            

                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Option B</label>
                                    <input  class="form-control" id="option_b" name="option_b" required="true">
                                </div>
                            </div>

                            
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Option C</label>
                                    <input  class="form-control" id="option_c" name="option_c" required="true">
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Option D</label>
                                    <input  class="form-control" id="option_d" name="option_d" required="true">
                                </div>
                            </div>

                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="marks">Answer</label>
                                    <select  class="form-control" id="answer" name="answer" required="true">
                                        <option>--Select--</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="B">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Marks</label>
                                    <input  class="form-control" id="marks" name="marks" required="true">
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

        <div class="modal fade" id="objective-QuestionEdit" tabindex="-1" role="dialog" aria-labelledby="objective-QuestionEdit" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="allowance-deduction">Update Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="objective-QuestionUpdate" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_objectiveQuestion') ?>"
                          <div class="form-body">
                            <div class="row m-0 p-2">
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                        <label for="getname"></label>
                                        <input type="hidden" class="form-control d-none" id="objectiveQuestion_id" name="id" required="true">
                                    </div>
                                </div>

                                <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="name">Series</label>
                                    <select class="form-control" id="objectivegetseries" name="series" required="true">
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
                                    <select class="form-control" id="objectivegetclass" name="class" required="true">
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
                                    <textarea  class="form-control" id="objectivegetname" name="name" rows="4" required="true"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Option A</label>
                                    <input  class="form-control" id="objectivegetoption_a" name="option_a" required="true">
                                </div>
                            </div>
                            

                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Option B</label>
                                    <input  class="form-control" id="objectivegetoption_b" name="option_b" required="true">
                                </div>
                            </div>

                            
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Option C</label>
                                    <input  class="form-control" id="objectivegetoption_c" name="option_c" required="true">
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Option D</label>
                                    <input  class="form-control" id="objectivegetoption_d" name="option_d" required="true">
                                </div>
                            </div>

                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="marks">Answer</label>
                                    <select  class="form-control" id="objectivegetanswer" name="answer" required="true">
                                        <option>--Select--</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="B">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Marks</label>
                                    <input type="number" class="form-control" id="objectivegetmarks" name="marks" required="true">
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




