 
 <center>
 <div class="col-md-9 p-4">
	<div class="tab-content">
		<div class="tab-pane active" id="user-timeline">
			<div class="tile user-settings"> 
				<h4 class="line-head">Submit Your Question</h4>
				<form method="post" action="<?= base_url('admin_master/teacher_reference')?>">
					<div class="row mb-4">
						<div class="col-md-6">
							<label>Board</label>
							<select class="form-control" id="board_teach" name="board">
							<option>Select</option>
							<?php foreach($board as $bo) {?>
							<option value="<?php echo $bo->id; ?>"><?php echo$bo->name;?></option> 
							<?php }?>
							</select>
						</div> 
						<div class="col-md-6">
							<label>Publication</label>
							<select class="form-control" id="publication" name="publication">
							<?php foreach($publication as $pub) {?>
							<option value="<?php echo $pub->id; ?>"><?php echo $pub->name; ?></option>
							<?php }?>
							</select>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-6 mb-4">
							<label>Class</label>
							<select class="form-control" id="class" name="class">
							<option>Select</option>
							<?php foreach($classes as $cl) {?>
							<option value="<?php echo $cl->id; ?>"><?php echo $cl->name; ?></option>
							<?php }?>
							</select>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-6 mb-4">
							<label>Book</label>
							<select class="form-control" id="book_sub" name="book">
							<option>Select</option>
							<!--<?php // foreach($msubject as $cl) {?>
							<option value="<?php //echo $cl->id; ?>"><?php //echo $cl->name;  ?></option>
							<?php // }?>-->
							</select>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 mb-4">
							<label>Question Type</label>
							<select class="form-control" id="question_type" name="question_type">
							<option>Select</option>
							<option value="True and False">True and False</option>
							<option value="Fill in The Blanks">Fill in The Blanks</option>
							<option value="Multiple choice Questions">Multiple choice Questions</option>
							<option value="Match the Following">Match the Following</option>
							<option value="Short Answer Type Questions">Short Answer Type Questions</option>
							<option value="Long Answer Questions">Long Answer Questions</option>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
					 
					
					<div class="row">
						<div class="col-md-6 mb-4">
							<label>Question</label>
							<textarea class="form-control" rows=6 type="text" id="question" name="question" value=""></textarea>
						</div>
						
						<div class="clearfix"></div>
						
						<div class="col-md-6 mb-4">
							<label>Option/Answer</label> 
							<textarea class="form-control" rows=6 type="text" id="option_answer" name="option_answer" value=""></textarea>
						</div>
					</div>
					
					<div class="row mb-10">
						<div class="col-md-12">
							<button class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
</center>
