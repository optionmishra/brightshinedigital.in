<!-- Start Our Gallery Area -->
<div class="container">
<h2 class="mt-2">How to Use? </h2>
				<div class="row mt-2">
				
					<!-- Start Single Gallery -->
					<?php foreach($helps as $h): ?>
					<div class="col-lg-3 m-2">
							
							<video width="300" height="240" controls>
							  <source src="assets/img/<?= $h->file_name ?>" type="video/mp4">
							</video>
						
						</div>	
						<?php endforeach; ?>
					</div>	
					</div>	
		<!-- End Our Gallery Area -->