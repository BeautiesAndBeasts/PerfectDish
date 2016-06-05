<?php


class adminController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("model");
        $this->load->helper(array('form','url','security'));
        $this->load->library(array('session', 'form_validation', 'email'));
    }
    
     public function index()
    {
        $this->form_validation->set_rules('korisnickoIme', 'Korisnicko Ime', 'trim|required|min_length[4]|xss_clean|callback_jedinstvenoKorisnickoIme');
        $this->form_validation->set_rules('lozinka', 'Lozinka', 'required|min_length[4]');
        $this->form_validation->set_rules('potvrdiLozinka', 'Potvrda Lozinke', 'required|callback_proveriLozinku');
        $this->form_validation->set_rules('ime', 'Ime', 'trim|required|min_length[1]');
        $this->form_validation->set_rules('prezime', 'Prezime', 'trim|required|min_length[1]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        
        
        if($this->form_validation->run() == FALSE)
        {
            $arr = array(
                        "title" => "DodajAdmina", 
                        "page" => "dodajAdmina"
                    );
            $this->load->view('templates/pageAdmin',$arr);
        }
        else
        {
            
            
            
            $this->model->registrujAdmina();
            $this->session->set_flashdata('regMSG','<div class="alert alert-success text-center">Uspesno je kreiran novi administrator</div>');
            redirect("adminController","refresh");
            /* $arr = array(
                        "title" => "DodajAdmina", 
                        "page" => "dodajAdmina",
                        
                    );
            $this->load->view('templates/pageAdmin',$arr);*/
        }
    }
    
    function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/",$str))
        {
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    function proveriLozinku()
    {
        $loz = $this->input->post('lozinka');
        $pot = $this->input->post('potvrdiLozinka');
        if(strcmp($loz,$pot) == 0)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('proveriLozinku','The %s field is not match with password field');
            return FALSE;
        }
    }
    
    function jedinstvenoKorisnickoIme($kime)
    {
        $provera = $this->model->jedinstvenoAdminIme($kime);
        if($provera == null)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('jedinstvenoKorisnickoIme','The %s korisnickoIme has been taken');
            return FALSE;
        }
    }
    
    public function Detalji($id)
    {
        $data = $this->model->dohvatiKorisnikaPoID($id);
        $recepti = null;
        foreach ($data as $row)
        {
            $recepti = $this->model->dohvatiSveRecepteKorisnika($row->idKorisnika);
        }
        $arr = array(
                        "title" => "AdminKorisnikDetalji", 
                        "page" => "AdminKorisnikDetalji",
                        "data" => $data,
                        "recepti" => $recepti
                    );
        $this->load->view('templates/pageAdmin',$arr);
    }
    
    public function ObrisiKorisnika($id){
        $this->model->obrisiKorisnika($id);
        $sviKorisnici = $this->model->dohvatiSveKorisnike();
        $arr = array(
                        "title" => "AdminSviKorisnici", 
                        "page" => "adminSviKorisnici",
                        "data" => $sviKorisnici
                        
                    );
        $this->load->view('templates/pageAdmin',$arr);
    }
    
}
?>
