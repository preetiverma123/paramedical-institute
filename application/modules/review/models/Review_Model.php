<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Review_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_review_list(){
        
        
        
           
        $this->db->select('*');
        $this->db->from('reviews');
       
       
        return $this->db->get()->result();
    }
    
    public function get_single_review($id){
        
        $this->db->select('S.*');
        $this->db->from('reviews as S');
        $this->db->where('S.id', $id);
        return $this->db->get()->row();
        
    }
    
    function duplicate_check($email, $id = null) {

        if ($id) {
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('email', $email);
        return $this->db->get('users')->num_rows();
    }
}
