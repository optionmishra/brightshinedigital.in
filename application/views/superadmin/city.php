<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashstate"></i> Dashboard</h1>
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
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add-new-city">add new</button>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="table-responsive">
                                <table class="table w-100 table-bordered cityTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>State Name</th>
                                            <th>City Name</th>
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
    <div class="modal fade" id="add-new-city" tabindex="-1" role="dialog" aria-labelledby="add-new-state" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowance-deduction">Create New City</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addCity" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_city') ?>"
                      <div class="form-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="state_name">State</label>
                                    <select class="form-control" name="state" id="state_zone" required="true">
                                        <option value="">--Select State--</option>
                                        <?php foreach($state as $value){?>
										<option value="<?php echo $value->StateID;?>"><?php echo $value->StateName;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
							
							<div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="state_name">City Name</label>
                                    <input type="text" class="form-control" id="city_name" name="name" required="true">
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

        <div class="modal fade" id="edit-city" tabindex="-1" role="dialog" aria-labelledby="edit-city" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="allowance-deduction">Update State</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="update-city" class="smooth-submit" method="post" action="<?= base_url('admin_master/update_city') ?>">
                          <div class="form-body">
                            <div class="row m-0 p-2">
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="state_name">State</label>
										<select class="form-control" name="state" id="state_id" required="true">
											<option value="">--Select State--</option>
											<?php foreach($state as $value){?>
											<option value="<?php echo $value->StateID;?>"><?php echo $value->StateName;?></option>
											<?php }?>
										</select>
									</div>
								</div>
							
                                <div class="col-lg-6 p-2">
                                    <div class="form-group">
                                        <label for="gstate_name">City Name</label>
                                        <input type="text" class="form-control d-none" id="city_id" name="id" required="true">
                                        <input type="text" class="form-control" id="gcity_name" name="name" required="true">
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




