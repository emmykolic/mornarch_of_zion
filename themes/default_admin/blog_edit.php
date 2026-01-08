<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blogs/</span> Edit</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Blogs</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= BURL ?>blog/edit_action" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="bid" value="<?= $single['bid'] ?>">
                            <div class="form-group">
                                <label for="name" class="col-md-12"> Title Of Blog <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="title_of_blog" value="<?=$single['title_of_blog']?>" required>
                                </div>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="Description" class="col-md-12"> <span class="text-danger"></span></label>
                                <textarea class="form-control" name="blog_content" id="editor1" rows="20" cols="40" required><?=$single['blog_content']?></textarea>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="" class="col-md-12">Add Photo <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="blog_img" accept=".jpeg, .jpg, .png, .gif" required>
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
        </div>
    </div>
    <!-- / Content -->