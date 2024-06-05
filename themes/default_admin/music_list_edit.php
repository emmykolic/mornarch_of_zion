
<div class="row mt-5">
    <div class="col-md-8 col-12 m-3">
        <div class="shadow p-4">
            <h3 class="">Edit A Song!</h3><hr>
            <form action="<?=BURL?>music/edit_action" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name">Name Of Song <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name_of_song" value="<?=$single['song_name']?>" required>
                </div>
                <div class="mb-3">
                    <label for="">Choose A Genre <span class="text-danger">*</span></label>
                    <select name="genre" id="genre" class="form-select">
                       <option value="<?=$single['genre']?>"><?=$single['genre']?></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Choose A Mood <span class="text-danger">*</span></label>
                    <select name="mood" id="" class="form-select">
                        <option value="<?= $single['mood']?>"><?= $single['mood'] ?></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Description">Tell Us About The Song! <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="song_description" id="editor1" rows="5" cols="40" required><?=$single['song_description']?></textarea>
                    
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
                    <label for="Lyrics">Lyrics Of The Song! <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="song_lyrics" id="editor1" rows="5" cols="40" required><?=$single['song_lyrics']?></textarea>
                    
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
                    <label for="">Update Photo</label>
                    <input type="file" class="form-control" name="song_img" accept=".jpeg, .jpg, .png, .gif">
                </div>
                <div class="mb-3">
                    <label for="MainSong">Update Song</label>
                    <input type="file" class="form-control" name="audioFile" accept=".mp3, .aac, .wav" id="audioFile">
                </div>
                <!-- <div class="mb-3">
                    <label for="moz_tune">Update MOZ Tune</label>
                    <input type="file" class="form-control" name="moz_tune" accept=".acc, .wav">
                </div> -->
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