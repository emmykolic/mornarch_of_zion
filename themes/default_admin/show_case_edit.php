<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Vehicle/</span> Edit</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Vehicle</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= BURL ?>vehicles/edit_action" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="vid" value="<?= $single['vid'] ?>">
                            <div class="mb-3">
                                <label class="form-label" for="plateNo">Plate Number</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-title" class="input-group-text"><i class="bx bx-text"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Plate Number" aria-label="Enter Plate Number" aria-describedby="plate no" name="plate_no" id="plateNo" value="<?= $single['plate_no'] ?>" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="model">Vehicle Model</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-model" class="input-group-text"><i class="bx bx-car"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter  Vehicle Model" aria-label="Enter Model" aria-describedby="model" name="model" id="model" value="<?= $single['model'] ?>" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="capacity">Vehicle Capacity</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-capacity" class="input-group-text"><i class="bx bx-group"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter capacity" aria-label="Enter Vehicle Capacity" aria-describedby="capacity" name="capacity" id="capacity" value="<?= $single['capacity'] ?>" required />
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Update Vehicle" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->