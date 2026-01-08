<div class="row mt-2">
    <div class="col-12 col-sm-8 offset-sm-2 ">
        <div class="shadow card p-5">
            <h4 class="card-title text-center">Create A Subscription Package</h4>

            <form class="form-horizontal form-material" action="<?= BURL ?>packages/action" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="name" class="col-md-12"> Name Of Subscription Package <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name_of_subscription_package" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-md-12"> Price Of Subscription Package <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="number" class="form-control" name="price_of_subscription_package" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-md-12">Description Of Subscription Package <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="Description_of_subscription_package" required>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="" class="col-md-12">Add Photo <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="subscription_package_img" accept=".jpeg, .jpg, .png, .gif" required>
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