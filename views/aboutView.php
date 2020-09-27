<?php

$title='About';

 ob_start();
 ?>
       
<div class="container-fluid pt-3"> 
    
    <!--================Home Banner Area =================-->
    <section class="banner_area pt-4">
        <div class="container">
            <div class="row banner_inner">
                <div class="col-lg-5"></div>
                <div class="col-lg-7">
                    <div class="banner_content text-center" style="background:grey;border-radius:7px;">
                        <h2>Ma mission</h2>
                        <div class="page_link">
                            <a href="<?=$_ENV['URL_PATH']?>home">Accueil</a>
                            <a href="#">Détails</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    
    <!--================Contact Area =================-->
    <section class="contact_area p_120">
        
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Strasbourg, France</h6>
                            <p>11 Rue Arthur Weeber</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">+33 6 17 24 46 06</a></h6>
                            <p>Du lundi au vendredi de 9h00 à 18h00</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">franimpa@yahoo.fr</a></h6>
                            <p>Evoyez moi votre requête!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p>Développeur passionné par le monde du Web, je réalise des missions à forte valeur ajoutée en vous permettant d'avoir une meilleure visibilité. </p>
                                <p>Au coeur des données d'entreprise depuis plusieures années, mon savoir faire vous permet d'avoir des données fiables et je les organise et les transforme en une arme puissante pour vos prises de décisions.</p>
                            </div>                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p>Je vous accompagne dès la conception et la mise en place de votre base de données, je vous garantie de bonnes performances et je valorise vos données par des applications robustes et des solutions BI de très haute qualité.</p>
                                <p>Grâce aux technologies numériques je convertis vos rêves en réalités.</p>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        
    </section>
    <!--================Contact Area =================--> 

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>

