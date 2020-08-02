<?php

 $title='Accueil';
 require('header.php');
 ob_start();
 
 ?>
 <div class="container-fluid pt-3"> 
    <!--================Home Banner Area =================-->
    <section class="banner_area pt-3">
        <div class="container">
            <div class="row banner_inner">
                <div class="col-lg-5"></div>
                <div class="col-lg-7">
                    <div class="banner_content text-center">
                        <h3>Compétences BI & Développement d'applications</h3>
                        <div class="page_link">
                            <a href="index.html">Talend</a>
                            <a href="single-blog.html">MSBI</a>
                            <a href="single-blog.html">Informatica</a>
                            <a href="single-blog.html">Tableau & QlikView</a>
                            <a href="single-blog.html">C#/.NET/.NET Core</a>
                            <a href="single-blog.html">PHP/Symfony</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    
    <!--================Blog Area =================-->
    <section class="blog_area p_120 single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_details">
                        <img class="img-fluid" src="img/blog/news-blog.jpg" alt="">
                        <a href="#"><h4>Code pour tous, tous pour le Code</h4></a>
                        <div class="user_details">
                            <div class="float-left">
                                <a href="#">Gadget</a>
                            </div>
                            <div class="float-right">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>François Nimpagaritse</h5>
                                        <p>20/05/2020 11:21 am</p>
                                    </div>
                                    <div class="d-flex">
                                        <img src="img/blog/user-img.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p></p>
                        <p>Coder est une compétence fantastique pour vous si vous êtes le genre de personne qui a des tonnes d'idées et qui veut tout commencer. Ne pas avoir à chercher ailleurs un codeur permet d'économiser du temps et de l'argent, et cela signifie que vous pouvez continuer à changer et à repenser au fur et à mesure que votre idée se développe.</p>
                        <blockquote class="blockquote">
                            <p class="mb-0">Coder pour la plupart des grands projets a tendance à être un effort de collaboration. Cela signifie devoir travailler comme un seul rouage au sein d'une plus grande équipe. Apprendre à interagir au mieux avec les patrons et les collègues est une compétence de travail essentielle, et elle peut souvent être développée par le codage.</p>
                        </blockquote>
                        <p>Contrairement à de nombreux éléments de la spécification d'un poste, comme un diplôme universitaire, quasiment tout le monde peut apprendre à coder. Cela ne prend pas plusieurs années ou coûte des milliers. En fait, cela peut à peu près se faire en ligne et dans le confort de votre propre maison, et peut être appris de manière flexible autour de vos autres engagements.</p>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">                        
                        <aside class="single_sidebar_widget author_widget text-center">
                            <img class="author_img img-fluid rounded center-block" src="<?php echo URL_PATH; ?>views/admin/myImage/francis-01.png" style="width:310px; height:320px;" alt="">
                            <div class="text-center">
                                <h4>François Nimpagaritse</h4>
                            </div>                            
                            <div class="blog_text p-1 text-center">
                                <div class="blog_text_inner ">
                                    <div class="cat p-1">
                                        <a class="cat_btn mb-2" href="#">Le développeur multi-compétent</a>
                                        <a class="blog_btn mt-2 pb-0" href="<?php echo URL_PATH; ?>views/admin/myImage/CV_François_Nimpagaritse.pdf" target="_blank">Voir mon CV</a>
                                    </div>
                                </div>
							</div>
                        </aside>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

<!--================ Contact Area ====================-->
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
                    <p>Evoyez nous votre requête!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <form class="row contact_form" action="<?=URL_PATH;?>home/send" method="post" id="contactForm">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Saisir votre nom et prénom" value="<?=$data['name'];?>" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse email" value="<?=$data['email'];?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="L'objet du message" value="<?=$data['subject'];?>" required>
                    </div>
                    <div>
                        <p><?=$data['result'];?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea class="form-control" id="message" name="message" rows="1" placeholder="Votre Message"><?=$data['message'];?></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-right">                    
                    <button type="submit" value="submit" class="btn submit_btn">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!--================ Contact Area ====================-->


    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>

