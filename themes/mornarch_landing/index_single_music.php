<?php while ($row = $song_single_query->fetch_assoc()): ?>
    <?php
        $imagePath = realpath($_SERVER['DOCUMENT_ROOT'] . '/' . $row['song_img']);

        if ($imagePath === true || file_exists($imagePath) || empty($row['song_img'])) {
            // Use the default image if the file does not exist or is empty
            $backgroundImage = BURL . 'assets/profile.jpg';
        } else {
            // Use the uploaded image
            $backgroundImage = BURL . $row['song_img'];
        }

    ?>
    <section class="ftco-section ftco-intro bg-danger" style="background-image: url('<?= $backgroundImage; ?>'); background-position: center; background-size: cover">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section heading-section-white ftco-animate">
                    <h2 class="mb-3"><?=$row['song_name']?></h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section contact-section">
        <div class="container">
        <div class="m-3">
            <small><?=date("M,Y")?></small><br>
            <button class="bg-dark">fdds</button>
        </div>
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> 346 Ikwerre Road Ikwerre Road Port Harcourt, Rivers state, Port Harcourt, Nigeria</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> Owerri, Nigeria</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> Onitcha Nigeria</p>
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="col-md-4 block-9 mb-md-5">
                <div class="">
                    <p><?=$row['song_description']?></p>
                </div>
                <div>
                    <audio controls loop>
                        <source src="<?=BURL . $row['song']?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    <!-- Link to trigger download -->
                    <div class="text-left ml-5 mt-3">
                        <a class="btn btn-primary download-btn" href="<?=BURL . $row['song']?>" download>Download Audio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> 346 Ikwerre Road Ikwerre Road Port Harcourt, Rivers state, Port Harcourt, Nigeria</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> Owerri, Nigeria</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> Onitcha Nigeria</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>