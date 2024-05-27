<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Mood/</span> Edit</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Mood</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?=BURL?>mood/edit_action" method="post">
                        <input type="hidden" name="mid" value="<?=$collect_mood['mid']?>">
                            <div class="mb-3">
                                <label class="form-label" for="mood_name">Name Of Mood</label>
                                <div class="input-group input-group-merge">
                                <?php while ($row = $mood_name->fetch_assoc() ): ?>
                                    <span id="basic-icon-default-model" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" value="<?=$row['mood_name']?>" aria-label="Enter Mood Name" aria-describedby="Mood Name" name="mood_name" id="moodName" required />
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