<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>/p>
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
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add-new-salesman">add new</button>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered salesmanTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sales Name</th>
                                            <th>Mobile</th>
                                            <th>E-mail</th>
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
    <div class="modal fade" id="add-new-salesman" tabindex="-1" role="dialog" aria-labelledby="add-new-salesman" aria-hidden="true">
        <div class="modal-dialog modal-xlg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Create New Salesman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addSalesman" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_salesman') ?>">
                      <div class="form-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-9 p-2">
                                <div class="row">
                                    <div class="col-lg-6 p-2">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>

                                            <input type="text" class="form-control" id="name" name="name" required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-2">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" required="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 p-2">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" required="true">
                                        </div>
                                    </div>
									<div class="col-lg-6 p-2">
                                        <div class="form-group">
											<label for="email">Address</label>
                                            <textarea class="form-control" rows =4 id="address" name="address"></textarea>
                                        </div>
                                    </div>

                                 </div>
							  </div>
                           </div>

                        <div class="modal-footer">
                            <button  class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
                            <button  class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>
                </form>
            </div>    
        </div>
</main>



