
<!-- <div class="row mt-5">
    <div class="col-md-8 offset-md-2 col-6 m-3">
        <div class="shadow p-4">
            <h3 class="">Songs Category!</h3><hr>
            <form action="<?=BURL?>music/action" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name">Name Of Song <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name_of_song" required>
                </div>
                <div class="mb-3">
                    <label for="">Choose A Category <span class="text-danger">*</span></label>
                    <select name="" id="" class="form-select">
                        <option value="">Choose A Category</option>
                        <option value="">sdkz</option>
                        <option value="">sdkz</option>
                        <option value="">sdkz</option>
                        <option value="">sdkz</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Choose A Mood <span class="text-danger">*</span></label>
                    <select name="" id="" class="form-select">
                        <option value="">Choose A Mood</option>
                        <option value="">sdkz</option>
                        <option value="">sdkz</option>
                        <option value="">sdkz</option>
                        <option value="">sdkz</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Description">Tell Us About The Song! <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="song_description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Add Photo <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="song_img"  required>
                </div>
                <div class="mb-3">
                    <label for="MainSong">Add Song<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="song" required>
                </div>
                <div class="mb-3">
                    <label for="moz_tune">Add Song Fill<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="moz_tune">
                </div>
                <div class="mt-5 text-center">
                    <input type="submit" value="Send" class="btn btn-primary col-6">
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Music/</span> Genre</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Genre</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?=BURL?>genre/action" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="mood_name">Genre Name <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-model" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Genre Name" aria-label="Enter Mood Name" aria-describedby="Mood Name" name="genre_name" id="genreName" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Send" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->