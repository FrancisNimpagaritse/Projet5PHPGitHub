<?php

 $title='Page 404';
 require('header.php');
 ob_start();
 
 ?>
 <div class="container-fluid pt-3"> 
    
    <!--================Blog Area =================-->
    <div class="alert alert-danger" style="height:200px;">
        <h1>Erreur 404. La page cherchée n'existe pas.</h1>
    </div>
    <!--================Blog Area =================-->



    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>

