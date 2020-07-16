<?php
if (isset($_SESSION['']))
session_destroy();
$title='Détails Post';

ob_start();

 ?>
<div class="cont"> 
        <!--================Home Banner Area =================-->
        <section class="banner_area">
        	<div class="container">
				<div class="row banner_inner">
					<div class="col-lg-5"></div>
					<div class="col-lg-7">
						<div class="banner_content text-center">
							<h2>Détails du Blog Post </h2>
							<div class="page_link">
								<a href="<?=URL_PATH;?>home">Accueil</a>
								<a href="#">Post Details</a>
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
       						<img class="img-fluid" src="<?=URL_PATH;?>public/visitor/img/blog/news-blog.jpg" alt="">
       						<a href="#"><h4><?=$post->title;?> <br /> A Discount Toner</h4></a>
       						<div class="user_details">
       							<div class="float-left">
       								<a href="#">Lifestyle</a>
       								<a href="#">Gadget</a>
       							</div>
       							<div class="float-right">
       								<div class="media">
       									<div class="media-body">
       										<h5><?=$post->firstname;?></h5>
       										<p><?=date_format(new DateTime($post->updatedAt),"d-m-Y H:i:s");?></p>
       									</div>
       									<div class="d-flex">
       										<img src="<?=URL_PATH;?>public/visitor/img/blog/user-img.jpg" alt="">
       									</div>
       								</div>
       							</div>
       						</div>
       						<p><?=$post->content;?></p>
							<div class="news_d_footer">
      							<a href="#"><i class="lnr lnr lnr-heart"></i><?="0".$post->nbrComments;?> Visites</a>
      							<a class="justify-content-center ml-auto" href="#"><i class="lnr lnr lnr-bubble"></i><?="0".$post->nbrComments;?> Commentaires</a>
      							<div class="news_socail ml-auto">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
								</div>
      						</div>
       					</div>       					
                        <div class="comments-area">
                            <h4><?="0".$post->nbrComments;?> Commentaires</h4>
                            <div class="comment-list">
                                <?php if(!$comments==null)
                                {
                                    foreach($comments as $comment): ?>
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img src="<?=URL_PATH;?>public/visitor/img/blog/c1.jpg" alt="">
                                                </div>
                                                <div class="desc">
                                                    <h5><a href="#"><?=$comment->firstname.' '.$comment->lastname;?></a></h5>
                                                    <p class="date"><?=date_format(new DateTime($comment->createdAt),"d-m-Y H:i:s");?></p>
                                                    <p></p>
                                                    <p class="comment">
                                                        <?=$comment->message;?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="reply-btn">
                                                   <a href="" class="btn-reply text-uppercase">Répondre</a> 
                                            </div>
                                        </div>
                                      </br>
                                    <?php endforeach;
                                } ?>
                              
                            </div>
                        </div>
                        <div class="comment-form">
                            <h4>Laissez votre commentaire</h4>
                            <form action="<?=URL_PATH;?>comment/add" method="POST">
                                <div class="form-group form-inline">
                                  <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" id="name" placeholder="Votre prénom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre prénom'" required>
                                  </div>
                                  <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" id="email" placeholder="Votre adresse email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre adresse email'" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="message" placeholder="Votre commentaire" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre commentaire'" required></textarea>
                                </div>
                                <?php 
                                if (isset($_SESSION['user_id']))
                                { ?>  
                                    <input type="hidden" class="form-control" name="postid" id="postid" value="<?=$postid;?>">                                  
                                    <button type="submit" class="primary-btn submit_btn">Poster Commentaire</button>
                                    <!-- Button trigger modal -->
                                <?php } else { ?>                                    
                                    <a class="btn btn-dark" href="<?=URL_PATH;?>authentication/login">Connectez-vous pour commenter</a>
                                <?php } ?>
                                	
                            </form>
                        </div>
        			</div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Chercher Posts">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget author_widget">
                                <img class="author_img img-fluid" src="<?=URL_PATH;?>public/visitor/img/blog/author.png" alt="">
                                <h4>François Nimpagaritse</h4>
                                <p>Auteur du blog</p>
                                
                                <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.</p>
                                <div class="br"></div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div> 
                       
        </section>
       
        <!--================Blog Area =================-->
</div>    

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>