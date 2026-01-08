<!-- interface_edit default page -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="multi-form-card p-4">

                <h4 class="text-center mb-4">Quick Actions</h4>
                 <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"></h5>
                    <a href="<?=BURL?>interface_edit/interface_list" class="btn btn-primary p-2">Interface List</a>
                </div>
                <div class="row g-3">
                    <!-- Form 1 -->
                    <div class="col-md-6">
                        <form action="<?=BURL?>interface_edit/about_action" method="post" class="mini-form" enctype="multipart/form-data">
                            <h6>About Us</h6>
                            <input type="text" class="form-control mb-2" placeholder="About Title" name="about_title">
                            <textarea type="text" class="form-control mb-2" placeholder="About Deescription" name="about_description"></textarea>
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
                    <!-- Form 2 -->
                    <div class="col-md-6">
                        <form class="mini-form">
                            <h6>Add Scripture</h6>
                            <input type="text" class="form-control mb-2" placeholder="Bible Passage">
                            <input type="text" class="form-control mb-2" placeholder="Verse">
                            <button class="btn btn-danger btn-sm w-100">Save</button>
                        </form>
                    </div>

                    <!-- Form 3 -->
                    <div class="col-md-6">
                        <form class="mini-form">
                            <h6>Promote Artist</h6>
                            <input type="text" class="form-control mb-2" placeholder="Artist Name">
                            <select class="form-control mb-2">
                                <option>Choose Plan</option>
                                <option>Basic</option>
                                <option>Premium</option>
                            </select>
                            <button class="btn btn-danger btn-sm w-100">Proceed</button>
                        </form>
                    </div>

                    <!-- Form 4 -->
                    <div class="col-md-6">
                        <form class="mini-form">
                            <h6>Post What We Offer</h6>
                            <input type="text" class="form-control mb-2" placeholder="Blog Title">
                            <input type="file" class="form-control mb-2">
                            <button class="btn btn-danger btn-sm w-100">Publish</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
