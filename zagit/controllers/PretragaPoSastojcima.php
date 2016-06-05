<?php
class PretragaPoSastojcima extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model("model");
        $this->load->helper('url');
        $this->load->library("form_validation");
    }
   
    public function index()
    {
        //$brJedan = 1;
        $meso = $this->model->dohvatiSastojakPoIDKategoriji(1);
        $mlecniproizvodi = $this->model->dohvatiSastojakPoIDKategoriji(2);
        $riba = $this->model->dohvatiSastojakPoIDKategoriji(3);
        $vocepovrce = $this->model->dohvatiSastojakPoIDKategoriji(4);
        $zacini = $this->model->dohvatiSastojakPoIDKategoriji(5);
        $ostalo = $this->model->dohvatiSastojakPoIDKategoriji(6);
        $arr = array(
            "title" => " ",
            "page" => "pretraga",
            "meso" => $meso,
            "mlecniproizvodi" => $mlecniproizvodi,
            "riba" => $riba,
            "vocepovrce" => $vocepovrce,
            "zacini" => $zacini,
            "ostalo" => $ostalo
        );
        $this->load->view("templates/page",$arr);
    }
    
    public function pretraga()
    {
        $mesoSastojci = $this->input->post('meso');
        $mlecniproizvodiSastojci = $this->input->post('mlecniproizvodi');
        $ribaSastojci = $this->input->post('riba');
        $vocepovrceSastojci = $this->input->post('vocepovrce');
        $zaciniSastojci = $this->input->post('zacini');
        $ostaloSastojci = $this->input->post('ostalo');
        
        $arr = array(
            "title" => "PretragaSastojciRecept",
            "page" => "receptiSaSastojcima",
            "meso" => $mesoSastojci/*,
            "mlecniproizvodi" => $mlecniproizvodiSastojci,
            "riba" => $ribaSastojci,
            "vocepovrce" => $vocepovrceSastojci,
            "zacini" => $zaciniSastojci,
            "ostalo" => $ostaloSastojci*/
            
        );
        $this->load->view("templates/page", $arr);
    }
}
