
<div class="row mt-5">
    <div class="col-md-8 col-12 m-3">
        <div class="shadow p-4">
            <h3 class="">Post A Song!</h3><hr>
            <form action="<?=BURL?>music/action" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name">Name Of Song <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name_of_song" required>
                </div>
                <div class="mb-3">
                    <label for="">Choose A Genre <span class="text-danger">*</span></label>
                    <select name="genre" id="genre" class="form-select">
                    <option value="">Choose A Genre</option>
                    <?php while ($row = $get_genre->fetch_assoc()):?>
                       <option value="<?=$row['genre_name']?>"><?=$row['genre_name']?></option>
                    <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Choose A Mood <span class="text-danger">*</span></label>
                    <select name="mood" id="" class="form-select">
                        <option value="">Choose A Mood</option>
                        <?php while ($row = $get_mood->fetch_assoc()): ?>
                        <option value="<?= $row['mood_name']?>"><?= $row['mood_name'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Description">Tell Us About The Song! <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="song_description" id="editor1" rows="10" cols="80" required></textarea>
                    
                    <script>
                        CKEDITOR.config.language = 'en'; // Set language
                        CKEDITOR.replace('editor1',{
                            height: 300,
                            toolbar: 'Basic',
                            // Other configuration options...
                        });
                    </script>
                </div>
                <div class="mb-3">
                    <label for="">Add Photo <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="song_img" accept=".jpeg, .jpg, .png, .gif" required>
                </div>
                <div class="mb-3">
                    <label for="MainSong">Add Song<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="audioFile" accept=".mp3, .aac " id="audioFile" required>
                </div>
                <div class="mb-3">
                    <label for="moz_tune">MOZ Tune<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="moz_tune" accept=".acc">
                </div>
                <div class="mt-5 text-center">
                    <input type="submit" value="Send" class="btn btn-primary col-6">
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-3">
        dfkjc
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
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
</script>