        <!--================ start footer Area  =================-->	
        <footer class="footer-area p_120 pb-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">A propos</h6>
                            <p>Nous nous investissons aux coeur des technologies digitales pour vous apporter les meilleures solutions et nous vous accompagnons jusqu'à la réalisation de vos rêves.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Newsletter</h6>
                            <p>Restez informés sur les dernières technologies</p>
                            <div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                    <div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>		
                                    </div>	
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <?php if(isset($_SESSION['user_id'])) : ?>
                            <a class="btn btn-primary" href="<?=Validator::escapingData($_ENV['URL_PATH'])?>authentication/logout">Logout</a>
                        <?php else : ?>									
                            <a class="btn btn-primary" href="<?=Validator::escapingData($_ENV['URL_PATH'])?>authentication/login">Login</a>								
                        <?php endif ; ?>                        
                    </div>	
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget f_social_wd">
                            <h6 class="footer_title">Me suivre</h6>
                            <p>Soyons sociables</p>
                            <div class="f_social">
                            	<a target="_blank" href="https://www.facebook.com/francis.nimpagaritse"><i class="fa fa-facebook"></i></a>
								<a target="_blank" href="https://twitter.com/NimpagaritseFr2"><i class="fa fa-twitter"></i></a>
								<a target="_blank" href="https://www.linkedin.com/in/fran%C3%A7ois-nimpagaritse-39004ab6/"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Thème <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->