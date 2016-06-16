<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestSuitController
 *
 * @author goran
 */
class TestSuitController extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->library("unit_test");
        $this->load->model("model");
    }
    
    public function index()
    {
        //Testovi za logovanje korisnika
        $this->testKorisnikLoginNeuspesan("aaaaaa", "bbbbb");
        $this->testKorisnikLoginUspesa();
        
        //Testovi za logovanje administratora
        $this->testAdminLoginNeuspesan("rango", "goran");
        $this->testAdminLoginUspesan("admin", "admin");
        
        //Testovi za jedinstveno korisnicko ime
        $this->dohvatiKorisnickoImeNeuspesno("ababababab");
        $this->dohvatiKorisnickoImeUspesno("kacajaksic");
        
        //Testovi za jedinstveno admin ime
        $this->dohvatiAdminImeNeuspesno("Drazen");
        $this->dohvatiAdminImeUspesno("admin");
        
        //Testovi za jedinstvenu email adresu
        $this->jedinstveniEmailUspesno("onlygoran@gmail.com");
        $this->jedinstveniEmailNeuspesno("aaa@br.br");
        
        $this->load->view("tests");
    }
    
    function testKorisnikLoginNeuspesan($user, $pass)
    {
        $data = $this->model->login($user,$pass);
        $this->unit->run($data, NULL, "Korisnik ne postoji u sistemu");
    }
    
    function testKorisnikLoginUspesa()
    {
        $data = $this->model->login("rango","goran");
        $this->unit->run($data[0]->korisnickoIme,"rango","Korisnik postoji u sistemu");
    }
    
    function testAdminLoginNeuspesan($user, $pass)
    {
        $data = $this->model->adminLogin($user,$pass);
        $this->unit->run($data, NULL, "Administrator ne postoji u sistemu");
    }
    
    function testAdminLoginUspesan($user,$pass)
    {
        $data = $this->model->adminLogin($user,$pass);
        $this->unit->run($data[0]->korisnickoIme,$user , "Administrator postoji u sistemu");
    }
    
    function dohvatiKorisnickoImeNeuspesno($ime)
    {
        $data = $this->model->jedinstvenoKorisnickoIme($ime);
        $this->unit->run($data,null, "Korisnicko Ime nije u sistemu");
    }
    
    function dohvatiKorisnickoImeUspesno($ime)
    {
        $data = $this->model->jedinstvenoKorisnickoIme($ime);
        $this->unit->run($data[0]->korisnickoIme,$ime, "Korisnicko Ime je u sistemu");
    }
    
    function dohvatiAdminImeNeuspesno($ime)
    {
        $data = $this->model->jedinstvenoAdminIme($ime);
        $this->unit->run($data,null, "Admin Ime nije u sistemu");
    }
    
    function dohvatiAdminImeUspesno($ime)
    {
        $data = $this->model->jedinstvenoAdminIme($ime);
        $this->unit->run($data[0]->korisnickoIme,$ime, "Admin Ime je u sistemu");
    }
    
    function jedinstveniEmailUspesno($email)
    {
        $data = $this->model->jedinstveniEmail($email);
        $this->unit->run($data[0]->email,$email, "Email adresa je u sistemu");
    }
    
    function jedinstveniEmailNeuspesno($email)
    {
        $data = $this->model->jedinstveniEmail($email);
        $this->unit->run($data,NULL, "Email adresa nije u sistemu");
    }
}
?>
