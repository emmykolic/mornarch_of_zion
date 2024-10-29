<!-- Begin Uren's Login Register Area -->
<div class="uren-login-register_area">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12 col-md-6 offset-md-3 ">
                <div class="card p-5">
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <h3>Add Photo</h3>
                        <p>Current image</p>
                        <p><img src="<?=BURL?><?=$profile['photo']?>" alt="Current Image" height="70"></p>
                            <input type="hidden" name="uid" value="<?= $uid ?>" id="uid">
                            <div class="custom-file">
                                <input type="file" class="form-control" name="upload_image" id="upload_image">
                                <label class="custom-file-label" for="customFile"><i class='far fa-picture-o'></i> Choose Image</label>
                            </div>
                            <div id="uploaded_image"></div>
                            <div class="row">
                                <div class="col-md-12" id="cropperWrapper">
                                    <center>
                                        <div id="image_demo" class="mt-3"></div>
                                    </center>
                                </div>
                                <div class="col-md-12">
                                    <center id="loading" class="d-none"><img src='<?=BURL?>assets/loading.gif' height='35'></center>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <center>
                                        <button class="btn crop_user_image btn-primary">Finish cropping</button>
                                        <a href="<?=BURL?>profile" class="btn btn-primary">Skip</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>