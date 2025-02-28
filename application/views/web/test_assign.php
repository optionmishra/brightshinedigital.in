<style>
	.app-title {
		position: relative;
	}

	.ttl-btn {
		position: absolute;
		right: 18px;
		top: 5px;
		padding: 5px 36px;
		background-color: #79b6f7;
	}

	.sp-header-section {
		background-color: #e9ecef;
		padding: 10px;
	}

	.teacher-ttl {
		color: #444444;
		font-weight: 500;
		font-size: 17px;
	}

	.sp-primary {
		width: 100%;
	}

	.table-inner-section .table {
		font-size: 13px;
		font-weight: 400;
	}

	.table-inner-section .table th {
		font-weight: 500 !important;
		font-size: 13px;
	}

	.btn-text {
		width: 65%;
		margin-right: 10px;
		height: 30px;
		font-size: 13px;
		display: inline-block;
	}

	.btn-text-attmp {
		background-color: #ee2750;
		color: #fff;
		text-align: center;

	}

	.btn-text-pend {
		background-color: #a3d03f;
		color: #fff;
		text-align: left;
		padding-left: 7px;
	}

	.sp-box {
		width: 25%;
		height: 30px;
		font-size: 13px;
		display: inline-block;
		background-color: #ebebeb;
		color: #8a8a8a;
		text-align: center;
	}

	.bg-active {
		background-color: #ee2750 !important;
		border-color: #ee2750 !important;
		width: 100%;
		height: 30px;
		font-size: 13px;
		line-height: 17px;
	}

	.btn-text-pend i {
		float: right;
		margin-top: 8px;
		margin-right: 5px;
	}

	.mrk-status-fail {
		width: 45%;
		background-color: #ee2750;
		color: #fff;
		text-align: center;

	}

	.mrk-status-pass {
		width: 45%;
		background-color: #a3d03f;
		color: #fff;
		text-align: center;

	}

	.marks-numb {
		width: 40%;
		height: 30px;
		font-size: 13px;
		display: inline-block;
		background-color: #ebebeb;
		color: #8a8a8a;
		text-align: center;
	}

	.act-sp {
		width: 30px;
		height: 30px;
		display: inline-block;
		text-align: center;
		font-size: 15px;
		color: #fff;
	}

	.btn-chk {
		background-color: #898e94;
	}

	.btn-edit {
		background-color: #059bfa;
	}

	.btn-trash {
		background-color: #f92d4e;
	}

	.inner-container {
		padding: 20px 40px;
	}

	.ttl-sp {
		color: #444444;
		font-weight: 500;
		font-size: 20px;
		margin-bottom: 30px;
	}

	.sp-text-subhdg {
		color: #444444;
		font-weight: 500;
		font-size: 17px;
		margin-bottom: 10px;
		padding-left: 5px;
	}

	.sp-card {
		box-shadow: 0 1px 15px 1px rgba(62, 57, 107, .07);
	}

	.card-header:first-child {
		border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
	}

	.card-header:first-child {
		border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
	}

	.card-header {
		padding: 0.75rem 1.25rem;
		margin-bottom: 0;
		background-color: #f5fbfb;
		border-bottom: 1px solid rgba(0, 0, 0, 0.125);
		color: #000;
		font-size: 16px;
	}

	.dataTables_wrapper {
		width: 100%;
	}

	.card .sp-text-subhdg {
		color: #000;
	}
