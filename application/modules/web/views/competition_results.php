<section class="result-section">
	<div class="container">
		<div class="row">
			<div class="go-heading go-lined site-title">
		      <h3 class="title-section1">Results Name</h3>
		    </div>

		     <?php foreach($results as $result){?>
					     
				<div class="col-md-4">
					<div class="resultWrap">
						<div class="result-img">
							<?php if(!empty($result->photo)){?>
							<img src="<?php echo UPLOAD_PATH; ?>/competition_result-photo/<?php echo $result->photo; ?>" alt="student">
						<?php }else{?>
							<img src="assets/images/student.jpg" alt="student">
						<?php }?>
						</div>
						<div class="result-info">
							<div class="student_name"><?php echo $result->name;?></div>
							<div class="score-student"><span class="spanresult"><?php echo $result->course;?></span></div>
							<div class="year"><span class="spanresult">Year</span><span><?php echo $result->year;?></span></div>
							<div class="roll"><span class="spanresult">Roll no</span><span><?php echo $result->roll_no;?></span></div>
							<div class="rank"><span class="spanresult">Air</span><span><?php echo $result->rank;?></span></div>
						</div>
					</div>
				</div>
			<?php }?>

			
		</div>
	</div>
</section>