<?php


class LoginController extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("session");
        $this->load->model("model");
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $username = $this->input->post('korisnickoIme');
        $password = $this->input->post('lozinka');
        $data = $this->model->login($username,$password);
        $adminData = $this->model->adminLogin($username,$password);
        
        if(($data == null)&&($adminData == null))
        {
            $niz = array(
              "title" => "Welcome",
                "page" => "welcome_message",
                "poruke" => "Pogresno Korisnicko Ime ili Lozinka"
            );
            $this->load->view('templates/page',$niz);
        }
        else
        {
            if($data != null && $data[0]->statusValidnosti == "DA")
            {
                $this->session->set_userdata('korisnickoIme',$username);
                $this->session->set_userdata('idKorisnika',$data[0]->idKorisnika);
                redirect("SviRecepti");
               
            }
            else
                if($adminData != null)
                {
                    
                    $sviKorisnici = $this->model->dohvatiSveKorisnike();
                    $arr = array(
                    "title" => "AdminSviKorisnici",
                    "page" => "adminSviKorisnici",
                     "data" => $sviKorisnici

                    );
                    $this->load->view("templates/pageAdmin",$arr);
                }
                else
                {
                    $niz = array(
                    "title" => "Welcome",
                    "page" => "welcome_message",
                    "poruke" => "Korisnicki nalog obrisan usled krsenja pravilnika sajta"
                    );
                    $this->load->view('templates/page',$niz);
                }
        }
    }
    
    
}
?>
