<?php

class NapisiRecept extends CI_Controller {

function __construct() {
parent::__construct();
$this->load->model('model');
$this->load->helper('url');
$this->load->helper('form');
$this->load->library('session');
}
public function index() {
   

    $vrste = $this->model->dohvatiSveKategorijeRecepata();
//Loading View
    $arr = array(
               "title" => " ",
               "page" => "napisiRecept",
               "vrsteRecepta" => $vrste
           );
    $this->load->view("templates/page", $arr);

}
public function upload()
{
    $config['upload_path'] = 'assets/uploads';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 60;
    $config['max_width'] = 1024;
    $config['max_height'] = 768;
    
    $this->load->library('upload',$config);
    if(! $this->upload->do_upload('slika'))
    {
        //$error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('imgMSG', '<div class ="alert alert-danger text-center">Neuspesan upload</div>');
        $vrste = $this->model->dohvatiSveKategorijeRecepata();
//Loading View
            redirect('NapisiRecept');
    }
    else
        {
            $this->session->set_flashdata('imgMSG','<div class ="alert alert-success text-center">Uspesan upload</div>');
            $data = array('upload_data' => $this->upload->data());
            $vrste = $this->model->dohvatiSveKategorijeRecepata();
//Loading View
            redirect('NapisiRecept');
        }
}

}



?>