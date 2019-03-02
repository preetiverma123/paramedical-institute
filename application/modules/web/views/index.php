<section class="slider_area">
  <div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="slider-left">
        <div class="owl-carousel" id="slider_area">
            <?php $slider_str = ''; 
            foreach($sliders as $obj){ ?>
              <?php $slider_str = "assets/uploads/slider/".$obj->image; 
              ?>
                <div class="item">
                  <img src="<?php echo  $slider_str;?>" class="img-responsive" alt="slider">
                  <div class="overlay"></div>
                </div>
            <?php } ?>
         <!--  <div id="demo-1" data-zs-src='[<?php echo rtrim($slider_str, ','); ?>]' data-zs-overlay="dots">
              <div class="demo-inner-content"></div>
          </div>  -->
           
       <!--      <div class="item">
              <img src="assets/uploads/slider/slider-banner.jpg" class="img-responsive" alt="slider">
              <div class="overlay"></div>
            </div>
             <div class="item">
              <img src="assets/uploads/slider/home-slider-1523271646-sms.jpg" class="img-responsive" alt="slider">
              <div class="overlay"></div>
            </div> -->
          </div>
          </div>
        </div>
      <div class="col-md-4">
        <div class="panel panel-head">
          <div class="panel-heading"><h3 class="panel-title">Admission @ National Institute Of Paramedicals</h3></div>
        </div>

        <div class="scrollDiv scroll-wrapper list-group" style="position: relative;">
          <div class="scrollbar" id="style-3">
            <div class="force-overflow">
              <ul class="list-group force_overflow" style="height: auto; margin-bottom: 0px; margin-right: 0px;">
                <li class="list-group-item">
                  <i class="fa fa-caret-right"></i>Admission Courses
                
                  <ul class="style-course">
                    <?php if(!empty($courses)){?>
                      <?php foreach($courses as $course){?>
                        <li>
                          <a href="<?php echo site_url().'courses/'.$course->id; ?>">
                            <b> <i class="fa fa-caret-right"></i><?php echo (!empty($course->name))?$course->name:'';?></b>
                            <br>
                            <?php echo (!empty($course->class_description))?$course->class_description:'';?>
                          </a>
                        </li>
                      <?php }?>
                    <?php }?>
                   
                  </ul>

                </li>

               <!--  <li class="list-group-item">
                  <i class="fa fa-caret-right"></i>Admission Announcement
                
                  <ul class="style-course">
                    <li>
                      <a href="javascript:void(0);">
                      <b> <i class="fa fa-caret-right"></i>JEE(Main + advanced)</b></a>
                    </li>
                    <li>
                      <a href="javascript:void(0);">
                      <b> <i class="fa fa-caret-right"></i>JEE(Main + advanced)</b></a>
                    </li>
                    <li>
                      <a href="javascript:void(0);">
                      <b> <i class="fa fa-caret-right"></i>JEE(Main + advanced)</b></a>
                    </li>
                    <li>
                      <a href="javascript:void(0);">
                      <b> <i class="fa fa-caret-right"></i>JEE(Main + advanced)</b></a>
                    </li>
                  </ul>
                </li> -->
             
              </ul>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
 
