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
	font-size: 25px;
}

.sp-primary {
	width: 100%;
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
<main class="app-content ">
	<div class="app-title sp-header-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<h3 class="teacher-ttl">Teachers Panel - Code <span style="color:#ff9900;"><?php echo $this->session->userdata('teacher_code'); ?></span></h3> </div>
				<div class="col-lg-6"> </div>
			</div>
		</div>
	</div>
	<div class="inner-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card mb-3 sp-card mt-3">
						<div class="card-header"> Student Detail </div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="row mb-3">
										<div class="col-md-4">
											<label>Full Name</label>
											<input class="form-control" type="text" id="stud_name" name="stud_name" value=""> </div>
										<div class="clearfix"></div>
										<div class="col-md-4">
											<label>Mobile No</label>
											<input class="form-control" type="text" id="stud_mobile" name="stud_mobile" value=""> </div>
										<div class="clearfix"></div>
										<div class="col-md-4">
											<label>Email Id</label>
											<input class="form-control" type="text" id="stud_email" name="stud_email" value=""> </div>
									</div>
									<div class="row mb-3">
										<div class="col-md-4">
											<label>Address (School)</label>
											<input class="form-control" type="text" id="stud_school_address" name="stud_school_address" value=""> </div>
										<div class="clearfix"></div>
										<div class="col-md-4">
											<label>Email Id (School)</label>
											<input class="form-control" type="text" id="stud_school_email" name="stud_school_email" value=""> </div>
										<div class="clearfix"></div>
										<div class="col-md-4">
											<label>Principal's Name</label>
											<input class="form-control" type="text" id="wpro_dob" name="emails" value=""> </div>
									</div>
									<div class="row mb-3">
										<div class="col-md-4">
											<label>Person/Referrel Name</label>
											<input class="form-control" type="text" id="wpro_address" name="addresss" value=""> </div>
										<div class="clearfix"></div>
										<div class="col-md-4">
											<label>Person/Referrel Contact</label>
											<input class="form-control" type="text" id="wpro_dob" name="emails" value=""> </div>
									</div>
									<div class="row">
										<div class="col-md-2">
											<input type="submit" class="btn btn-danger" id="" name="submit" value="Profile Update"> </div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>