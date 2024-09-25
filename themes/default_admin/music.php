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

            <form class="form-horizontal form-material" id="myForm" method="post" enctype="multipart/form-data">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-md-12">Name Of Song <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name_of_song" required>
                            </div>
                        </div>
                        <!-- <div class="form-group tag-container">
                            <input type="text" id="tag-input" placeholder="Type and press Enter" class="form-control">
                        </div> -->
                        <div class="form-group mt-3">
                            <label for="genre" class="col-md-12">Choose A Genre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="select-tags" name="genre" data-role="tagsinput" placeholder="Choose a genre">
                        </div>

                        <script>
                        $(document).ready(function() {
                            // Initialize tags input
                            $('#select-tags').tagsinput({
                                trimValue: true,
                                allowDuplicates: false
                            });

                            // Get genres from PHP (as JSON)
                            var genres = <?php echo json_encode($genres); ?>;

                            // Loop over the genres and add them as tags
                            genres.forEach(function(genre) {
                                $('#select-tags').tagsinput('add', genre);
                            });
                        });
                        </script>

                        <div class="form-group mt-3">
                            <label for="select-tags" class="col-md-12">Choose A Genre <span class="text-danger">*</span></label>
                            <select name="genre[]" id="select-tags" class="form-select" multiple="multiple" required>
                                <option value="">Choose A Genre</option>
                                <?php while ($row = $get_genre->fetch_assoc()): ?>
                                <option value="<?=$row['genre_name']?>"><?=$row['genre_name']?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="" class="col-md-12">Choose A Mood <span class="text-danger">*</span></label>
                            <select name="mood" id="" class="form-select" required>
                                <option value="">Choose A Mood</option>
                                <?php while ($row = $get_mood->fetch_assoc()): ?>
                                <option value="<?= $row['mood_name']?>"><?= $row['mood_name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="Description" class="col-md-12">Tell Us About The Song! <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="song_description" id="editor1" rows="5" required></textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-12 col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="Lyrics" class="col-md-12">Lyrics Of The Song! <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="song_lyrics" id="editor2" rows="5" required></textarea>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="" class="col-md-12">Add Photo <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="song_img" accept=".jpeg, .jpg, .png, .gif" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="MainSong" class="col-md-12">Add Song <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="audioFile" accept=".mp3, .aac, .wav" id="audioFile" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="moz_tune" class="col-md-12">MOZ Tune <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="moz_tune" accept=".aac">
                        </div>
                    </div>
                </div>

                <!-- Submit Button Row -->
                <div class="form-group">
                    <div class="col-12 text-center mt-4">
                        <input type="submit" value="Send" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Result area -->
    <div id="result" class="mt-3"></div>
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