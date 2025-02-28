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
</style>
<main class="app-content">
	<div class="app-title sp-header-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
					<h3 class="teacher-ttl">Student Panel</h3>
				</div>
				<div class="col-lg-5">

				</div>
				<div class="col-lg-4">
					<h3 class="teacher-ttl">Teacher Code - <?= $user[0]->stu_teacher_id ?></h3>
				</div>
			</div>
		</div>
	</div>


	<div class="inner-section">


		<section class="h-100 py-5">
			<div class="container h-100 py-5">
				<div class="d-flex align-items-center justify-content-center h-100 py-3">
					<div class="d-flex flex-column">
						<div class="row py-5">
							<?php if ($objective_test1 || $objective_test2 || $objective_test3 || $objective_test4 || $subjective_test1 || $subjective_test2) : ?>
								<form action="<?= base_url() . 'web/objective_paper' ?>" method="post">
									<input type="hidden" name="paper_mode" id="" value="11">
									<?= $objective_test1 ? '<button type="submit" class="btn btn-danger btn-lg m-2" >Objective Test 1</button><div id="ob1_dt" class="text-danger text-center" style="font-weight:400;"></div>' : ''; ?>
								</form>
								<form action="<?= base_url() . 'web/objective_paper' ?>" method="post">
									<input type="hidden" name="paper_mode" id="" value="12">
									<?= $objective_test2 ? '<button type="submit" class="btn btn-danger btn-lg m-2" >Objective Test 2</button><div id="ob2_dt" class="text-danger text-center" style="font-weight:400;"></div>' : ''; ?>
								</form>
								<form action="<?= base_url() . 'web/objective_paper' ?>" method="post">
									<input type="hidden" name="paper_mode" id="" value="13">
									<?= $objective_test3 ? '<button type="submit" class="btn btn-danger btn-lg m-2" >Objective Test 3</button><div id="ob3_dt" class="text-danger text-center" style="font-weight:400;"></div>' : ''; ?>
								</form>
								<form action="<?= base_url() . 'web/objective_paper' ?>" method="post">
									<input type="hidden" name="paper_mode" id="" value="14">
									<?= $objective_test4 ? '<button type="submit" class="btn btn-danger btn-lg m-2" >Objective Test 4</button><div id="ob4_dt" class="text-danger text-center" style="font-weight:400;"></div>' : ''; ?>
								</form>

								<form action="<?= base_url() . 'web/subjective_paper' ?>" method="post">
									<input type="hidden" name="paper_mode" id="" value="21">
									<?= $subjective_test1 ? '<button type="submit" class="btn btn-danger btn-lg m-2" >Subjective Test 1</button><div id="sub1_dt" class="text-danger text-center" style="font-weight:400;"></div>' : ''; ?>
								</form>
								<form action="<?= base_url() . 'web/subjective_paper' ?>" method="post">
									<input type="hidden" name="paper_mode" id="" value="22">
									<?= $subjective_test2 ? '<button type="submit" class="btn btn-danger btn-lg m-2" >Subjective Test 2</button><div id="sub2_dt" class="text-danger text-center" style="font-weight:400;"></div>' : ''; ?>
								</form>
							<?php else : ?>
								<?= ('<h3>' . $msg . '</h3>'); ?>
							<?php endif; ?>
							<!-- <button><? #$objective_test1, $subjective_test1 
											?></button> -->
						</div>
					</div>
				</div>
			</div>
		</section>


	</div>
	</div>
	</div>
	</div>

</main>
<script>
	$(document).ready(function() {
		// Update the count down every 1 second 
		const updateTimeRemaining = (elementID, endDate) => {
			const x = setInterval(function() {

				// Set the date we're counting down to
				const countDownDate = new Date(endDate + " 00:00:00").getTime();

				// Get today's date and time
				const now = new Date().getTime();

				// Find the distance between now and the count down date
				const distance = countDownDate - now;

				// Time calculations for days, hours, minutes and seconds
				const days = Math.floor(distance / (1000 * 60 * 60 * 24));
				const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				const seconds = Math.floor((distance % (1000 * 60)) / 1000);

				// Display the result in the element with id
				$(elementID).text(days + "d " + hours + "h " + minutes + "m " + seconds + "s ");
				// document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
				// minutes + "m " + seconds + "s ";

			}, 1000);
		}

		if ($('#ob1_dt').length) {
			const ob1_dt = '<?= $ob1_date ?>';
			updateTimeRemaining('#ob1_dt', ob1_dt);
		}
		if ($('#ob2_dt').length) {
			const ob2_dt = '<?= $ob2_date ?>';
			x('#ob2_dt', ob2_dt);
		}
		if ($('#ob3_dt').length) {
			const ob3_dt = '<?= $ob3_date ?>';
			updateTimeRemaining('#ob3_dt', ob3_dt);
		}
		if ($('#ob4_dt').length) {
			const ob4_dt = '<?= $ob4_date ?>';
			updateTimeRemaining('#ob4_dt', ob4_dt);
		}
		if ($('#sub1_dt').length) {
			const sub1_dt = '<?= $sub1_date ?>';
			updateTimeRemaining('#sub1_dt', sub1_dt);
		}
		if ($('#sub2_dt').length) {
			const sub2_dt = '<?= $sub2_date ?>';
			updateTimeRemaining('#sub2_dt', sub2_dt);
		}
	});
</script>