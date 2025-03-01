<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Brightshine Digital</title>
	<base href="<?= base_url() ?>">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicons -->

	<link rel="icon" type="image/png" href="assets/img/favicon.png">

	<!-- Google font (font-family: 'Dosis', Roboto;) -->
	<link rel="stylesheet" type="text/css" href="css1/font-awesome.min.css" />

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- Cusom css -->
	<link rel="stylesheet" href="css/custom.css">
	<!-- Font-icon css-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" href="<?= base_url('assets/css/sweetalert2.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/toastr.min.css') ?>">
	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
	<style>
		#example_wrapper {
			width: 100%;
		}

		#srch_tbl tbody tr:nth-of-type(odd) {
			background-color: transparent !important;
		}

		#srch_tbl tbody tr:nth-of-type(even) {
			background-color: transparent !important;
		}

		#srch_tbl tbody td {
			border: none !important;
		}

		.dataTables_wrapper {
			width: 95%;
		}

		.dataTables_length .custom-select {
			width: 60px !important;
		}

		.icon-bar {
			display: none !important;
		}

		body {
			font-weight: 300 !important;
		}

		.nw-footer-list {
			padding: 0 0px;
		}

		.nw-footer-list li {
			position: relative;
			padding: 3px 0;
			clear: both;
			display: block;
			font-weight: 300;
		}

		.nw-footer-list li::after {
			content: "";
			width: 203px;
			height: 1px;
			background-color: #868484;
			position: absolute;
			bottom: 0;
			margin: auto;
			left: 0;
			right: 0;
		}

		.nw-footer-list li:last-child:after {
			content: ".";
			display: none;
		}

		.li-list-nw {
			display: block;
			clear: both;
			margin-bottom: 15px;
			line-height: 16px;
			font-weight: 300;
		}

		.footer-align {
			float: right;

		}

		.footer-align li {
			float: left;
		}

		.ftr-icon {
			background-color: #fff;
			font-size: 14px;
			text-align: center;
			border-radius: 4px;
			color: #333 !important;
			margin: 0 3px;
			width: 20px;
			height: 20px;
			display: block;
			line-height: 20px;
		}

		.site-footer {
			padding: 10px 0 0 !important;
			background-color: #333 !important;
		}

		.footer_inner {
			padding: 10px 30px 0 !important;
		}

		.nw-ft-img {
			width: 30%;
			float: right;
			margin-bottom: 30px;
		}

		.nw-img {
			width: 52%;
			margin: auto;
			display: block;
		}

		.nw-img-1 {
			width: 100%;
			margin: 0;
			display: block;
			margin-top: 10px;
		}

		.logo a img {
			width: 60% !important;
		}

		@media (min-width: 500px) and (max-width: 1000px) {
			.logo a img {
				width: 30% !important;
			}
		}
	</style>
</head>

<body>


	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="header" class="clearfix jnr__header header--one">
			<!-- Start Mainmenu Area -->
			<div class="mainmenu__wrapper bg__cat--1 poss-relative header_top_line sticky__header">
				<div class="container-fluid">
					<div class="row d-none d-lg-flex">
						<div class="order-1 col-sm-4 col-md-3 col-lg-2 order-lg-1 logo">
							<div class="logo">
								<?php //print_r($logo);
								?>
								<a href="<?= base_url('dashboard'); ?>">
									<img style="background-color: white; border: 8px solid white; border-radius:5px" src="assets/img/<?php echo $logo['file_name']; ?>" alt="">
								</a>
							</div>
						</div>

						<div class="order-3 col-sm-4 col-md-2 col-lg-10 order-lg-2">
							<div class="mainmenu__wrap">
								<nav class="mainmenu__nav">
									<ul class="mainmenu">
										<?php if ($user->school_name != '') { ?>
											<li class=""><a href="#" style="color: #89d700;font-weight: 800;padding-right: 30px;padding-top: 5px;font-size: 16px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 443px;"> <span style="text-transform: uppercase;color:#89d700;"> <span style="text-transform: uppercase;color:#89d700;"> &nbsp;<?= $user->school_name ?></span></a></li>
										<?php } ?>
										<li class="active"><a href="dashboard">Home</a></li>
										<!--<li class=""><a href="helps">Help</a></li>-->
										<li class=""><a href="logout">Logout</a></li>
										<li class=""><a href="profile">Profile</a></li>
										<?php if ($user->teacher_code != '') { ?>
											<li class=""><a href="#" style="color:#89d700;font-weight:600;">Teacher Code : <span style="text-transform: uppercase;color:#ff9900;"> &nbsp;<?= $user->teacher_code ?></span></a></li>
										<?php } ?>
										<li><a href="profile" class="spe-us">

												<?php if (empty($user->dp)) { ?>
													<img src="assets/img/3.png" alt="logo images">
												<?php } else { ?>
													<img src="assets/img/<?= $user->dp ?>" alt="logo images">
												<?php } ?>
												&nbsp;
												Hi,&nbsp; <b class="ss-pp"><?= $user->fullname ?></b></a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
						<!--                            <div class="order-2 col-lg-1 col-sm-4 col-md-4 order-lg-3">
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
							<a href="<?= base_url(); ?>">
								<img src="assets/img/<?php echo $logo['file_name'] ?>" alt="Brightshine Digital">
							</a>
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