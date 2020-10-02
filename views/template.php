 <!-- <div class="container">   ================ start Header Area  =================-->	
            <?php require_once('header.php'); ?>
            <!--================ End Header Area  =================-->
            
            <!--================Blog Area =================-->
            <?= $content ?>     
            <!--================Blog Area =================-->
            
            <!--================ start footer Area  =================-->	
            <?php require_once('footer.php'); ?>
            <!--================ End footer Area  =================-->
            
            
            
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/js/jquery-3.2.1.min.js"></script>
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/js/popper.js"></script>
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/js/bootstrap.min.js"></script>
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/js/stellar.js"></script>
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/vendors/lightbox/simpleLightbox.min.js"></script>
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/vendors/nice-select/js/jquery.nice-select.min.js"></script>
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/vendors/isotope/imagesloaded.pkgd.min.js"></script>
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/vendors/isotope/isotope-min.js"></script>
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/vendors/owl-carousel/owl.carousel.min.js"></script>
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/vendors/jquery-ui/jquery-ui.js"></script>
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/js/jquery.ajaxchimp.min.js"></script>
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/js/mail-script.js"></script>
            <script src="<?=Validator::escapingData($this->env['URL_PATH'])?>public/visitor/js/theme.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        </div>
    </body>
</html>