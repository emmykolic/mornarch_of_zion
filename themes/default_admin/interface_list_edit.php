<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="multi-form-card p-4">

                <h4 class="text-center mb-4">Edit Actions</h4>
                 <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"></h5>
                    <a href="<?=BURL?>interface_edit/edit_action" class="btn btn-primary p-2">Interface List</a>
                </div>
                <div class="row g-3">
                    <!-- Form 1 -->
                    <div class="col-md-6">
                        <form action="<?=BURL?>interface_edit/about_action" method="post" class="mini-form" enctype="multipart/form-data">
                            <input type="hidden" name="aid" value="<?= $about_fields['aid'] ?>">
                            <h6>About Us</h6>
                            <input type="text" class="form-control mb-2" placeholder="About Title" name="about_title" value="<?=$about_fields['about_title']?>">
                            <textarea type="text" class="form-control mb-2" placeholder="About Deescription" name="about_description"><?=$about_fields['about_description']?></textarea>
                            <div class="mb-3">
                                <label class="form-label" for="mood_name">Genre Name <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input type="file" class="form-control mb-2" name="about_img" accept=".jpeg, .jpg, .png, .gif">
                                </div>
                            </div>
                            
                            <div class="mb3">
                                <button class="btn btn-danger btn-sm w-100">Upload</button>
                            </div>
                        </form>
                    </div>
                    

                </div>

            </div>
        </div>
    </div>
</div>
