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

    <!-- loader -->
    <!-- <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div> -->
    
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/animate.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <!-- Owl Carousel JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="themes/mornarch_landing/css/bootstrap.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/magnific-popup.css">

    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/aos.css">

    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/jquery.timepicker.css">

    <!-- style css -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/flaticon.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/font-awesome.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/default_admin/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/icomoon.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/style.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/style2.css">
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/style3.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/jquery.mCustomScrollbar.min.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?= BURL ?>themes/mornarch_landing/css/responsive.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen"> 
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
    <input type="hidden" name="burl" value="<?= BURL ?>" id="burl">
    <input type="hidden" name="csrf_token" value="<?= $this->token ?>">
    <?php if (isset($is_landing)) : ?>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark ftco-navbar-light" id="ftco-navbar">
        <?php else : ?>
            <nav class="navbar navbar-expand-lg navbar-light ftco_navbar mt-0 ftco-navbar-dark shadow" id="ftco-navbar">
                <?php endif; ?>
                <div class="container">
                    <a class="navbar-brand" href="<?= BURL ?>"><img src="<?= BURL ?>assets/<?= $this->setting->site_logo; ?>" height="40"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="oi oi-menu"></span> Menu
                    </button>

                    <div class="collapse navbar-collapse" id="ftco-nav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active"><a href="<?= BURL ?>" class="nav-link">Home</a></li>
                            <li class="nav-item "><a href="<?= BURL ?>#about" class="text-dark nav-link">About</a></li>
                            <li class="nav-item"><a href="<?= BURL ?>#trending" class="nav-link">Trending</a></li>
                            
                            <li class="nav-item"><a href="<?= BURL ?>#latest-post" class="nav-link">Latest Post</a></li>
                            <!-- <li class="nav-item"><a href="<?= BURL ?>index/cargo" class="nav-link">Upload Songs</a></li> -->
                            <li class="nav-item"><a href="<?= BURL ?>index/dj_mix" class="nav-link">Dj Mix</a></li>
                           <li class="nav-item"><a href="<?= BURL ?>index/contact" class="nav-link">Contact</a></li>
                           <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li><a class="dropdown-item" href="<?= BURL ?>index/music">Music</a></li>
                                    <li><a class="dropdown-item" href="<?= BURL ?>index/video">Video</a></li>
                                    <li><a class="dropdown-item" href="<?= BURL ?>index/blog_view">Blog</a></li>
                                    <li><a class="dropdown-item" href="<?= BURL ?>index/cargo">Upload Songs</a></li>
                                </ul>
                            </li>

            
                            <?php if (isset($this->auth->uid)) : ?>
                                
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" type="button" id="dropdownMenuUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$this->auth->user->firstname?></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuUser">
                                    <?php if($this->auth->type == 9): ?>
                                        <li><a class="dropdown-item" href="<?= BURL ?>dashboard">Dashboard</a></li>
                                    <?php endif; ?>
                                    <li><a class="dropdown-item" href="<?= BURL ?>logout">Logout</a></li>
                                </ul>
                            </li>

                                
                            <?php else : ?>
                                <li class="nav-item"><a href="<?= BURL ?>signup" class="btn btn-danger p-2 nav-link">Login/Register</a></li>
                            <?php endif; ?>
                        
                            <!-- Search Icon -->
                            <li class="nav-item">
								<button class="search"><span class="fa fa-search" id="search"></span></button>
							</li>
                        </ul>
                    </div>
                </div>
               
                <!-- Search Input Box -->
                <!-- <div class="search-input-box position-relative" id="search_input_box" style="display: none;">
                    <form class="d-flex justify-content-between bg-white p-2 border rounded">
                        <input type="text" class="form-control border-0" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn btn-outline-secondary d-none"></button>
                        <span class="fa fa-times p-2" id="close_search" title="Close Search"></span>
                    </form> 
                </div> -->

                <!-- Search Input Box -->
                <div class="search-input-box container" id="search_input_box" style="display: none;">
                    <form class="d-flex justify-content-between align-items-center">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn btn-outline-secondary ml-2"></button>
                        <span class="fa fa-times ml-2" id="close_search" title="Close Search" style="cursor: pointer;"></span>
                    </form>
                </div>

            </nav>
            <!-- END nav -->