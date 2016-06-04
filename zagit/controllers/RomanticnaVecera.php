<?php

class RomanticnaVecera extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("model");
        $this->load->library("session");
        $this->load->helper("url");
        $this->load->library("form_validation");
        $this->load->helper("security");
    }
    
    public function index() {
        echo $this->session->flashdata("recepti");
        $data = $this->model->dohvatiReceptePoVrsti("Romantična večera");
        $arr = array(
            "title" => " ",
            "page" => "razvrstavanjeRecepata",
            "data" => $data
        );
        $this->load->view("templates/page", $arr);
    }

     
}
?>
