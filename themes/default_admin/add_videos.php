
<div class="row mt-5">
    <div class="col-md-6 offset-md-3 col-11 m-3">
        <div class="shadow p-4">
            <h3 class="">Post A Song!</h3><hr>
            <form action="<?=BURL?>videos/action" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="uid" value="<?=BURL?>">
                <div class="mb-3">
                    <label for="name">Name Of Song <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name_of_song" required>
                </div>
                <div class="mb-3">
                    <label for="">Add Photo <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="video_description" id="editor1" cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="bx bx-video"></i></span>
                    <input type="text" name="source" placeholder="Video youtube Link" class="form-control">
                </div>
                <div class="mt-5 text-center">
                    <input type="submit" value="Send" class="btn btn-primary col-6">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
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
</script>