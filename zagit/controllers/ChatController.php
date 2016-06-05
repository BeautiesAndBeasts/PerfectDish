<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChatController
 *
 * @author goran
 */
class ChatController extends CI_Controller {
    
    


    public function __construct() {
        parent::__construct();
        $time = 0;
         $this->load->model("model");
        $this->load->helper(array('form','url','security'));
        $this->load->library(array('session', 'form_validation', 'email'));
    }
    
    public function index()
    {
        $this->form_validation->set_rules('message', 'Message', 'required');
        
        if($this->form_validation->run() == FALSE)
        {
            $svePoruke =  $this->model->dohvatiSvePorukeSaKorisnicima();
             $arr = array(
                    "title" => "Chat",
                    "page" => "chat",
                     "data" => $svePoruke
                );
                $this->load->view("templates/page",$arr);
        }
        else
        {
            $time = $this->model->dohvatiZadnjiIDPoruke();
            if($time == null)
            {
                $time[0]->idPoruke = 1;
            }
            else
            {
                $time[0]->idPoruke += 1;
            }
            
            
            $username = $this->session->userdata('korisnickoIme');
            $userID = $this->session->userdata('idKorisnika');
            $poruka = $this->input->post('message');
            
            $this->model->posaljiPoruku($poruka, $time[0]->idPoruke ,$userID);
            $this->session->set_flashdata('chat','<div class="alert alert-success text-center">Poruka je poslata</div>');
            redirect("ChatController","refresh");
           
        }
       
    }
    //put your code here
}
?>
