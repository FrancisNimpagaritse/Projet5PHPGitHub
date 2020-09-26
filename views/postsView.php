<?php

$title='Posts';

 ob_start();
 ?>

<div class="container-fluid pt-3">    

        <!--================Home Banner Area =================-->
        <?php               
                if (isset($_GET['success']) && isset($_SESSION['user_id'])) {
                  echo '<div class="col-md-6 col-md-offset-3 alert alert-success text-center">Votre commentaire a bien été enregistré</div>';
                } else if (isset($_GET['error'])){
                    echo '<div class="col-md-6 col-md-offset-3 alert alert-danger text-center">Votre commentaire n\'a pas été enregistré</div>';
                }
        ?>
    <section class="home_banner_area">
        <div class="container pt-2">
            <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-7">
                    <div class="blog_text_slider owl-carousel">
                        <div class="item">
                            <div class="blog_text" style="border-radius:7px;">
                                <div class="cat">
                                    <a class="cat_btn" href="#">New</a>
                                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <?='Par '.$newPost->firstname.', '. date_format(new DateTime($newPost->updatedAt),"d-m-Y H:i:s");?></a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?= "Commentaires: ". $newPost->nbrComments;?></a>
                                </div>
                                <a href="#"><h4><?=$newPost->title;?></h4></a>
                                <p><?=$newPost->content;?></p>
                                <a class="blog_btn" href="<?=URL_PATH;?>posts/show/<?=$newPost->id;?>">Lire la suite</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="blog_text">
                                <div class="cat">
                                    <a class="cat_btn" href="#">Gadgets</a>
                                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
                                </div>
                                <a href="#"><h4>Nest fucken: 2nd Gen Smoke + CO Alarm</h4></a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                <a class="blog_btn" href="#">Read More</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="blog_text">
                                <div class="cat">
                                    <a class="cat_btn" href="#">Gadgets</a>
                                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
                                </div>
                                <a href="#"><h4>Nest Protect: 2nd Gen Smoke + CO Alarm</h4></a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                <a class="blog_btn" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        <!-- Popular -->
                        <article class="blog_style1">
                            <div class="blog_img">
                                <img class="img-fluid" src="<?=URL_PATH;?>public/visitor/img/blogposts/blog-Populaire.jpg" alt="">
                            </div>
                            <div class="blog_text">
                                
                                <div class="blog_text_inner">
                                    <div class="cat">
                                        <a class="cat_btn" href="#">Populaire</a>
                                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <?='Par '.$popularOne->firstname.', '. date_format(new DateTime($popularOne->updatedAt),"d-m-Y H:i:s");?></a>
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>  <?= "Commentaires: ". $popularOne->nbrComments;?></a>
                                    </div>
                                    <a href="#"><h4><?=$popularOne->title;?></h4></a>
                                    <p><?=$popularOne->content;?></p>
                                    <a class="blog_btn" href="<?=URL_PATH;?>posts/show/<?=$popularOne->id;?>">Lire la suite</a>
                                </div>
                                
                            </div>
                        </article>
                        <!-- Posts to be repeated -->
                        <div class="row">

                            <?php foreach ($posts as $post) : ?>

                                <div class="col-md-6">
                                    <article class="blog_style1 small">
                                        <div class="blog_img">
                                            <img class="img-fluid" src="<?=$post->postImage;?>" alt=""> <!-- path should be ..img/posts/.. -->
                                        </div>
                                        <div class="blog_text">
                                            <div class="blog_text_inner">
                                                <div class="cat">
                                                    <a class="cat_btn" href="#">Post 0<?=$post->id;?></a>
                                                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <?='Par '.$post->firstname.', '. date_format(new DateTime($post->updatedAt),"d-m-Y H:i:s");?></a>
                                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><?="Commentaires: ". $post->nbrComments;?></a>
                                                </div>
                                                <a href="#"><h4><?=$post->title;?></h4></a>
                                                <p><?=$post->content;?></p>
                                                <a class="blog_btn" href="<?=URL_PATH;?>posts/show/<?=$post->id;?>">Lire la suite</a>
                                            </div>
                                        </div>
                                    </article>
                                </div>

                            <?php endforeach ; ?>  

                        </div>
                        
                        <!-- Articles removed for repeated posts space --> 
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-left"></span>
                                        </span>
                                    </a>
                                </li>
                                <li class="page-item"><a href="#" class="page-link">01</a></li>
                                <li class="page-item active"><a href="#" class="page-link">02</a></li>
                                <li class="page-item"><a href="#" class="page-link">03</a></li>
                                <li class="page-item"><a href="#" class="page-link">04</a></li>
                                <li class="page-item"><a href="#" class="page-link">09</a></li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-right"></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Chercher Post">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div><!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Les 5 posts populaires</h3>
                            <?php
                            foreach($topFivePopulars as $topFivePopular) : ?>
                                <div class="media post_item">
                                    <img src="public/visitor/img/blog/popular-post/post1.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3><?=$topFivePopular->title?></h3></a>
                                    </div>
                                </div>
                            <?php endforeach ?>                            
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                </div>
                                <a href="#" class="bbtns"><i class="lnr lnr-arrow-right"></i></a>
                            </div>	
                            <div class="br"></div>							
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Posts par catégorie</h4>
                            <ul class="list cat-list">
                                <?php foreach ($categorystats as $catstat) : ?>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p><?=$catstat['category'];?></p>
                                        <p><?=$catstat['nbPosts'];?></p>
                                    </a>
                                </li>
                                <?php endforeach ; ?>												
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>


