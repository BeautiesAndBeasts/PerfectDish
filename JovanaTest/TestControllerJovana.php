<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestControllerJovana
 *
 * @author Vukovic
 */
class TestControllerJovana extends CI_Controller {
    
    
    public function __construct() {
        parent::__construct();
        $this->load->library("unit_test");
        $this->load->model("model");
    }
    
    public function index()
    {
          
       //Testovi za obrisi recept
       $this->testObrisiReceptNeuspesan("50");
       $this->testObrisiReceptUspesan("1");
        
        
        //Testovi za pregled mojih recepata
        $this->dohvatiMojeRecepteNeuspesno("10");
        $this->dohvatiMojeRecepteUspesno("2");
        
        
       $this->load->view("testsJovana");
    }
    


    function testObrisiReceptNeuspesan($id)
    {
        $this->model->brisiRecept($id);
        $data = $this->model->dohvatiRecepti($id);      
        $this->unit->run($data, NULL, "Neuspesno brisanje recepta.");
    }
    
    function testObrisiReceptUspesan($id)
    {
        $this->model->brisiRecept($id);
        $data = $this->model->dohvatiRecepti($id);
        $this->unit->run($data, NULL, "Uspesno brisanje recepta");
    }  
    
    function dohvatiMojeRecepteNeuspesno($id)
    {
        $data = $this->model->dohvatiSvojeRecepte($id);
        $this->unit->run($data, NULL, "Recepti korisnika ne postoje u sistemu.");
    }
    
    function dohvatiMojeRecepteUspesno($id)
    {
        $data = $this->model->dohvatiSvojeRecepte($id);
        $this->unit->run($data[0]->idKorisnika, $id ,"Recepti korisnika postoje u sistemu.");
    }
    
}

?>
