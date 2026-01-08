<section class="ftco-section ftco-intro bg-danger" style="background-image: url(<?= BURL ?>themes/mornarch_landing/images/cta.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h2 class="mb-3">Please fill our charter form and we will call you back with a quote</h2>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">

            <div class="col-md-12 block-9 mb-md-5">

                <form action="index/charter_action" class="bg-light p-5 contact-form" method="POST">
                    <h1 class="text-danger text-center display-6">Charter Form</h1>
                    <div class="row mb-3">
                        <div class="input-group col-md-6 rounded-0 mb-3">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-user text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Your Name" name="name">
                        </div>
                        <div class="input-group col-md-6 mb-3">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-phone text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Your Phone Number" name="phone">
                        </div>

                        <div class="input-group col-md-6 mb-3">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-envelope text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Your Email" name="email">
                        </div>

                        <div class="input-group col-md-6 mb-3">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-map text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Your address" name="address">
                        </div>


                        <div class="input-group col-md-6 mb-3">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-road text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Your take off Point" name="take_off">
                        </div>

                        <div class="input-group col-md-6 mb-3">
                            <span class="input-group-text rounded-0 bg-danger border-0"><span class="icon-car text-white"></span></span>
                            <input type="text" class="form-control rounded-0 border-left-0" placeholder="Your drop off Point" name="drop_off">
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Request Quote" class="btn btn-dark py-3 px-5 float-right" name="<?= $this->token ?>">
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</section>