</section>
<section class="messageContainer padding-btm" id="message-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8">
        <div class="go-heading go-lined">
          <h3 class="title-section1"><span style="color:#f33c1f;">About</span> NIOPS</h3>
        </div>
          <div class="directorWrapper">
           <div class="row go-directors">
            <div class="col-md-6 col-sm-6">
              <div class="go-box-wrap our-direct bg-light">
                <div class="block-title">
                    <h2>
                        <span>Directors's Message</span>
                    </h2>
                </div> 
                <img src="assets/uploads/page/<?php echo $director_message->page_image;?>" width="200px" height="210px" alt="director">

                <h4><?php echo $director_message->page_title; ?></h4>
              </div>
              <div class="message-content">
                <p>
                <?php $this->load->helper('text');
                $desc= strip_tags($director_message->page_description);
                echo word_limiter($desc,15); ?>
                </p>
              </div>
              <div class="text-center btn_view pb-4">
                <!-- <a href="<?php echo site_url('about'); ?>" class="btn btn-sm btn-lng btn-outline-dark">View More</a> -->
                 <a href="<?php echo site_url('about/'.$director_message->page_slug); ?>" class="btn btn-sm btn-lng btn-outline-dark">View More</a>
              </div>
            </div>

            <div class="col-md-6 col-sm-6">
              <div class="go-box-wrap our-direct bg-light">
                <div class="block-title">
                  <h2>
                      <span>Principal's Message</span>
                  </h2>
                </div> 
               <img src="assets/uploads/page/<?php echo $executive_message->page_image;?>" width="200px" height="210px" alt="director">
                <h4><?php echo $executive_message->page_title; ?></h4>
              </div>
              <div class="message-content">
                <p>
                <?php 
                $this->load->helper('text');
                $desc= strip_tags($executive_message->page_description);
                echo word_limiter($desc,15);
                ?>
                </p>
              </div>
              <div class="text-center btn_view pb-4">
                <!-- <a href="<?php echo site_url('about'); ?>" class="btn btn-sm btn-lng btn-outline-dark">View More</a> -->
                <a href="<?php echo site_url('about/'.$executive_message->page_slug); ?>" class="btn btn-sm btn-lng btn-outline-dark">View More</a>
              </div>
            </div>
          </div>
      </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="notice_board">
              <div class="notice-board">
                <?php if(isset($notices) && !empty($notices)){ ?>
                  
                    <div class="go-heading go-lined">
                        <h3 class="title-section1"><?php echo $this->lang->line('notice'); ?></h3>
                    </div>
                     

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="notice-single d_papers">
                            <div class="owl-carousel" id="notice-board">
                                
                              <?php foreach($notices as $obj){ ?>  
                                 <div class="item">             
                                  <div class="notice-title">
                                      <h2><?php echo $obj->title; ?></h2>
                                      <h3><i class="fa fa-calendar"></i>  <?php echo date('M j, Y', strtotime($obj->date)); ?> </h3>
                                  </div>
                                  <div>
                                      <p><?php echo substr($obj->notice, 0,120); ?>...</p>
                                  </div>
                                  <div class="more-link"><a href="<?php echo site_url('notice-detail/').$obj->id; ?>" class="btn-link"><?php echo $this->lang->line('read_more'); ?> <i class="fa fa-long-arrow-right"></i></a></div>
                                  </div>
                              <?php } ?>  
                            </div> 
                          </div>  
                        </div>
                      <div class="col-lg-12">
                        <div class="video-single d_papers">
                          <div class="about-school">
                            <div class="addmission-board">
                              <span>A</span>dmission <span>O</span>pen
                            </div>
                            <div class="owl-carousel" id="addmission-board">
                              <div class="item">
                                <div class="addmissionImage">
                                  <img src="assets/images/addmission-2.jpg" alt="admission">
                                </div>
                              </div>
                              <div class="item">
                                <div class="addmissionImage">
                                  <img src="assets/images/addmission-1.jpg" alt="admission">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>  
                      </div>
                      <div class="col-lg-12">
                        <div class="video-single d_papers">
                          <div class="about-school">
                            <div class="addmission-board">
                              <span>F</span>acilities 
                            </div>
                            <div class="facilityProvide">
                              <ul>
                                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Yoga facility</li>
                                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Canteen facility</li>
                                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Bus facility</li>
                                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Smart Classes</li>
                                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Yoga facility</li>
                                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Canteen facility</li>
                              </ul>
                              <div class="text-center btn_view pb-4">
                              <a href="<?php echo site_url('facilities'); ?>" class="btn btn-sm btn-lng btn-outline-dark">View More</a>
                            </div>
                            </div>
                          </div>
                        </div>  
                      </div>
                    </div>          
                  </div>
              <?php } ?>
              </div>
            </div>
          
      </div>

    </div>
