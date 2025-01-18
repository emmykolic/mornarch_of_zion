<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Packages/</span>Admin View</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">View Blogs</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>NO</th>
                                        <th>Sub Package Image</th>
                                        <th>Name Of Sub Package</th>
                                        <th>Description Of Sub Package</th>
                                        <th>Prices Of Sub Package</th>
                                        <th>Date Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $package_list->fetch_assoc()): ?>
                                    <tr>
                                        <td><?=$row['pid']?></td>
                                        <td>
                                            <img src="<?=BURL . $row['subscription_package_img']?>" width="100" class="h-auto rounded-circle" />
                                        </td>
                                        <td><?=htmlspecialchars($row['name']);?></td>
                                        
                                        <td>
                                            <div>
                                                <!-- Truncated Text -->
                                                 <span class="truncated-text"><?= truncate($row['Description_of_subscription_package'], 100) ?></span>
                                                <!-- Full Text -->
                                                <p class="full-text" style="display: none;"><?= nl2br(htmlspecialchars($row['Description_of_subscription_package'])); ?></p>

                                                <?php if ($row['Description_of_subscription_package']):?>
                                                <!-- Read More Link -->
                                                <a href="javascript:void(0);" class="see-more">Read More</a>
                                                <?php elseif ($row['Description_of_subscription_package'] == ""):?>
                                                    
                                                <?php endif; ?>
                                            </div>
                                        </td>

                                        

                                        <td>
                                            <small>$<?= $row['price'] ?></small>
                                        </td>

                                        <td>
                                            <span><?=date( $row['date_created'])?></span>
                                        </td>

                                        <td>
                                            <a href="<?=BURL?>packages/delete/<?=$row['pid']?>" class="btn btn-outline-danger btn-sm">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                            <a href="<?=BURL?>packages/edit/<?=$row['pid']?>" class="btn btn-outline-primary btn-sm">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->