<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PretragaController
 *
 * @author goran
 */
class PretragaController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model("model");
        $this->load->helper('url');
        $this->load->library("form_validation");
    }
    
    public function index() {
        
        $id = $this->input->post('meso');
        $mesoSastojci = $this->model->dohvatiReceptePoSastojku($id);
      
        
        $arr = array(
            "title" => "PretragaSastojciRecept",
            "page" => "receptiSaSastojcima",
            "meso" => $mesoSastojci
        );
        $this->load->view("templates/page", $arr);
    }
    //put your code here
}
?>
