
<style>
.app-title{
	position:relative;
}
.ttl-btn{
	position: absolute;
right: 18px;
top: 5px;
padding: 5px 36px;
background-color: #79b6f7;
}

.sp-header-section{
	background-color: #e9ecef;
	padding:10px;
}

.teacher-ttl{
	color: #444444;
	font-weight:500;
	font-size:25px;
}

.sp-primary{
	width:100%;
}

.table-inner-section .table{
	font-size:13px;
	font-weight:400;
}

.table-inner-section .table th{
	font-weight:500!important;
	font-size:13px;
}

.btn-text{
	width:65%;
	margin-right:10px;
	height:30px;
	font-size:13px;
	display: inline-block;
}

.btn-text-attmp{
background-color:#ee2750;
color:#fff;
text-align: center;
	
}

.btn-text-pend{
background-color:#a3d03f;
color:#fff;
text-align: left;
padding-left:7px;	
}

.sp-box{
	width:25%;
	height:30px;
	font-size:13px;
	display: inline-block;
	background-color:#ebebeb;
	color:#8a8a8a;
	text-align:center;
}

.bg-active{
	background-color:#ee2750!important;
	border-color:#ee2750!important;
	width:100%;
	height:30px;
	font-size:13px;
	line-height: 17px;
}

.btn-text-pend i{
	float: right;
margin-top: 8px;
margin-right: 5px;
}

.mrk-status-fail{
	width:45%;
	background-color:#ee2750;
color:#fff;
text-align: center;
	
}

.mrk-status-pass{
	width:45%;
	background-color:#a3d03f;
color:#fff;
text-align: center;
	
}

.marks-numb{
		width:40%;
	height:30px;
	font-size:13px;
	display: inline-block;
	background-color:#ebebeb;
	color:#8a8a8a;
	text-align:center;
}  

.act-sp{
	width:30px;
	height:30px;
	display:inline-block;
	text-align:center;
	font-size:15px;
	color:#fff;
}

.btn-chk{
	background-color:#898e94;
}

.btn-edit{
	background-color:#059bfa;
}

.btn-trash{
	background-color:#f92d4e;
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

				<div class="col-lg-3">
					<h3 class="teacher-ttl">Teacher Code - 002568</h3>
				</div>

              <div class="col-lg-1">
	<a href="<?= base_url('web/test_assign') ?>" class="btn btn-info w-100"/>Back</a>
				</div>

			</div>
			
		</div>
		<!--<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-2">
					<a href="<?= base_url('web/test_assign') ?>" class="btn btn-info w-100"/>Back</a>
				</div>
			</div>
		</div>-->
    </div>
	
	
	<div class="inner-section">

	
	<section class="h-100 py-5">
  <div class="container h-100 py-5">
    <div class="d-flex align-items-center justify-content-center h-100 py-3">
      <div class="d-flex flex-column">
      <div class="row py-5">
	  <div class="col-lg-6"><a href="<?= base_url('web/pre_objective_paper') ?>" class="btn btn-danger btn-lg mt-1" Style="width:170px;height:46px;">Objective Test</a></div>
	<div class="col-lg-6"><a href="<?= base_url('web/pre_summative_paper') ?>" class="btn btn-danger btn-lg mt-1" Style="width:170px;height:46px;">Subjective Test</a></div>
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