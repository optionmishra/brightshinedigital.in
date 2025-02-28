<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashsubject"></i> Main Subject</h1>
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
							<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#madd-new-subject">add new</button>
						</div>
						<div class="col-lg-12 p-2">
							<div class="table-responsive">
								<table class="table w-100 table-bordered msubjectTables">
									<thead>
										<tr>
											<th>#</th>
											<th>Board</th>
											<th>Subject Name</th>
											<th>Serial No</th>
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
	<div class="modal fade" id="madd-new-subject" tabindex="-1" role="dialog" aria-labelledby="madd-new-subject" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="allowance-deduction">Create New Subject</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="maddSubject" class="smooth-submit" method="post" action="<?= base_url('admin_master/madd_subject') ?>" <div class="form-body">
					<div class="row m-0 p-2">
						<div class="col-lg-6 p-2">
							<div class="form-group">
								<label for="name">Select Board</label>
								<select class="form-control" id="board" name="board" required="true">
									<option>Select</option>
									<?php foreach ($boards as $board) : ?>
										<option><?= $board->name ?></option>
									<?php endforeach; ?>
									<!-- <option value="All">All</option> -->
								</select>
							</div>
						</div>
						<div class="col-lg-6 p-2">
							<div class="form-group">
								<label for="name">Select Serial</label>
								<select class="form-control" id="serial" name="serial" required="true">
									<option>Select</option>
									<?php for ($i = 1; $i <= 20; $i++) { ?>

										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>

									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-12 p-2">
							<div class="form-group">
								<label for="name">Subject Name</label>
								<input type="text" class="form-control" id="name" name="name" required="true">
							</div>
						</div>
					</div>
					<div class="col-lg-12 p-2">
						<label for="">Select Classes</label>
						<div class="row p-2">
							<?php foreach ($classes as $class) : ?>
								<div class="col-lg-3 form-check py-1">
									<input type="checkbox" name="classes[]" id="<?= $class->id ?>" value="<?= $class->id ?>">
									<label for="<?= $class->id ?>" class="form-check-label"><?= $class->name ?></label>
								</div>
							<?php endforeach; ?>
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

	<div class="modal fade" id="medit-subject" tabindex="-1" role="dialog" aria-labelledby="medit-subject" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="allowance-deduction">Update Subject</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="mupdate-subject" class="smooth-submit" method="post" action="<?= base_url('admin_master/mupdate_subject') ?>" <div class="form-body">
					<div class="row m-0 p-2">
						<div class="col-lg-6 p-2">
							<div class="form-group">
								<label for="name">Select Board</label>
								<select class="form-control" id="upboard" name="board" required="true">
									<option>Select</option>
									<?php foreach ($boards as $board) : ?>
										<option><?= $board->name ?></option>
									<?php endforeach; ?>
									<!-- <option value="All">All</option> -->
								</select>
							</div>
						</div>
						<div class="col-lg-6 p-2">
							<div class="form-group">
								<label for="name">Select Serial</label>
								<select class="form-control" id="upserial" name="serial" required="true">
									<option>Select</option>
									<?php for ($i = 1; $i <= 20; $i++) { ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-12 p-2">
							<div class="form-group">
								<label for="getname">Subject Name</label>
								<input type="text" class="form-control d-none" id="msubject_id" name="id" required="true">
								<input type="text" class="form-control" id="mgetname" name="name" required="true">
							</div>
						</div>
						<div class="col-lg-12 p-2">
							<label for="">Select Classes</label>
							<div class="row p-2" id="classesCheck">
								<?php foreach ($classes as $class) : ?>
									<div class="col-lg-3 form-check py-1">
										<input type="checkbox" name="classes[]" id="edit<?= $class->id ?>" value="<?= $class->id ?>">
										<label for="edit<?= $class->id ?>" class="form-check-label"><?= $class->name ?></label>
									</div>
								<?php endforeach; ?>
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