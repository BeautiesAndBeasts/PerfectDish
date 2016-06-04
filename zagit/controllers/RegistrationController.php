<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrationController
 *
 * @author goran
 */
class RegistrationController extends CI_Controller {
    //put your code here
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
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_jedinstveniEmail');
        
        
        if($this->form_validation->run() == FALSE)
        {
            $arr = array(
                        "title" => "Registracija", 
                        "page" => "registracijaForma"
                    );
            $this->load->view('templates/pageRegistration',$arr);
        }
        else
        {
            
            
            
            $this->model->registrujKorisnika();
           
            
            $this->load->view('welcome_message');
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
        $provera = $this->model->jedinstvenoKorisnickoIme($kime);
        if($provera == null)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('jedinstvenoKorisnickoIme','The %s is already in use');
            return FALSE;
        }
    }
    function jedinstveniEmail($email)
    {
        $provera = $this->model->jedinstveniEmail($email);
        if($provera == null)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('jedinstveniEmail','The %s field has been taken');
            return FALSE;
        }
    }
}
?>