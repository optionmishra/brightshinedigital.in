 <section class="banner-section">
 	<div class="container">
 		<div class="row justify-content-between">
 			<div class="d-flex justify-content-center mb-5 d-flex align-items-center">
 				<img src="assets/img/<?php echo $logo['file_name']; ?>" alt="Brightshine Digital">
 				<!-- <h3 class="ml-3 font-weight-bold">Brightshine Digital</h3> -->
 			</div>
 			<div class="d-flex row">
 				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 lgn-frm-p">
 					<div class="card login-container" style="min-width: 250px;">
 						<a href="<?php echo base_url(); ?>student-registration" id="rg" class="login-anchr card-body p-1 pt-3 pb-3 bg-light rounded shadow-sm"> Student<span id="spn" class="bg-primary text-light">Registration</span></a>
 					</div>
 				</div>

 				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 lgn-frm-p">
 					<div class="card login-container" style="min-width: 250px;">
 						<a href="<?php echo base_url(); ?>teacher-registration" class="login-anchr card-body p-1 pt-3 pb-3 bg-light rounded shadow-sm w-200">School / Teacher<span class="bg-primary  text-light">Registration</span> </a>
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class="row">
 			<div class="col-md-6">
 				<div>
 					<div class="row">
 						<form style=" background: #00000011; min-height:400px" class="justify-self-end col-md-8 card shadow-sm form-background form-validate" action="<?= base_url('web/process') ?>" method="post">
 							<h2><i class="fa fa-user"></i>SIGN IN</h2>
 							<div class="form-group">
 								<h2 style="color:red;"></h2>
 								<label>UserName</label>
 								<input type="text" id="em" class="form-control input-lg" name="username" required placeholder="UserName" required="">
 							</div>
 							<div class="form-group">
 								<label>Password</label>
 								<input type="password" id="pw" class="form-control input-lg" name="password" required placeholder="Password" required="">
 							</div>
 							<div class="form-group">
 								<button class="form-btn"><i class="fa fa-sign-in"></i> SIGN IN</button>
 							</div>
 							<a href="#" class="login-anchr forgt">Forgot Password?</a>
 						</form>
 					</div>

 				</div>

 			</div>

 			<div class="col-md-6">

 				<div class="row">
 					<div class="col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center">
 						<img src="assets/img/about.png">
 					</div>
 				</div>
 			</div>
 		</div>

 	</div>

 </section>

 <!--<section class="service-container">

   <div class="container">
   
   <div class="service-header">   
   <h2>Resources</h2>
   <p>Our Web Support has a great collection of Lesson Plans, Answer Keys, Practice Worksheets and lots more. 
All the material we offer includes downloadable resources to use.
We are always looking for new ideas! Your creativity can help other teachers. Share your ideas on 
<a href="#">editorial@orangeeducation.in</a>
</p>
   </div>

   
   <div class="row">
   
   <div class="col-lg-4 col-md-4 col-sm-6 col-12">
   <div class="serv-inner-content">   
   <div class="service_icon icon_1">	
	<img src="img1/client-images/book.png" alt="Book">
	</div>	
	<div class="content_wrapper">
	<h2>E-Book</h2>
	<p>Interactive book with sound and animated chapters, topics, and exercises</p>
	</div>   
   </div> 
   </div>
   <div class="col-lg-4 col-md-4 col-sm-6 col-12">
       <div class="serv-inner-content"> 
   <div class="service_icon icon_2">	
		<img src="img1/client-images/topic.png" alt="Topic Animation" class="img2">	
	</div>	
	<div class="content_wrapper">
	<h2>Topic Animation</h2>
	<p>Animated topics from book </p>
	</div>  
   </div> 
   </div>
   <div class="col-lg-4 col-md-4 col-sm-6 col-12">
   <div class="serv-inner-content"> 
   <div class="service_icon icon_3">	
	<img src="img1/client-images/test-paper.png" alt="Test Paper Generator">	
	</div>	
	<div class="content_wrapper">
	<h2>Test Paper Generator</h2>
	<p>Test paper generator to make the test papers by choosing questions from a set of questions</p>
	</div>
   
   </div> 
   </div>
   
      <div class="col-lg-4 col-md-4 col-sm-6 col-12">
   <div class="serv-inner-content">   
   <div class="service_icon icon_2">	
	<img src="img1/client-images/lesson.png" alt="Lesson Plan">
	</div>	
	<div class="content_wrapper">
	<h2>Lesson Plan</h2>
	<p>Detailed lesson plans to help teacher teach the chapter</p>
	</div>   
   </div> 
   </div>
   <div class="col-lg-4 col-md-4 col-sm-6 col-12">
       <div class="serv-inner-content"> 
   <div class="service_icon icon_3">	
		<img src="img1/client-images/answer-key.png" alt="Answer">	
	</div>	
	<div class="content_wrapper">
	<h2>Answer Key</h2>
	<p>A compete key to objective and subjective type questions</p>
	</div>  
   </div> 
   </div>
   <div class="col-lg-4 col-md-4 col-sm-6 col-12">
   <div class="serv-inner-content"> 
   <div class="service_icon icon_1">	
	<img src="img1/client-images/practice-book.png" alt="Practice Worksheet">	
	</div>	
	<div class="content_wrapper">
	<h2>Practice Worksheets</h2>
	<p>Worksheets for more practice to extend learning</p>
	</div>
   
   </div> 
   </div>
   </div>
   
   </div>


  </section>  -->


 <!-- <section class="work_container">
  <div class="container">
  <div class="row">
  <div class="col-md-12">
  <h3>Welcome to Touchpad Web Support</h3>
  <div class="col-md-12">
