<section id="contact" class="ftco-section ftco-intro bg-danger" style="background-image: url(<?= BURL ?>themes/mornarch_landing/images/contactus.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h2 class="mb-3">We would love to here from you. Visit, call or send us a message</h2>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">

            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span><?= $this->setting->site_address ?></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-whatsapp"></span>
                            </div>
                            <p><span>Phone:</span> <a href="tel://9028056849"><?= $this->setting->site_phone_number ?></a></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-envelope-o"></span>
                            </div>
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com"><?= $this->setting->site_email ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 block-9 mb-md-5">
                
                <form action="https://formsubmit.co/emmanuelokolie550@gmail.com" method="post" class="bg-light p-5 contact-form">
                    <h1 class="text-danger text-center display-6">Contact Us</h1>
                    <div class="form-group">
                        <input type="hidden" name="_next" value="https://github.io/thankyou.html">
                        <input type="hidden" name="_subject" value="New Email Woooo!">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="fullname" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-danger py-3 px-5">
                    </div>

                </form>

            </div>
        </div>

    </div>
</section>