<div class="row mt-2">
    <div class="col-12 col-sm-8 offset-sm-2 ">
        <div class="shadow card p-5">
            <h4 class="card-title text-center">Edit A Song!</h4>

            <form class="form-horizontal form-material" action="<?= BURL ?>music/action" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="name" class="col-md-12">Name Of Song <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name_of_song" value="<?=$single['song_name']?>" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="" class="col-md-12">Choose A Genre <span class="text-danger">*</span></label>
                    <select name="genre" id="genre" class="form-select">
                    <option value="">Choose A Genre</option>
                       <option value="<?=$single['genre']?>"><?=$single['genre']?></option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="" class="col-md-12">Choose A Mood <span class="text-danger">*</span></label>
                    <select name="mood" id="" class="form-select">
                        <option value="">Choose A Mood</option>
                        <option value="<?= $single['mood']?>"><?= $single['mood'] ?></option>
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label for="Description" class="col-md-12">Tell Us About The Song! <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="song_description" id="editor1" rows="5" cols="40" required><?=$single['song_description']?></textarea>
                </div>
                <div class="mb-3 mt-3">
                    <label for="Lyrics" class="col-md-12">Lyrics Of The Song! <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="song_lyrics" id="editor2" rows="5" cols="40" required><?=$single['song_lyrics']?></textarea>
                </div>
                <div class="mb-3 mt-3">
                    <label for="" class="col-md-12">Add Photo <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="song_img" accept=".jpeg, .jpg, .png, .gif" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="MainSong" class="col-md-12">Add Song<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="audioFile" accept=".mp3, .aac " id="audioFile" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="moz_tune" class="col-md-12">MOZ Tune<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="moz_tune" accept=".acc">
                </div>
                <div class="form-group">
                    <div class="col-12 text-center">
                        <input type="submit" value="Send" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>