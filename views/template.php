<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="public/visitor/img/favicon.png" type="image/png">
        <title><?php echo $title ?></title>
        <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="public/visitor/css/bootstrap.css">
        <link rel="stylesheet" href="public/visitor/vendors/linericon/style.css">
        <link rel="stylesheet" href="public/visitor/css/font-awesome.min.css">
        <link rel="stylesheet" href="public/visitor/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="public/visitor/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="public/visitor/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="public/visitor/vendors/animate-css/animate.css">
        <link rel="stylesheet" href="public/visitor/vendors/jquery-ui/jquery-ui.css">
        <!-- main css -->
        <link rel="stylesheet" href="public/visitor/css/style.css">
        <link rel="stylesheet" href="public/visitor/css/myStyle.css">
        <link rel="stylesheet" href="public/visitor/css/responsive.css">
    </head>
    <body>
  
    <?= $menu ?>       

        
        <!--================Blog Area =================-->
        <?= $content ?>     
        <!--================Blog Area =================-->
        
        <!--================ start footer Area  =================-->	
        <?php require_once('footer.php'); ?>
		<!--================ End footer Area  =================-->
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="public/visitor/js/jquery-3.2.1.min.js"></script>
        <script src="public/visitor/js/popper.js"></script>
        <script src="public/visitor/js/bootstrap.min.js"></script>
        <script src="public/visitor/js/stellar.js"></script>
        <script src="public/visitor/vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="public/visitor/vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="public/visitor/vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="public/visitor/vendors/isotope/isotope-min.js"></script>
        <script src="public/visitor/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="public/visitor/vendors/jquery-ui/jquery-ui.js"></script>
        <script src="public/visitor/js/jquery.ajaxchimp.min.js"></script>
        <script src="public/visitor/js/mail-script.js"></script>
        <script src="public/visitor/js/theme.js"></script>
    </body>
</html>