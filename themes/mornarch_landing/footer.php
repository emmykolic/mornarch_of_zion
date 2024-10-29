<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2"><a href="#" class="logo"><img src="<?= BURL ?>assets/<?= $this->setting->site_logo; ?>" height="40"></a></h2>
                    <p><?=$this->setting->site_name?> is a company that delivers a unique, comfortable and safe transportation system.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Information</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?= BURL ?>#about" class="py-2 d-block">About</a></li>
                        <li><a href="<?= BURL ?>#services" class="py-2 d-block">Services</a></li>
                        <li><a href="<?= BURL ?>index/terms" class="py-2 d-block">Term and Conditions</a></li>
                        <li><a href="<?= BURL ?>index/privacy" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Quick Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?= BURL ?>index/cargo" class="py-2 d-block">Waybill/Cargo</a></li>
                        <li><a href="<?= BURL ?>" class="py-2 d-block">Booking</a></li>
                        <li><a href="<?= BURL ?>index/charter" class="py-2 d-block">Charter</a></li>
                        <li><a href="<?= BURL ?>index/partner" class="py-2 d-block">Partnership</a></li>
                        <li><a href="<?= BURL ?>index/contact" class="py-2 d-block">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Reach Us</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text"><?= $this->setting->site_address ?></span></li>
                            <li><a href="tel:<?= $this->setting->site_phone_number ?>"><span class="icon icon-phone"></span><span class="text"><?= $this->setting->site_phone_number ?></span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?= $this->setting->site_email ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    &copy;<?= date("M, Y") ?> <?= $this->setting->site_name ?>
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<!-- <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
</div> -->


<!-- Owl Carousel JS -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->

<!-- jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery-3.2.1.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery-migrate-3.0.1.min.js"></script>


<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- <script src="<?= BURL ?>themes/mornarch_landing/js/popper.min.js"></script> -->
<!-- <script src="<?= BURL ?>themes/mornarch_landing/js/bootstrap.min.js"></script> -->
<!-- <script src="<?= BURL ?>themes/mornarch_landing/js/jquery.easing.1.3.js"></script> -->
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery.waypoints.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery.stellar.min.js"></script>
<!-- Owl Carousel JS -->
<script src="<?= BURL ?>themes/mornarch_landing/js/owl.carousel.min.js"></script>

<!-- Include jQuery and Owl Carousel JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->

<script src="<?= BURL ?>themes/mornarch_landing/js/jquery.magnific-popup.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/aos.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery.animateNumber.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/bootstrap-datepicker.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery.timepicker.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/scrollax.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
<!-- <script src="<?= BURL ?>themes/mornarch_landing/js/google-map.js"></script> -->
<!-- Bootstrap Notify -->
<script src="<?= BURL ?>assets/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Sweet Alert -->
<script src="<?= BURL ?>assets/sweetalert/sweetalert.min.js"></script>

<script src="<?= BURL ?>themes/mornarch_landing/js/main.js"></script>

<script src="<?= BURL ?>assets/register.js"></script>

<script src="<?= BURL ?>themes/mornarch_landing/js/plugin.js"></script>

<!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

<!-- sidebar -->
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/custom.js"></script>

<!-- <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> -->

<script type="text/javascript">
    function validate(x = "are you sure you want to perform this action?") {
        if (confirm(x) == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php $this->alert->get(); ?>


</body>

</html>