<ul class="about-list">
<li>We would like to support the teachers and students by providing the <strong>Lesson Plans</strong>, and <strong>Answer Keys</strong> to all Exercises, Answer Keys to Periodic As
	sessments & Test Sheets.</li> 
<li>We provide separate <strong>Worksheets</strong> for teachers and students.</li>
<li>All lessons and exercises are supported by visuals based <strong>Interactive e-book</strong>. Students can solve the exercises in an interactive way and check the answers simultaneously.</li> 
<li>Teacher can create a test paper by choosing the desired questions of his/her choice from a set of questions as and when required by using the <strong>Test Paper Generator</strong>. He/she can take printout of the created test paper and distribute in the class.</li>   
<li>The teachers of all schools using <strong>Touchpad</strong> series can sign up to get a <strong>username and password</strong>. Account will be activated after verification. The teachers are requested to keep the username and password strictly to themselves as the site contains the answer keys of all questions and exercises.</li>
<li>The online support for the current academic year will be available to the teachers till the end of current session.</li>
</ul>
 </div>  
  </div>
  </div>
  
  </div>
  
  </section>-->


 <!--  <section class="testimonial_container">
  <div class="container">
  <div class="testimonial-header">   
   <h2>Our Clients</h2>
   </div>
  <div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
   <div id="blogCarousel" class="carousel slide container-blog" data-ride="carousel">

   
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<div class="row">
			
			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/log1.png" alt="Touchpad">
				  </div>
				</div>
			  </div>
			  
			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/log2.png" alt="Touchpad">
				  </div>
				</div>
			  </div>
			  
			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo3.png" alt="Touchpad">
				  </div>
				</div>
			  </div>
			
			</div>
		  </div>
		  <div class="carousel-item ">
			<div class="row">

			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo4.png" alt="Touchpad">
				  </div>
				</div>
			  </div>
			  
			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo5.png" alt="Touchpad">
				  </div>
				</div>
			  </div>
			  
			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo6.png" alt="Touchpad">
				  </div>
				</div>
			  </div>

			</div>
		  </div>

		  <div class="carousel-item ">
			<div class="row">

			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo7.png" alt="Touchpad">
				  </div>
				</div>
			  </div>
			  
			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo8.png" alt="Touchpad">
				  </div>
				</div>
			  </div>
			  
			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo9.png" alt="Touchpad">
				  </div>
				</div>
			  </div>

			</div>
		  </div>

		  <div class="carousel-item ">
			<div class="row">

			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo10.png" alt="Touchpad">
				  </div>
				</div>
			  </div>
			  
			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo11.png" alt="Touchpad">
				  </div>
				</div>
			  </div>
			  
			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo12.png" alt="Touchpad">
				  </div>
				</div>
			  </div>

			</div>
		  </div>

		  <div class="carousel-item ">
			<div class="row">

			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo13.png" alt="Touchpad">
				  </div>
				</div>
			  </div>
			  
			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo14.png" alt="Touchpad">
				  </div>
				</div>
			  </div>
			  
			  <div class="col-md-4" >
				<div class="testimonial">
				  <div class="testimonial-content">
						<img src="<?php echo base_url(); ?>assets/tuchpad/logo15.png" alt="Touchpad">
				  </div>
				</div>
			  </div>

			</div>
		  </div>
		</div>
		 <ol class="carousel-indicators">
		  <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
		  <li data-target="#blogCarousel" data-slide-to="1"></li>
		  <li data-target="#blogCarousel" data-slide-to="2"></li>
		  <li data-target="#blogCarousel" data-slide-to="3"></li>
		  <li data-target="#blogCarousel" data-slide-to="4"></li>
		</ol>
	  </div>
  </div>
  </div>
  </div>
  
  </section>-->