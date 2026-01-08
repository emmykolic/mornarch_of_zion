<?php
class interface_edit extends boiler
{

    public function __construct()
    {
        parent::__construct();
    }


    public function  defaultb($start = 0)
    {
        $this->auth->editor("admin");
        $this->page_title = "Interface Edit";
        $uid = $this->auth->uid;
        // $list = $this->db->query("SELECT * FROM users ORDER BY uid DESC LIMIT $start, 250");
        // $num = $list->num_rows;
        // if (($start + 25) < $num) {
        //     $is_more = 1;
        // }
        $this->set_token();
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/interface_edit.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    function about_action() {
        $uploadDir = 'assets/interface_uploads/';
        $allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];

        $this->auth->editor();
        $uid = $this->auth->uid;

        $about_title = $this->clean->post('about_title');
        $about_description = $this->clean->post('about_description');
        $about_img = $_FILES['about_img'];
    
        if ($about_title == "" || $about_description == "" || empty($about_img['name'])) {
            $this->error = 1;
            $this->error_msg .= " All fields are required.";
        }
    
        // Handle image upload
        $imageFilePath = $uploadDir . basename($about_img['name']);
        $imageFileType = $this->getFileMimeType($about_img['tmp_name']);
    
        if (!in_array($imageFileType, $allowedImageTypes)) {
            $this->error = 1;
            $this->error_msg .= " Invalid image type.";
        } elseif (!move_uploaded_file($about_img['tmp_name'], $imageFilePath)) {
            $this->error = 1;
            $this->error_msg .= " Failed to upload image.";
        }

        if ($this->error == 0) {
            $date_created = date('Y-m-d H:i:s');
    
            $this->db->query("INSERT INTO about_fields (about_title, about_description, about_img, date_created) VALUES ('$about_title', '$about_description', '$imageFilePath','$date_created')");
    
            $this->alert->set("About Us Added Successfully", 'success');
            header("Location: " . BURL . "interface_edit/interface_list");
            exit;
           echo "succesful";
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header("Location: " . BURL . "blog");
            exit;
            echo "error";
        }
    }

    public function interface_list() {
        $this->auth->editor();
        $this->page_title = "Interface List";
        $this->set_token();

        // Fetch ALL records
        // $about_fields = $this->db->query("SELECT * FROM about_fields ORDER BY aid DESC LIMIT 5");
        $about_fields = $this->db->query(" SELECT * FROM about_fields WHERE deleted = 0 ORDER BY aid DESC ");
       


        function truncate($text, $chars = 100) {
            return (strlen($text) > $chars) ? substr($text, 0, $chars) . "..." : $text;
        }

        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/interface_list.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function trash() {
        $this->auth->editor();
        $this->page_title = "Deleted About Entries";
        $this->set_token();

        $about_fields = $this->db->query("SELECT * FROM about_fields WHERE deleted = 1 ORDER BY aid DESC");

        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/interface_trash.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function delete($aid) {
        $this->auth->editor();

        $this->db->query("UPDATE about_fields SET deleted = 1 WHERE aid = '$aid'");

        $this->alert->set("Moved to trash", "success");
        header("Location: " . BURL . "interface_edit/interface_list");
        exit;
    }

    public function restore($aid) {
        $this->auth->editor();

        $this->db->query("UPDATE about_fields SET deleted = 0 WHERE aid = '$aid'");

        $this->alert->set("Record Restored Successfully", "success");
        header("Location: " . BURL . "interface_edit/trash");
        exit;
    }



    public function edit($aid) {
        $this->set_token();
        $this->auth->editor();
        $this->page_title = "Edit About Section";
        
        $about_fields = $this->db->query("SELECT * FROM about_fields WHERE aid = '$aid' ");
        if ($about_fields->num_rows > 0) {
            $about_fields = $about_fields->fetch_assoc();
            // $driver = $single['driver'];
            // $vehicle = $single['vehicle'];
        } else {
            $this->alert->set("About Us Cannot Be Found", 'danger');
            die(header('location:' . BURL . "interface_edit"));
        }

        // $routes = $this->db->query("SELECT * FROM routes");
        // $vehicles = $this->db->query("SELECT * FROM vehicles");
        // $drivers = $this->db->query("SELECT * FROM users WHERE type=4");
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/interface_list_edit.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function edit_action(){   
        $uploadDir = 'assets/interface_uploads/'; // Specify your upload directory
        $allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];

        $this->auth->editor();
        
         $uid = $this->auth->uid;
        $about_title = $this->clean->post('about_title');
        $aid = $this->clean->post('aid');
        if ($aid == "") {
            $this->error = 1;
            $this->error_msg .= ' Invalid About Interface!';
        }
 
        if ($about_title == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Title!';
        }

         $about_description = $this->clean->post('about_description');
        if ($about_description == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Content';
        }

         $about_img = $_FILES['about_img'];
        if ($about_img['error'] == UPLOAD_ERR_NO_FILE) {
            $this->error = 1;
            $this->error_msg .= ' Empty Image Field';
        } else {
            // Handle Image File Upload
             $imageFilePath = $uploadDir . basename($about_img['name']);
            $imageFileType = $this->getFileMimeType($about_img['tmp_name']);
            
            echo "Image File Type: " . $imageFileType . "<br>";  // Debugging line

            if (in_array($imageFileType, $allowedImageTypes)) {
                 if (move_uploaded_file($about_img['tmp_name'], $imageFilePath)) {
                    // Image upload successful
                } else {
                    $this->error = 1;
                    $this->error_msg .= "Error moving uploaded image file.<br>";
 
                }
             } else {
                $this->error = 1;
                $this->error_msg .= "Invalid image file type.<br>";
            }
        }

        $date_created = time();

        if ($this->error == 0) {
            // Escape the variables to prevent SQL injection
            $imagePathForDB = $this->db->real_escape_string($imageFilePath);
            $about_title = $this->db->real_escape_string($about_title);
            $about_description = $this->db->real_escape_string($about_description);

            // Update the database with the escaped values
            $this->db->query("UPDATE about_fields SET about_img='$imagePathForDB', about_title='$about_title', about_description='$about_description',  date_created = '$date_created' WHERE aid='$aid'");

            header('location:' . BURL . "interface_edit/interface_list");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "interface_edit/interface_list");
        }
    }

    // Helper function to get the MIME type of a file
    private function getFileMimeType($filePath) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $filePath);
        finfo_close($finfo);
        return $mimeType;
    }
}
?>