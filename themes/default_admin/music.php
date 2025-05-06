<div class="row m-2">
    <div class="col-12">
        <div class="shadow card p-5">
            <h4 class="card-title text-center">Post A Song!</h4>
            <div class="d-flex justify-content-end">
                <div class="col-6">
                    <!-- Progress bar (hidden initially) -->
                    <div class="progress mt-3" style="display:none;" id="progressBarDiv">
                        <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                </div>
            </div>

            <form class="form-horizontal form-material" action="<?= BURL ?>music/action" id="songForm" enctype="multipart/form-data" method="post">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-12 col-md-6">
                        <!-- Song Name -->
                        <div class="form-group">
                            <label for="name_of_song">Name Of Song <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name_of_song" name="name_of_song" required>
                        </div>

                        <!-- Genre -->
                        <div class="form-group">
                            <label>Choose A Genre <span class="text-danger">*</span></label>
                            <select name="genre" id="genre" class="form-select" required>
                                <option value="">Select A Genre</option>
                                <?php while ($row = $get_genre->fetch_assoc()): ?>
                                <option value="<?= $row['genre_name']?>"><?= $row['genre_name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <!-- Mood -->
                        <div class="form-group">
                            <label>Choose A Mood <span class="text-danger">*</span></label>
                            <select name="mood" id="mood" class="form-select" required>
                                <option value="">Select A Mood</option>
                                <?php while ($row = $get_mood->fetch_assoc()): ?>
                                <option value="<?= $row['mood_name']?>"><?= $row['mood_name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <!-- Song Description (Using CKEditor) -->
                        <div class="form-group">
                            <label for="song_description">Tell Us About The Song! <span class="text-danger">*</span></label>
                            <textarea id="song_description" name="song_description" rows="5" class="form-control" required></textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-12 col-md-6">
                        <!-- Song Lyrics (Using CKEditor) -->
                        <div class="form-group">
                            <label for="song_lyrics">Lyrics Of The Song! <span class="text-danger">*</span></label>
                            <textarea id="song_lyrics" name="song_lyrics" rows="5" class="form-control" required></textarea>
                        </div>

                        <!-- Song Image -->
                        <div class="form-group">
                            <label for="song_img">Add Photo <span class="text-danger">*</span></label>
                            <input type="file" name="song_img" id="song_img" class="form-control" accept=".jpeg, .jpg, .png, .gif" required>
                        </div>

                        <!-- Audio File -->
                        <div class="form-group">
                            <label for="audioFile">Add Song <span class="text-danger">*</span></label>
                            <input type="file" name="audioFile" id="audioFile" class="form-control" accept=".mp3, .aac, .wav" required>
                        </div>

                        <div class="form-group">
                            <label for="moz_tune">MOZ Tune <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="moz_tune" name="moz_tune" accept=".aac">
                        </div>

                        <div class="mb-3">
                            <label for="tag-input">Add Tags For The Audio <span class="text-danger">*</span></label>
                            <input type="text" id="tag-input" class="form-control" placeholder="Type a tag and press Enter or comma">
                            
                            <!-- Display visual tags -->
                            <div id="tagContainer" class="mt-2"></div>

                            <!-- Hidden input for form submission -->
                            <input type="hidden" name="tag_audio" id="hiddenTagInput" required>
                        </div>

                    </div>
                </div>

                <!-- Progress Bar -->
                <!-- <div class="progress mt-3" id="progressBarDiv" style="display: none;">
                    <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;">0%</div>
                </div> -->

                <!-- Submit Button -->
                <div class="form-group">
                    <div class="col-12 text-center mt-4">
                        <input type="submit" value="Send" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>

            <!-- Result area -->
            <div id="result" class="mt-3"></div>
        </div>
    </div>
</div>




<!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#songDescription' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
   CKEDITOR.config.language = 'en'; // Set language
   CKEDITOR.replace('editor1');
   var editorData = CKEDITOR.instances.editor1.getData();
</script> -->

<!-- Include Tagify -->
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
