<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-6 offset-md-3 col-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Reset Password </h6>
                <form action="<?=BURL?>profile/change_password_action" method="POST">
                    <?=$this->alert->get()?>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control" id="exampleInputName"
                            aria-describedby="NametHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="exampleInputDate1"
                            aria-describedby="dateHelp">
                        <div id="NameHelp" class="form-text">We'll never share your Password with anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Comfirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="exampleInputDate1"
                            aria-describedby="dateHelp">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary col-12">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>