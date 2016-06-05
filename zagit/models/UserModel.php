<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author goran
 */
class UserModel extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function login($username, $password)
    {
        
        $this->db->where('korisnickoIme', $username);
        $this->db->where('lozinka', $password);
        $this->db->limit(1);
        
         $query = $this -> db -> get("registrovanikorisnik");
        
        if($query->num_rows() == 1)
        {
            return $query->result();
         
        }
        else
        {
            return false;
        }
    }
}
?>