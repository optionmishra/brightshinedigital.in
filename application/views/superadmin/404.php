<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Student Panel</title>
	<base href="<?= base_url() ?>">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.png">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<link rel="apple-touch-icon" href="images/icon.png">
	<!-- Google font (font-family: 'Dosis', Roboto;) -->
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- Cusom css -->
	<link rel="stylesheet" href="css/custom.css">
	<!-- Font-icon css-->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" href="<?= base_url('assets/css/sweetalert2.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/toastr.min.css') ?>">
	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="header" class="jnr__header header--one clearfix">
			<!-- Start Mainmenu Area -->
			<div class="mainmenu__wrapper bg__cat--1 poss-relative header_top_line sticky__header">
				<div class="container">
					<div class="row d-none d-lg-flex">
						<div class="col-sm-4 col-md-6 col-lg-3 order-1 order-lg-1">
							<div class="logo">
								<?php foreach ($logo as $lo) : ?>
									<a href="<?= base_url(); ?>">
										<img src="assets/img/<?= $lo->file_name ?>" alt="<?= $lo->value ?>">
									</a>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="col-sm-4 col-md-2 col-lg-9 order-3 order-lg-2">
							<div class="mainmenu__wrap">
								<nav class="mainmenu__nav">
									<?php
									if ($this->session->userdata('username')) {
										foreach ($user as $us) :
									?>
											<ul class="mainmenu">
												<li class="active"><a href="dashboard">Dashboard</a></li>
												<li class=""><a href="logout">Logout</a></li>
												<li class=""><a href="profile">Profile</a></li>
												<li><a href="profile" class="spe-us">
														<img src="assets/img/<?= $us->dp ?>" alt="logo images">
														Hi, <b class="ss-pp"><?= $us->fullname ?></b></a>
												</li>
											</ul>
									<?php endforeach;
									} ?>
								</nav>
							</div>
						</div>
						<!--                            <div class="col-lg-1 col-sm-4 col-md-4 order-2 order-lg-3">
                                                            <div class="shopbox d-flex justify-content-end align-items-center">
                                                                <a class="minicart-trigger" href="#">
                                                                    <i class="fa fa-shopping-basket"></i>
                                                                </a>
                                                                <span>03</span>
                                                            </div>
                                                        </div>-->
					</div>
					<!-- Mobile Menu -->
					<div class="mobile-menu d-block d-lg-none">
						<div class="logo">
							<a href="<?= base_url() ?>"><img src="images/logo/junior.png" alt="logo"></a>
						</div>
						<a class="minicart-trigger" href="#">
							<i class="fa fa-shopping-basket"></i>
						</a>
					</div>
					<!-- Mobile Menu -->
				</div>
			</div>
			<!-- End Mainmenu Area -->
		</header>
		<!-- //Header -->
		<main class="app-content">
			<div class="page-error tile">
				<h1><i class="fa fa-exclamation-circle"></i> Error 404: Page not found</h1>
				<p>The page you have requested is not found.</p>
				<p><a class="btn btn-primary" href="javascript:window.history.back();">Go Back</a></p>
			</div>
		</main>
		<!-- Footer Area -->
		<footer id="footer" class="footer-area footer--2">

			<!-- .Start Footer Contact Area -->
			<div class="footer__contact__area bg__cat--2">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__contact__wrapper d-flex flex-wrap justify-content-between">
								<div class="single__footer__address">
									<div class="ft__contact__icon">
										<i class="fa fa-home"></i>
									</div>
									<div class="ft__contact__details">
										<?php foreach ($address as $add) : ?>
											<p><?= $add->value ?></p>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="single__footer__address">
									<div class="ft__contact__icon">
										<i class="fa fa-phone"></i>
									</div>
									<div class="ft__contact__details">
										<?php foreach ($mobile1 as $mo) : ?>
											<p><a href="#"><?= $mo->value ?></a></p>
										<?php endforeach; ?>
										<?php foreach ($mobile2 as $mob) : ?>
											<p><a href="#"><?= $mob->value ?></a></p>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="single__footer__address">
									<div class="ft__contact__icon">
										<i class="fa fa-envelope"></i>
									</div>
									<div class="ft__contact__details">
										<?php foreach ($email1 as $em) : ?>
											<p><a href="mailto:<?= $em->value ?>"><?= $em->value ?></a></p>
										<?php endforeach; ?>
										<?php foreach ($email2 as $email) : ?>
											<p><a href="mailto:<?= $email->value ?>"><?= $email->value ?></a></p>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .End Footer Contact Area -->
			<div class="copyright  bg--theme">
				<div class="container">
					<div class="row align-items-center copyright__wrapper justify-content-center">
						<div class="col-lg-12 col-sm-12 col-md-12">
							<div class="coppy__right__inner text-center">
								<p><i class="fa fa-copyright"></i>All Right Reserved.<?php foreach ($copyright as $copy) : ?><a href="#"> <?= $copy->value; ?></a><?php endforeach; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->

		<!-- Register Student Form -->
		<div class="modal fade" id="add-new-student" tabindex="-1" role="dialog" aria-labelledby="add-new-student" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<form id="addStudent" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_student') ?>">
						<div class="modal-header">
							<h5 class="modal-title" id="allowance-deduction">New Student Register</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="form-body">
							<div class="row m-0 p-2">
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="student_name">Full Name</label>
										<input type="text" class="form-control" id="student_name" name="name" required="true">
									</div>
								</div>
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="student_mobile">Mobile</label>
										<input type="text" class="form-control" id="student_mobile" name="mobile" required="true">
									</div>
								</div>
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="student_email">Email</label>
										<input type="email" class="form-control" id="student_email" name="email" required="true">
										<div id="getemail_desc"></div>
									</div>
								</div>
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="student_pin">Pin Code</label>
										<input type="text" class="form-control" id="student_pin" name="pin">
									</div>
								</div>
								<div class="col-lg-12 p-2">
									<div class="form-group">
										<label for="student_address">Address</label>
										<textarea class="form-control" id="student_address" name="address"></textarea>
									</div>
								</div>
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="student_state">State</label>
										<select class="form-control" name="state" id="student_state">
											<option value="">--Select State--</option>
											<?php foreach ($count as $cou) : ?>
												<option value="<?= $cou->StateID ?>"><?= $cou->StateName ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="student_city">City</label>
										<input type="text" class="form-control" id="student_city" name="city">
									</div>
								</div>
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="student_class">Class</label>
										<select class="form-control" name="class" id="student_class">
											<option value="">--Select Class--</option>
											<?php foreach ($classes as $class) : ?>
												<option value="<?= $class->id ?>"><?= $class->name ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="student_subject">Subject</label>
										<select class="form-control" name="subject" id="student_subject">
											<option value="">--Select Subject--</option>
											<?php foreach ($subject as $sub) : ?>
												<option value="<?= $sub->id ?>"><?= $sub->name ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
							<button class="btn btn-primary float-right">Register</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- //Register Student Form End -->
		<!-- Register Teacher Form -->
		<div class="modal fade" id="add-new-teacher" tabindex="-1" role="dialog" aria-labelledby="add-new-teacher" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<form id="addTeacher" class="smooth-submit" method="post" action="<?= base_url('admin_master/add_teacher') ?>">
						<div class="modal-header">
							<h5 class="modal-title" id="allowance-deduction">New Teacher Register</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="form-body">
							<div class="row m-0 p-2">
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="teacher_name">Full Name</label>
										<input type="text" class="form-control" id="teacher_name" name="name" required="true">
									</div>
								</div>
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="teacher_mobile">Mobile</label>
										<input type="text" class="form-control" id="teacher_mobile" name="mobile" required="true">
									</div>
								</div>
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="teacher_email">Email</label>
										<input type="email" class="form-control" id="teacher_email" name="email" required="true">
										<div id="getemail_descc"></div>
									</div>
								</div>
								<div class="col-lg-6 p-2">
									<div class="form-group">
										<label for="teacher_pin">Pin Code</label>
										<input type="text" class="form-control" id="teacher_pin" name="pin">
									</div>
								</div>
								<div class="col-lg-12 p-2">
									<div class="form-group">
										<label for="student_address">Address</label>
										<textarea class="form-control" id="teacher_address" name="address"></textarea>
									</div>
								</div>
								<div class="col-lg-4 p-2">
									<div class="form-group">
										<label for="teacher_state">State</label>
										<select class="form-control" name="state" id="teacher_state">
											<option value="">--Select State--</option>
											<?php foreach ($count as $cou) : ?>
												<option value="<?= $cou->StateID ?>"><?= $cou->StateName ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-lg-4 p-2">
									<div class="form-group">
										<label for="student_city">City</label>
										<input type="text" class="form-control" id="teacher_city" name="city">
									</div>
								</div>
								<div class="col-lg-4 p-2">
									<div class="form-group">
										<label for="teacher_subject">Subject</label>
										<select class="form-control" name="subject" id="teacher_subject">
											<option value="">--Select Subject--</option>
											<?php foreach ($subject as $sub) : ?>
												<option value="<?= $sub->id ?>"><?= $sub->name ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-lg-2 p-2">
									<span>Classes:</span>
								</div>
								<div class="col-lg-10 p-2">
									<div class="row">
										<div class="col-lg-2">
											<div class="form-check">
												<input type="checkbox" class="form-control-custom" id="teacher_class" name="checkall" value="check All">
												<label class="form-check-label" for="student_class_0">
													Check All
												</label>
											</div>
										</div>
										<?php foreach ($classes as $class) : ?>
											<div class="col-lg-2">
												<div class="form-check">
													<input type="checkbox" class="form-control-custom" id="student_class_<?= $class->id ?>" name="class[]" value="<?= $class->id ?>">
													<label class="form-check-label" for="student_class_<?= $class->id ?>">
														<?= $class->name ?>
													</label>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>

							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger float-right" data-dismiss="modal">Cancel</button>
							<button class="btn btn-primary float-right">Register</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- //Register Teacher Form End -->
		<!-- //Main wrapper -->
		<div class="modal" id="pleasewait" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<img class="fit-image" src="<?= base_url('assets/img/loading.gif') ?>">
					</div>
				</div>
			</div>
		</div>
		<!-- JS Files -->
		<script src="js/vendor/jquery-3.2.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/active.js"></script>
		<script src="assets/js/main.js"></script>
		<!-- The javascript plugin to display page loading on top-->
		<script src="assets/js/plugins/pace.min.js"></script>
		<script src="http://malsup.github.com/jquery.form.js"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/plugins/jquery.dataTables.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/sweetalert2.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/toastr.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/smooth-submit.js') ?>"></script>
		<script src="<?= base_url('assets/js/custom.js') ?>"></script>
</body>

</html>
