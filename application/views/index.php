<?php
require_once("models/modeleConnexion.php");
include("views/v_entete.php") ;
$pdo = PdoGsb::getPdoGsb();
session_start();
$estConnecte = estConnecte();
if(!isset($_REQUEST['uc']) || !$estConnecte){
	$_REQUEST['uc'] = 'connexion';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':{
		include("controllers/c_connexion.php");
	break;
	
}
include("views/vuePied.php");
?>