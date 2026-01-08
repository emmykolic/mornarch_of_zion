<div class="container mt-4">
    <h3>Deleted About Entries</h3>
    <a href="<?=BURL?>interface_edit/interface_list" class="btn btn-primary mb-3">Back to List</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description (Short)</th>
                <th>Image</th>
                <th>Date Deleted</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $about_fields->fetch_assoc()): ?>
            <tr>
                <td><?=$row['aid']?></td>
                <td><?=$row['about_title']?></td>
                <td><?=substr($row['about_description'], 0, 60)?>...</td>
                <td><img src="<?=BURL.$row['about_img']?>" width="80"></td>
                <td><?=$row['date_created']?></td>
                <td>
                    <a href="<?=BURL?>interface_edit/restore/<?=$row['aid']?>" class="btn btn-success btn-sm">Restore</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
