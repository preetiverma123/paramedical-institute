<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Student.php**********************************
 * @product name    : Global School Management System Pro
 * @type            : Class
 * @class name      : Student
 * @description     : Manage students imformation of the school.  
 * @author          : Codetroopers Team     
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com   
 * @copyright       : Codetroopers Team     
 * ********************************************************** */

class Competition extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();      
        
        $this->load->model('Competition_Model', 'competition_result', true);
        // check running session
        if(!$this->academic_year_id){
            error($this->lang->line('academic_year_setting'));
            redirect('setting');
        }         
    }

    
    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Student List" user interface                 
    *                    with class wise listing    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function index() {

       check_permission(VIEW);
        $this->data['competition_results'] = $this->competition_result->get_competition_results_list();
      
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_competition_results') . ' | ' . SMS);
        $this->layout->view('competition/index', $this->data);
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Student" user interface                 
    *                    and process to store "Student" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

     
        check_permission(ADD);
        if ($_POST) {
            $this->_prepare_course_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_course_data();

                $insert_id = $this->competition_result->insert('competition_results', $data);

                if ($insert_id) {
                    /*$this->__insert_enrollment($insert_id);*/
                    success($this->lang->line('insert_success'));
                    redirect('competition/index/');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('competition/add/');
                }
            } else {

                $this->data['post'] = $_POST;
            }
        }
        
        
        
        $this->data['competition_results'] = $this->competition_result->get_competition_results_list();
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('course') . ' | ' . SMS);
        $this->layout->view('competition', $this->data);
    }

        
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Student" user interface                 
    *                    with populate "Student" value 
    *                    and process to update "Student" into database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {

       check_permission(EDIT);

        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('competition/index');     
        }
        
        if ($_POST) {
            $this->_prepare_course_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_course_data();
                $updated = $this->competition_result->update('competition_results', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                   
                    success($this->lang->line('update_success'));
                    redirect('competition/index/');
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('competition/edit/' . $this->input->post('id'));
                }
            } else {
                $this->data['competition_result'] = $this->competition_result->get_single_competition_result($this->input->post('id'));
            }
        }

        if ($id) {
            $this->data['competition_result'] = $this->competition_result->get_single_competition_result($id);
           
            if (!$this->data['competition_result']) {
                redirect('competition/index');
            }
        }
        
        

        
        $this->data['competition_results'] = $this->competition_result->get_competition_results_list();
        
            
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' ' . $this->lang->line('competition_result') . ' | ' . SMS);
        $this->layout->view('competition/index', $this->data);
    }

        
    
    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific Student data                 
    *                       
    * @param           : $student_id integer value
    * @return          : null 
    * ********************************************************** */
    public function view($competition_result = null) {

       check_permission(VIEW);

        if(!is_numeric($competition_result)){
             error($this->lang->line('unexpected_error'));
              redirect('competition/index');
        }
        
        $this->data['competition_result'] = $this->competition_result->get_single_competition_result($competition_result);        
     
        
        
        $this->data['competition_results'] = $this->competition_result->get_competition_results_list();
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('view') . ' ' . $this->lang->line('competition_result') . ' | ' . SMS);
        $this->layout->view('competition/index', $this->data);
    }
    
        
    /*****************Function _prepare_student_validation**********************************
    * @type            : Function
    * @function name   : _prepare_student_validation
    * @description     : Process "Student" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_course_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

      

        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required');
        $this->form_validation->set_rules('achiever_type', $this->lang->line('type'), 'trim|required');
        $this->form_validation->set_rules('course', $this->lang->line('course'), 'trim|required');
        $this->form_validation->set_rules('year', $this->lang->line('year'), 'trim|required');
        $this->form_validation->set_rules('roll_no', $this->lang->line('roll_no'), 'trim|required');
        $this->form_validation->set_rules('rank', $this->lang->line('rank'), 'trim|required');
       
        $this->form_validation->set_rules('photo', $this->lang->line('photo'), 'trim|callback_photo');
    }
                        
    /*****************Function email**********************************
    * @type            : Function
    * @function name   : email
    * @description     : Unique check for "Student Email" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function email() {
        if ($this->input->post('id') == '') {
            $email = $this->student->duplicate_check($this->input->post('email'));
            if ($email) {
                $this->form_validation->set_message('email', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $email = $this->student->duplicate_check($this->input->post('email'), $this->input->post('id'));
            if ($email) {
                $this->form_validation->set_message('email', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
                
    /*****************Function photo**********************************
    * @type            : Function
    * @function name   : photo
    * @description     : validate student profile photo                 
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */
    public function photo() {
        if ($_FILES['photo']['name']) {
            $name = $_FILES['photo']['name'];
            $arr = explode('.', $name);
            $ext = end($arr);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('photo', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }

       
    /*****************Function _get_posted_student_data**********************************
    * @type            : Function
    * @function name   : _get_posted_student_data
    * @description     : Prepare "Student" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_course_data() {

        $items = array();

        $items[] = 'name';
        $items[] = 'course';
        $items[] = 'year';
        $items[] = 'roll_no';
        $items[] = 'rank';
        $items[] = 'achiever_type';
       

        $data = elements($items, $_POST);

        $data['created_at'] = date('Y-m-d H:i:s', strtotime($this->input->post('created_at')));

        if ($this->input->post('id')) {
            $data['created_at'] = date('Y-m-d H:i:s');
            /*$data['modified_by'] = logged_in_user_id();*/
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
/*            $data['created_by'] = logged_in_user_id();*/
            $data['status'] = 1;
            // create user 
           /* $data['user_id'] = $this->student->create_user();*/
        }

        if ($_FILES['photo']['name']) {
            $data['photo'] = $this->_upload_photo();
        }

        return $data;
    }

           
    /*****************Function _upload_photo**********************************
    * @type            : Function
    * @function name   : _upload_photo
    * @description     : process to upload student profile photo in the server                  
    *                     and return photo file name  
    * @param           : null
    * @return          : $return_photo string value 
    * ********************************************************** */
    private function _upload_photo() {

        $prev_photo = $this->input->post('prev_photo');
        $photo = $_FILES['photo']['name'];
        $photo_type = $_FILES['photo']['type'];
        $return_photo = '';
        if ($photo != "") {
            if ($photo_type == 'image/jpeg' || $photo_type == 'image/pjpeg' ||
                    $photo_type == 'image/jpg' || $photo_type == 'image/png' ||
                    $photo_type == 'image/x-png' || $photo_type == 'image/gif') {

                $destination = 'assets/uploads/competition_result-photo/';

                $file_type = explode(".", $photo);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $photo_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . $photo_path);

                // need to unlink previous photo
                if ($prev_photo != "") {
                    if (file_exists($destination . $prev_photo)) {
                        @unlink($destination . $prev_photo);
                    }
                }

                $return_photo = $photo_path;
            }
        } else {
            $return_photo = $prev_photo;
        }

        return $return_photo;
    }

        
    
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Student" data from database                  
    *                     also delete all relational data
    *                     and unlink student photo from server   
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null) {

        check_permission(DELETE);
        
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
              redirect('competition/index');
        }
        
        $competition_result = $this->competition_result->get_single('competition_results', array('id' => $id));
        if (!empty($competition_result)) {

            $this->competition_result->delete('competition_results', array('id' => $id));
            $destination = 'assets/uploads/';
            if (file_exists($destination . '/competition_result-photo/' . $competition_result->photo)) {
                @unlink($destination . '/competition_result-photo/' . $competition_result->photo);
            }

            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        
        redirect('competition/index/');
    }

        
    /*****************Function __insert_enrollment**********************************
    * @type            : Function
    * @function name   : __insert_enrollment
    * @description     : save student info to enrollment while create a new student                  
    * @param           : $insert_id integer value
    * @return          : null 
    * ********************************************************** */
    private function __insert_enrollment($insert_id) {
        $data = array();
        $data['student_id'] = $insert_id;
        $data['class_id'] = $this->input->post('class_id');
        $data['section_id'] = $this->input->post('section_id');
        $data['academic_year_id'] = $this->academic_year_id;
        $data['roll_no'] = $this->input->post('roll_no');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
        $data['status'] = 1;
        $this->db->insert('enrollments', $data);
    }

    /*****************Function __update_enrollment**********************************
    * @type            : Function
    * @function name   : __update_enrollment
    * @description     : update student info to enrollment while update a student                  
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function __update_enrollment() {

        $academic_year_id = $this->academic_year_id;

        $data = array();
        $data['section_id'] = $this->input->post('section_id');
        $data['roll_no'] = $this->input->post('roll_no');
        $data['modified_at'] = date('Y-m-d H:i:s');
        $data['modified_by'] = logged_in_user_id();

        $this->db->where('student_id', $this->input->post('id'));
        $this->db->where('academic_year_id', $academic_year_id);
        $this->db->update('enrollments', $data, array());
    }

}
