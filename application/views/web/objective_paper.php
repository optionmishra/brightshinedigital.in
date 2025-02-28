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

		.mrk {
			position: absolute;
			top: 0;
			right: 0;
			font-size: 17px;
			font-weight: 700;
			font-family: 'PT Serif', serif;
		}
	</style>
</head>

<body>
	<?php if ($objective) { ?>
		<!--<h4 style="color:#FF0000;" align="center" ><span id="iTimeShow">Time Remaining: </span><br/><span id='time' style="font-size:25px;"></span></h4>-->
		<div class="container-fluid">
			<div id="container">
				<img class="sp-img" src="../assets/img/1611576186orange_logo_final.png">
				<h1 class="sp-heading"><?= $this->session->userdata('school_name') ?></h1>
				<h3 class="sp-heading">Question Paper For Class <?= $objective[0]->class ?></h3>
				<!-- <h4 class="sp-sub-heading">Objective Paper</h4> -->
				<h4 class="sp-sub-heading"><?= $paper_set->name ?></h4>
				<h6 class="sp-sub-heading">(<?= $paper_set->description ?>)</h6>
				<?php foreach ($objective as $val) {
					$max_marks += $val->marks;
				} ?>
				<p class="sp-ttl">Max Marks: <?= $max_marks ?></p>
				<div class="paper-ection" id="parentId">

					<form method="post" action="<?= base_url('admin_master/paper_submision') ?>" onSubmit="return msgshow()" id="ppr_frm">
						<input type="hidden" name="created_date" value="<?= $created_date ?>">
						<?php

						$a = 1;
						$i = 0;
						foreach ($objective as $val) { ?>
							<input type="hidden" name="paper_type" value="<?= $paper_mode ?>">
							<input type="hidden" name="assignid" value="<?php echo $assignid; ?>">
							<input type="hidden" name="marks[]" value="<?php echo $val->marks; ?>">
							<input type="hidden" name="question[]" value="<?php echo $val->id; ?>">
							<div class="quest-section">
								<p class="question" id="qt_id">Q<?php echo $a; ?>:&nbsp;<?php echo $val->name; ?></p>
								<span class="mrk"><?php echo $val->marks; ?></span>
								<ul class="obj-list">
									<li><input type="radio" name="answer<?php echo $i; ?>" value="A" /><?php echo $val->option_a; ?></li>
									<li><input type="radio" name="answer<?php echo $i; ?>" value="B" /><?php echo $val->option_b; ?></li>
									<li><input type="radio" name="answer<?php echo $i; ?>" value="C" /><?php echo $val->option_c; ?></li>
									<li><input type="radio" name="answer<?php echo $i; ?>" value="D" /><?php echo $val->option_d; ?></li>
								</ul>
							</div>
						<?php
							$a++;
							$i++;
						} ?>
						<input type="submit" name="submit" value="Submit" class="btn btn-success">
					</form>

				</div>
			</div>
		</div>
		<script>
			var parent = document.getElementById("parentId");
			var nodesSameClass = parent.getElementsByClassName("question");


			function msgshow() {
				var inputs = document.getElementById("ppr_frm").elements;
				var count = 0;
				for (var i = 0; i < inputs.length; i++) {
					if (inputs[i].type == 'radio' && inputs[i].checked) {
						count++;
					}
				}
				//console.log(nodesSameClass.length);

				if (count < nodesSameClass.length) {
					alert('Attempt All Questions');
					return false;
				} else {
					alert('Answers Submitted Successfully');
				}
				return true;
			}
		</script>
	<?php } else { ?>
		<?php redirect(base_url('web/student_panel')) ?>
	<?php } ?>
</body>

</html>