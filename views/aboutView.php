<?php

$title='About';

 ob_start();
 ?>
       
<div class="cont"> 
    
    <!--================Home Banner Area =================-->
    <section class="banner_area pt-4">
        <div class="container">
            <div class="row banner_inner">
                <div class="col-lg-5"></div>
                <div class="col-lg-7">
                    <div class="banner_content text-center">
                        <h2>Nous Contacter</h2>
                        <div class="page_link">
                            <a href="index.html">Accueil</a>
                            <a href="contact.html">Nous Contacter</a>
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
                                <input type="text" class="form-control" id="name" name="name" placeholder="Saisir votre nom">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="L'objet du message">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Votre Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Envoyer Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->
    
</div> 

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>

