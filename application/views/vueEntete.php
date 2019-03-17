<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $titre;?></title>
    <link rel="stylesheet" type="text/css" media="screen" href="/GSB3-CodeIgniter/assets/style.css">
</head>
<body>
    <?php 
        if(isset($this->session->login)) {
           echo "<div class='nav'></div>";  
        }
    ?>
        