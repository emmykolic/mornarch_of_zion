<section class="ftco-section ftco-intro bg-danger" style="background-image: url(<?= BURL ?>themes/mornarch_landing/images/cta.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white">
                <h2 class="mb-3">We offer a safe and fast way to delivery your goods to any destination in nigeria.</h2>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pt bg-light blog-post">
    <div style="margin-top: 30px; margin-bottom: 30px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center mb-5">
                    <span class="subheading text-danger">Here's Our Latest Post</span>
                    <h2 class="mb-2">Latest Post</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="row" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                        <!-- First Post -->
                        <?php while ($row = $get_video->fetch_assoc()): ?>
                        <div class="col-xl-6 col-lg-6">
                            <div class="row py-3">
                                <div class="col-md-6">
                                    <img src="<?=BURL . $row['song_img']?>" class="img-fluid rectangular-image rounded img-thumbnail" alt="Post Image">
                                </div>
                                <div class="col-md-6">
                                    <div class="part-text">
                                        <h4><a href="<?=BURL?>index/video_view/<?=$row['vid']?>"><?=$row['song_name']?></a></h4>
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
                    <div class="sidebar" style="position: sticky; top: 20px; align-self: flex-start;">
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
    </div>
</section>
