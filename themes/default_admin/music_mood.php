
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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Song/</span> Mood</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Mood</h5>
                        <a href="<?=BURL?>mood/add" class="btn btn-primary p-2">Add Mood</a>
                    </div>
                    <div class="card-body">
                    
                        <table class="table table-striped table-hover">
                            
                            <thead class="thead-light">
                            
                                <tr>
                                    <th>S/N</th>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = $mood->fetch_assoc()): ?>
                                <tr>
                                    <td><?=$row['mid']?></td>
                                    <td><?=$row['mood_name']?></td>
                                    <td>
                                    <a href="<?=BURL?>mood/delete/<?=$row['mid']?>" class="btn btn-outline-danger btn-sm"> <i class="bx bx-trash"></i></a>
                                    <a href="<?=BURL?>mood/edit/<?=$row['mid']?>" class="btn btn-outline-primary btn-sm"> <i class="bx bx-edit"></i></a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                            
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->