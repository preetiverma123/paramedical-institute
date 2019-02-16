<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Competition_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_competition_results_list(){
        
        
        
           
        $this->db->select('*');
        $this->db->from('competition_results');
       
       
        return $this->db->get()->result();
    }
    
    public function get_single_competition_result($id){
        
        $this->db->select('S.*');
        $this->db->from('competition_results as S');
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
