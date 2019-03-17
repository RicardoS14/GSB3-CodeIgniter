<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div align="center">
<?php
    if(isset($this->session->login)){
       echo('Deja connecté !!!'.$this->session->login);
    }
    else{
        ?>
        <img src="/GSB3-CodeIgniter/assets/logo.jpg" alt="GSB">
        <br/><br/> <?php
        echo form_open('c_connexion/login');
        $attributes = array('placeholder'=>'login');
        echo form_input('login', '', $attributes);
        ?> <br/><br/> <?php
        $attributes = array('placeholder'=>'mdp');
        echo form_password('mdp', '', $attributes);
        ?> <br/><br/> <?php
        echo form_submit('valider', 'Valider');
        echo form_close();
    }
?>
</div>