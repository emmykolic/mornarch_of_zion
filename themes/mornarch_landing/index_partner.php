<section class="ftco-section ftco-intro bg-danger" style="background-image: url(<?=BURL?>themes/mornarch_landing/images/handshake.jpg); background-position: center;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h2 class="mb-3">Please fill our partnership form and we will call you back</h2>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">

            <div class="col-md-8 offset-md-2 block-9 mb-md-5  p-md-5 p-2 shadow">
                <h1 class="text-center display-5 text-danger"> <b>Partnership Form</b> </h1>
                <p class="lead font-weight-lighter text-center mb-3">Welcome <?=$this->setting->site_name?> Partnership Registration, Please Fill The Form Below To Become A Partner, And Earn With Us.</p>

                <form id="formAuthentication" class="mb-3" action="<?=BURL?>index/partner_action" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" oninput="checkUser()" autofocus />
                        <p id="userError"></p>
                    </div>
                    <div class="mb-3">
                    <label for="username" class="form-label">Fullname</label>
                    <input
                        required="required"
                        type="text"
                        class="form-control"
                        id="fullname"
                        name="fullname"
                        placeholder="Enter your fullname"
                        autofocus
                    />
                    </div>
                
                    <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" required="required" class="form-control" id="email" name="email" placeholder="Enter your email" />
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Phone</label>
                        <input
                            type="text"
                            class="form-control"
                            id="phone"
                            name="phone"
                            placeholder="Enter your phone number"
                            autofocus
                        />
                    </div>

                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input
                            required="required"
                            type="password"
                            id="password"
                            class="form-control"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password"
                            oninput="checkPassword()"
                            />
                        </div>
                    </div>

                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Confirm password</label>
                        <div class="input-group input-group-merge">
                            <input
                            required="required"
                            type="password"
                            id="cpassword"
                            class="form-control"
                            name="cpassword"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="confirm password"
                            oninput="checkPassword()"
                            />
                        </div>
                        <p id="passwordError"></p>
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="password">Partnership Type</label>
                    <div class="input-group">
                        <select
                        required="required"
                        id="account_type"
                        class="form-control"
                        name="account_type"
                        aria-describedby="account type"
                        >
                        <option value="">Select Partnership Type</option>
                        <option>I Want To Invest In Genext</option>
                        <option>I Want To Add My Vehicle To Genext Fleet</option>
                        <option>I Want To Provide A Service To Genext</option>
                        </select>
                    </div>
                    </div>

                    <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions">
                        I agree to
                        <a href="https://genextmotors.com.ng/index/terms" class="text-danger">privacy policy & terms</a>
                        </label>
                    </div>
                    </div>
                    <button class="btn btn-danger d-grid w-100" type='submit' name='<?= $this->token;?>'>Sign up</button>
              </form>

            </div>
        </div>

    </div>
</section>