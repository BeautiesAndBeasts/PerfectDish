<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AllUsersController
 *
 * @author goran
 */
class AllUsersController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
         $this->load->helper("url");
        
        $this->load->model("model");
        
    }
    
    public function index(){
                    $sviKorisnici = $this->model->dohvatiSveKorisnike();
                    $arr = array(
                    "title" => "AdminSviKorisnici",
                    "page" => "adminSviKorisnici",
                     "data" => $sviKorisnici

                    );
                    $this->load->view("templates/pageAdmin",$arr);
    }
}
?>
