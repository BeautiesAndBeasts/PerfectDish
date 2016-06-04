<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author goran
 */

class Model extends CI_Model {
 
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function login($username, $password)
    {
        
        $this->db->where('korisnickoIme', $username);
        $this->db->where('lozinka', $password);
        $this->db->limit(1);
        
         $query = $this -> db -> get("registrovanikorisnik");
        
        if($query->num_rows() == 1)
        {
            return $query->result();
         
        }
        else
        {
            return false;
        }
    }
    
    public function adminLogin($username,$password)
    {
        $this->db->where('korisnickoIme', $username);
        $this->db->where('lozinka', $password);
        $this->db->limit(1);
        
        $query = $this->db->get("administrator");
        if($query->num_rows() == 1)
        {
            return $query->result();
         
        }
        else
        {
            return false;
        }
    }
    
    public function jedinstvenoKorisnickoIme($username)
    {
        $this->db->where('korisnickoIme',$username);
        $this->db->limit(1);
        $query = $this->db->get("registrovanikorisnik");
        if($query->num_rows() == 1)
        {
            return $query->result();
         
        }
        else
        {
            return false;
        }
    }
    
    public function jedinstveniEmail($email)
    {
        $this->db->where('email',$email);
        $this->db->limit(1);
        $query = $this->db->get("registrovanikorisnik");
        if($query->num_rows() == 1)
        {
            return $query->result();
         
        }
        else
        {
            return false;
        }
    }
    
    public function jedinstvenoAdminIme($username)
    {
        $this->db->where('korisnickoIme',$username);
        $this->db->limit(1);
        $query = $this->db->get("administrator");
        if($query->num_rows() == 1)
        {
            return $query->result();
         
        }
        else
        {
            return false;
        }
    }
    
    public function registrujKorisnika()
    {
        $korisnickoIme = $this->input->post('korisnickoIme');
            $lozinka = $this->input->post('lozinka');
            $ime = $this->input->post('ime');
            $prezime = $this->input->post('prezime');
            $email = $this->input->post('email');
            
        $data = array(
            "korisnickoIme" => $korisnickoIme,
            "lozinka" => $lozinka,
            "ime" => $ime,
            "prezime" => $prezime,
            "email" => $email,
            "statusValidnosti" => "DA",
            "statusTrenutneAktivnosti" => "DA"
        );
        $this->db->insert('registrovanikorisnik',$data);
    }
    
    public function registrujAdmina()
    {
        $korisnickoIme = $this->input->post('korisnickoIme');
            $lozinka = $this->input->post('lozinka');
            $ime = $this->input->post('ime');
            $prezime = $this->input->post('prezime');
            $email = $this->input->post('email');
            
        $data = array(
            "korisnickoIme" => $korisnickoIme,
            "lozinka" => $lozinka,
            "ime" => $ime,
            "prezime" => $prezime,
            "email" => $email
        );
        $this->db->insert('administrator',$data);
    }
    
    public function dohvatiSveKorisnike()
    {
        $query = $this->db->get("registrovanikorisnik");
        return $query->result();
    }
    
    public function dohvatiSvePoruke()
    {
        $query = $this->db->get("poruke");
        return $query->result();
    }
    
    public function dohvatiZadnjiIDPoruke() 
    {
        $this->db->order_by("idPoruke", "desc");
        $this->db->limit(1);
        
        $query = $this->db->get("poruke");
         if($query->num_rows() != 0)
        {
            return $query->result();
         
        }
        else
        {
            return false;
        }
    }
    
    public function posaljiPoruku($poruka, $time, $id)
    {
       
         $data = array(
            "sadrzajPoruke" => $poruka,
            "vremeSlanja" => $time,
             "idKorisnika" => $id
        );
        $this->db->insert('poruke',$data);
    }
    