</section>
<!-- Gallery section -->
  <div class="gallery-section">
    <div class="container">
      <div class="site-title">
        <h3 class="title-section1">Gallery</h3>
      </div>
     <div class="row"> 
      <div class="owl-carousel" id="galleryId">
        <!-- <div class="grid-sizer"></div> -->
        <?php if (isset($galleries) && !empty($galleries)) { ?>
          <?php foreach($galleries as $obj){?>
          <div class="item">
            <!-- <div class="gallery-item gi-big set-bg" data-setbg="<?php echo UPLOAD_PATH; ?>/gallery/<?php echo $obj->image; ?>"> -->
              <div class="galleryImg">
                <a class="img-popup" href="<?php echo site_url('gallery-image/'.$obj->id); ?>">
                <img src="<?php echo UPLOAD_PATH; ?>/gallery/<?php echo $obj->image; ?>" alt="person">
                </a>
                <!-- <a class="img-popup" href="<?php echo site_url('gallery-image/'.$obj->id); ?>"></a> -->
              </div>
            </div> 
          <?php }?>
        <?php }?>
        </div>
        </div>
    </div>
 </div>
  <!-- Gallery section -->

 <!-- <?php if(isset($events) && !empty($events)){ ?>
<section id="events" class="event-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="site-title">
                    <h3 class="title-section1">Our Courses</h3>
                </div>
            </div>
        </div>
        <div class="service_container">
           
              <div class="row text-center justify-content-center">
                 <div class="col-md-12 col-sm-12">
                   <div class="owl-carousel" id="event-held">
                  <?php foreach($events as $obj){ ?> 
                    <div class="item">
               
                    <div class="single-event-list">
                        <div class="event-img">
                            <a href="<?php echo site_url('event-detail/'.$obj->id); ?>"><img src="<?php echo UPLOAD_PATH; ?>/event/<?php echo $obj->image; ?>" alt=""></a>
                        </div>
                        <div class="event-content text-center">
                            <div class="event-meta">
                                <div class="event-title"><?php echo $obj->title; ?></div>
                                <div class="event-for"><span><?php echo $this->lang->line('event_for'); ?></span>: <?php echo $obj->name ? $obj->name : $this->lang->line('all'); ?></div>
                                <div class="event-place"> 
                                  <i class="fa fa-map-marker"></i>
                                  <?php echo $obj->event_place; ?>
                                </div>
                                <div class="event-date">
                                  <i class="fa fa-calendar-o"></i>
                                  
                                   <?php echo date('M j, Y', strtotime($obj->event_from)); ?> -
                                  
                                  
                                   <?php echo date('M j, Y', strtotime($obj->event_to)); ?></div>
                                </div>
                              
                            </div>
                            <div class="more-link"><a href="<?php echo site_url('event-detail/'.$obj->id); ?>" class="btn-link"><?php echo $this->lang->line('read_more'); ?> <i class="fa fa-long-arrow-right"></i></a></div>
                        </div>
                    </div>
                   
                    <?php } ?>
                </div>
              </div>
            </div>
        </div>
    </div>
</section> -->

<!-- our courses -->
<!-- <section class="course-section" id="course-id">
  <div class="container">
    <div class="col-md-4 col-sm-6">
      <div class="courseWrap">
        <div class="courseImg">
          <img src="" alt="course">
        </div>
        <div class="course-content">
          
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="courseWrap">
        <div class="courseImg">
          
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="courseWrap">
        <div class="courseImg">
          
        </div>
      </div>
    </div>
  </div>
</section> -->


<section class="fact-section spad set-bg" data-setbg="assets/images/background.jpg" style="background-image: url(assets/images/background.jpg);" id="move-counter">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg-3 fact">
          <div class="fact-icon">
            <i class="ti-pencil-alt"></i>
          </div>
          <div class="fact-text">
            <span class="goeducation-counter js-counter" data-from="0" data-to="<?php echo count($sections);?>" data-speed="60" data-refresh-interval="50"><?php echo count($sections);?></span>
            <!-- <h2><?php echo count($sections);?></h2> -->
            <p>Total Service</p>

          </div>
        </div>
        <div class="col-sm-6 col-lg-3 fact">
          <div class="fact-icon">
            <i class="ti-user"></i>
          </div>
          <div class="fact-text">
            <span class="goeducation-counter js-counter" data-from="0" data-to="<?php echo count($students);?>" data-speed="60" data-refresh-interval="50"><?php echo count($students);?></span>
            <!-- <h2><?php echo count($students);?></h2> -->
            <p>Total STUDENTS</p>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 fact">
          <div class="fact-icon">
            <i class="fa fa-trophy"></i>
            <!-- <i class="ti-briefcase"></i> -->
          </div>
          <div class="fact-text">
            <span class="goeducation-counter js-counter" data-from="0" data-to="<?php echo count($teachers);?>" data-speed="60" data-refresh-interval="50"><?php echo count($teachers);?></span>
            <!-- <h2></h2> -->

            <p>Award Received</p>
          </div>
        </div>
        
        <div class="col-sm-6 col-lg-3 fact">
          <div class="fact-icon">
            <i class="ti-user"></i>
          </div>
          <div class="fact-text">
            <span class="goeducation-counter js-counter" data-from="0" data-to="<?php echo count($employees);?>" data-speed="60" data-refresh-interval="50">3000</span>
            <!-- <h2><?php echo count($employees);?></h2> -->
            <p>Selected students</p>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
<!-- our team -->
<?php if (isset($teachers) && !empty($teachers)) { ?>
<section class="section_team md-padding">
    <div id="team" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-title">
                        <h3 class="title-section1">Our Team</h3>
                    </div>
                </div>
            </div>
       
    
          <div class="row">
            <div class="owl-carousel" id="our-team">
               <!--  <?php foreach ($teachers as $key => $obj) { ?>
                  <?php if($key<3){ ?> -->
              
                    <!-- <div class="team">
                        <div class="team-img">
                          <?php  if($obj->photo != ''){ ?>
                            <img class="img-responsive" src="<?php echo UPLOAD_PATH; ?>/teacher-photo/<?php echo $obj->photo; ?>" alt="">
                          <?php }else{ ?>
                            <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="120" class="img-responsive"/> 
                          <?php } ?>
                            <div class="overlay">
                                <div class="team-social">
                                <?php if($obj->facebook_url){ ?>
                                <a target="_blank" href="<?php echo $obj->facebook_url; ?>"><i class="fa fa-facebook"></i></a>
                                <?php } ?>
                                <?php if($obj->linkedin_url){ ?>
                                <a target="_blank" href="<?php echo $obj->linkedin_url; ?>"><i class="fa fa-linkedin"></i></a>
                                <?php } ?>
                                <?php if($obj->google_plus_url){ ?>
                                <a target="_blank" href="<?php echo $obj->google_plus_url; ?>"><i class="fa fa-google-plus"></i></a>
                                <?php } ?>
                              
                                <?php if($obj->twitter_url){ ?>
                                <a target="_blank" href="<?php echo $obj->twitter_url; ?>"><i class="fa fa-twitter"></i></a>
                                <?php } ?>
                                <?php if($obj->youtube_url){ ?>
                                <a target="_blank" href="<?php echo $obj->youtube_url; ?>"><i class="fa fa-youtube"></i></a>
                                <?php } ?>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3><?php echo $obj->name; ?></h3>
                            <span><?php echo $obj->responsibility; ?></span>
                        </div>
                    </div> -->
              <?php foreach ($teachers as $key => $obj) { ?>
               
                  <div class="team-item">
                    <div class="team-img">
                      <?php  if($obj->photo != ''){ ?>
                        <img src="<?php echo UPLOAD_PATH; ?>/teacher-photo/<?php echo $obj->photo; ?>" alt="team Image">
                      <?php }else{ ?>
                        <img src="<?php echo IMG_URL; ?>/default-user.png" alt="team Image" width="120" /> 
                      <?php } ?>
                     <!--  <img src="assets/images/team3.jpg" alt="team Image"> -->
                      <div class="normal-text">
                        <h3 class="team-name"><?php echo $obj->name; ?></h3>
                        <span class="subtitle"><?php echo $obj->responsibility; ?></span>
                      </div>
                    </div>
                    <div class="team-content">
                      <div class="overly-border"></div>
                        <div class="display-table">
                          <div class="display-table-cell">
                          <h3 class="team-name"><a href="javascript:void(0);"><?php echo $obj->name; ?></a></h3>
                          <span class="team-title"><?php echo $obj->responsibility; ?></span>
                           <?php  if($obj->other_info != ''){ ?>
                        <p class="team-desc"><?php echo $obj->other_info; ?></p>
                      <?php } ?>
                   
                         
                          <div class="team-social">
                             <?php if($obj->facebook_url){ ?>
                                <a class="social-icon"  target="_blank" href="<?php echo $obj->facebook_url; ?>"><i class="fa fa-facebook"></i></a>
                                <?php } ?>
                                <?php if($obj->linkedin_url){ ?>
                                <a class="social-icon"  target="_blank" href="<?php echo $obj->linkedin_url; ?>"><i class="fa fa-linkedin"></i></a>
                                <?php } ?>
                                <?php if($obj->google_plus_url){ ?>
                                <a class="social-icon" target="_blank" href="<?php echo $obj->google_plus_url; ?>"><i class="fa fa-google-plus"></i></a>
                                <?php } ?>
                              
                                <?php if($obj->twitter_url){ ?>
                                <a class="social-icon"  target="_blank" href="<?php echo $obj->twitter_url; ?>"><i class="fa fa-twitter"></i></a>
                                <?php } ?>
                                <?php if($obj->youtube_url){ ?>
                                <a class="social-icon"  target="_blank" href="<?php echo $obj->youtube_url; ?>"><i class="fa fa-youtube"></i></a>
                                <?php } ?>
                            <!-- <a href="javascript:void(0);" class="social-icon"><i class="fa fa-facebook"></i></a>
                            <a href="javascript:void(0);" class="social-icon"><i class="fa fa-google-plus"></i></a>
                            <a href="javascript:void(0);" class="social-icon"><i class="fa fa-twitter"></i></a>
                            <a href="javascript:void(0);" class="social-icon"><i class="fa fa-pinterest-p"></i></a> -->
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
               
              <?php }?>

                  <!-- 2 team -->
                <!--   <div class="team-item">
                    <div class="team-img">
                      <img src="assets/images/team2.jpg" alt="team Image">
                      <div class="normal-text">
                        <h3 class="team-name">ABD Rashid Khan</h3>
                        <span class="subtitle">Vice Chancellor</span>
                      </div>
                    </div>
                    <div class="team-content">
                      <div class="overly-border"></div>
                        <div class="display-table">
                          <div class="display-table-cell">
                          <h3 class="team-name"><a href="javascript:void(0);">ABD Rashid Khan</a></h3>
                          <span class="team-title">Vice Chancellor</span>
                          <p class="team-desc">Entrusted with planning, implementation and evaluation.</p>
                          <div class="team-social">
                            <a href="javascript:void(0);" class="social-icon"><i class="fa fa-facebook"></i></a>
                            <a href="javascript:void(0);" class="social-icon"><i class="fa fa-google-plus"></i></a>
                            <a href="javascript:void(0);" class="social-icon"><i class="fa fa-twitter"></i></a>
                            <a href="javascript:void(0);" class="social-icon"><i class="fa fa-pinterest-p"></i></a>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div> -->

                    <!-- 3 team -->

                    <!--  <div class="team-item">
                    <div class="team-img">
                      <img src="assets/images/team1.jpg" alt="team Image">
                      <div class="normal-text">
                        <h3 class="team-name">ABD Rashid Khan</h3>
                        <span class="subtitle">Vice Chancellor</span>
                      </div>
                    </div>
                    <div class="team-content">
                      <div class="overly-border"></div>
                        <div class="display-table">
                          <div class="display-table-cell">
                          <h3 class="team-name"><a href="javascript:void(0);">ABD Rashid Khan</a></h3>
                          <span class="team-title">Vice Chancellor</span>
                          <p class="team-desc">Entrusted with planning, implementation and evaluation.</p>
                          <div class="team-social">
                            <a href="javascript:void(0);" class="social-icon"><i class="fa fa-facebook"></i></a>
                            <a href="javascript:void(0);" class="social-icon"><i class="fa fa-google-plus"></i></a>
                            <a href="javascript:void(0);" class="social-icon"><i class="fa fa-twitter"></i></a>
                            <a href="javascript:void(0);" class="social-icon"><i class="fa fa-pinterest-p"></i></a>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
            <!-- <?php } ?> -->
          <!-- <?php } ?> -->
          </div>
         <div class="text-center btn_view pb-4">
            <!-- <a href="<?php echo site_url('teachers'); ?>" class="btn btn-sm btn-lng btn-outline-dark">View More</a> -->
            <a href="<?php echo site_url('teachers'); ?>" class="btn btn-sm btn-lng btn-outline-dark">View More</a>
          </div>
        </div>
         
    </div>
</section>
<?php } ?>
<!-- our testimonials -->
<!--<section class="section-testimonial">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
        <div class="site-title">
            <h3 class="title-section1">Our Reviews</h3>
        </div>
        <div id="owl-testimonials" class="owl-carousel">
          <?php foreach($reviews as $key => $value) {?>
            <div class="testimonial clearfix">
              <?php if($value->photo==NULL){?>
                <img src="assets/images/avatardefault.png" alt="photo" class="testimonial__img">
              <?php }else{?>
                <img src="<?php echo UPLOAD_PATH; ?>/review-photo/<?php echo $value->photo; ?>" alt="photo" class="testimonial__img">
              <?php }?>
                <div class="testimonial__info">
                  <span class="testimonial__author"><?php echo $value->name;?></span>
                  <!-- <span class="testimonial__company">Surat</span> -->
<!--                </div>-->
<!--                <div class="testimonial__body">-->
<!--                  <p class="testimonial__text">“<?php echo $value->review;?>”</p>-->
<!--                </div>-->
<!--            </div>-->
<!--          <?php }?>-->
         
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->
<section class="contact-content-area" id="contact-section">
   <div class="go-heading go-lined site-title">
      <h3 class="title-section1">Contact Us</h3>
    </div>
    <div class="container">
     
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
              <div class="map-contact">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4165.321812020541!2d77.38378970022572!3d28.61164902546254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5aa32ba7abd%3A0x348f1dd49387e0a7!2sMainee+Steel+Works+Private+Limited!5e0!3m2!1sen!2sin!4v1543673481681" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
                <!-- <script>
                    function myMap() {
                        var myCenter = new google.maps.LatLng(<?php echo $settings->school_geocode; ?>);
                        var mapCanvas = document.getElementById("map");
                        var mapOptions = {center: myCenter, zoom: 16};
                        var map = new google.maps.Map(mapCanvas, mapOptions);
                        var marker = new google.maps.Marker({position: myCenter});
                        marker.setMap(map);
                        //infowindow.open(map, marker);
                    }
                </script> -->
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwNfbMeqVjiM6GstU-IfuyXvg0R1F2UaY&callback=myMap"></script>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="contact-form">
                    <form action="<?php echo site_url('contact'); ?>" method="post" name="contact" id="contact">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name" class="col-form-label"><?php echo $this->lang->line('first_name'); ?></label>
                                <input type="text" class="form-control" id="first_name" placeholder="<?php echo $this->lang->line('first_name'); ?>" name="first_name" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name" class="col-form-label"><?php echo $this->lang->line('last_name'); ?></label>
                                <input type="text" class="form-control" id="last_name" placeholder="<?php echo $this->lang->line('last_name'); ?>" name="last_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label"><?php echo $this->lang->line('email'); ?></label>
                                <input type="email" class="form-control" id="email" placeholder="<?php echo $this->lang->line('email'); ?>" name="email" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone" class="col-form-label"><?php echo $this->lang->line('phone'); ?></label>
                                <input type="text" class="form-control" id="phone" placeholder="<?php echo $this->lang->line('phone'); ?>" name="phone">
                            </div>
                        </div>  
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="comment"><?php echo $this->lang->line('comment'); ?></label>
                                <textarea class="form-control" id="comment" rows="5" name="comment" required="required" placeholder="<?php echo $this->lang->line('comment'); ?>"></textarea>
                            </div>                           
                        </div>                           
                        <button type="submit" class="btn btn-primary btn-blue" style="margin-left: 16px;"><?php echo $this->lang->line('submit'); ?></button>
                        
                    </form>
                </div>
            </div>
             
        </div>
    </div>
</section>
<div class="applyNowWrap">
    <a href="<?php echo site_url('apply-online'); ?>">
      <img src="assets/images/apply_online.png" alt="apply">
    </a>
  </div>
<!-- <section class="content-area">
  <div class="front-contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="contact-form">
                    <form action="<?php echo site_url('contact'); ?>" method="post" name="contact" id="contact">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name" class="col-form-label"><?php echo $this->lang->line('first_name'); ?></label>
                                <input type="text" class="form-control" id="first_name" placeholder="<?php echo $this->lang->line('first_name'); ?>" name="first_name" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name" class="col-form-label"><?php echo $this->lang->line('last_name'); ?></label>
                                <input type="text" class="form-control" id="last_name" placeholder="<?php echo $this->lang->line('last_name'); ?>" name="last_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label"><?php echo $this->lang->line('email'); ?></label>
                                <input type="email" class="form-control" id="email" placeholder="<?php echo $this->lang->line('email'); ?>" name="email" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone" class="col-form-label"><?php echo $this->lang->line('phone'); ?></label>
                                <input type="text" class="form-control" id="phone" placeholder="<?php echo $this->lang->line('phone'); ?>" name="phone">
                            </div>
                        </div>  
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="comment"><?php echo $this->lang->line('comment'); ?></label>
                                <textarea class="form-control" id="comment" rows="5" name="comment" required="required" placeholder="<?php echo $this->lang->line('comment'); ?>"></textarea>
                            </div>                           
                        </div>                           
                        <button type="submit" class="btn btn-primary btn-blue" style="margin-left: 16px;"><?php echo $this->lang->line('submit'); ?></button>
                        
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="right-pane contact-mg clearfix">
                    <h2 class="widget-title"><?php echo $this->lang->line('get_in_touch'); ?></h2> 
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <ul>
                                <li>
                                    <p><i class="fa fa-map-marker"></i><?php echo $settings->address; ?></p>
                                </li>
                                <li>
                                    <p><i class="fa fa-envelope"></i><?php echo $settings->email; ?></p>
                                </li>
                                <li>
                                    <p><i class="fa fa-phone"></i><?php echo $settings->phone; ?></p>
                                </li>
                                <li>
                                    <p><i class="fa fa-fax"></i><?php echo $settings->school_fax; ?></p>
                                </li>
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section> -->
<!-- our gallery -->
<!-- <section id="gallery" class="gallery-wrap">
        
        <div class="container"> 
            <div class="row">
                  <div class="col-12">
                      <div class="site-title">
                            <h3 class="title-section1">Our Gallery</h3>
                        </div>
                  </div>
              </div>       
          
            <div class="row">          
                <div class="col-md-12">
                 
                  <div class="controls text-center">
                    <a class="filter active btn btn-common" data-filter="all">
                      All 
                    </a>
                    <a class="filter btn btn-common" data-filter=".flats">
                      Teachers 
                    </a>
                    <a class="filter btn btn-common" data-filter=".plots">
                      Members
                    </a>
                    <a class="filter btn btn-common" data-filter=".house">
                      Students 
                    </a>
                  </div>
                  
                </div>
            <div id="portfolio" class="row wow fadeInDown" data-wow-delay="0.4s">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mix plots house">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="assets/images/team1.jpg" alt="projects"/>  
                    <div class="overlay">
                      <div class="icons">
                        <a class="lightbox preview" href="assets/images/team1.jpg">
                          <i class="icon-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
             
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mix plots">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="assets/images/team1.jpg" alt="projects"/> 
                    <div class="overlay">
                      <div class="icons">
                        <a class="lightbox preview" href="assets/images/team1.jpg">
                          <i class="icon-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mix plots flats">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="assets/images/team2.jpg" alt="projects" /> 
                    <div class="overlay">
                      <div class="icons">
                        <a class="lightbox preview" href="assets/images/team2.jpg">
                          <i class="icon-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mix plots">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="assets/images/team3.jpg" alt="projects"/> 
                    <div class="overlay">
                      <div class="icons">
                        <a class="lightbox preview" href="assets/images/team3.jpg">
                          <i class="icon-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mix flats">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="assets/images/team1.jpg" alt="projects"/>
                    <div class="overlay">
                      <div class="icons">
                        <a class="lightbox preview" href="assets/images/team1.jpg">
                          <i class="icon-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 plots">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="assets/images/team1.jpg" alt="projects"/>
                    <div class="overlay">
                      <div class="icons">
                        <a class="lightbox preview" href="assets/images/team1.jpg">
                          <i class="icon-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
            </div>
          </div>
        </div>
      
      </section> -->
<script type="text/javascript">
  $("#career").validate();
 $(document).ready(function() {
          $('#founder-msg').owlCarousel({
              loop: true,
              margin: 30,
              nav: true,
              items: 1,
              dots: true,
              autoplay: true
            });
          $('#notice-board').owlCarousel({
            items: 1,
            loop: true,
            // margin: 30,
            nav: false,
            
            dots: true,
            autoplay: true
          });
          $('#notice-detail').owlCarousel({
            items: 1,
            loop: true,
            // margin: 30,
            nav: false,
            
            dots: true,
            autoplay: true
          });
          $('#addmission-board').owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: true,
            autoplay: true
          });
          $('#slider_area').owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: true,
            autoplay: true
          });
          $('#event-held').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            items: 2,
            dots: true,
            autoplay: true,
            responsive: {
              0: {
                  items: 1
              },
              360: {
                  items: 1
              },
              576: {
                  items: 2
              },
              991: {
                  items: 2
              },
              1200: {
                  items: 2
              }
            }
          });
          /*----------------our team------------*/
          $('#our-team').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: true,
            autoplay: true,
            responsive: {
              0: {
                  items: 1
              },
              320: {
                  items: 1,
                  dots :false
              },
              480: {
                items: 2,
                margin: 0
              },
              767:{
                items: 2,
                margin: 0
              },
              991: {
                  items: 4
              }
            }
          });
/*-------------Testimonial------------------*/
          $('#owl-testimonials').owlCarousel({
            loop: true,
            margin: 30,
            autoplay: true,
            responsive: {
              0: {
                  items: 1
              },
              480: {
                  items: 1,
                  dots :false
              },
              991: {
                items: 2,
                // dots :false,
                nav:true
              }
            }
          });
          /*our gallery*/
          $('#galleryId').owlCarousel({
          
            loop: true,
            margin: 30,
            nav: true,
            dots: true,
            autoplay: true,
            responsive: {
              0: {
                  items: 1
              },
              320: {
                  items: 1,
                  dots :false
              },
              576: {
                  items: 2
              },
              991: {
                  items: 3
              },
              1200: {
                  items: 4
              }
            }
          });
       }); 
 </script>