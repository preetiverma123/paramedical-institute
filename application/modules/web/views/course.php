<section class="section-course">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="course-head">
					<h3><i class="fa fa-graduation-cap rs-animation-scale-up"></i><?php echo(!empty($courseDetails->name)?$courseDetails->name:'');?></h3>
				</div>
				<div class="course-content">
                    <p>
                        <?php echo(!empty($courseDetails->class_description)?'('.$courseDetails->class_description.')':'');?>
                    </p>
					<p>

						<?php echo(!empty($courseDetails->description)?htmlspecialchars_decode($courseDetails->description):'');?>
					</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="course-image">
                    <?php if(!empty($courseDetails->photo)){?>
					<img src="<?php echo UPLOAD_PATH;?>/course-photo/<?php echo $courseDetails->photo;?>" alt="course">
                    <?php }?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--<section class="certified-course">
	<div class="rs-services rs-services-style1">
		
            <div class="container">
            	<div class="course-head">
					<h3 class="text-center"><span style="color: #f33c1f;">Benefits</span> of Course</h3>
				</div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 marginBox">
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">
                    	    	<i class="fa fa-american-sign-language-interpreting rs-animation-scale-up"></i>                    	        
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">Trending Courses</h4>
                    	        <p>Explore the best</p>
                    	    </div>
                    	</div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 marginBox">
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">                    	        
                    	        <i class="fa fa-book rs-animation-scale-up"></i>
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">Books &amp; Library</h4>
                    	        <p>Lorem ipsum dolor sit amet Sed nec molestie justo</p>
                    	    </div>
                    	</div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 marginBox">
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">
                    	        <i class="fa fa-user rs-animation-scale-up"></i>
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">Certified Teachers</h4>
                    	        <p>Lorem ipsum dolor sit amet Sed nec molestie justo</p>
                    	    </div>
                    	</div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 marginBox">
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">
                    	        <i class="fa fa-graduation-cap rs-animation-scale-up"></i>
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">Certification</h4>
                    	        <p>Lorem ipsum dolor sit amet Sed nec molestie justo</p>
                    	    </div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
</section>-->