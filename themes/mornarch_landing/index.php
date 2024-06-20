    <div class="hero-wrap ftco-degree-bg" style="background-image: url('<?= BURL ?>/themes/mornarch_landing/images/music_pics.jpg'); background-size :cover; background-position: center; height:100vh;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4"><?= $this->setting->site_name ?></h1>
                        <p style="font-size:1.2em"> <?=$this->setting->site_description ?></p>

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
                <div class="col-md-12	featured-top">
                    <div class="row no-gutters d-flex">
                        <div class="col-md-4 d-flex align-items-center h-100 bg-danger">
                            <form action="<?= BURL ?>index/booking_action" class="request-form w-100 ftco-animate bg-danger" method="post">
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
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center border-danger"><span class="flaticon-route  text-danger"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Choose Check Route</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center border-danger"><span class="flaticon-handshake text-danger"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Select Your Desired Options</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
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
    </section>
    <?php else: ?>
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12   featured-top">
                    <div class="row no-gutters d-flex">
                        <div class="col-md-4 d-flex align-items-center h-100 bg-danger">
                            <span style="min-height: 70vh" class="text-center">
                                Show An Advert! (Coming Soon...)
                                <!-- Content of the website -->
                                <div class="content">
                                    <h1>Welcome to Our Website!</h1>
                                    <p>This is the main content of your website.</p>
                                </div>
                            </span>
                        </div>
                        <div class="col-md-8 d-flex align-items-center " style="min-height: 100%;">
                            <div class="services-wrap rounded-right w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                <h3 class="heading-section mb-5 text-center" style="font-size: 20px"><span class="text-danger"><?=$this->setting->site_name?>...</span> A Better Way To Praise God Through Songs!
                                </h3>
                                <a href="<?=BURL?>signin" class="btn btn-danger">Login To Continue!</a>
                                <!-- Properly Designed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <?php endif; ?>

    <section id="services"></section>
    <div class="blog-post" style="margin-top: 30px; margin-bottom: 30px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading text-danger">Here's Our Latest Post</span>
                    <h2 class="mb-2">Latest Post</h2><hr>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="row" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                        <!-- First Post -->
                        <?php while ($row = $audios->fetch_assoc()): ?>
                        <div class="col-xl-6 col-lg-6">
                            <div class="row py-3">
                                <div class="col-md-6">
                                    <img src="<?=BURL . $row['song_img']?>" class="img-fluid rectangular-image rounded img-thumbnail" alt="Post Image">
                                </div>
                                <div class="col-md-6">
                                    <div class="part-text">
                                        <h4><a href="<?=BURL?>index/single/<?=$row['aid']?>"><?=$row['song_name']?></a></h4>
                                        <small>dsjx</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <!-- End Of First Post -->
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="sidebar">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6">
                                <div class="widget widget_categories mt-2">
                                    <h6 class="widgettitle font-weight-bold"><span>Categories</span></h6>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="http://localhost/benExchange/blog-category/2/freelancing">FREELANCING
                                                <span class="count float-right">(1)</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://localhost/benExchange/blog-category/1/paypal">PayPal
                                                <span class="count float-right">(1)</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-6">
                                <div class="widget widget-popular-post">
                                    <h6 class="widgettitle font-weight-bold">
                                        <span>Popular Posts</span>
                                    </h6>
                                            <div class="single-post">
                                        <div class="part-img">
                                            <img src="http://localhost/benExchange/assets/images/post/post_thumb1695800803.jpg" alt="Introduction to PayPal by Ben&#039;s Exchange">
                                        </div>
                                        <div class="part-text">
                                            <h4><a href="http://localhost/benExchange/details/1/introduction-to-paypal-by-bens-exchange">What is PayPal?PayPal&amp;nbsp;is a simple p...</a></h4>
                                            <small>27 Sep, 2023</small>
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
 


    <section id="trending_post"></section>
    <section class="ftco-section ftco-no-pt bg-light" id="services">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <!-- <span class="subheading text-danger">What we offer</span> -->
                    <h2 class="mb-2">Trending Post</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-car owl-carousel">
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(<?= BURL ?>themes/mornarch_landing/images/performer.jpg);">
                                </div>
                                <div class="text">
                                    <h2 class="mb-3"><a href="#">Inter-cities Transportation</a></h2>
                                    <p class="d-flex justify-content-end mb-0 d-block"><a href="<?= BURL ?>" class="btn btn-danger py-2 mr-1">Book now</a> </p>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(<?= BURL ?>themes/mornarch_landing/images/performer.jpg);">
                                </div>
                                <div class="text">
                                    <h2 class="mb-3"><a href="#">Waybill/Cargo</a></h2>
                                    <p class="d-flex justify-content-end mb-0 d-block"><a href="<?= BURL ?>index/cargo" class="btn btn-danger py-2 mr-1">Book now</a> </p>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(<?= BURL ?>themes/mornarch_landing/images/performer.jpg);">
                                </div>
                                <div class="text">
                                    <h2 class="mb-3"><a href="#">Charter</a></h2>
                                    <p class="d-flex justify-content-end mb-0 d-block"><a href="<?= BURL ?>index/charter" class="btn btn-danger py-2 mr-1">Book now</a> </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>





    <section id="about"></section>
    <section class="ftco-section ftco-about bg-dark">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?= BURL ?>themes/mornarch_landing/images/mixer2.jpg);">
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section heading-section-white pl-md-5">
                        <span class="subheading">About us</span>
                        <h2 class="mb-4">Welcome to <?= $this->setting->site_name ?></h2>

                        <p><?=$this->setting->site_name?> is a company that delivers a unique, comfortable and safe transportation system.<br />
                            With our Special facilities Such as: Internet solutions/browsing on transit, special vehicle monitoring system, responsible drivers, a 100% working AC and a dedicated customer service.
                            <?=$this->setting->site_name?> Shuttle Service is available in the following routes: Aba, Awka, Calabar, Enugu, Onitsha, Owerri, Port Harcourt, Umuahia, Uyo And Warri.
                            Take advantage of our safe and comfortable shuttles, travel in air-conditioned space wagon that have speed control and tracking mechanism</p>
                        <p><a href="<?= BURL ?>index/contact" class="btn btn-dark py-3 px-4"><b>Contact Us</b> </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section id="features"></section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Why <?=$this->setting->site_name?></span>
                    <h2 class="mb-3">Our Feature</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center bg-danger"><span class="flaticon-wedding-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Safety</h3>
                            <p>We have vehicle monitoring system, and hire only responsible drivers</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center bg-danger"><span class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Comfort</h3>
                            <p>We provide 100% working AC and a dedicated customer service.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center bg-danger"><span class="flaticon-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Excellence</h3>
                            <p>Comfortable air-conditioned shuttles, with speed control and tracking mechanism</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="ftco-section ftco-intro bg-danger" style="background-image: url(<?= BURL ?>themes/mornarch_landing/images/mixer3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section heading-section-white ftco-animate">
                    <h2 class="mb-3">Do You Want To Be Our Sponsor? We'll Be Glad To  Have You.</h2>
                    <a href="<?= BURL ?>index/partner" class="btn btn-danger btn-lg">Become A Partner</a>
                </div>
            </div>
        </div>
    </section>