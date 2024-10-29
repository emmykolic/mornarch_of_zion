<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users/</span> Add Manager or Driver</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add A Manager Or Driver Account</h5>
                    </div>
                    <div class="card-body">
                        <form id="formAuthentication" class="mb-3" action="<?= BURL ?>users/action" method="POST" required>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus required oninput="checkUser()" />
                                <p id="userError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required />
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="fullname" placeholder="Enter your Full Name" required />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required />
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Account Type</label>
                                <select type="text" class="form-control" id="type" name="account_type" required>
                                    <option value="">Select Account Type</option>
                                    <option value="5">Manager</option>
                                    <option value="4">Artist</option>
                                </select>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" oninput="checkPassword()" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="cpassword" oninput="checkPassword()" class="form-control" name="cpassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="Confirm password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <p id="passwordError"></p>
                            </div>

                            <button class="btn btn-primary d-grid w-100" name="submit">Sign up</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    <script>
        class GoodPerson {
            name;
            constructor(name) {
                this.name = name;
            }
            sayName = () => console.log(this.name);
        }

        let kai = new GoodPerson("kai")
        kai.sayName()
    </script>