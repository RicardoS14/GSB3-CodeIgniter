<?php
if (!defined('BASEPATH')) 
    exit ('No direct script access allowed');

class C_CompteRendu extends CI_Controller{

    public function index(){
        $this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
        $this->load->library('session');
        
        $this->load->view('');
    }

    public function saisirR(){
        $this->index();
        $LesMedicaments = $pdo->getListeMedicament();
        $lesPraticiens = $pdo->getLesPraticiens();
        $this->load->view('v_insererCompte');
    }

    public function saisir(){
        $this->index();
        $max = $pdo->getNewId();
        $max++;
        if ($_REQUEST['medic'] == "") {
            $pdo->ajouterCR($_SESSION['vis_matricule'], $max, $_POST["pra"], $_POST["bilan"], $_POST["motif"], $_POST["date"]);
            $lesCompteRendu = $pdo->getCR($_SESSION['vis_matricule']);
            $this->load->view('v_consulterCompte');
        }
        elseif ($_REQUEST['medic'] == $_POST['medic']) {
            if (!isset($_POST['quantite']) || $_POST['quantite']==0 ) {
                $pdo->ajouterCR($_SESSION['vis_matricule'], $max, $_POST["pra"], $_POST["bilan"], $_POST["motif"], $_POST["date"]);
                $lesCompteRendu = $pdo->getCR($_SESSION['vis_matricule']);
                $this->load->view('v_consulterCompte');
            }?>
            <div>
                <a href="#" data-dismiss="alert" aria-label="close">&times;</a>
                <h6>Le rapport <?= $max; ?> a bien été crée.</h6>
            </div>
            <?php
            $pdo->ajouterCR($_SESSION['vis_matricule'], $max, $_POST["pra"], $_POST["bilan"], $_POST["motif"], $_POST["date"]);
            $lesCompteRendu = $pdo->getCR($_SESSION['vis_matricule']);
            $pdo->ajouterEchantillon($_SESSION['vis_matricule'], $max, $_POST['medic'], $_POST['quantite']);
            $this->load->view('v_consulterCompte');
        }
    }
    public function consulterCR() {
        $lesCompteRendu = $pdo->getCR($_SESSION['vis_matricule']);
        $this->load->view('v_consulterCompte');
    }
    public function details(){
        try{
            $lesEchantillons = $pdo->getDetailsEchantillons($_REQUEST['id']);
            $this->load->view('v_consulterCompteDetails');
        }
        catch (Exception $ex) {
            $ex->getMessage();
        }
    }
}?>