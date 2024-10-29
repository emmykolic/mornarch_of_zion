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
                                    <th>Song Image</th>
                                    <th>Song Name</th>
                                    <th>Song</th>
                                    <th>Song Lyrics</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $song_list->fetch_assoc()): ?>
                                <tr>
                                    <td><?=$row['aid']?></td>
                                    <td>
                                        <img src="<?=BURL . $row['song_img']?>" class="w-px-40 h-auto" />
                                    </td>
                                    <td><?=$row['song_name']?></td>
                                    <td>
                                        <audio controls loop class="audio-player" data-aid="<?=$row['aid']?>">
                                            <source src="<?=BURL . $row['song']?>" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </td>
                                    
                                    <td>
                                        <div>
                                            <p>
                                                <!-- Truncated Text -->
                                                <span class="truncated-text"><?= truncate($row['song_lyrics'], 100) ?></span>
                                                
                                                <!-- Full Text -->
                                                <span class="full-text" style="display: none;"><?= $row['song_lyrics'] ?></span>
                                                
                                                <?php if ($row['song_lyrics']):?>
                                                <!-- Read More Link -->
                                                <a href="javascript:void(0);" class="read-more">Read More</a>
                                                <?php elseif ($row['song_lyrics'] == ""):?>
                                                    
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </td>

                                    <td>
                                        <div style="display: flex; flex-direction: row; gap: 5px;">
                                            <a href="<?=BURL?>music/delete/<?=$row['aid']?>" class="btn btn-outline-danger btn-sm">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                            <a href="<?=BURL?>music/edit/<?=$row['aid']?>" class="btn btn-outline-primary btn-sm">
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
