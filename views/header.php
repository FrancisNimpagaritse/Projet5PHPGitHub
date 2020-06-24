<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?=URL_PATH;?>public/visitor/img/favicon.png" type="image/png">
        <title><?=WEBSITENAME?></title>
        <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="<?=URL_PATH;?>public/visitor/css/bootstrap.css">
        <link rel="stylesheet" href="<?=URL_PATH;?>public/visitor/vendors/linericon/style.css">
        <link rel="stylesheet" href="<?=URL_PATH;?>public/visitor/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?=URL_PATH;?>public/visitor/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?=URL_PATH;?>public/visitor/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="<?=URL_PATH;?>public/visitor/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="<?=URL_PATH;?>public/visitor/vendors/animate-css/animate.css">
        <link rel="stylesheet" href="<?=URL_PATH;?>public/visitor/vendors/jquery-ui/jquery-ui.css">
        <!-- main css -->
        <link rel="stylesheet" href="<?=URL_PATH;?>public/visitor/css/style.css">
        <link rel="stylesheet" href="<?=URL_PATH;?>public/visitor/css/myStyle.css">
        <link rel="stylesheet" href="<?=URL_PATH;?>public/visitor/css/responsive.css">
    </head>
    <body>
<!--================Header Menu Area =================-->
		<header class="header_area">
			<div class="main_menu">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="<?=URL_PATH;?>public/visitor/img/monblog_logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav">
								<li class="nav-item"><a class="nav-link" href="<?=URL_PATH;?>home">Accueil</a></li> 
								<li class="nav-item"><a class="nav-link" href="<?=URL_PATH;?>posts">Posts</a></li>								
								<!-- <li class="nav-item"><a class="nav-link" href="<?=URL_PATH;?>projects">Réalisations</a></li> -->						
								<li class="nav-item"><a class="nav-link" href="<?=URL_PATH;?>about">A propos</a></li>
								<?php if(isset($_SESSION['user_id'])) : ?>
								<li class="nav-item"><a class="nav-link danger" href="<?=URL_PATH;?>authentication/logout"><i class="fa fa-user"></i> Logout</a></li>
								<?php else : ?>									
								<li class="nav-item"><a class="nav-link" href="<?=URL_PATH;?>authentication/login"><i class="fa fa-user"></i> Login</a></li>								
								<?php endif ; ?>
							</ul>
							<ul class="nav navbar-nav navbar-right header_social ml-auto">
								<li class="nav-item"><a target="blank" href="#"><i class="fa fa-facebook"></i></a></li>
								<li class="nav-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li class="nav-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div> 
					</div>
				</nav>
			</div>
			<div class="logo_part mb-2">
				<div class="container">
					<a class="logo" href="#"><img src="<?=URL_PATH;?>public/visitor/img/monblog_logo.png" alt=""></a>
				</div>
			</div>
		</header>
		<!--================Header Menu Area =================-->