    public function vratiKorisnickoPoIdu($id)
    {
        $this->db->where('idKorisnika',$id);
        $this->db->limit(1);
        
         $query = $this -> db -> get("registrovanikorisnik");
        
        if($query->num_rows() == 1)
        {
            return $query->result();
         
        }
        else
        {
            return false;
        }
        
    }
    public function dohvatiKorisnikaPoID($id) {
        return $this->db->get_where("registrovanikorisnik", array("idKorisnika"=>$id))->result();
    }
    
    public function dohvatiSveRecepteKorisnika($id)
    {
        $this->db->where('idKorisnika',$id);
        
        $query = $this->db->get("recepti");
        if($query->num_rows() > 0)
        {
            return $query->result();
         
        }
        else
        {
            return false;
        }
    }
    
    public function dohvatiSvePorukeSaKorisnicima(){
        $this->db->select('*');
        $this->db->from('poruke');
        $this->db->join('registrovanikorisnik','registrovanikorisnik.idKorisnika = poruke.idKorisnika');
        $query = $this->db->get();
        return $query->result();
        
    }
    public function obrisiKorisnika($id) {
        $kor = $this->dohvatiKorisnikaPoID($id);
        $data = array(
            "korisnickoIme" => $kor[0]->korisnickoIme,
            "lozinka" => $kor[0]->lozinka,
            "ime" => $kor[0]->ime,
            "prezime" => $kor[0]->prezime,
            "email" => $kor[0]->email,
            "statusValidnosti" => "NE",
            "statusTrenutneAktivnosti" => "DA"
        );
         $this->db->where("idKorisnika", $id);
        $this->db->update("registrovanikorisnik", $data);
        
    }
    
    //*************
    public function dohvatiSviRecepti() {
        $query = $this->db->get("recepti");
        return $query->result();
    }
    
    public function dohvatiRecepti($id) {
        $this->db->where("idRecepta", $id);
        return $this->db->get("recepti")->result();
    }
    
    public function dohvatiSastojakPoIDKategoriji($id)
    {
        $this->db->where('idKategorijaS', $id);
        $query = $this->db->get('sastojci');
        
        return $query->result();
        
    }
    
    public function dohvatiReceptePoIDKategoriji($id)
    {
        $this->db->where('idKategorijaR', $id);
        $query = $this->db->get('recepti');
        
        return $query->result();
        
    }
    
    public function dohvatiReceptePoVrsti($vrsta)
    {
        $this->db->where('vrsta', $vrsta);
        $query = $this->db->get('recepti');
        
        return $query->result();
        
    }
    
    public function dohvatiReceptDana()
    {   
        $seed = strtotime(date('Y-m-d'));
        $sql="SELECT * FROM Recepti ORDER BY RAND($seed) LIMIT 1";    
        $result_set=mysql_query($sql);
        while($row=mysql_fetch_array($result_set))
        {
        }
        
    }
    
    public function dohvatiSveKategorijeRecepata()
    {
        $query = $this->db->get('kategorijarecepata');
        return $query->result();
    }
    
    public function dohvatiSvojeRecepte($id)
    {
        $this->db->where("idKorisnika",$id);
        $query = $this->db->get('recepti');
        return $query->result();
    }
    
    public function receptDana()
    {
        $this->db->order_by('idRecepta','RANDOM');
        $this->db->limit(1);
        $query = $this->db->get('recepti');
        return $query->result();
    }
    
    public function brisiRecept($id)
    {
        
        $this->db->where('idRecepta',$id);
        $this->db->delete('sadrzi');
        $this->db->where('idRecepta',$id);
        $this->db->delete('recepti');
    }
    
    public function dohvatiReceptePoSastojku($id)
    {
         $this->db->select ( '*' ); 
         $this->db->from ( 'recepti' );
         $this->db->join ( 'sadrzi', 'sadrzi.idRecepta = recepti.idRecepta');
         $this->db->join ( 'sastojci', 'sastojci.idSastojak = sadrzi.idSastojak');
         $this->db->where('sadrzi.idSastojak',$id);
         $query = $this->db->get();
         return $query->result ();
    }
    
}
    

?>
