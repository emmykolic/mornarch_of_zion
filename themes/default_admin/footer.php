     <!-- Footer -->
     <footer class="content-footer footer bg-footer-theme">
       <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
         <div class="mb-2 mb-md-0">
           ©
           <script>
             document.write(new Date().getFullYear());
           </script>
           <?= $this->setting->site_name?>
         </div>
         
       </div>
     </footer>
     <!-- / Footer -->

     <div class="content-backdrop fade"></div>
   </div>
   <!-- Content wrapper -->
   </div>
   <!-- / Layout page -->
   </div>

   <!-- Overlay -->
   <div class="layout-overlay layout-menu-toggle"></div>
   </div>
   <!-- / Layout wrapper -->
 
<!-- Tagify JS -->
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>

<!-- Include Bootstrap Tags Input JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-tagsinput@0.8.0/dist/bootstrap-tagsinput.min.js"></script> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/selectize@0.15.2/dist/js/standalone/selectize.min.js"></script> -->

<!-- Include Selectize.js JavaScript -->
<!-- <script src="https://cdn.jsdelivr.net/npm/selectize@0.15.2/dist/js/standalone/selectize.min.js"></script> -->

<!-- Include Select2 CSS and JS (Make sure you include these in your head section) -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- build:js assets/vendor/js/core.js -->
<script src="<?= BURL ?>themes/default_admin/assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= BURL ?>themes/default_admin/assets/vendor/libs/popper/popper.js"></script>
<script src="<?= BURL ?>themes/default_admin/assets/vendor/js/bootstrap.js"></script>
<script src="<?= BURL ?>themes/default_admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script> -->


<script src="<?= BURL ?>themes/default_admin/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= BURL ?>themes/default_admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="<?= BURL ?>assets/croppie.js"></script>
<!-- Bootstrap Notify -->
<script src="<?= BURL ?>assets/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Sweet Alert -->
<script src="<?= BURL ?>assets/sweetalert/sweetalert.min.js"></script>

<script src="<?= BURL ?>assets/tinymce/tinymce.min.js"></script>

<!-- Main JS -->
<script src="<?= BURL ?>themes/default_admin/assets/js/main.js"></script>

<!-- Page JS -->
<script src="<?= BURL ?>themes/default_admin/assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


<script type="module">
  import {
    ClassicEditor,
    Essentials,
    Paragraph,
    Bold,
    Italic,
    Font
  } from 'ckeditor5';
  ClassicEditor
    .create( document.querySelector( '#editor' ), {
      plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
      toolbar: [
        'undo', 'redo', '|', 'bold', 'italic', '|',
        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
      ]
    } )
    .then( editor => {
      window.editor = editor;
    } )
    .catch( error => {
      console.error( error );
    } );
</script>
<!-- A friendly reminder to run on a server, remove this during the integration. -->
<script>
  window.onload = function() {
    if ( window.location.protocol === 'file:' ) {
      alert( 'This sample requires an HTTP server. Please serve this file with a web server.' );
    }
  };
</script>

<script type="module">
  import {
    ClassicEditor,
    Essentials,
    Paragraph,
    Bold,
    Italic,
    Font
  } from 'ckeditor5';
  ClassicEditor
    .create( document.querySelector( '#editor1' ), {
      plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
      toolbar: [
        'undo', 'redo', '|', 'bold', 'italic', '|',
        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
      ]
    } )
    .then( editor => {
      window.editor = editor;
    } )
    .catch( error => {
      console.error( error );
    } );
</script>
<!-- A friendly reminder to run on a server, remove this during the integration. -->
<script>
  window.onload = function() {
    if ( window.location.protocol === 'file:' ) {
      alert( 'This sample requires an HTTP server. Please serve this file with a web server.' );
    }
  };
</script>

<?php if ($this->page_js != "") : ?>
  <script src="<?= $this->page_js ?>"></script>
<?php endif; ?>
<script>
  tinymce.init({
    selector: '.myEditor',
    plugins: 'image code',
    toolbar: 'image | link unlink | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | undo redo | code | formatselect ',
    style_formats: [{
        title: 'Bold text',
        inline: 'strong'
      },
      {
        title: 'Red text',
        inline: 'span',
        styles: {
          color: '#ff0000'
        }
      },
      {
        title: 'Red header',
        block: 'h1',
        styles: {
          color: '#ff0000'
        }
      },
      {
        title: 'Badge',
        inline: 'span',
        styles: {
          display: 'inline-block',
          border: '1px solid #2276d2',
          'border-radius': '5px',
          padding: '2px 5px',
          margin: '0 2px',
          color: '#2276d2'
        }
      },
      {
        title: 'Table row 1',
        selector: 'tr',
        classes: 'tablerow1'
      }
    ],



    images_upload_url: (burl + 'assets/tiny_uploads'),
    file_picker_types: 'image',
    // enable title field in the Image dialog
    image_title: true,
    // enable automatic uploads of images represented by blob or data URIs
    automatic_uploads: true,
    // add custom filepicker only to Image dialog

    file_picker_callback: function(cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');

      input.onchange = function() {
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function() {
          var id = 'blobid' + (new Date()).getTime();
          var blobCache = tinymce.activeEditor.editorUpload.blobCache;
          var base64 = reader.result.split(',')[1];
          var blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);

          // call the callback and populate the Title field with the file name
          cb(blobInfo.blobUri(), {
            title: file.name
          });
        };
        reader.readAsDataURL(file);
      };

      input.click();
    },

    images_upload_handler: function(blobInfo, success, failure) {
      var xhr, formData;

      xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      var burl = document.getElementById('burl').value;
      xhr.open('POST', (burl + 'tiny_upload'));

      xhr.onload = function() {
        var json;

        if (xhr.status != 200) {
          failure('HTTP Error: ' + xhr.status);
          return;
        }

        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.file_path != 'string') {
          failure('Invalid JSON: ' + xhr.responseText);
          return;
        }

        success(json.file_path);
      };

      formData = new FormData();
      formData.append('file', blobInfo.blob(), blobInfo.filename());

      xhr.send(formData);
    },
  });
</script>

<script type="text/javascript">
  function validate(x = "are you sure you want to perform this action?") {
    if (confirm(x) == true) {
      return true;
    } else {
      return false;
    }
  }
</script>

<?php $this->alert->get(); ?>

</body>

</html>