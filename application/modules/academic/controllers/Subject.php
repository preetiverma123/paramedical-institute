<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Subject.php**********************************
 * @product name    : Global School Management System Pro
 * @type            : Class
 * @class name      : Subject
 * @description     : Manage academic subject for each academic class.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Subject extends MY_Controller {

    public $data = array();
    
    
    function __construct() {
        parent::__construct();
  
         $this->load->model('Subject_Model', 'subject', true);         
    }

    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Class Subject List" user interface                 
    *                    with class wise listing    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function index($class_id = null) {
        
        check_permission(VIEW);
        
         if(isset($class_id) && !is_numeric($class_id)){
            error($this->lang->line('unexpected_error'));
            redirect('academic/subject/index');    
        }
        
        $this->data['class_id'] = $class_id;
        $this->data['subjects'] = $this->subject->get_subject_list($class_id);        
        $this->data['classes'] = $this->subject->get_list('classes', array('status' => 1), '','', '', 'id', 'ASC');
        $this->data['teachers'] = $this->subject->get_list('teachers', array('status' => 1), '','', '', 'id', 'ASC');
         
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_subject'). ' | ' . SMS);
        $this->layout->view('subject/index', $this->data); 
    }

    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Subject" user interface                 
    *                    and process to store "Subject" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);
        
        if ($_POST) {
            $this->_prepare_subject_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_subject_data();

                $insert_id = $this->subject->insert('subjects', $data);
                if ($insert_id) {
                    success($this->lang->line('insert_success'));
                    redirect('academic/subject/index/'.$data['class_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('academic/subject/add/'.$data['class_id']);
                }
            } else {
                $this->data['post'] = $_POST;
            }
        }

        $class_id = $this->uri->segment(4);
        if(!$class_id){
          $class_id = $this->input->post('class_id');
        }
        
        $this->data['class_id'] = $class_id;
        $this->data['subjects'] = $this->subject->get_subject_list($class_id);        
        $this->data['classes'] = $this->subject->get_list('classes', array('status' => 1), '','', '', 'id', 'ASC');
        $this->data['teachers'] = $this->subject->get_list('teachers', array('status' => 1), '','', '', 'id', 'ASC');
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add'). ' ' . $this->lang->line('subject'). ' | ' . SMS);
        $this->layout->view('subject/index', $this->data);
    }

    
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Subject" user interface                 
    *                    with populate "Subject" value 
    *                    and process to update "Subject" into database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {       
       
        check_permission(EDIT);
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('academic/subject/index');     
        }
        
        if ($_POST) {
            $this->_prepare_subject_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_subject_data();
                $updated = $this->subject->update('subjects', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    success($this->lang->line('update_success'));
                    redirect('academic/subject/index/'.$data['class_id']);                   
                } else {
                    error($this->lang->line('updtae_failed'));
                    redirect('academic/subject/edit/' . $this->input->post('id'));
                }
            } else {
                 $this->data['subject'] = $this->subject->get_single('subjects', array('id' =>  $this->input->post('id')));
            }
        }
        
        if ($id) {
            $this->data['subject'] = $this->subject->get_single('subjects', array('id' => $id));

            if (!$this->data['subject']) {
                 redirect('academic/subject/index');      
            }
        }
        
        
        $class_id = $this->data['subject']->class_id;
        if(!$class_id){
          $class_id = $this->input->post('class_id');
        } 
        
        $this->data['class_id'] = $class_id;
        $this->data['subjects'] = $this->subject->get_subject_list($class_id);        
        $this->data['classes'] = $this->subject->get_list('classes', array('status' => 1), '','', '', 'id', 'ASC');
        $this->data['teachers'] = $this->subject->get_list('teachers', array('status' => 1), '','', '', 'id', 'ASC');
        
        $this->data['edit'] = TRUE;       
        $this->layout->title($this->lang->line('edit'). ' ' . $this->lang->line('subject'). ' | ' . SMS);
        $this->layout->view('subject/index', $this->data);
    }
    
    
    
    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific subject data                 
    *                       
    * @param           : $subject_id integer value
    * @return          : null 
    * ********************************************************** */
    public function view($subject_id = null){
        
        check_permission(VIEW);
        
        if(!is_numeric($subject_id)){
             error($this->lang->line('unexpected_error'));
             redirect('academic/subject/index');    
        }
        
        $this->data['subject'] = $this->subject->get_single_subject($subject_id);
        $class_id = $this->data['subject']->class_id;
        
        $this->data['subjects'] = $this->subject->get_subject_list($class_id);        
        $this->data['classes'] = $this->subject->get_list('classes', array('status' => 1), '','', '', 'id', 'ASC');
        $this->data['teachers'] = $this->subject->get_list('teachers', array('status' => 1), '','', '', 'id', 'ASC');
        $this->data['class_id'] = $class_id;
         
        $this->data['detail'] = TRUE;       
        $this->layout->title($this->lang->line('view'). ' ' . $this->lang->line('subject'). ' | ' . SMS);
        $this->layout->view('subject/index', $this->data);
    }

    
    /*****************Function _prepare_subject_validation**********************************
    * @type            : Function
    * @function name   : _prepare_subject_validation
    * @description     : Process "subject" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_subject_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
        
        $this->form_validation->set_rules('teacher_id', $this->lang->line('teacher'), 'trim|required');   
        $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required');   
        $this->form_validation->set_rules('type', $this->lang->line('type'), 'trim');   
        $this->form_validation->set_rules('code', $this->lang->line('subject') . ' ' . $this->lang->line('code'), 'trim');   
        $this->form_validation->set_rules('author', $this->lang->line('author'), 'trim');   
        $this->form_validation->set_rules('pass_mark', $this->lang->line('pass_mark'), 'trim');   
        $this->form_validation->set_rules('full_mark', $this->lang->line('full_mark'), 'trim');   
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');   
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'required|trim|callback_name');
    }
    
    
    /*****************Function name**********************************
    * @type            : Function
    * @function name   : name
    * @description     : Unique check for "subject name" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */  
   public function name()
   {             
      if($this->input->post('id') == '')
      {   
          $subject = $this->subject->duplicate_on_create($this->input->post('class_id'),$this->input->post('name')); 
          if($subject){
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));         
                return FALSE;
          } else {
              return TRUE;
          }          
      }else if($this->input->post('id') != ''){   
         $subject = $this->subject->duplicate_on_update($this->input->post('id'), $this->input->post('class_id'),$this->input->post('name')); 
          if($subject){
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));         
                return FALSE;
          } else {
              return TRUE;
          }
      }else{
          return TRUE;
      }      
   }
   
   
    /*****************Function _get_posted_subject_data**********************************
    * @type            : Function
    * @function name   : _get_posted_subject_data
    * @description     : Prepare "Subject" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_subject_data() {

        $items = array();
        $items[] = 'class_id';
        $items[] = 'teacher_id';
        $items[] = 'type';
        $items[] = 'code';
        $items[] = 'author';
        $items[] = 'pass_mark';
        $items[] = 'full_mark';
        $items[] = 'name';
        $items[] = 'note';
        $data = elements($items, $_POST);        
        
        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();                       
        }

        return $data;
    }

    
    
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Subject" data from database                  
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null) {
        
        check_permission(DELETE);
        
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('academic/subject/index');    
        }
        
        $subject = $this->subject->get_single('subjects', array('id' => $id));
        
        if ($this->subject->delete('subjects', array('id' => $id))) {            
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('academic/subject/index/'.$subject->class_id);
        
    }
}
