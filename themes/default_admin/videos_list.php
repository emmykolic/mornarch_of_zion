<div class="row mt-5">
    <div class="col-12 offset-sm-2 col-sm-8 m-3 mx-auto">
        <div class="shadow p-4 text-center">
            <h3 class="mb-4"><b>List Of Videos!</b></h3>
            <hr>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"></h5>
                    <a href="<?=BURL?>videos" class="btn btn-primary p-2">Add Video</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>NO</th>
                                    <th>Video Name</th>
                                    <th>Video Link</th>
                                    <th>Video Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $get_video->fetch_assoc()): ?>
                                <?php
                                    // Initialize video ID as empty
                                    $videoId = '';

                                    // Check if source URL exists and extract video ID accordingly
                                    if (!empty($row['source'])) {
                                        $url = $row['source'];

                                        // Parse the URL and extract the video ID from different possible formats
                                        if (strpos($url, 'watch?v=') !== false) {
                                            // Full YouTube URL with watch?v=
                                            $videoId = explode('watch?v=', $url)[1];
                                        } elseif (strpos($url, 'youtu.be/') !== false) {
                                            // Short YouTube URL
                                            $videoId = explode('youtu.be/', $url)[1];
                                        } elseif (strpos($url, 'youtube.com/embed/') !== false) {
                                            // Already in embed format
                                            $videoId = explode('embed/', $url)[1];
                                        } else {
                                            // Catch all for unusual cases by taking the last segment
                                            $parts = explode('/', rtrim($url, '/'));
                                            $videoId = end($parts);
                                        }

                                        // Ensure no query parameters remain in the video ID
                                        $videoId = strtok($videoId, '&');
                                    }
                                ?>
                                <tr>
                                    <td><?= $row['vid'] ?></td>
                                    <td><?= htmlspecialchars($row['name_of_video']) ?></td>
                                    <td>
                                        <!-- Container for maintaining aspect ratio -->
                                        <!-- <div class="iframe-container"> -->
                                            <!-- Embed video with parsed video ID -->
                                            <iframe
                                                src="https://www.youtube.com/embed/<?= htmlspecialchars($videoId) ?>"
                                                allowfullscreen
                                                frameborder="0">
                                            </iframe>
                                        <!-- </div> -->
                                    </td>
                                    <td>
                                        <p>
                                            <span class="full-text"><?= htmlspecialchars($row['video_description']) ?></span>
                                        </p>
                                    </td>
                                    <td>
                                        <div style="display: flex; flex-direction: row; gap: 5px;">
                                            <a href="<?= BURL ?>videos/delete/<?= $row['vid'] ?>" class="btn btn-outline-danger btn-sm">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                            <a href="<?= BURL ?>videos/edit/<?= $row['vid'] ?>" class="btn btn-outline-primary btn-sm">
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
