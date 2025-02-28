<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Subjective Test</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">
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

		textarea.form-control {
			background-color: #f9f9f9;
		}


		.quest-section {
			margin: 20px auto;
			width: 100%;
			display: block;
			position: relative;
		}

		.mrk_get {
			/* position: absolute; */
			/* top: 0; */
			/* right: 50px; */
			font-size: 17px;
			font-weight: 700;
			font-family: 'PT Serif', serif;
			width: 60px;
			height: 29px;
		}

		.mrk_get_opt1 {
			top: 0;
			right: 30%;
			font-size: 14px;
			font-weight: 700;
			font-family: 'PT Serif', serif;
			width: 18px;
			height: 28px;
		}

		.mrk_get_opt2 {
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
	<!--<h4 style="color:#FF0000;" align="center" ><span id="iTimeShow">Time Remaining: </span><br/><span id='time' style="font-size:25px;"></span></h4>-->
	<div class="container-fluid">
		<div id="container">
			<img class="sp-img" src="<?php echo base_url(); ?>assets/img/1611576186orange_logo_final.png">

			<h1 class="sp-heading"><?= $this->session->userdata('school_name') ?></h1>
			<h3 class="sp-heading">Question Paper For Class <?= $summative[0]->student_class ?></h3>
			<!-- <h4 class="sp-sub-heading">Subjective Paper</h4> -->
			<h4 class="sp-sub-heading"><?= $paper_set->name ?></h4>
			<h6 class="sp-sub-heading">(<?= $paper_set->description ?>)</h6>
			<?php foreach ($summative as $val) {
				$max_marks += $val->qus_marks;
			} ?>
			<p class="info-subttl">Name: <?= $student->fullname ?></p>
			<div class="mb-4 d-flex justify-content-between">
				<p class="info-subttl">Email: <?= $student->email ?></p>
				<p class="info-subttl">Max Marks: <?= $max_marks ?></p>
			</div>

			<div class="paper-ection">

				<form method="post" action="<?= base_url('admin_master/teacher_check_paper_summ') ?>" id="teacher-submit-marks">

					<input type="hidden" name="paper_mode" value="<?= $summative[0]->paper_mode; ?>">
					<input type="hidden" name="student_id" value="<?= $summative[0]->student_id; ?>">
					<?php
					$a = 1;
					$i = 0;

					foreach ($summative as $val) { ?>
						<input type="hidden" name="paper_id[]" value="<?php echo $val->id; ?>">
						<div class="quest-section">
							<p class="question">Q<?php echo $a; ?>:&nbsp;<?php echo $val->name; ?></p>
							<span class="mrk"><?php echo $val->qus_marks; ?></span>
							<p class="question">Answer :-</p>
							<textarea name="answer<?php echo $i; ?>" class="form-control w-80" rows="3" disabled><?php echo $val->answer; ?></textarea>
						</div>
						<div class="row">
							<?php /*if ($val->ques_type == 'Right') {
								$rchecked = 'checked';
								$number = $val->ans_marks;
							} elseif ($val->ques_type == 'Wrong') {
								$wchecked = 'checked';
								$number = $val->ans_marks;
							} else {
								$rchecked = '';
								$wchecked = '';
								$number = '';
							}
							*/ ?>
							<!-- <div class="col-md-3 col-sm-6 col-6">
								<label class="radio-inline">
									<input <? # $val->ques_type ? 'disabled' : ''; 
											?> type="radio" name="type<?php echo $i; ?>" value="Right" <?php echo $rchecked; ?>> Right
								</label>&nbsp; &nbsp; &nbsp;
								<label class="radio-inline">
									<input <? # $val->ques_type ? 'disabled' : ''; 
											?> type="radio" name="type<?php echo $i; ?>" value="Wrong" <?php echo $wchecked; ?>> Wrong
								</label>
							</div> -->
							<div class="col-md-4 col-sm-6 col-6 d-flex">
								Marks: <input type="number" class="form-control mrk_get ml-2" value="<?= $val->ans_marks ?>" name="teacher_marks[]" min="0" max="<?php echo $val->qus_marks; ?>" <?= $val->teacher_remarks == 'checked' ? 'disabled' : ''; ?> />
							</div>
							<!-- <div class="col-md-5"></div> -->
						</div>
					<?php
						$a++;
						$i++;
						$total_marks_obtained += $val->ans_marks;
						$total_marks += $val->qus_marks;
					} ?>

					<?php if ($val->teacher_remarks == 'checked') { ?>
						<div class="mt-4">
							<!-- <h3 style="color:green;">Paper Already Checked</h3> -->
							<h3 style="color:green;">Total Marks Obtained: <?= $total_marks_obtained . '/' . $total_marks ?></h3>
							<span class="btn btn-primary btn-print" onclick="window.print();">Print</span>
						</div>
					<?php } else { ?>
						<div>
							<button type="submit" class="btn btn-success mt-3" id="btnSubmit">Submit</button>
						</div>
					<?php } ?>

				</form>
			</div>
		</div>
	</div>
</body>

</html>