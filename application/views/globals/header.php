<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Panel</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="assets/img/favicon.ico" />
	<link rel="icon" type="image/png" ref="assets/img/favicon.png">
	<!-- Main CSS-->
	<base href="<?= base_url() ?>">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<!-- Font-icon css-->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" href="<?= base_url('assets/css/sweetalert2.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/toastr.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<!-- toastr -->
	<script type="text/javascript" src="<?= base_url('assets/js/toastr.min.js') ?>"></script>

	<!-- Essential javascripts for application to work-->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- The javascript plugin to display page loading on top-->
	<script src="assets/js/plugins/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/jquery.form.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/jquery.dataTables.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/sweetalert2.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/smooth-submit.js') ?>"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

</head>

<body class="app sidebar-mini rtl">
	<!-- Navbar-->
	<header class="app-header"><a class="app-header__logo" href="<?= base_url('superadmin/dashboard') ?>">Admin Panel</a>
		<!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
		<!-- Navbar Right Menu-->
		<ul class="app-nav">
			<li class="app-search">
				<input class="app-search__input" type="search" placeholder="Search">
				<button class="app-search__button"><i class="fa fa-search"></i></button>
			</li>
			<!--Notification Menu-->
			<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
				<ul class="app-notification dropdown-menu dropdown-menu-right">
					<li class="app-notification__title">You have 4 new notifications.</li>
					<div class="app-notification__content">
						<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
								<div>
									<p class="app-notification__message">Lisa sent you a mail</p>
									<p class="app-notification__meta">2 min ago</p>
								</div>
							</a></li>
						<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
								<div>
									<p class="app-notification__message">Mail server not working</p>
									<p class="app-notification__meta">5 min ago</p>
								</div>
							</a></li>
						<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
								<div>
									<p class="app-notification__message">Transaction complete</p>
									<p class="app-notification__meta">2 days ago</p>
								</div>
							</a></li>
						<div class="app-notification__content">
							<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
									<div>
										<p class="app-notification__message">Lisa sent you a mail</p>
										<p class="app-notification__meta">2 min ago</p>
									</div>
								</a></li>
							<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
									<div>
										<p class="app-notification__message">Mail server not working</p>
										<p class="app-notification__meta">5 min ago</p>
									</div>
								</a></li>
							<li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
									<div>
										<p class="app-notification__message">Transaction complete</p>
										<p class="app-notification__meta">2 days ago</p>
									</div>
								</a></li>
						</div>
					</div>
					<li class="app-notification__footer"><a href="#">See all notifications.</a></li>
				</ul>
			</li>
			<!-- User Menu-->
			<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
				<ul class="dropdown-menu settings-menu dropdown-menu-right">
					<li><a class="dropdown-item" href="<?= base_url('superadmin/profile') ?>"><i class="fa fa-user fa-lg"></i> Profile</a></li>
					<li><a class="dropdown-item" href="<?= base_url('superadmin/logout') ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
	</header>