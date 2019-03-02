<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Web.php**********************************
 * @product name    : Global School Management System Pro
 * @type            : Class
 * @class name      : Web
 * @description     : Manage frontend website.  
 * @author          : Codetroopers Team     
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com   
 * @copyright       : Codetroopers Team     
 * ********************************************************** */

class Web extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Web_Model', 'web', true);        
        $this->data['settings'] = $this->web->get_single('settings', array('status' => 1));
        $this->data['about'] = $this->web->get_single('pages', array('status' => 1, 'page_slug'=>'about-us'), '', '', '', 'id', 'ASC');
        $this->data['theme'] = $this->web->get_single('themes', array('is_active' => 1));
        $this->data['sliders'] = $this->web->get_list('sliders', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['director_message'] = $this->web->get_single('pages', array('status' => 1, 'page_slug'=>'director-message'), '', '', '', 'id', 'ASC');

        $this->data['executive_message'] = $this->web->get_single('pages', array('status' => 1, 'page_slug'=>'executive-message'), '', '', '', 'id', 'ASC');

        $this->data['notices'] = $this->web->get_notice_list(3);
        $this->data['events'] = $this->web->get_event_list(3);
        $this->data['teachers'] = $this->web->get_teacher_list();
        $this->data['galleries'] = $this->web->get_list('galleries', array('status'=>1, 'is_view_on_web'=>1), '', '', '', 'id', 'DESC');
        $this->data['courses'] = $this->web->get_list('courses', array('status' => 1), '', '', '', 'id', 'ASC');
        $query = $this->db->query("SELECT * from competition_results");
        $results= $query->result();
            

    
        $this->data['results'] = $results;
        ///StudentsCount
        $this->db->select('*');
        $this->db->from('students');
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $students = $query->row_array();

            
        }
        $this->data['students'] = $students;

        ////Subjects Count
        $this->db->select('*');
        $this->db->from('sections');
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $sections = $query->row_array();

            
        }
        $this->data['sections'] = $sections;

        ////Employees Count
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $employees = $query->row_array();

            
        }
        $this->data['employees'] = $employees;
    }

    
    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Frontend home page" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {

        $this->data['sliders'] = $this->web->get_list('sliders', array('status' => 1), '', '', '', 'id', 'ASC');

        $this->data['director_message'] = $this->web->get_single('pages', array('status' => 1, 'page_slug'=>'director-message'), '', '', '', 'id', 'ASC');

        $this->data['executive_message'] = $this->web->get_single('pages', array('status' => 1, 'page_slug'=>'executive-message'), '', '', '', 'id', 'ASC');

        $this->data['notices'] = $this->web->get_notice_list(3);
        $this->data['events'] = $this->web->get_event_list(3);
        $this->data['teachers'] = $this->web->get_teacher_list();
        $this->data['galleries'] = $this->web->get_list('galleries', array('status'=>1, 'is_view_on_web'=>1), '', '', '', 'id', 'DESC');
        $this->data['reviews'] = $this->web->get_list('reviews', array('status' => 1), '', '', '', 'id', 'ASC');

        ///StudentsCount
        $this->db->select('*');
        $this->db->from('students');
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $students = $query->row_array();

            
        }
        $this->data['students'] = $students;

        ////Subjects Count
        $this->db->select('*');
        $this->db->from('sections');
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $sections = $query->row_array();

            
        }
        $this->data['sections'] = $sections;

        ////Employees Count
        $this->db->select('*');
        $this->db->from('employees');
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $employees = $query->row_array();

            
        }
        $this->data['employees'] = $employees;

        ////List
        $this->data['list'] = TRUE;


        $this->layout->title($this->lang->line('home') . ' | ' . SMS);

        $this->layout->view('index', $this->data);
    }
    
    
    /*****************Function news**********************************
    * @type            : Function
    * @function name   : news
    * @description     : Load "news listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function news() {

        $this->data['news_list'] = $this->web->get_list('news', array('status'=>1), '', '', '', 'id', 'DESC'); 
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('news') . ' | ' . SMS);
        $this->layout->view('news', $this->data);
    }

    public function competition_results($type) {

        $query = $this->db->query("SELECT * from competition_results where achiever_type = '".$type."'");
        $results= $query->result();
            

    
        $this->data['results'] = $results;
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('results') . ' | ' . SMS);
        $this->layout->view('competition_results', $this->data);
    }
    
    /*****************Function news**********************************
    * @type            : Function
    * @function name   : news
    * @description     : Load "news detail" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function news_detail($id) {

        $this->data['news'] = $this->web->get_single('news', array('id'=>$id)); 
        $this->data['news_list'] = $this->web->get_list('news', array('status'=>1), '', '10', '', 'id', 'DESC'); 
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('news') . ' | ' . SMS);
        $this->layout->view('news_detail', $this->data);
    }
    
    
    
    /*****************Function notice**********************************
    * @type            : Function
    * @function name   : notice
    * @description     : Load "notice listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function notice() {

        $this->data['notices'] = $this->web->get_notice_list(50);
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('notice') . ' | ' . SMS);
        $this->layout->view('notice', $this->data);
    }
    
    /*****************Function notice_detail**********************************
    * @type            : Function
    * @function name   : notice_detail
    * @description     : Load "notice_detail" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function notice_detail($id) {

        $this->data['notice'] = $this->web->get_single_notice($id);
        $this->data['notices'] = $this->web->get_notice_list(10);
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('notice') . ' | ' . SMS);
        $this->layout->view('notice_detail', $this->data);
    }
    
    
    /*****************Function holiday**********************************
    * @type            : Function
    * @function name   : holiday
    * @description     : Load "holiday listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function holiday() {

        $this->data['holidays'] = $this->web->get_list('holidays', array('status'=>1), '', '', '', 'id', 'DESC');
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('holiday') . ' | ' . SMS);
        $this->layout->view('holiday', $this->data);
    }
    
    /*****************Function holiday_detail**********************************
    * @type            : Function
    * @function name   : holiday_detail
    * @description     : Load "holiday_detail" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function holiday_detail($id) {

        $this->data['holiday'] = $this->web->get_single('holidays', array('id'=>$id));
        $this->data['holidays'] = $this->web->get_list('holidays', array('status'=>1), '', '10', '', 'id', 'DESC');
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('holiday') . ' | ' . SMS);
        $this->layout->view('holiday_detail', $this->data);
    }
    
    /*****************Function event**********************************
    * @type            : Function
    * @function name   : event
    * @description     : Load "event listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function events() {

        $this->data['events'] = $this->web->get_event_list(50);
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('event') . ' | ' . SMS);
        $this->layout->view('event', $this->data);
    }
    
    /*****************Function event_detail**********************************
    * @type            : Function
    * @function name   : event_detail
    * @description     : Load "event_detail" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function event_detail($id){

        $this->data['event'] = $this->web->get_single_event($id);
        $this->data['events'] = $this->web->get_event_list(10);
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('event') . ' | ' . SMS);
        $this->layout->view('event_detail', $this->data);
    }
    
    
    
    /*****************Function gallery**********************************
    * @type            : Function
    * @function name   : gallery
    * @description     : Load "gallery listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function galleries() {

        $this->data['galleries'] = $this->web->get_list('galleries', array('status'=>1, 'is_view_on_web'=>1), '', '', '', 'id', 'DESC');
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('media_gallery') . ' | ' . SMS);
        $this->layout->view('gallery', $this->data);
    }
    
    /*****************Function gallery_image**********************************
    * @type            : Function
    * @function name   : gallery_image
    * @description     : Load "gallery_image " user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function gallery_image($id) {

        $this->data['gallery'] = $this->web->get_single('galleries', array('id'=>$id, 'is_view_on_web'=>1));
        $this->data['images'] = $this->web->get_image_list($id);
         $this->data['galleries'] = $this->web->get_list('galleries', array('status'=>1), '', '10', '', 'id', 'DESC');
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('media_gallery') . ' | ' . SMS);
        $this->layout->view('gallery_image', $this->data);
    }
    
    /*****************Function teacher**********************************
    * @type            : Function
    * @function name   : teacher
    * @description     : Load "teacher listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function teachers() {

        $this->data['teachers'] = $this->web->get_teacher_list();
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('teacher') . ' | ' . SMS);
        $this->layout->view('teacher', $this->data);
    }
    
    
    /*****************Function staff**********************************
    * @type            : Function
    * @function name   : staff
    * @description     : Load "staff listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function staff() {

        $this->data['employees'] = $this->web->get_employee_list();
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('staff') . ' | ' . SMS);
        $this->layout->view('staff', $this->data);
    }
    
    
    /*****************Function privacy**********************************
    * @type            : Function
    * @function name   : privacy
    * @description     : Load "privacy" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function privacy() {

        $this->data['privacy'] = $this->web->get_single('pages', array('status' => 1, 'page_slug'=>'privacy-policy'), '', '', '', 'id', 'ASC');
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('privacy_policy') . ' | ' . SMS);
        $this->layout->view('privacy', $this->data);
    }
    
    
    /*****************Function terms**********************************
    * @type            : Function
    * @function name   : terms
    * @description     : Load "Terms & Conditions" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function terms() {

        $this->data['terms'] = $this->web->get_single('pages', array('status' => 1, 'page_slug'=>'terms-conditions'), '', '', '', 'id', 'ASC');
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('terms_and_condition') . ' | ' . SMS);
        $this->layout->view('terms', $this->data);
    }

    public function courses($id) {

       $this->data['courseDetails'] = $this->web->get_single('courses', array('status' => 1, 'id'=>$id), '', '', '', 'id', 'ASC');
        $this->data['list'] = TRUE;
        $this->layout->title('course' . ' | ' . SMS);
        $this->layout->view('course', $this->data);
    }
    
    public function apply() {

        $query = $this->db->query("SELECT * from courses");
        $courses= $query->result();
            

    
        $this->data['courses'] = $courses;
        $this->data['list'] = TRUE;
        $this->layout->title('apply-online' . ' | ' . SMS);
        $this->layout->view('apply-online', $this->data);
    }

     public function addApplication() {

      // $this->load->model('Career_Model', 'career', true);

        if ($_POST) {
            $this->_prepare_apply_validation();

            if ($this->form_validation->run() === TRUE) {
               
                $items = array();
                $items[] = 'name';
                $items[] = 'fathers_name';
                $items[] = 'email';
                $items[] = 'phone';
                $items[] = 'course';

                $data = elements($items, $_POST);
               
             

                $insert_id = $this->db->insert('applications', $data);
                if ($insert_id) {

                    $courseDetails = $this->web->get_single('courses', array('status' => 1,'id'=>$data['course']));

                    $email = 'iamansoni080@gmail.com';
                    $subject = "Online Application Submission: Origin Career Institute";
                    $message="Name:".$data['name']." <br><br>;Father's Name:".$data['fathers_name']." <br><br>;Phone:".$data['phone']." <br><br>;Email:".$data['email']." <br><br>;Email:".$courseDetails->name;
                    $attachment = NULL;

                    $this->sendEmail($email,$subject,$message,$attachment);
                    success($this->lang->line('insert_success'));
                    redirect(site_url());
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect(site_url());
                }
            } else {

                $this->data['post'] = $_POST;
               
            }

        }
     
       
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('career') . ' | ' . SMS);
        $this->layout->view('index', $this->data);
    }
    /*****************Function About**********************************
    * @type            : Function
    * @function name   : About
    * @description     : Load "About Us" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function about($slug) {
        
       /* $this->data['mdmessage'] = $this->web->get_single('pages', array('status' => 1, 'page_slug'=>'md-message'), '', '', '', 'id', 'ASC');
        
        $this->data['principal_message'] = $this->web->get_single('pages', array('status' => 1, 'page_slug'=>'principal-message'), '', '', '', 'id', 'ASC');*/

         $this->data['about'] = $this->web->get_single('pages', array('status' => 1, 'page_slug'=>$slug), '', '', '', 'id', 'ASC');

        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('about_us') . ' ' . $this->lang->line('school'). ' | ' . SMS);
        $this->layout->view('about', $this->data);
    }
    
    /*****************Function admission**********************************
    * @type            : Function
    * @function name   : admission
    * @description     : Load "admission" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function admission() {
        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('admission_form') . ' | ' . SMS);
        $this->layout->view('admission', $this->data);
    }
    
    
    /*****************Function contact**********************************
    * @type            : Function
    * @function name   : contact
    * @description     : Load "contact" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function contact() {

        if($_POST){
            if($this->_send_email()){
                $this->session->set_flashdata('success', $this->lang->line('email_send_success'));
            }else{
                 $this->session->set_flashdata('error', $this->lang->line('email_send_failed'));
            }
        }
        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('contact_us') . ' | ' . SMS);
        $this->layout->view('contact', $this->data);
    }

     public function addCareer() {

      // $this->load->model('Career_Model', 'career', true);

        if ($_POST) {

            if ($_FILES['resume']['name']) {
                $data['resume'] = $this->_upload_resume();

            }
            $this->_prepare_career_validation();

            if ($this->form_validation->run() === TRUE) {
               
                $items = array();
                $items[] = 'name';
                $items[] = 'email';
                $items[] = 'phone';
                /*$items[] = 'resume';*/

                $data = elements($items, $_POST);
              
                if ($_FILES['resume']['name']) {
                    $data['resume'] = $this->_upload_resume();
                }


                $insert_id = $this->db->insert('career', $data);
                if ($insert_id) {

                    $email = 'iamansoni080@gmail.com';
                    $subject = "Career Submission: Origin Career Institute";
                    $message="Name:".$data['name']." <br><br>;Phone:".$data['phone']." <br><br>;Email:".$data['email'];
                    $attachment = $data['resume'];

                    $this->sendEmail($email,$subject,$message,$attachment);

                    success($this->lang->line('insert_success'));
                    redirect(site_url());
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect(site_url());
                }
            } else {

                $this->data['post'] = $_POST;
               
            }

        }
     
       
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('career') . ' | ' . SMS);
        $this->layout->view('index', $this->data);
    }
    
        /*     * ***************Function _send_email**********************************
     * @type            : Function
     * @function name   : _send_email
     * @description     : this function used to send recover forgot password email 
     * @param           : $data array(); 
     * @return          : null 
     * ********************************************************** */

        private function _upload_resume() {

        
        $resume = $_FILES['resume']['name'];
        $resume_type = $_FILES['resume']['type'];
        $return_resume = '';

        if ($resume != "") {
            if ($resume_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
                    $resume_type == 'application/msword' || $resume_type == 'text/plain' ||
                    $resume_type == 'application/vnd.ms-office' || $resume_type == 'application/pdf') {

                $destination = 'assets/uploads/resume/';

                $resume_type = explode(".", $resume);
                $extension = strtolower($resume_type[count($resume_type) - 1]);
                $resume_path = 'resume-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['resume']['tmp_name'], $destination . $resume_path);

                // need to unlink previous resume
              
                $return_resume = $resume_path;
            }
        
        }
        return $return_resume;
    }


    
        public function sendEmail($email,$subject,$message,$attachment)
            {
            $setting = $this->web->get_single('settings', array('status' => 1));

            $config = Array(
              'protocol' => 'smtp',
              'smtp_host' => 'ssl://smtp.googlemail.com',
              'smtp_port' => 465,
              'smtp_user' => $setting->email, 
              'smtp_pass' => $setting->email_password, 
              'mailtype' => 'html',
              'charset' => 'iso-8859-1',
              'wordwrap' => TRUE
            );


            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($setting->email);
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);
            if(!empty($attachment)){

                $this->email->attach(site_url().'/assets/uploads/resume/'.$attachment);
            }
            if($this->email->send())
                {
                    echo 'Email send.';
                }
            else
                {
                    show_error($this->email->print_debugger());
                }

        }

    private function _send_email() {

        $this->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        $setting = $this->web->get_single('settings', array('status' => 1));

        $this->email->from($this->input->post('email'), $this->input->post('first_name'));
        $this->email->to($setting->email);
        //$this->email->to('yousuf361@gmail.com');
        $this->email->subject($setting->school_name . ': Contact email from visitor');       

        $message = 'Contact mail from ' . $setting->school_name . ' website.<br/>';          
        $message .= '<br/><br/>';
        $message .= 'First Name: ' . $this->input->post('first_name');
        $message .= '<br/><br/>';
        $message .= 'Last Name: ' . $this->input->post('last_name');
        $message .= '<br/><br/>';
        $message .= 'Email Name: ' . $this->input->post('email');
        $message .= '<br/><br/>';
        $message .= 'Phone: ' . $this->input->post('phone');
        $message .= '<br/><br/>';
        $message .= 'Comment: ' . $this->input->post('comment');
        $message .= '<br/><br/>';
        $message .= 'Thank you<br/>';
        $message .= $this->input->post('first_name');

        $this->email->message($message);
        if($this->email->send()){
            return TRUE;
        } else {
            return FALSE;
        }
    }

     private function _prepare_career_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required');
        $this->form_validation->set_rules('phone', $this->lang->line('phone'), 'trim|required');
        $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|required|valid_email');
//|callback_email,|callback_resume
        /*$this->form_validation->set_rules('resume', $this->lang->line('resume'), 'trim|required');*/

    }

     private function _prepare_apply_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required');
         $this->form_validation->set_rules('fathers_name','Fathers name', 'trim|required');
        
        $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|valid_email');
        $this->form_validation->set_rules('phone', $this->lang->line('phone'), 'trim|required');
//|callback_email,|callback_resume
        $this->form_validation->set_rules('course', 'course', 'trim|required');

    }
}
