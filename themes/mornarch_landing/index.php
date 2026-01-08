<div class="hero-wrap ftco-degree-bg" 
     style="background-image: url('<?= BURL ?>/themes/mornarch_landing/images/music_pics.jpg'); 
            background-size: cover; 
            background-position: center; 
            height: 70vh;" 
     data-stellar-background-ratio="0.5">

    <div class="overlay"></div>

  <!-- Scripture of the Day Widget -->
    <!-- Scripture of the Day (Pill Style) -->
    <div class="scripture-pill" id="scriptureWidget"
        oncontextmenu="shareScripture('<?= htmlspecialchars($daily_verse) ?> — <?= htmlspecialchars($bible_passage) ?>'); return false;">

        <span class="bible-icon">📖</span>

        <span class="scripture-inline-text">
            <strong>Scripture of the Day:</strong>
            “<?= htmlspecialchars($daily_verse) ?>”
            <em>— <?= htmlspecialchars($bible_passage) ?></em>
        </span>
    </div>





    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <h1 class="mb-4"><?= $this->setting->site_name ?></h1>
                    <p style="font-size:1.2em"><?= $this->setting->site_description ?></p>
                </div>
            </div>
        </div>
    </div>
</div>


    <section id="home"></section>
    <?php if(isset($this->auth->uid)): ?>
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 featured-top">
                    <div class="row no-gutters d-flex">
                        <div class="col-md-4 d-flex align-items-center h-100 bg-danger">
                            <form action="<?= BURL ?>index/booking_action" class="request-form w-100 bg-danger" method="post">
                                <h2>Book a trip</h2>
                                <div class="form-group">
                                    <label for="" class="label">Route</label>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Take-off date</label>
                                    <input type="date" class="form-control" placeholder="Date" name="trip_date">
                                </div>

                                <div class="form-group">
                                    <label for="" class="label">Ticket Type</label>
                                    <select type="text" class="form-control" id="ticket_type" name="ticket_type">
                                        <option value="">Select type</option>
                                        <option value="Single Ticket">Single Ticket</option>
                                        <option value="Return Ticket">Return Ticket (To and Fro)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Book Now" class="btn btn-dark py-3 px-4" name="<?= $this->token ?>">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8 d-flex align-items-center " style="min-height: 100%;">
                            <div class="services-wrap rounded-right w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                <h3 class="heading-section mb-5"><span class="text-danger">Mornarch...</span> A Place Where Gospel Music Shakes The World! '🌍</h3>
                                <div class="row d-flex mb-4">
                                    <div class="col-md-4 d-flex align-self-stretch">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center border-danger"><span class="flaticon-route  text-danger"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Choose Check Route</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center border-danger"><span class="flaticon-handshake text-danger"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Select Your Desired Options</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center border-danger"><span class="flaticon-car text-danger"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Pay For Your Ride</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php else: ?>
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12	featured-top">
                    <div class="row no-gutters d-flex">
                        <div class="col-md-4 d-flex align-items-center bg-danger" style="min-height: 100%;">
                            <div class="m-5 bg-white shadow w-100 h-50">
                                Google Ads/Ads From Site
                            </div>
                        </div>
                        <div class="col-md-8 d-flex align-items-center " style="min-height: 100%;">
                            <div class="services-wrap rounded-right w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                <h3 class="heading-section mb-5">
                                    <span class="text-danger"><?= $this->setting->site_name ?>...</span> 
                                    <?= $this->setting->site_description ?>
                                </h3>

                                <?php 
                                    // Fetch ONLY the last About record
                                    $about = $this->db->query("SELECT * FROM about_fields WHERE deleted = 0 ORDER BY aid DESC LIMIT 1");
                                    $about = $about->fetch_assoc();

                                    // Extract dynamic text
                                    $desc = $about ? $about['about_description'] : "No description available.";
                                ?>

                                <div class="row d-flex mb-4">

                                    <!-- Discover -->
                                    <div class="col-md-4 d-flex align-self-stretch mb-4">
                                        <div class="services gospel-card w-100 text-center">
                                            <div class="icon gospel-icon wave-icon">
                                                <span class="fa-solid fa-music"></span>
                                            </div>

                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Discover Gospel Sounds</h3>

                                                <p class="gospel-desc" 
                                                data-full="<?= htmlspecialchars($desc) ?>">
                                                <?= htmlspecialchars(word_limiter($desc, 6)) ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Be Lifted -->
                                    <div class="col-md-4 d-flex align-self-stretch mb-4">
                                        <div class="services gospel-card w-100 text-center">
                                            <div class="icon gospel-icon">
                                                <span class="fa-solid fa-cross"></span>
                                            </div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Be Lifted Spiritually</h3>

                                                <p class="gospel-desc" 
                                                data-full="<?= htmlspecialchars($desc) ?>">
                                                <?= htmlspecialchars(word_limiter($desc, 6)) ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Support -->
                                    <div class="col-md-4 d-flex align-self-stretch mb-4">
                                        <div class="services gospel-card w-100 text-center">
                                            <div class="icon gospel-icon">
                                                <span class="fa-solid fa-bullhorn"></span>
                                            </div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Support the Gospel</h3>

                                                <p class="gospel-desc" 
                                                data-full="<?= htmlspecialchars($desc) ?>">
                                                <?= htmlspecialchars(word_limiter($desc, 6)) ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
        
    <!-- Latest Post -->
    <section id="latest-post"></section>
    <section class="ftco-section ftco-no-pt bg-light blog-post">
        <div style="margin-top: 30px; margin-bottom: 30px">
            <div class="container">

                <!-- SECTION TITLE -->
                <div class="row justify-content-center">
                    <div class="col-md-12 heading-section text-center mb-5">
                        <span class="subheading text-danger">Here's Our Latest Post</span>
                        <h2 class="mb-2">Latest Post</h2>
                        <hr>
                    </div>
                </div>

                <div class="row">

                    <!-- MAIN POSTS -->
                    <div class="col-xl-8 col-lg-8">

                        <div class="row">
                            <?php while ($row = $audios->fetch_assoc()): ?>

                            <div class="col-md-6 mb-4">
                                <div class="latest-post-card p-3">

                                    <!-- Image -->
                                    <img src="<?= BURL . $row['song_img'] ?>" 
                                        class="latest-post-img mb-3"
                                        alt="Post Image">

                                    <!-- Text -->
                                    <h5>
                                        <a href="<?= BURL ?>index/single/<?= $row['aid'] ?>">
                                            <?= $row['song_name'] ?>
                                        </a>
                                    </h5>

                                    <small class="text-muted">
                                        <?= date("M d, Y h:i A", strtotime($row['date_created'])) ?>
                                    </small>
                                </div>
                            </div>

                            <?php endwhile; ?>
                        </div>
                    </div>

                    <!-- SIDEBAR -->
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="sidebar">

                            <!-- CATEGORIES -->
                            <div class="widget widget_categories">
                                <h6 class="widgettitle font-weight-bold"><span>Categories</span></h6>
                                <ul class="list-unstyled">

                                    <li>
                                        <a href="http://localhost/benExchange/blog-category/2/freelancing">
                                            FREELANCING  
                                            <span class="count float-right">(1)</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="http://localhost/benExchange/blog-category/1/paypal">
                                            PayPal  
                                            <span class="count float-right">(1)</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>

                            <!-- POPULAR POSTS -->
                            <div class="widget widget-popular-post">

                                <h6 class="widgettitle font-weight-bold"><span>Popular Posts</span></h6>

                                <?php while ($row = $get_blog->fetch_assoc()): ?>
                                    <div class="single-post">

                                        <div class="part-img">
                                            <img src="<?= BURL . $row['blog_img'] ?>" 
                                                alt="<?= htmlspecialchars($row['title_of_blog']) ?>">
                                        </div>

                                        <div class="part-text">
                                            <h5 style="font-size: 15px;">
                                                <a href="<?= BURL ?>index/blog/index_blog_details/<?= $row['bid'] ?>/<?= $row['slug'] ?>">
                                                    <?= $row['title_of_blog'] ?>
                                                </a>
                                            </h5>

                                            <small>Views: <?= $row['views'] ?></small><br>
                                            <small>27 Sep, 2023</small>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

 
    <!-- Trending Post -->
    <section id="trending"></section>
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center mb-5">
                    <span class="subheading text-danger">What we offer</span>
                    <h2 class="mb-2">Trending Post</h2>
                </div>
            </div>

            <div class="container my-5">
                <div class="row">
                    <div class="col-md-12">

                    <?php if ($trending_count > 0): ?>
                        <div class="carousel-trend owl-carousel owl-theme">

                            <?php while ($row = $trending_music->fetch_assoc()): ?>
                                <div class="item nb">
                                    <div class="car-wrap rounded trend-card">

                                        <div class="trend-img">
                                            <img src="<?= BURL . $row['song_img']; ?>" alt="<?= $row['song_name']; ?>">
                                        </div>

                                        <div class="text p-3">
                                            <h2 class="mb-3 trend-title">
                                                <a href="#"><?= $row['song_name']; ?></a>
                                            </h2>

                                            <p class="d-flex justify-content-center mb-0">
                                                <a id="downloadButton-<?= $row['aid'] ?>"
                                                href="<?= BURL . htmlspecialchars($row['song']) ?>"
                                                download
                                                class="btn btn-danger py-2 download-btn">
                                                Download
                                                </a>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            <?php endwhile; ?>

                        </div>
                    <?php else: ?>
                        <p class="text-center text-muted">No trending music available yet.</p>
                    <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>
    </section>


    
    <!-- About Us -->
    <section id="about"></section>
    <section class="ftco-section ftco-about bg-dark" id="about" style="padding:0;">
        <div class="container-fluid" style="padding:0; margin:0;">
            <div class="row no-gutters">

                <?php if ($about_fields && $about_fields->num_rows > 0): ?>
                    <?php while ($row = $about_fields->fetch_assoc()): ?>

                        <!-- LEFT IMAGE -->
                        <div class="col-md-6 d-flex align-items-stretch"
                            style="
                                background-image: url('<?= BURL . htmlspecialchars($row['about_img']); ?>');
                                background-size: cover;
                                background-position: center;
                                background-repeat: no-repeat;
                                min-height: 100%;
                            ">
                        </div>

                        <!-- RIGHT CONTENT -->
                        <div class="col-md-6 d-flex align-items-center" style="padding:60px;">
                            <div class="heading-section heading-section-white">
                                <span class="subheading">About</span>
                                <h2 class="mb-4">🙌 <?= htmlspecialchars($row['about_title']); ?></h2>

                                <p><?= nl2br(htmlspecialchars($row['about_description'])); ?></p>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>





    <!-- What We Offer -->
    <section id="services"></section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section">
                    <span class="subheading">Why <?=$this->setting->site_name?></span>
                    <h2 class="mb-3">What We Offer</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center bg-danger"><span class="fa-solid fa-music"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Everythng Music</h3>
                            <p>🎵 Download & Stream Gospel Songs – Fresh, fire-filled tracks from anointed ministers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center bg-danger"><span class="fa-solid fa-blog"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Post Blog</h3>
                            <p>📖 Lyrics That Speak Life – Word-based song lyrics to help you sing along, study, or meditate.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center bg-danger"><span class="fa-solid fa-bullhorn"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Advert</h3>
                            <p>📝 Gospel Blogs – Inspirational stories, devotionals, and updates from the Gospel scene.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="ftco-section ftco-intro bg-danger" style="background-image: url(<?= BURL ?>themes/mornarch_landing/images/mixer3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section heading-section-white">
                    <h2 class="mb-3">Do You Want To Be Our Sponsor? We'll Be Glad To  Have You.</h2>
                    <a href="<?= BURL ?>index/partner" class="btn btn-danger btn-lg">Become A Partner</a>
                </div>
            </div>
        </div>
    </section> -->