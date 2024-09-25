<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Show Case/</span> Add New</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add A New Show Case</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= BURL ?>show_case/action" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label" for="img">Image</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-title" class="input-group-text"><i class="bx bx-image"></i></span>
                                    <input type="file" class="form-control" placeholder="Enter Image" aria-label="Enter Image" aria-describedby="Img Business" name="show_img" id="img" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="link">Show Case Link</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-model" class="input-group-text"><i class="bx bx-link"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Show Link" aria-label="Enter Show Case" aria-describedby="Link" name="show_link" id="link" required />
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Add Show Case" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->