</style>
<main class="app-content">
	<div class="app-title sp-header-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<h3 class="teacher-ttl">Teacher Panel <br> Code: <strong><span style="color:#ff9900;"><?php echo $this->session->userdata('teacher_code'); ?></span></strong></h3>
				</div>

				<div class="col-lg-8">
					<div class="row justify-content-end">
						<!-- <div class="col-lg-3 m-2">
							<a class="btn btn-primary w-100" href="web/test_assign">Assign Test</a>
						</div> -->
						<div class="col-lg-3 m-2">
							<a href="web/teacher_panel" class="btn btn-primary w-100" />Back</a>
						</div>
					</div>
				</div>
				<!--<div class="col-lg-6"><div class="row"><div class="col-lg-3 pl-1 pr-1"><button class="btn btn-primary w-100">Students</button></div><div class="col-lg-3 pl-1 pr-1"><button class="btn btn-primary w-100">Class</button></div><div class="col-lg-3 pl-1 pr-1"><button class="btn btn-primary w-100">Section</button></div><div class="col-lg-3 pl-1 pr-1"><a href="web/test_assign" class="btn btn-primary w-100">Test</a></div></div></div>-->
			</div>
		</div>
	</div>

	<div class="inner-container p-0 ">
		<div class="container-fluid">

			<div class="card mb-3 sp-card mt-3">
				<div class="card-header">
					Paper Assign
				</div>

				<?php if ($this->session->flashdata('success')) { ?>
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
					</div>
					<?php $this->session->unset_userdata('success'); ?>
				<?php } else if ($this->session->flashdata('error')) {  ?>

					<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
					</div>
					<?php $this->session->unset_userdata('error'); ?>
				<?php } ?>

				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<form method="post" action="<?= base_url('admin_master/add_assigntest') ?>">

								<div class="row">
									<div class="col-lg-2">
										<h6 class="sp-text-subhdg">Select Class</h6>
										<select class="form-control w-100" name="class_name" id="class_name" placeholder="Select Class" required>
											<option value="">Select</option>
											<?php foreach ($classes as $class) : ?>
												<option value="<?= $class->classes ?>"><?= $class->classes ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-lg-2">
										<h6 class="sp-text-subhdg">Select Section</h6>
										<select class="form-control w-100" name="section_name" id="section_name" placeholder="Select Section" required>
											<option value="">Select</option>
											<?php /* foreach ($classes as $class) : ?>
												<option value="<?= $class->classes ?>"><?= $class->classes ?></option>
											<?php  endforeach; */ ?>
										</select>
									</div>
									<div class="col-lg-2">
										<h6 class="sp-text-subhdg">Select Paper</h6>
										<select class="form-control w-100" name="paper_type" id="paper_type" placeholder="Select Paper" required>
											<option value="">Select</option>
										</select>
									</div>
									<div class="col-lg-6">
										<h6 class="sp-text-subhdg">Date Between</h6>
										<div class="row">
											<div class="col-lg-6">
												<input type="date" class="form-control" placeholder="Start" min="<?= date("Y-m-d"); ?>" name="start_date" id="StartDate" required />
											</div>
											<div class="col-lg-6">
												<input type="date" class="form-control" placeholder="End" min="<?= date("Y-m-d"); ?>" name="end_date" id="EndDate" required />
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-lg-5"></div>
									<div class="col-lg-1">
										<div class="row">

										</div>
									</div>
									<div class="col-lg-4">
										<!-- <div class="row">
											<div class="col-lg-6">
												<a href="query/teacher-question" class="btn btn-success w-100" />Add Questions</a>
											</div>
											<div class="col-lg-6">
												<a href="web/preview_question" class="btn btn-info w-100" />Preview Questions</a>
											</div>
										</div> -->
									</div>
									<div class="col-lg-2">
										<div class="row">
											<div class="col-lg-12">
												<input type="submit" name="submit" class="btn btn-danger w-100" value="Assign" />
											</div>
							</form>

						</div>

					</div>
					<!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
				</div>

			</div>


		</div>
	</div>
	</div>

	<div class="row py-3">
		<div class="col-lg-12">
			<div class="card mb-3 sp-card mt-3">
				<div class="card-header">
					Paper Assigned Set
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<table id="assign" class="table table-striped table-bordered paperassignstudent" style="width:100%">
								<thead>
									<tr>
										<th>Class</th>
										<th>Paper Mode</th>
										<th>Start Date</th>
										<th>End Date(12AM)</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($assigntest as $value) { ?>
										<tr>
											<td>Class <?= $value->class_name, $class_section_array[$value->section_name] ?></td>
											<td>
												<?php switch ($value->paper_mode):
													case '11': ?>
														Objective Test 1
														<?php break; ?>
													<?php
													case '12': ?>
														Objective Test 2
														<?php break; ?>
													<?php
													case '13': ?>
														Objective Test 3
														<?php break; ?>
													<?php
													case '14': ?>
														Objective Test 4
														<?php break; ?>
													<?php
													case '21': ?>
														Subjective Test 1
														<?php break; ?>
													<?php
													case '22': ?>
														Subjective Test 2
														<?php break; ?>
												<?php endswitch; ?>
											</td>
											<td><?= $value->date_start ?></td>
											<td><?= $value->date_end ?></td>
											<td>
												<?php if ($value->status == '1') { ?>
													<a href="<?= base_url('admin_master/add_assigntest_inactive?assigntest=' . $value->id . '') ?>"><input data-toggleId="<?= $value->id ?>" type="checkbox" data-toggle="switchbutton" checked data-onlabel="Active" data-offlabel="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm"></a>&nbsp;&nbsp;
												<?php } else { ?>
													<a href="<?= base_url('admin_master/add_assigntest_active?assigntest=' . $value->id . '') ?>"><input data-toggleId="<?= $value->id ?>" type="checkbox" data-toggle="switchbutton" data-onlabel="Active" data-offlabel="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm"></a>&nbsp;&nbsp;
												<?php } ?>
												<a deletepaperassign_id="<?php echo $value->id; ?>" class="btn btn-sm btn-outline-danger paperassigndelete" style="font-size:13px;">Delete</a>
												<!-- <a class="btn btn-sm btn-primary" href="">Preview Paper</a> -->
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

					</div>
					<!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
				</div>
			</div>


		</div>
	</div>
	<div class="row justify-content-center m-2">
		<a href="web/result" class="btn btn-primary m-2 px-5">Result</a>
	</div>
	</div>
	</div>
	<script>
		/*   $(document).ready(function() {
                  $('#assign').DataTable();
              } );
              */
	</script>

	</div>
	</div>
	</div>
</main>
<script>
	$(document).ready(function() {
		$('.paperassignstudent input[type=checkbox]').change(function() {
			if ($(this).is(':checked')) {
				let id = $(this).attr("data-toggleID");
				fetch("<?= base_url('admin_master/add_assigntest_active?assigntest=') ?>" + id);
				// alert(`${this.value} is checked`);
			} else {
				let id = $(this).attr("data-toggleID");
				fetch("<?= base_url('admin_master/add_assigntest_inactive?assigntest=') ?>" + id);
				// alert(`${this.value} is unchecked`);
			}
		});
		// get sections of selected class
		$('#class_name').on('change', e => {
			// fetch sections based on selected class
			const class_id = $('#class_name').val();
			$('#section_name').html('<option value="">Select</option>');
			$('#paper_type').html('<option value="">Select</option>');
			if (class_id) {
				// Section
				fetch('<?= base_url() . 'admin_master/get_section_name/' ?>' + class_id)
					.then(response => response.json())
					.then(data => {
						// put them in selection
						data.forEach(item => {
							$('#section_name').append(`<option value="${item.id}">${item.name}</option>`)
						});
					});
				// Paper Set
				fetch('<?= base_url() . 'admin_master/get_paper_set/' ?>' + class_id + '/<?= $this->session->userdata('main_subject') ?>')
					.then(response => response.json())
					.then(data => {
						// put them in selection
						data.forEach(item => {
							$('#paper_type').append(`<option value="${item.type}">${item.name} (${item.description})</option>`)
						});
					});
			}
		})
	});
</script>