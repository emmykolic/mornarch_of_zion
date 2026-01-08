<section class="ftco-section ftco-intro bg-danger" style="background-image: url('<?= htmlspecialchars($backgroundImage); ?>'); background-position: center; background-size: cover">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white">
                <h2 class="mb-3"><?= htmlspecialchars($row['song_name']) ?></h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section mt-0">
    <div class="container">
        <div class="m-3">
            <small><?= date("M, Y") ?></small><br>
            <?php 
            foreach ($tags as $tag) {
            // Trim whitespace and display each tag in a <span>
                echo '<span class="bg-dark text-white p-1 m-1">' . htmlspecialchars(trim($tag)) . '</span>';
            }
            ?>
        </div>
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-8 block-9 mb-md-5">
                <!-- Contact Info (Address etc) -->
                <div>
                    <b><h1><?= htmlspecialchars($row['song_name']) ?></h1></b>
                </div>

                <div class="float-right"><audio controls loop id="audioPlayer-<?= $row['aid'] ?>" data-song-id="<?= $row['aid'] ?>"><source src="<?= BURL . htmlspecialchars($row['song']) ?>" type="audio/mpeg">
                    Your browser does not support the audio element.</audio>
                    <div class="text-left ml-5 mt-3">
                        
                    <a class="btn btn-primary download-btn download-button" id="downloadButton-<?= $row['aid'] ?>" href="<?= BURL . htmlspecialchars($row['song']) ?>" download>Download Audio</a>

                    </div>
                </div>


                <div class="mb-3" style="margin-top: 20%;">
                    <!-- <label for="song_lyrics">Lyrics Of The Song! <span class="text-danger">*</span></label> -->
                    <div id="song_lyrics" class="">
                        <?= $formattedSongLyrics; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="song_description">Tell Us About The Song! <span class="text-danger">*</span></label>
                    <div id="song_description" class="">
                        <?= $formattedSongDescription; ?>
                    </div>
                </div>
                jksdkfkj
                <!-- Iframe Of The Song If It's Exits -->
            </div>
            
            



            <!-- Blog Section on the right -->
            <div class="col-md-4">
                <div class="sidebar" style="position: sticky; top: 20px; align-self: flex-start;">
                    <div class="row">
                        <div class="col-12">
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
                        <div class="col-12">
                            <div class="widget widget-popular-post">
                                <h6 class="widgettitle font-weight-bold"><span>Popular Posts</span></h6>

                                <?php while ($row = $get_blog->fetch_assoc()): ?>
                                    <div class="single-post">
                                        <div class="part-img">
                                            <img src="<?= BURL . $row['blog_img'] ?>" alt="<?= htmlspecialchars($row['title_of_blog']) ?>" class="w-100 border">
                                        </div>
                                        <div class="part-text">
                                            <h4>
                                                <a href="<?= BURL ?>index/blog/index_blog_details/<?= $row['bid'] ?>/<?= $row['slug'] ?>">
                                                    <?= $row['title_of_blog'] ?>
                                                </a>
                                            </h4>
                                            <small>Views: <?=$row['views']?></small><br>
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
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".download-button").click(function (e) {
            e.preventDefault(); // Prevent auto-download at first
            
            let aid = $(this).data("aid");
            let downloadUrl = $(this).attr("href");

            // Send AJAX request to update clicks
            $.post("<?= BURL ?>logic/update_clicks", { aid: aid }, function (response) {
                let result = JSON.parse(response);
                
                if (result.success) {
                    console.log("Click recorded successfully.");
                } else {
                    console.log("Error updating click count:", result.error);
                }

                // Allow the actual download
                window.location.href = downloadUrl;
            });
        });
    });
</script>