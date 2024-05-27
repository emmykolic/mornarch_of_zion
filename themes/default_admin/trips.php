<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trips/</span> Latest</h4>
        <div class="row">
            <div class="col-md-12 rounded bg-white p-md-5 p-2 table-responsive">
                <div class="row text-right mb-3">
                    <a href="<?= BURL ?>trips/add" class="btn btn-success ms-auto col-md-3 col-12"> Schedule A New Trip</a>
                </div>

                <?php if ($list->num_rows > 0) : ?>

                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Take off point</th>
                            <th>Drop off point</th>
                            <th>Price</th>
                            <th>Capacity</th>
                            <th>Time</th>
                            <th>Trip Date</th>
                            <th>Booked Passengers</th>
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
                                    <a href="<?= BURL ?>trips/delete/<?= $row['tid'] ?>" class="btn btn-outline-danger btn-sm"> <i class="bx bx-trash"></i></a>
                                    <a href="<?= BURL ?>trips/edit/<?= $row['tid'] ?>" class="btn btn-outline-primary btn-sm"> <i class="bx bx-edit"></i></a>
                                    <a href="<?= BURL ?>trips/manifest/<?= $row['tid'] ?>" class="btn btn-outline-info btn-sm"> <i class="bx bx-printer"></i></a>
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