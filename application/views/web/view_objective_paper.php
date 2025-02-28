<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Objective Test</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">
	<!-- font awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>css1/fontawesome/css/all.min.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<link rel="stylesheet" href="style.css">
	<style>
		body {
			font-size: 20px;
			font-family: 'Montserrat', sans-serif;
			color: #222;
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		#container {
			padding: 80px 70px;
			position: relative;
			box-sizing: border-box;
		}

		.sp-heading {
			font-size: 23px;
			font-weight: 700;
			text-align: center;
			margin-bottom: 12px;
			font-family: 'PT Serif', serif;
		}

		.sp-sub-heading {
			font-size: 18px;
			font-weight: 700;
			text-align: center;
			margin: 12px auto;
			font-family: 'PT Serif', serif;
		}

		.sp-img {
			width: 8%;
			float: right;
			position: absolute;
			right: 35px;
			top: 10px;
		}

		.sp-ttl {
			font-size: 16px;
			font-weight: 700;
			text-align: right;
			margin: 40px auto;
			font-family: 'PT Serif', serif;
		}

		.question {
			font-size: 19px;
			font-weight: 600;
			text-align: left;
			margin: 12px auto;
			font-family: 'Montserrat', sans-serif;
		}

		.paper-ection {
			padding: 40px auto;
		}

		.obj-list {
			list-style-type: decimal;
		}

		.obj-list li {
			font-family: 'Montserrat', sans-serif;
			font-weight: 500;
			font-size: 17px;
			line-height: 30px;
		}

		.obj-list li input {
			margin: auto 8px;
		}

		.quest-section {
			margin: 20px auto;
			width: 100%;
			display: block;
			position: relative;
		}

		.mrk_get {
			position: absolute;
			top: 0;
			right: 50px;
			font-size: 17px;
			font-weight: 700;
			font-family: 'PT Serif', serif;
			width: 60px;
			height: 29px;
		}

		.mrk_get_opt1 {
			position: absolute;
			top: 0;
			right: 30%;
			font-size: 14px;
			font-weight: 700;
			font-family: 'PT Serif', serif;
			width: 18px;
			height: 28px;
		}

		.mrk_get_opt2 {
			position: absolute;
			top: 0;
			right: 34%;
			font-size: 14px;
			font-weight: 700;
			font-family: 'PT Serif', serif;
			width: 18px;
			height: 28px;
		}

		.mrk {
			position: absolute;
			top: 0;
			right: 0;
			font-size: 17px;
			font-weight: 700;
			font-family: 'PT Serif', serif;
		}

		@media print {
			.btn-print {
				visibility: hidden;
			}
		}

		.info-subttl {
			font-size: 16px;
			font-weight: 700;
			font-family: 'PT Serif', serif;
		}
	</style>
</head>

