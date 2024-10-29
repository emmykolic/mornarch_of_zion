<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin's/Managers/</span> Latest</h4>
        <div class="row mt-4" style="min-height: 70vh;">
            <div class="col-lg-12">
                <div class="card p-2 px-md-5 pb-md-5">

                    <div class="card-header pb-0 mb-3">
                        <div class="row d-flex align-items-end justify-content-between">
                            <h6 class="col-md-2 col-sm-3 col-12">Users</h6>

                            <div class="col-sm-6 col-12 ">
                                <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-search" aria-hidden="true"></i> </span>
                                    <input class="form-control" type="text" id="userSearch" placeholder="Search users">
                                </div>
                            </div>
                            <a href="<?= BURL ?>users/add" class="btn btn-success ms-auto col-md-2 col-sm-3 col-12"> Add Manager/Artist</a>
                        </div>
                    </div>
                    <?php if ($num > 0) : ?>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Users</th>
                                            <th class="stext-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userBox">
                                        <div class="col-md-12">
                                            <center id="loading" class="d-none"><img src='<?= BURL ?>assets/loading.gif' height='35'></center>
                                        </div>
                                        <?php
                                        while ($row = $list->fetch_assoc()) :
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <?php if ($row['photo'] != "" && file_exists("./" . $row['photo'])) : ?>
                                                                <img src="<?= BURL ?><?= $row['photo'] ?>" class="avatar avatar-sm me-3" alt="">
                                                            <?php else : ?>
                                                                <img src="<?= BURL ?>assets/default.png" class="avatar avatar-sm me-3" alt="">
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                <?= $row['firstname'] .' '. $row['lastname'] ?> ( <?= ($row['type'] == 5) ? 'Manager' : 'Artist' ?> )<br>
                                                                <small><?= $row['phone'] ?> <?= $row['email'] ?></small>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="badge bg-info badge-pill" href="<?= BURL ?>users/edit/<?= $row['uid'] ?>" title="Edit"><i class="bx bx-edit"></i></a>
                                                    <?php if ($row['is_suspended'] == 0) : ?>
                                                        <a class="badge bg-danger badge-pill" href="<?= BURL ?>users/block/<?= $row['uid'] ?>" title="Block"><i class="bx bx-user"></i> Block</a>
                                                    <?php else : ?>
                                                        <a class="badge bg-success badge-pill" href="<?= BURL ?>users/unblock/<?= $row['uid'] ?>" title="Unblock"><i class="bx bx-user"></i> Unblock</a>
                                                    <?php endif; ?>


                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                                <div class=" col-12 d-flex justify-content-center">
                                    <div class="btn-group col-3" role="group" aria-label="Basic example">
                                        <?php if ($start > 25) : ?>
                                            <a href="<?= BURL ?>users/defaultb/<?= ($start - 25) ?>" type="button" class="btn btn-warning">
                                                < PREV</a>
                                                <?php endif; ?>
                                                <?php if (isset($is_more)) : ?>
                                                    <a href="<?= BURL ?>users/defaultb/<?= ($start + 25) ?>" type="button" class="btn btn-warning">NEXT ></a>
                                                <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-warning"> No Artists or Managers Found! </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>