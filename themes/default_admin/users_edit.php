<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users/</span> Edit Manager or Artist</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Manager Or Artist Account</h5>
                    </div>
                    <div class="card-body">
                        <form id="formAuthentication" class="mb-3" action="<?= BURL ?>users/edit_action" method="POST" required>
                            <input type="hidden" name="uid" value="<?= $person['uid'] ?>">

                            <div class="mb-3">
                                <label for="name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="name" name="firstname" placeholder="Enter your First Name" value="<?= $person['firstname'] ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="name" name="lastname" placeholder="Enter your Last Name" value="<?= $person['lastname'] ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" value="<?= $person['phone'] ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Account Type</label>
                                <select type="text" class="form-control" id="type" name="account_type" required>
                                    <option value="<?= $person['type'] ?>"><?= ($person['type'] == 4) ? "Artist" : "Manager" ?></option>
                                    <option value="5">Manager</option>
                                    <option value="4">Artist</option>
                                </select>
                            </div>


                            <button class="btn btn-primary d-grid w-100" name="submit">Updates Account</button>
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