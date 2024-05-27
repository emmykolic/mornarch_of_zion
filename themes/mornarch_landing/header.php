<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> <?php if (isset($this->page_title) && $this->page_title != "") : ?><?= $this->page_title; ?><?php else : ?><?= $this->setting->site_name; ?> <?php endif; ?> </title>

    <meta name="description" content="<?php if (isset($this->page_description) && $this->page_description != '') : ?>  <?= $this->page_description; ?><?php else : ?> <?= $this->setting->site_description; ?><?php endif; ?>" />
    <meta name="keywords" content="<?php if (isset($this->page_keywords) && $this->page_keywords != '') : ?>  <?= $this->page_keywords; ?><?php else : ?> <?= $this->setting->site_keywords; ?><?php endif; ?>" />
    <meta name="author" content="<?php if (isset($this->page_author) && $this->page_author != '') : ?> <?= $this->page_author; ?><?php else : ?> <?= $this->setting->site_author; ?><?php endif; ?>" />
    <meta property="og:title" content="<?php if (isset($this->page_title) && $this->page_title != '') : ?> <?= $this->page_title; ?> <?php else :  ?> <?= $this->setting->site_name; ?>  <?php endif; ?>" />
    <meta property="og:image" content="<?php if (isset($this->page_image) && $this->page_image != '') : ?> <?= BURL . 'assets/' . $this->page_image; ?> <?php else : ?><?= BURL . 'assets/' . $this->setting->site_logo; ?> <?php endif; ?>" />
    <meta property="og:url" content="<?php if (isset($this->page_url) && $this->page_url != '') : ?> <?= $this->page_url; ?> <?php else : ?> <?= $this->setting->site_url; ?><?php endif; ?>" />
    <meta property="og:site_name" content="<?= $this->setting->site_name ?>" />
    <meta property="og:description" content="<?php if (isset($this->page_description) && $this->page_description != '') : ?> <?= $this->page_description; ?> <?php else : ?><?= $this->setting->site_description; ?><?php endif; ?>" />
    <meta name="twitter:title" content="<?php if (isset($this->page_title) && $this->page_title != '') : ?> <?= $this->page_title; ?> <?php else : ?> <?= $this->setting->site_name; ?><?php endif; ?>" />
    <meta name="twitter:image" content="<?php if (isset($this->page_image) && $this->page_image != '') : ?> <?= BURL . 'assets/' . $this->page_image; ?> <?php else : ?><?= BURL . 'assets/' . $this->setting->site_logo; ?><?php endif; ?>" />
    <meta name="twitter:url" content="<?php if (isset($this->page_url) && $this->page_url != '') : ?> <?= $this->page_url; ?><?php else : ?> <?= $this->setting->site_url; ?><?php endif; ?>" />
    <meta name="twitter:card" content="<?php if (isset($this->page_twitter_card) && $this->page_twitter_card != '') : ?> <?= BURL . 'assets/' . $this->page_image; ?><?php endif; ?>" />
    <meta itemprop="name" content="<?php if (isset($this->page_title) && $this->page_title != '') : ?> <? $this->page_title; ?><?php else : ?> <?= $this->setting->site_name; ?><?php endif; ?>" />
    <meta itemprop="description" content="<?php if (isset($this->page_description) && $this->page_description != '') : ?> <?= $this->page_description; ?> <?php else : ?> <?= $this->setting->site_description; ?><?php endif; ?>" />
    <meta itemprop="image" content="<?php if (isset($this->page_image) && $this->page_image != '') : ?> <? BURL . 'assets/' . $this->page_image; ?> <?php else : ?> <?= BURL . 'assets/' . $this->setting->site_screenshot; ?><?php endif; ?>" />

    <link rel="apple-touch-icon" href="<?= BURL ?>assets/<?= $this->setting->site_favicon; ?>">
    <link rel="shortcut icon" href="<?= BURL ?>assets/<?= $this->setting->site_favicon; ?>">
    <link href="<?= BURL ?>assets/croppie.css" rel="stylesheet" />
    
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/animate.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/magnific-popup.css">

    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/aos.css">

    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/jquery.timepicker.css">


    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/flaticon.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/font-awesome.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/icomoon.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/style.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/style2.css">
</head>

<body>
    <input type="hidden" name="burl" value="<?= BURL ?>" id="burl">
    <?php if (isset($is_landing)) : ?>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark ftco-navbar-light" id="ftco-navbar">
        <?php else : ?>
            <nav class="navbar navbar-expand-lg navbar-light ftco_navbar bg-white ftco-navbar-dark shadow" id="ftco-navbar">
            <?php endif; ?>
                <div class="container">
                    <a class="navbar-brand" href="<?= BURL ?>"><img src="<?= BURL ?>assets/<?= $this->setting->site_logo; ?>" height="40"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="oi oi-menu"></span> Menu
                    </button>

                    <div class="collapse navbar-collapse" id="ftco-nav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active"><a href="<?= BURL ?>" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="<?= BURL ?>#about" class="nav-link">About</a></li>
                            <li class="nav-item"><a href="<?= BURL ?>#trending_post" class="nav-link">Trending Post</a></li>
                            <li class="nav-item"><a href="<?= BURL ?>#services" class="nav-link">Latest Post</a></li>
                            <li class="nav-item"><a href="<?= BURL ?>index/dj_mix" class="nav-link">Dj Mix</a></li>
                            <li class="nav-item"><a href="<?= BURL ?>index/cargo" class="nav-link">Upload Songs</a></li>
                           <li class="nav-item"><a href="<?= BURL ?>index/contact" class="nav-link">Contact</a></li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li><a class="dropdown-item" href="<?= BURL ?>index/music">Music</a></li>
                                    <li><a class="dropdown-item" href="<?= BURL ?>index/video">Video</a></li>
                                    <li><a class="dropdown-item" href="<?= BURL ?>index/blog">Blog</a></li>
                                </ul>
                            </li>
            
                            <?php if (isset($this->auth->uid)) : ?>
                                
                                <li class="nav-item dropdown">
                                    <a href="<?= BURL ?>index/contact" class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"><?=$this->auth->user->firstname?></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <?php if($this->auth->type=9 ):?>
                                            <li><a class="dropdown-item" type="button" href="<?= BURL ?>dashboard">Dashboard</a></li>
                                        <?php endif;?>
                                        <li><a class="dropdown-item" href="<?= BURL ?>logout">Logout</a></li>
                                    </ul>
                                </li>
                                
                            <?php else : ?>
                                <li class="nav-item"><a href="<?= BURL ?>signup" class="btn btn-danger p-2 nav-link">Login/Register</a></li>
                            <?php endif; ?>
                            <li class="nav-item search">
                                <span class="fas fa-search" id="search"></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="search_input" id="search_input_box">
                    <div class="container">
                        <form class="d-flex justify-content-between">
                            <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                            <button type="submit" class="btn"></button>
                            <span class="fa fa-times" id="close_search" title="Close Search"></span>
                        </form>
                    </div>
                </div>
            </nav>
            <!-- END nav -->