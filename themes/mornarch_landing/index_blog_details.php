    <section class="ftco-section ftco-intro bg-danger" style="background-image: url('<?=BURL?>themes/mornarch_landing/images/handshake.jpg'); background-position: center;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section heading-section-white ftco-animate">
                    <h2 class="mb-3">Please fill our partnership form and we will call you back</h2>
                </div>
            </div>
        </div>
    </section>

    <div class="container m-5">
        <div class="row m-3" id="post-container">
            <!-- Left Side Content -->
            <div class="col-md-3">
                <h4>Left Side Content</h4>
                <p>Here you can add some content for the left side.</p>
            </div>

            <!-- Centered Main Content -->
            <div class="col-md-6">
                <!-- Initial posts will be loaded here -->
                <?php while ($brow = $get_blog->fetch_assoc()): ?>
                <div class="card m-3">
                    <div class="card-body">
                        <img src="<?=BURL . $brow['blog_img']?>" alt="Blog Image" class="img-fluid rounded img-custom">
                        <h5 class="card-title"><?=$brow['title_of_blog']?></h5>
                        <p class="card-text">
                            <span class="short-text"><?= shorten_text($brow['blog_content'], 100) ?></span>
                            <span class="full-text" style="display: none;"><?= $brow['blog_content'] ?></span>
                            <?php if (strlen($brow['blog_content']) > 100): ?>
                                <a href="javascript:void(0);" class="read-more">Read More</a>
                            <?php endif; ?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-primary like-button">
                                <i class="fa fa-thumbs-up"></i> Like (<span class="like-count">0</span>)
                            </button>
                            <button class="btn btn-secondary comment-button">
                                <i class="fa fa-comments"></i> Comment (<span class="comment-count">0</span>)
                            </button>
                        </div>
                    </div>
                </div>
                <div class="comment-section mt-3" style="display: none;">
                    <div class="card">
                        <div class="card-body">
                            <form id="commentForm">
                                <div class="form-group">
                                    <label for="comment">Leave a comment:</label>
                                    <textarea class="form-control" id="comment" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Comment</button>
                            </form>
                            <div class="mt-3">
                                <h5>Comments:</h5>
                                <ul class="list-unstyled comment-list"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <div class="loading-spinner" id="loading-spinner" style="display: none;">
                    <img src="<?=BURL?>assets/loading.gif" alt="Loading..." />
                </div>
            </div>

            <!-- Right Side Content -->
            <div class="col-md-3">
                <h4>Right Side Content</h4>
                <p>Here you can add some content for the right side.</p>
            </div>
        </div>
    </div>

    <!-- Blog section end -->




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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery-3.2.1.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery-migrate-3.0.1.min.js"></script>



<script src="<?= BURL ?>themes/mornarch_landing/js/popper.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/bootstrap.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery.easing.1.3.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery.waypoints.min.js"></script>
<script src="<?= BURL ?>themes/mornarch_landing/js/jquery.stellar.min.js"></script>
<!-- Owl Carousel JS -->
<script src="<?= BURL ?>themes/mornarch_landing/js/owl.carousel.min.js"></script>
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

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

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