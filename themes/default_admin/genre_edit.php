<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Genre/</span> Edit</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Genre</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?=BURL?>genre/edit_action" method="post">
                        <input type="hidden" name="gid" value="<?=$collect_genre['gid']?>">
                            <div class="mb-3">
                                <label class="form-label" for="genre_name">Name Of Genre</label>
                                <div class="input-group input-group-merge">
                                <?php while ($row = $genre_name->fetch_assoc() ): ?>
                                    <span id="basic-icon-default-model" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" value="<?=$row['genre_name']?>" aria-label="Enter Genre Name" aria-describedby="Genre Name" name="genre_name" id="genreName" required />
                                <?php endwhile; ?>
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