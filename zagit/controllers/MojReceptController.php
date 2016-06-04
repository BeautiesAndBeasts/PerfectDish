<?php


class MojReceptController extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
         $this->load->helper("url");
        $this->load->library("session");
        $this->load->model("model");
    }
    
    public function index()
    {
        $userID = $this->session->userdata('idKorisnika');
        $data = $this->model->dohvatiSvojeRecepte($userID);
        $arr = array(
                    "title" => "Moji Recepti",
                    "page" => "mojirecepti",
                     "data" => $data
                );
         $this->load->view("templates/page",$arr);
    }
    
    public function obrisiRecept($id)
    {
        $this->model->brisiRecept($id);
        redirect("MojReceptController/index");
    }
}
?>