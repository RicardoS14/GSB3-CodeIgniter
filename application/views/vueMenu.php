<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav>
    <ul><?php

    //lien vers les visiteurs
    if($titre == "Visiteur") {
        echo "<li><a class='active'>Visiteur</a></li>";
    }
    else {
        //ajouter le controleur manquant
        echo "<li><a href='/GSB3-CodeIgniter/index.php/.../'>Visiteur</a></li>";
    }

    //lien vers les praticiens
    if($titre == "Praticien") {
        echo "<li><a class='active'>Praticien</a></li>";
    }
    else {
        //ajouter le controleur manquant
        echo "<li><a href='/GSB3-CodeIgniter/index.php/.../'>Praticien</a></li>";
    }

    //lien vers les médicaments
    if($titre == "Medicament") {
        echo "<li><a class='active'>Médicaments</a></li>";
    }
    else {
        //ajouter le controleur manquant
        echo "<li><a href='/GSB/index.php/.../'>Médicaments</a></li>";
    }

    //lien vers les rapports
    if($titre == "Rapport") {
        echo "<li><a class='active'>Rapports</a></li>";
    }
    else {
        //ajouter le controleur manquant
        echo "<li><a href='/GSB/index.php/.../'>Rapports</a></li>";
    }

    //Deconnexion
    echo "<li><a href='/GSB/index.php/c_connexion/logout'>Déconnexion</a></li>";
        
    ?></ul>
</nav>