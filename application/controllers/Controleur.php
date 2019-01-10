<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class Controleur extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
	}

	function connexion(){
		$data['content'] = "V_connexion";
		$this->load->view('Templace', $data);
	}

	function deconnexion(){
		$this->session->unset_userdata('user');
		$data['content'] = "V_connexion";
		$this->load->view('Templace', $data);
	}

	function accueil(){
		$this->session->unset_userdata('user');
		$data['content'] = "bas";
		$this->load->view('Templace', $data);
	}
}
?>