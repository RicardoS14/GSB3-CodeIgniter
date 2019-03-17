<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_connexion extends CI_Controller {
    public function index() {
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('modeleConnexion');
        
        $data['titre'] = "Connexion";
        $this->load->view('vueEntete', $data);
        if(isset($this->session->login)){
            $this->load->view('vueMenu', $data);
        }
        
        $this->load->view('vueConnexion');
    }
    public function login() {
            $this->load->database();
            $this->load->model('modeleConnexion');
            $login = $this->modeleConnexion->validerConnexion($this->input->post('login'), $this->input->post('mdp'));
            if(isset($login)) {
                $this->session->set_userdata('login', $login);
            }
            else{
                $this->load->view('vueMenu');
                $data['error'] = 'Erreur de connexion';
            }
    }
    public function logout(){
        $this->session->unset_userdata('login');
        $this->index();
    }
}
?>