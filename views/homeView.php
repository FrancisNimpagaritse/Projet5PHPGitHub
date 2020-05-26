<?php

$title='Accueil';

 require('header.php');
 ob_start();
 ?>

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="row banner_inner">
                <div class="col-lg-5"></div>
                <div class="col-lg-7">
                    <div class="banner_content text-center">
                        <h3>Compétences BI & Développement d'applications</h3>
                        <div class="page_link">
                            <a href="index.html">Talend</a>
                            <a href="single-blog.html">MSBI</a>
                            <a href="single-blog.html">Informatica PowerCenter</a>
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
                        <a href="#"><h4>Cartridge Is Better Than Ever <br /> A Discount Toner</h4></a>
                        <div class="user_details">
                            <div class="float-left">
                                <a href="#">Lifestyle</a>
                                <a href="#">Gadget</a>
                            </div>
                            <div class="float-right">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>Mark wiens</h5>
                                        <p>12 Dec, 2017 11:21 am</p>
                                    </div>
                                    <div class="d-flex">
                                        <img src="img/blog/user-img.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower</p>
                        <p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p>
                        <blockquote class="blockquote">
                            <p class="mb-0">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p>
                        </blockquote>
                        <p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower</p>
                        <p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower</p>
                        
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
                                        <a class="cat_btn mb-2" href="#">Le développeur complet</a>
                                        <a class="blog_btn mt-2 pb-0" href="<?php echo URL_PATH; ?>views/admin/myImage/CV_François_Nimpagaritse 13102019.pdf" target="_blank">Voir mon CV</a>
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
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Saisir votre nom et prénom">
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

<!--================ Contact Area ====================-->


    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>

