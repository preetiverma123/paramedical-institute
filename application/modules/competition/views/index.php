<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-users"></i><small> <?php echo $this->lang->line('manage_competition_result'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">
                <?php echo $this->lang->line('quick_link'); ?>:
                
                    <a href="<?php echo site_url('competition_result/add/'); ?>"><?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('competition_result'); ?></a> |
                
                
                    <a href="<?php echo site_url('competition_result/index'); ?>"><?php echo $this->lang->line('manage_competition_result'); ?></a>                    
                 
             
            </div>
              <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_competition_result_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('competition_result'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        
                            <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_competition_result"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('competition_result'); ?></a> </li>                          
                        
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_competition_result"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('competition_result'); ?></a> </li>                          
                        <?php } ?>
                        <?php if(isset($detail)){ ?>
                            <li  class="active"><a href="#tab_view_competition_result"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('competition_result'); ?></a> </li>                          
                        <?php } ?>
                            
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_competition_result_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sno'); ?></th>

                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('photo'); ?></th>
                                        <th><?php echo $this->lang->line('course'); ?></th>
                                         <th><?php echo $this->lang->line('year'); ?></th>
                                          <th><?php echo $this->lang->line('roll_no'); ?></th>
                                           <th><?php echo $this->lang->line('rank'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php  $count = 1; if(isset($competition_results) && !empty($competition_results)){ ?>

                                        <?php foreach($competition_results as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo ucfirst($obj->name); ?></td>
                                            <td>
                                                <?php  if($obj->photo){ ?>
                                                <img src="<?php echo UPLOAD_PATH; ?>/competition_result-photo/<?php echo $obj->photo; ?>" alt="" width="70" /> 
                                                <?php }else{ ?>
                                                <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="70" /> 
                                                <?php } ?>
                                            </td>
                                            
                                            <td><?php echo ucfirst($obj->course); ?></td>
                                            <td><?php echo $obj->year; ?></td>

                                            <td><?php echo $obj->roll_no; ?></td>

                                            <td><?php echo $obj->rank; ?></td>
                                           
                                            <td>
                                                
                                                    <a href="<?php echo site_url('competition/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a><br/>
                                               
                                                
                                                    <a href="<?php echo site_url('competition/view/'.$obj->id); ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a><br/>
                                               
                                               
                                                    <a href="<?php echo site_url('competition/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                               
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_competition_result">
                            <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('competition/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($post['name']) ?  $post['name'] : ''; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>

                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course"><?php echo 'Course'; ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="course"  id="course" value="<?php echo isset($post['course']) ?  $post['course'] : ''; ?>" placeholder="<?php echo $this->lang->line('course'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('course'); ?></div>
                                    </div>
                                </div>

                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="year"><?php echo $this->lang->line('year'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="year"  id="year" value="<?php echo isset($post['year']) ?  $post['year'] : ''; ?>" placeholder="<?php echo $this->lang->line('year'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('year'); ?></div>
                                    </div>
                                </div>

                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="roll_no"><?php echo $this->lang->line('roll_no'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="roll_no"  id="roll_no" value="<?php echo isset($post['roll_no']) ?  $post['roll_no'] : ''; ?>" placeholder="<?php echo $this->lang->line('roll_no'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('roll_no'); ?></div>
                                    </div>
                                </div>

                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rank"><?php echo 'Rank'; ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="rank"  id="rank" value="<?php echo isset($post['rank']) ?  $post['rank'] : ''; ?>" placeholder="<?php echo $this->lang->line('rank'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('rank'); ?></div>
                                    </div>
                                </div>
                            
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"><?php echo $this->lang->line('type'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12"  name="achiever_type"  id="type" placeholder="<?php echo $this->lang->line('type'); ?>" required="required">
                                            <option value="" >Select Achiever Type</option>
                                            <option value="tenth_class" <?php if(isset($post['achiever_type']) && $post['type']=="tenth_class"){ echo 'selected';}?> >X Class Achiever </option>
                                            <option value="twelveth_class" <?php if(isset($post['achiever_type']) && $post['type']=="twelveth_class"){ echo 'selected';}?> > XII Class Achiever </option>
                                            <option value="neet" <?php if(isset($post['achiever_type']) && $post['type']=="neet"){ echo 'selected';}?> > NEET Achiever</option>
                                            <option value="iit" <?php if(isset($post['achiever_type']) && $post['type']=="iit"){ echo 'selected';}?> > IIT Achiever</option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('type'); ?></div>
                                    </div>
                                </div>
                                                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('photo'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                        <div class="help-block"><?php echo form_error('photo'); ?></div>
                                    </div>
                                </div>
                                                                
                               
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a  href="<?php echo site_url('competition_result'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="instructions"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> <?php echo $this->lang->line('add_competition_result_instruction'); ?></div>
                                </div>
                                
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        
                        <div class="tab-pane fade in active" id="tab_edit_competition_result">
                            <div class="x_content"> 
                            <?php echo form_open_multipart(site_url('competition/edit/'. $competition_result->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="name"  id="name" value="<?php echo isset($competition_result->name) ?  $competition_result->name : $post['name']; ?>" placeholder="<?php echo $this->lang->line('name'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                               
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $this->lang->line('photo'); ?>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="hidden" name="prev_photo" id="prev_photo" value="<?php echo $competition_result->photo; ?>" />
                                        <?php if($competition_result->photo){ ?>
                                        <img src="<?php echo UPLOAD_PATH; ?>/competition_result-photo/<?php echo $competition_result->photo; ?>" alt="" width="70" /><br/><br/>
                                        <?php } ?>
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                            <input  class="form-control col-md-7 col-xs-12"  name="photo"  id="photo" type="file">
                                        </div>
                                        <div class="text-info"><?php echo $this->lang->line('valid_file_format_img'); ?></div>
                                        <div class="help-block"><?php echo form_error('photo'); ?></div>
                                    </div>
                                </div>
                                
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course"><?php echo 'Course'; ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="course"  id="course" value="<?php echo isset($competition_result->course) ?  $competition_result->course : $post['course']; ?>" placeholder="<?php echo 'course'; ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('course'); ?></div>
                                    </div>
                                </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="year"><?php echo $this->lang->line('year'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="year"  id="year" value="<?php echo isset($competition_result->year) ?  $competition_result->year : $post['year']; ?>" placeholder="<?php echo $this->lang->line('year'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('year'); ?></div>
                                    </div>
                                </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="roll_no"><?php echo $this->lang->line('roll_no'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="roll_no"  id="roll_no" value="<?php echo isset($competition_result->roll_no) ?  $competition_result->roll_no : $post['roll_no']; ?>" placeholder="<?php echo $this->lang->line('roll_no'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('roll_no'); ?></div>
                                    </div>
                                </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rank"><?php echo'Rank'; ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="rank"  id="rank" value="<?php echo isset($competition_result->rank) ?  $competition_result->rank : $post['rank']; ?>" placeholder="<?php echo 'rank'; ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('rank'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"><?php echo $this->lang->line('type'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12"  name="achiever_type"  id="type" placeholder="<?php echo $this->lang->line('type'); ?>" required="required">
                                            <option value="" >Select Achiever Type</option>

                                            <option value="tenth_class" <?php if(isset($competition_result->achiever_type) && $competition_result->achiever_type=="tenth_class"){ echo 'selected';}?> >X Class Achiever </option>
                                            <option value="twelveth_class" <?php if(isset($competition_result->achiever_type) && $competition_result->achiever_type=="twelveth_class"){ echo 'selected';}?> > XII Class Achiever </option>

                                            <option value="neet" <?php if(isset($competition_result->achiever_type) && $competition_result->achiever_type=="neet"){ echo 'selected';}?> > NEET Achiever</option>

                                            <option value="iit" <?php if(isset($competition_result->achiever_type) && $competition_result->achiever_type=="iit"){ echo 'selected';}?> > IIT Achiever</option>
                                        </select>
                                        <div class="help-block"><?php echo form_error('type'); ?></div>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                       
                                        <input type="hidden" name="id" id="id" value="<?php echo $competition_result->id; ?>" />
                                        <a href="<?php echo site_url('competition_results'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div> 
                        <?php } ?>
                        
                        <?php if(isset($detail)){ ?>
                        
                        <div class="tab-pane fade in active" id="tab_view_competition_result">
                            <div class="x_content"> 
                            <?php echo form_open_multipart(site_url(), array('name' => 'detail', 'id' => 'detail', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('name'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $competition_result->name; ?>
                                    </div>
                                </div>
                                 <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo 'Course'; ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $competition_result->course; ?>
                                    </div>
                                </div>
                                 <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('year'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $competition_result->year; ?>
                                    </div>
                                </div>
                                 <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('roll_no'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $competition_result->roll_no; ?>
                                    </div>
                                </div>

                                 <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo 'Rank'; ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $competition_result->rank; ?>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo 'Achiever Type'; ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $competition_result->achiever_type; ?>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('photo'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php if($competition_result->photo){ ?>
                                        <img src="<?php echo UPLOAD_PATH; ?>/competition_result-photo/<?php echo $competition_result->photo; ?>" alt="" width="70" /><br/><br/>
                                        <?php }else{ ?>
                                        <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="70" /> 
                                        <?php } ?>
                                    </div>
                                </div>
                                
                            
                               
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <a href="<?php echo site_url('competition_result/edit/'.$competition_result->id); ?>" class="btn btn-primary"><?php echo $this->lang->line('update'); ?></a>
                                        </div>
                                    </div>
                                
                                <?php echo form_close(); ?>
                            </div>
                        </div> 
                        <?php } ?>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  
  <!-- bootstrap-datetimepicker -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<!-- datatable with buttons -->
 <script type="text/javascript">
     
    $('#add_dob').datepicker();
  $('#edit_dob').datepicker();
  
  
    
    function get_section_by_class(class_id, section_id){       
           
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_section_by_class'); ?>",
            data   : { class_id : class_id , section_id: section_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                   if(section_id === ''){
                    $('#add_section_id').html(response);
                   }else{
                       $('#edit_section_id').html(response);
                   }
               }
            }
        });  
                     
        
   }
  </script>
  <!-- datatable with buttons -->
 <script type="text/javascript">
        $(document).ready(function() {
          $('#datatable-responsive').DataTable( {
              dom: 'Bfrtip',
              iDisplayLength: 15,
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'pageLength'
              ],
              search: true
          });
        });
        
        function get_subject_by_class(url){          
            if(url){
                window.location.href = url; 
            }
        }
        
        function get_guardian_by_id(guardian_id){
            
            $.ajax({       
            type   : "POST",
            dataType: "json",
            url    : "<?php echo site_url('ajax/get_guardian_by_id'); ?>",
            data   : { guardian_id : guardian_id},               
            async  : true,
            success: function(response){ 
               if(response)
               {
                $('#add_phone').val(response.phone);  
                $('#add_present_address').val(response.present_address);  
                $('#add_permanent_address').val(response.permanent_address);  
                $('#add_religion').val(response.religion);  
               }else{
                    $('#add_phone').val('');  
                    $('#add_present_address').val('');  
                    $('#add_permanent_address').val('');  
                    $('#add_religion').val(''); 
               }
            }
        });  
        }
    $("#add").validate();     
    $("#edit").validate();      
</script>