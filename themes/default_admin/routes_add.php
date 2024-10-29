<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Routes/</span> Add New</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add A New Routes</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= BURL ?>routes/action" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label" for="plateNo">Take Off Point</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-title" class="input-group-text"><i class="bx bx-text"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Take Off Point" aria-label="Enter Take Off Point" aria-describedby="Take off" name="take_off" id="takeOff" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="model">Drop Off Point</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-model" class="input-group-text"><i class="bx bx-car"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Drop Off Point" aria-label="Enter Drop Off Point" aria-describedby="drop_off" name="drop_off" id="dropOff" required />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="price">Price</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-model" class="input-group-text"><i class="bx bx-money"></i></span>
                                    <input type="number" class="form-control" placeholder="Enter Price" aria-label="Enter Price" aria-describedby="price" name="price" id="price" required />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="max_capacity">Maximum Daily Capacity</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-model" class="input-group-text"><i class="bx bx-car"></i></span>
                                    <input type="number" class="form-control" placeholder="Enter Maximum Daily Capacity" aria-label="Enter Maximum Daily Capacity" aria-describedby="max_capacity" name="max_capacity" id="max_capacity" required />
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Add Route" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->