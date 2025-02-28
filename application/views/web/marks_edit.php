<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Marks Submission</title>
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
			margin: 30px auto;
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

		.mrk_get {
			position: absolute;
			top: 0;
			right: 50px;
			font-size: 17px;
			font-weight: 700;
			font-family: 'PT Serif', serif;
			width: 50px;
			height: 29px;
		}
	</style>
</head>

<body>
	<!--<h4 style="color:#FF0000;" align="center" ><span id="iTimeShow">Time Remaining: </span><br/><span id='time' style="font-size:25px;"></span></h4>-->
	<div class="container-fluid">
		<div id="container">
			<!-- <img class="sp-img" src="../assets/img/1611576186orange_logo_final.png"> -->
			<h3 class="sp-heading">Marks Submission</h3>
			<h4 class="sp-sub-heading">Objective Paper</h4>
			<p class="sp-ttl">Max Marks - 100</p>
			<div class="paper-section">
				<form method="post" action="<?= base_url('admin_master/paper_submision') ?>">
					<div class="quest-section">
						<p class="question">Q1:&nbsp;What is ROM and type ?</p>
						<span class="mrk">2</span>
						<input type="text" class="form-control mrk_get" name="" />
						<ul class="obj-list">
							<li>Read only Memory</li>
						</ul>
					</div>
					<div class="quest-section">
						<p class="question">Q2:&nbsp;Which of the following devices is a volatile storage?</p>
						<span class="mrk">2</span>
						<input type="text" class="form-control mrk_get" name="" />
						<ul class="obj-list">
							<li>Read only Memory</li>
						</ul>
					</div>

					<input type="submit" name="submit" value="Submit" class="btn btn-success">
				</form>
			</div>
		</div>
	</div>

</body>

</html>
