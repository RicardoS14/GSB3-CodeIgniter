<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class modeleConnexion extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }
    
    public function getUserId($login, $mdp){
        $req = "SELECT VIS_MATRICULE ".
               "FROM visiteur ". 
               "WHERE VIS_NOM = '$login' ".
               "AND VIS_MATRICULE = '$mdp' ";
        $query = $this->db->query($req)->result();
        return $query;
    }
    
    public function userExist($login, $mdp){
        $req = "SELECT VIS_MATRICULE ".
               "FROM visiteur ".
               "WHERE VIS_NOM = '$login' ".
               "AND VIS_MATRICULE = '$mdp' ";
        $query = $this->db->query($req)->result();
        return $query;
    }
    
    public function validerConnexion($login, $mdp) {
        $id = null;
        $query = $this->db->query("SELECT VIS_MATRICULE FROM visiteur V WHERE VIS_NOM = '$login' AND VIS_MATRICULE = '$mdp'");
        $row = $query->row();
        if($query->num_rows() > 0) {
            $id = $row->VIS_MATRICULE;
        }
        return $id;
    }
    
}
?>