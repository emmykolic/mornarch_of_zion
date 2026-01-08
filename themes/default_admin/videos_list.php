<div class="row mt-5">
    <div class="col-12 offset-sm-2 col-sm-8 m-3 mx-auto">
        <div class="shadow p-4 text-center">
            <h3 class="mb-4"><b>List Of Songs!</b></h3>
            <hr>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"></h5>
                    <a href="<?=BURL?>music" class="btn btn-primary p-2">Add Music</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>NO</th>
                                    <th>Name Of Video</th>
                                    <th>Video Description</th>
                                    <th>Tags Video</th>
                                    <th>Video</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $get_video->fetch_assoc()): ?>
                                <tr>
                                    <td><?=$row['vid']?></td>
                                    <td><?=$row['name_of_video']?></td>
                                    <td><?=$row['video_description']?></td>
                                    <td><?=$row['tag_video']?></td>
                                    <td>
                                        
                                        <div class="embed-responsive embed-responsive-16by9 rounded shadow-sm">
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= htmlspecialchars($videoId) ?>" allowfullscreen></iframe>
                                        </div>

                                        
                                    </td>
                                    

                                    <td>
                                        <?=$row['date_created']?>
                                    </td>

                                    <td>
                                        <div style="display: flex; flex-direction: row; gap: 5px;">
                                            <a href="<?=BURL?>videos/delete/<?=$row['vid']?>" class="btn btn-outline-danger btn-sm">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                            <a href="<?=BURL?>videos/edit/<?=$row['vid']?>" class="btn btn-outline-primary btn-sm">
                                                <i class="bx bx-edit"></i>
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
</div>
