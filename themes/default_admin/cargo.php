<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cargo/</span> Latest</h4>
        <div class="row">
            <div class="col-md-12 rounded bg-white p-md-5 p-2 table-responsive">
                <div class="row text-right mb-3">
                    <a href="<?= BURL ?>trips/add" class="btn btn-success ms-auto col-md-3 col-12">New Cargo Delivery</a>
                </div>

                <?php if ($list->num_rows > 0) : ?>

                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Batch Number</th>
                            <th>Origin to Destination</th>
                            <th>Price</th>
                            <th>Current Location</th>
                            <th>Client Name & Phone Number</th>
                            <th>Reciepient Name & Phone Number</th>
                            <th>Tracking Number</th>
                            <th>Actions</th>

                        </tr>
                        <?php while ($row = $list->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $row['take_off'] ?></td>
                                <td><?= $row['drop_off'] ?></td>
                                <td>NGN <?= $row['price'] ?></td>
                                <td><?= $row['max_capacity'] ?> People</td>
                                <th><?= $row['trip_time'] ?></th>
                                <th><?= $row['trip_date'] ?></th>
                                <th><?= $row['booked'] ?></th>

                                <td>
                                    <a href="<?= BURL ?>cargo/delete/<?= $row['cid'] ?>" class="btn btn-outline-danger btn-sm mb-1"> <i class="bx bx-trash"></i></a>
                                    <a href="<?= BURL ?>cargo/edit/<?= $row['cid'] ?>" class="btn btn-outline-primary btn-sm mb-1"> <i class="bx bx-edit"></i></a>
                                    <a href="<?= BURL ?>cargo/delivered/<?= $row['cid'] ?>" class="btn btn-outline-success btn-sm"> <i class="bx bx-check"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>


                <?php else : ?>
                    <div class="alert alert-danger"> You Have No Scheduled Trips</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>