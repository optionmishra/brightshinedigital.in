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
		font-family: "Roboto", sans-serif !important;
	}

	.table-inner-section .table th {
		font-weight: 600 !important;
		font-size: 13px;
		text-transform: capitalize;
	}

	.btn-text {
		width: 60%;
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
		width: 32%;
		height: 30px;
		font-size: 12px;
		display: inline-block;
		background-color: #ebebeb;
		color: #8a8a8a;
		text-align: center;
		line-height: 30px;
	}

	.bg-active {
		background-color: #ee2750 !important;
		border-color: #ee2750 !important;
		width: 100%;
		height: 30px;
		font-size: 13px;
		line-height: 17px;
		color: #fff !important;
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

	#myModalLabel {
		text-align: left;
		width: 100%;
		Color: #fff;
		font-weight: 600 !important;
	}
</style>
<main class="app-content">
	<div class="app-title sp-header-section">
		<div class="container-fluid">
			<?php if ($this->session->flashdata('success')) { ?>
				<div class="alert alert-success alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success!</strong><?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php $this->session->unset_userdata('success'); ?>
			<?php } ?>
			<?php if ($this->session->flashdata('error')) { ?>
				<div class="alert alert-danger alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Danger!</strong><?php echo $this->session->flashdata('error'); ?>
				</div>
				<?php $this->session->unset_userdata('error'); ?>
			<?php } ?>
			<div class="row">
				<div class="col-lg-4">
					<h3 class="teacher-ttl">Teacher Panel <br> Code: <strong><span style="color:#ff9900;"><?php echo $this->session->userdata('teacher_code'); ?></span></strong></h3>
				</div>
				<div class="col-lg-8">
					<ul class="nav nav-tabs" role="tablist" style="border-bottom:none;">
						<li class="nav-item w-100">
							<div class="row justify-content-around">
								<!-- <div class="col-lg-3 m-2"><a class="btn btn-primary w-100" href="#student" role="tab" data-toggle="tab" id="mystudentrecord">My Student's List</a></div> -->
								<!-- <div class="col-lg-3">
									<select class="form-control w-100" name="teacher_panel_class" id="teacher_panel_class">
										<option>Select</option>
										<?php /* foreach ($classes as $class) : ?>
											<option value="<?= $class->classes ?>">
												<?= $class->classes ?>
											</option>
										<?php endforeach; */ ?>
									</select>
								</div>
								<div class="col-lg-3">
									<select class="form-control w-100" name="class_section_name" id="class_section_name">
										<option>Select Section</option>
									</select>
								</div> -->
								<div class="col-lg-3 m-2"><a href="web/test_assign" class="btn btn-primary w-100">Assign Test</a></div>
								<div class="col-lg-3 m-2">
									<a href="web/dashboard" class="btn btn-primary w-100" />Back</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="inner-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<!-- Tab panes -->
					<div id="hide_student_tbl" class="tab-content py-3">
						<div role="tabpanel" class="tab-pane fade in active" id="profile">...</div>
						<div role="tabpanel" class="tab-pane fade show active" id="student">
							<div class="card mb-3 sp-card">
								<div class="card-header"> Student Record </div>
								<div class="card-body">
									<div class="row">
										<div class="col-lg-12">
											<!-- student table-->
											<table id="assign" class="table table-striped table-bordered assignstudent" style="width:100%">
												<thead>
													<tr>
														<th style="width:50px!important;">Sr No.</th>
														<th>Name</th>
														<th>Class</th>
														<th>Section</th>
														<th style="width:70px!important;">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php $a = 1;
													foreach ($student as $value) { ?>
														<tr>
															<td style="width:50px;">
																<?php echo $a; ?>
															</td>
															<td>
																<?php echo $value->fullname; ?>
															</td>
															<td>Class
																<?php echo $value->classes; ?>
															</td>
															<td>
																<?php echo $value->class_section; ?>
															</td>
															<td style="width:70px;">
																<!--<a web_user_id='<?php echo $value->id; ?>' class='pr-2 pointer webuserEdit' href="web/student_profile"><i class='fa fa-edit'></i></a>-->
																<a webuserEdit_id='<?php echo $value->id; ?>' class='pr-2 pointer webuserEdit' data-toggle="modal" data-target="#myModal" href="#"><i class='fa fa-edit'></i></a>

																<a web_user_id='<?php echo $value->id; ?>' class='pointer webuserDelete'><i class='fa fa-trash text-danger'></i></a>

															</td>
														</tr>
													<?php $a++;
													} ?>
												</tbody>
											</table>
										</div>
									</div>
									<!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
								</div>

							</div>
						</div>
						<!-- search  table-->
					</div>
					<!-- <div class="table-inner-section py-3" id="stexamrecord">
						<div id="techr_tbl_sect" class="card mb-3 sp-card" style="display:none;">
							<div class="card-header"> Student Exam Records </div>
							<div class="card-body">
								<div class="col-lg-12">
									<table id="techr_tbl" class="table table-striped table-bordered teachsubmitmarks" style="width:100%">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Name</th>
												<th>Class</th>
												<th>Subjective Date</th>
												<th>Status</th>
												<th>Subjective Test 1</th>
												<th>Objective Test 1</th>
												<th>Objective Date</th>
												<th>Print</th>
												<th style="width:80px;">Action</th>
											</tr>
										</thead>
										<tbody id="studentexamsub"> </tbody>
									</table>
								</div>
								<!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
				</div>
			</div>
		</div> -->
	</div>
	</div>
	</div>
</main>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
				<h4 class="modal-title" id="myModalLabel">Student Detail</h4>
			</div>
			<div class="modal-body">

				<div id="personDetails"></div>

				<div class="row">
					<form id="teacher-update-student" class="smooth-submit" method="post" action="<?= base_url('admin_master/teacher_update_student_prof') ?>" novalidate>
						<div class="col-lg-12">
							<div class="row mb-3">
								<div class="col-md-4">
									<label>Full Name</label>
									<input type="hidden" name="stu_id" id="stu_id" value="">
									<input class="form-control" type="text" id="stud_name" name="stud_name" value="">
								</div>
								<div class="clearfix"></div>

								<div class="col-md-4">
									<label>Mobile No</label>
									<input class="form-control" type="text" id="stud_mobile" name="stud_mobile" value="">
								</div>
								<div class="clearfix"></div>
								<div class="col-md-4">
									<label>Email Id</label>
									<input class="form-control" type="text" id="stud_email" name="stud_email" value="">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-4">
									<label>Address</label>
									<input class="form-control" type="text" id="stud_school_address" name="stud_school_address" value="">
								</div>
								<!-- <div class="clearfix"></div> -->
								<!-- <div class="col-md-4">
									<label>Email Id (School)</label>
									<input class="form-control" type="text" id="stud_school_email" name="stud_school_email" value="">
								</div> -->
								<!-- <div class="clearfix"></div> -->
								<!-- <div class="col-md-4">
									<label>Principal's Name</label>
									<input class="form-control" type="text" id="pri_name" name="pri_name" value="">
								</div> -->
							</div>
							<!-- <div class="row mb-3">
								<div class="col-md-4">
									<label>State</label>
									<input class="form-control" type="text" id="ref_name" name="ref_name" value="">
								</div>
								<div class="clearfix"></div>
								<div class="col-md-4">
									<label>City</label>
									<input class="form-control" type="text" id="ref_contact" name="ref_contact" value="">
								</div>
							</div> -->
							<div class="row">
								<div class="col-md-3">
									<button class="btn btn-danger">Profile Update</button>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						</from>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 2000);
</script>