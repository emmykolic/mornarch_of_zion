<div class="row mt-2">
    <div class="col-12 col-sm-8 offset-sm-2 ">
        <div class="shadow card p-5">
            <h4 class="card-title text-center">Post Something We Can Read!</h4>

            <form class="form-horizontal form-material" action="<?= BURL ?>blog/action" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="name" class="col-md-12"> Title Of Blog <span class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="title_of_blog" required>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="Description" class="col-md-12"> <span class="text-danger"></span></label>
                    <textarea class="form-control" name="blog_content" id="editor1" rows="20" cols="40" placeholder="Share Your Thoughts!" required></textarea>
                </div>
                <div class="mb-3 mt-3">
                    <label for="" class="col-md-12">Add Photo <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="blog_img" accept=".jpeg, .jpg, .png, .gif" required>
                </div>
                <div class="form-group">
                    <div class="col-12 text-center">
                        <input type="submit" value="Send" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#songDescription' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
   CKEDITOR.config.language = 'en'; // Set language
   CKEDITOR.replace('editor1');
   var editorData = CKEDITOR.instances.editor1.getData();
</script> -->