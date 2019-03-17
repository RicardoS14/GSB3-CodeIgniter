<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_connecte extends CI_Controller{
    
    public function index(){
        
        $this->load->view('connecte/vueEntete');
        $this->load->view('connecte/vueMenumenu');
        $this->load->view('connecte/vuePied');
    }
}
    