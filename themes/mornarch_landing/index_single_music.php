<section class="ftco-section ftco-intro bg-danger" style="background-image: url('<?= htmlspecialchars($backgroundImage); ?>'); background-position: center; background-size: cover">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h2 class="mb-3"><?= htmlspecialchars($row['song_name']) ?></h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="m-3">
            <small><?= date("M, Y") ?></small><br>
            <button class="bg-dark">fdds</button>
        </div>
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-4">
                <!-- Contact Info (Address etc) -->
            </div>
            
            <div class="col-md-4 block-9 mb-md-5">
                <div>
                    <b><h1><?= htmlspecialchars($row['song_name']) ?></h1></b>
                </div>
                <div>
                    <audio controls loop id="audioPlayer-<?= $row['aid'] ?>" data-song-id="<?= $row['aid'] ?>">
                        <source src="<?= BURL . htmlspecialchars($row['song']) ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    <!-- Link to trigger download -->
                    <div class="text-left ml-5 mt-3">
                        <a class="btn btn-primary download-btn" id="downloadButton-<?= $row['aid'] ?>" href="<?= BURL . htmlspecialchars($row['song']) ?>" download>Download Audio</a>
                    </div>
                </div>

                <!-- Display formatted song description -->
                <div class="form-group">
                    <label for="song_description">Tell Us About The Song! <span class="text-danger">*</span></label>
                    <div id="song_description" class="form-control">
                        <?= $formattedSongDescription; ?>
                    </div>
                </div>

                <!-- Display formatted song lyrics -->
                <div class="form-group">
                    <label for="song_lyrics">Lyrics Of The Song! <span class="text-danger">*</span></label>
                    <div id="song_lyrics" class="form-control">
                        <?= $formattedSongLyrics; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Additional content -->
            </div>
        </div>
    </div>
</section>
