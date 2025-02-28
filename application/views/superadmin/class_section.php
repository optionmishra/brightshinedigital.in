<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashclasses"></i> Dashclasses</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><?= $page ?></li>
            <li class="breadcrumb-item"><a href="<?= base_url('superadmin/dashclasses') ?>"><i class="fa fa-home fa-lg"></i> Home</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 p-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 p-2">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add-new-classesSection">add new</button>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered classesSectionTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Class Name</th>
					                        <th>Section Name</th>
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
    <div class="modal fade" id="add-new-classesSection" tabindex="-1" role="dialog" aria-labelledby="add-new-classesSection" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Create New Classes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addClassesSection" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_classesSection') ?>"
                      <div class="form-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="name">Classes Name</label>
                                    <select class="form-control" id="class_id" name="class_id" required="true">
                                    <option>Select</option>
                                    <?php foreach ($classes as $class): ?>
                                        <option value="<?= $class->id ?>"><?= $class->name ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
				                <div class="form-group">
                                    <label for="name">Section Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required="true">
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

        <div class="modal fade" id="edit-classesSection" tabindex="-1" role="dialog" aria-labelledby="edit-classesSection" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="allowance-deduction">Update Classes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="update-classesSection" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_classesSection') ?>"
                          <div class="form-body">
                            <div class="row m-0 p-2">
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                        <label for="getname"></label>
                                        <input type="hidden" class="form-control d-none" id="classesSection_id" name="id" required="true">

                                        <label for="name">Classes Name</label>
                                        <select class="form-control" id="getclassid" name="class_id" required="true">
                                        <?php foreach ($classes as $class): ?>
                                            <option value="<?= $class->id ?>"><?= $class->name ?></option>
                                        <?php endforeach; ?>

                                        </select>
                                      
                                        </div>
                                        
                                </div>
                                <div class="col-lg-12 p-2">
                                    <div class="form-group">
                                       
                                        <label for="getname">Section Name</label>
                                        <input type="text" class="form-control" id="getname" name="name" required="true">
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




