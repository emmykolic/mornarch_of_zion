<!-- Where i want all the list in the database to display -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="multi-form-card p-4">

                <h4 class="text-center mb-4">Quick Actions</h4>
                 <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"></h5>
                    <a href="<?=BURL?>interface_edit/interface_list" class="btn btn-primary p-2">Interface List</a>
                </div>
                <div class="table-responsive row g-3">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th>NO</th>
                                <th>About Title</th>
                                <th>About Description</th>
                                <th>About Image</th>
                                <th>Last Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $about_fields->fetch_assoc()): ?>
                            <tr>
                                <td><?=$row['aid']?></td>
                                <td><?=htmlspecialchars($row['about_title']);?></td>
                                
                                <td>
                                    <p>
                                        <div class="blog-content-block">
                                            <!-- Truncated Text -->
                                            <span class="truncated-text"><?= truncate($row['about_description'], 100) ?></span>
                                            <!-- Full Text -->
                                            <p class="full-text" style="display: none;"><?= nl2br(htmlspecialchars($row['about_description'])); ?></p>

                                            <?php if ($row['about_description']):?>
                                            <!-- Read More Link -->
                                            <a href="javascript:void(0);" class="see-more">Read More</a>
                                            <?php elseif ($row['about_description'] == ""):?>
                                                
                                            <?php endif; ?>
                                        </div>

                                    </p>
                                </td>
                                <td>
                                    <img src="<?=BURL . $row['about_img']?>" width="100" class="h-auto rounded-circle" />
                                </td>
                                <td>
                                    <span><?=date( $row['date_created'])?></span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 flex-wrap"> <!-- FIX LAYOUT -->
                                        
                                        <a href="<?=BURL?>interface_edit/edit/<?=$row['aid']?>"
                                        class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center">
                                            <i class="bx bx-edit"></i>
                                        </a>

                                        <a href="<?=BURL?>interface_edit/delete/<?=$row['aid']?>"
                                        class="btn btn-outline-danger btn-sm d-flex align-items-center justify-content-center">
                                            <i class="bx bx-trash"></i>
                                        </a>

                                        <a href="<?=BURL?>interface_edit/restore/<?=$row['aid']?>"
                                        class="btn btn-success btn-sm d-flex align-items-center justify-content-center">
                                            <i class="bx bx-reset"></i> Restore
                                        </a>

                                    </div>
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
