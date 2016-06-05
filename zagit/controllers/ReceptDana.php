<?php
class ReceptDana extends CI_Controller
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
        
        $data = $this->model->receptDana();
        
        $arr = array(
                    "title" => "Recept Dana",
                    "page" => "razvrstavanjeRecepata",
                     "data" => $data
                );
         $this->load->view("templates/page",$arr);
    }

     
}
?>

