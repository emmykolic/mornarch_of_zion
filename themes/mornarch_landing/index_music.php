<?php
// Assuming $limit is the number of songs per batch, e.g., 6
$limit = 6;
$offset = 0; // Start with 0 for the initial load
$full_song_query = $this->db->query("SELECT * FROM audios ORDER BY aid DESC LIMIT $limit OFFSET $offset");
?>

<section class="ftco-section ftco-intro bg-danger" style="background-image: url(<?= BURL ?>assets/mornach-logo.png); background-position: center;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 col-md-6 heading-section heading-section-white">
                <h2 class="">We offer a safe and fast way to delivery your goods to any destination in nigeria.</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section" style="padding-bottom: 0;">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <!-- Contact Info -->
            <div class="col-md-4">
                <!-- Address info -->
            </div>

            <!-- Song List -->
            <div class="container">
                <div class="row" id="song-container">
                    <!-- Initial songs loaded here by PHP loop -->
                    <?php while ($row = $full_song_query->fetch_assoc()): ?>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-4 song-item">
                            <div class="row py-3 align-items-center">
                                <div class="col-md-6">
                                    <img src="<?= BURL . $row['song_img'] ?>" class="img-fluid rectangular-image rounded img-thumbnail" alt="Post Image">
                                </div>
                                <div class="col-md-6">
                                    <div class="part-text">
                                        <h4><a href="<?= BURL ?>index/single/<?= $row['aid'] ?>"><?= htmlspecialchars($row['song_name']) ?></a></h4>
                                        <small>dsjx</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <!-- Loader for infinite scroll -->
                <div id="loader" style="display: none; text-align: center;">
                    <img src="<?= BURL ?>assets/loading.gif" width="40" height="40" alt="Loading...">
                </div>
            </div>

        </div>
    </div>
</section>


<script>
document.addEventListener("DOMContentLoaded", function () {
    let offset = <?= $limit ?>; // Start with offset after initial load
    let loading = false;

    window.addEventListener("scroll", function () {
        // Check if near the bottom of the page and if a load isn't already in progress
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 500 && !loading) {
            loading = true;
            const loader = document.getElementById("loader");
            loader.style.display = "block"; // Show loading spinner

            // AJAX request to fetch more songs
            fetch(`index.php?ajax=1&offset=${offset}`)
                .then(response => response.json())
                .then(data => {
                    loader.style.display = "none"; // Hide loading spinner
                    if (data.length > 0) {
                        let songContainer = document.getElementById("song-container");
                        data.forEach(song => {
                            let songItem = document.createElement("div");
                            songItem.classList.add("col-xl-6", "col-lg-6", "col-md-6", "col-sm-12", "mb-4", "song-item");
                            songItem.innerHTML = `
                                <div class="row py-3 align-items-center">
                                    <div class="col-md-6">
                                        <img src="${song.song_img}" class="img-fluid rectangular-image rounded img-thumbnail" alt="Post Image">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="part-text">
                                            <h4><a href="index/single/${song.aid}">${song.song_name}</a></h4>
                                            <small>dsjx</small>
                                        </div>
                                    </div>
                                </div>
                            `;
                            songContainer.appendChild(songItem);
                        });
                        offset += <?= $limit ?>; // Increase offset for next load
                        loading = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    loading = false;
                });
        }
    });
});
</script>



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