<body>

	<div class="container-fluid">
		<div id="container">

			<img class="sp-img" src="<?php echo base_url(); ?>assets/img/1611576186orange_logo_final.png">
			<h1 class="sp-heading"><?= $this->session->userdata('school_name') ?></h1>
			<h3 class="sp-heading">Question Paper For Class <?= $objective[0]->student_class ?></h3>
			<h4 class="sp-sub-heading"><?= $paper_set->name ?></h4>
			<h6 class="sp-sub-heading">(<?= $paper_set->description ?>)</h6>
			<!-- <h4 class="sp-sub-heading">Objective Paper</h4> -->
			<?php foreach ($objective as $val) {
				$max_marks += $val->qus_marks;
			} ?>
			<p class="info-subttl">Name: <?= $student->fullname ?></p>
			<div class="mb-4 d-flex justify-content-between">
				<p class="info-subttl">Email: <?= $student->email ?></p>
				<p class="info-subttl">Max Marks: <?= $max_marks ?></p>
			</div>

			<div class="paper-ection">
				<form method="post" action="<?= base_url('admin_master/teacher_check_paper_summ') ?>" id="ppr_frm">
					<?php
					$a = 1;
					$i = 0;
					foreach ($objective as $val) { ?>
						<input type="hidden" name="paper_id[]" value="<?php echo $val->id; ?>">
						<div class="quest-section">
							<p class="question">Q<?php echo $a; ?>:&nbsp;<?php echo $val->name; ?></p>

							<span class="mrk"><?php echo $val->qus_marks; ?></span>

							<div class="row">
								<ul class="obj-list">
									<li><input type="radio" name="answer<?php echo $i; ?>" value="A" <?= $val->answer == 'A' ? 'checked' : 'disabled'; ?>><?= $val->option_a; ?><?= $val->correct_answer == 'A' ? ' <i style="color: green;" class="fas fa-check"></i>' : ($val->answer == 'A' ? ' <i style="color: red;" class="fas fa-times"></i>' : ''); ?></li>
									<li><input type="radio" name="answer<?php echo $i; ?>" value="B" <?= $val->answer == 'B' ? 'checked' : 'disabled'; ?>><?= $val->option_b; ?><?= $val->correct_answer == 'B' ? ' <i style="color: green;" class="fas fa-check"></i>' : ($val->answer == 'B' ? ' <i style="color: red;" class="fas fa-times"></i>' : ''); ?></li>
									<li><input type="radio" name="answer<?php echo $i; ?>" value="C" <?= $val->answer == 'C' ? 'checked' : 'disabled'; ?>><?= $val->option_c; ?><?= $val->correct_answer == 'C' ? ' <i style="color: green;" class="fas fa-check"></i>' : ($val->answer == 'C' ? ' <i style="color: red;" class="fas fa-times"></i>' : ''); ?> </li>
									<li><input type="radio" name="answer<?php echo $i; ?>" value="D" <?= $val->answer == 'D' ? 'checked' : 'disabled'; ?>><?= $val->option_d; ?><?= $val->correct_answer == 'D' ? ' <i style="color: green;" class="fas fa-check"></i>' : ($val->answer == 'D' ? ' <i style="color: red;" class="fas fa-times"></i>' : ''); ?> </li>
								</ul>
							</div>

							<div class="row">
								<?php /*
						<?php if($val->ques_type == 'Right'){
							$rchecked = 'checked';
						}elseif($val->ques_type == 'Wrong'){
							$wchecked = 'checked';
						}else{
							$rchecked = '';
							$wchecked = '';
						}
						 ?>
						<div class="col-md-3 col-sm-6 col-6">
							<label class="radio-inline"><input type="radio" name="type<?php echo $i;?>" value="Right" <?php echo $rchecked; ?>> Right</label>&nbsp; &nbsp; &nbsp;
							<label class="radio-inline"><input type="radio" name="type<?php echo $i;?>" value="Wrong" <?php echo $wchecked; ?>> Wrong</label> 	
						</div>
						*/ ?>
								<div class="col-md-3 col-sm-6 col-6">
									Obtained Marks: <input disabled type="number" class="form-control mrk_get p-2" require value="<?= $val->ans_marks ?>" readonly name="teacher_marks[]" min="0" max="<?= $val->qus_marks ?>" />
								</div>
								<div class="col-md-5"></div>
							</div>

						</div>

					<?php
						$a++;
						$i++;
						$total_marks_obtained += $val->ans_marks;
						$total_marks += $val->qus_marks;
					} ?>
					<h3 style="color:green;">Total Marks Obtained: <?= $total_marks_obtained . '/' . $total_marks ?></h3>
					<span class="btn btn-primary btn-print" onclick="window.print()">Print</span>
					<a href="<?= base_url('web/dashboard') ?>" class="btn btn-primary btn-print">Return to Dashboard</a>
					<?php /* if ($val->ques_type) { ?>
						<!-- <h3 style="color:green;">Papper Allready Checked</h3> -->
					<?php } else { ?>
						<input type="submit" name="submit" value="Submit" class="btn btn-success">
					<?php } */ ?>
				</form>
			</div>
		</div>

</body>

</html>