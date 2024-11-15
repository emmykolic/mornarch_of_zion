<?php
  $uid = $this->auth->uid;
  $profile=$this->db->query("SELECT * FROM users WHERE uid='$uid' ");
  $prow=$profile->fetch_assoc();
  // $prow = $row;
?>

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

  <!--jsocials-->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= BURL ?>assets/croppie.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
  <!--jsocials-->

  <!-- Include Select2 CSS and JS (Make sure you include these in your head section) -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Tagify CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/selectize@0.15.2/dist/css/selectize.default.css" /> -->

  <!-- Include Selectize.js CSS -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/selectize@0.15.2/dist/css/selectize.default.css" /> -->

  <!-- Include Bootstrap Tags Input CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-tagsinput@0.8.0/dist/bootstrap-tagsinput.css" rel="stylesheet"> -->


  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="<?= BURL ?>themes/default_admin/assets/vendor/fonts/boxicons.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= BURL ?>themes/default_admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= BURL ?>themes/default_admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= BURL ?>themes/default_admin/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= BURL ?>themes/default_admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="<?= BURL ?>themes/default_admin/assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" /> -->


  <!-- Page CSS -->
  <!-- <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css"> -->
  <!-- Helpers -->
  <script src="<?= BURL ?>themes/default_admin/assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?= BURL ?>themes/default_admin/js/config.js"></script>
  <!-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> -->
  

</head>

<!-- <style>
    #container {
        width: 1000px;
        margin: 20px auto;
    }
    .ck-editor__editable[role="textbox"] {
        /* Editing area */
        min-height: 200px;
    }
    .ck-content .image {
        /* Block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style> -->

<?php 
  $profile = $this->db->query("SELECT * FROM users");
  $profile = $profile->fetch_assoc();
?>
<body class="g-sidenav-show  bg-gray-100">

  <input type="hidden" name="burl" id='burl' value='<?= BURL ?>'>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="<?= BURL ?>" class="app-brand-link">
            <span class="app-brand-logo demo ">
              <img src="<?= BURL ?>assets/<?= $this->setting->site_logo ?>" alt="Site Logo" height="40" class="my-1">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active">
            <a href="<?= BURL ?>dashboard" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <!-- Layouts -->
          <?php if ($this->auth->user->type == 9) : ?>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Admin Menu</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="<?= BURL ?>settings" class="menu-link">
                    <div data-i18n="Without menu">General Setting</div>
                  </a>
                </li>
                
                <li class="menu-item">
                  <a href="<?= BURL ?>users" class="menu-link">
                    <div data-i18n="Blank">User Mgt.</div>
                  </a>
                </li>
              </ul>
            </li>

          <?php endif; ?>
          <?php if ($this->auth->user->type >= 5) : ?>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-car detail"></i>
                  <div data-i18n="Layouts">Advert Mgt.</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?= BURL ?>payments" class="menu-link">
                      <div data-i18n="Without menu">Payments</div>
                    </a>
                  </li>

                  <li class="menu-item" style="display: flex; align-items: center;">
                    <label style="margin-right: 10px;">Send User's Payment Gateway!</label>
                    <a href="javascript:void(0);" class="copy-container" onclick="copyToClipboard('<?= BURL ?>payments')" title="Copy Payment Link">
                        <div class="copy-box">
                            <i class="fas fa-link" style="font-size: 1.2em; color: #2b25c4;"></i>
                            <label style="font-size: 0.9em; color: #2b25c4; margin-left: 5px;">Copy!</label>
                        </div>
                    </a>
                    <span id="copyConfirmation" style="display: none; color: green; margin-left: 10px;">Link copied!</span>
                </li>

                  <li class="menu-item">
                    <a href="<?= BURL ?>advert" class="menu-link">
                      <div data-i18n="Container">Advert Mgt.</div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-video"></i>
                  <div data-i18n="Layouts">Video's Mgt.</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?= BURL ?>videos" class="menu-link">
                      <div data-i18n="Fluid">Add Video.</div>
                    </a>
                  </li>
                  <!-- Some other things. -->
                  <li class="menu-item">
                    <a href="<?= BURL ?>videos/video_list" class="menu-link">
                      <div data-i18n="Fluid">Video List.</div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons fa-solid fa-bullhorn"></i>
                  <div data-i18n="Layouts">Blog Mgt.</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?= BURL ?>blog" class="menu-link">
                      <div data-i18n="Fluid">Blog Add.</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?= BURL ?>blog/single" class="menu-link">
                      <div data-i18n="Fluid">Blog View.</div>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Audio Music Menu</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?= BURL ?>music" class="menu-link">
                      <div data-i18n="Container">Music Mgt.</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?= BURL ?>genre" class="menu-link">
                      <div data-i18n="Container">Music Genre </div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?= BURL ?>mood" class="menu-link">
                      <div data-i18n="Container">Music Mood </div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?= BURL ?>music/song_list" class="menu-link">
                      <div data-i18n="Container">Songs </div>
                    </a>
                  </li>
                </ul>
              </li>
        <?php endif ?>

          <li class="menu-item">
            <a href="<?= BURL ?>logout" class="menu-link">
              <i class="menu-icon tf-icons bx bx-file"></i>
              <div data-i18n="Documentation">Logout</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

            <ul class="navbar-nav flex-row align-items-center ms-auto">

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <?php if(isset($prow) && is_array($prow)): ?>
                        <img src="<?=BURL?><?php echo $prow['photo']; ?>" alt class="w-px-40 h-auto rounded-circle">
                    <?php else: ?>
                        <img src="<?=BURL?>assets/profile.jpg" alt class="w-px-40 h-auto rounded-circle">
                    <?php endif; ?>
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="<?=BURL?><?=$prow['photo']?>" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block"><?=$prow['firstname'].' '.$prow['lastname']?></span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?=BURL?>profile">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?=BURL?>settings">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                        <span class="flex-grow-1 align-middle">Billing</span>
                        <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= BURL ?>logout">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->