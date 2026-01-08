<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Routes/</span> Latest</h4>
        <div class="row">
            <div class="col-md-8 offset-md-2 rounded bg-white p-md-5 p-2">
                <div class="row text-right mb-3">
                    <a href="<?= BURL ?>routes/add" class="btn btn-success ms-auto col-md-3 col-12"> Add Routes</a>
                </div>

                <?php if ($list->num_rows > 0) : ?>

                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Take off point</th>
                            <th>Drop off point</th>
                            <th>Price</th>
                            <th>Maximum Daily Capacity</th>
                            <th>Actions</th>
                        </tr>
                        <?php while ($row = $list->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $row['take_off'] ?></td>
                                <td><?= $row['drop_off'] ?></td>
                                <td>NGN <?= $row['price'] ?></td>
                                <td><?= $row['max_capacity'] ?> People</td>
                                <td>
                                    <a href="<?= BURL ?>routes/delete/<?= $row['rid'] ?>" class="btn btn-outline-danger btn-sm"> <i class="bx bx-trash"></i></a>
                                    <a href="<?= BURL ?>routes/edit/<?= $row['rid'] ?>" class="btn btn-outline-primary btn-sm"> <i class="bx bx-edit"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>


                <?php else : ?>
                    <div class="alert alert-danger"> You Have No Routes</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>