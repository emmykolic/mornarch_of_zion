<?php
class packages extends boiler
{

    public function __construct()
    {
        parent::__construct();
    }


    public function  defaultb($start = 0)
    {
        $this->auth->editor();
        $this->page_title = "M.O.Z | Create Subscription Packages";
        $uid = $this->auth->uid;
        $this->set_token();
        // $list = $this->db->query("SELECT * FROM trips,routes WHERE trips.route=routes.rid ORDER BY trips.tid DESC LIMIT $start, 50");
        $this->auth->user(9);
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/packages.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function action() {
        $uploadDir = 'assets/package_uploads/'; // Specify your upload directory
        $allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];

        $this->auth->editor();
        $uid = $this->auth->uid;

        $name_of_subscription_package = $this->clean->post('name_of_subscription_package');
        if ($name_of_subscription_package == "") {
            $this->error = 1;
            $this->error_msg .= 'Empty Package Name!';
        }

        $price_of_subscription_package = $this->clean->post('price_of_subscription_package');
        if ($price_of_subscription_package == "") {
            $this->error = 1;
            $this->error_msg .= 'Price Of Package is Empty!';
        }
        
        $Description_of_subscription_package = $this->clean->post('Description_of_subscription_package');
        if ($Description_of_subscription_package == "") {
            $this->error = 1;
            $this->error_msg .= 'Description Of Package is Empty!';
        }

        $subscription_package_img = $_FILES['subscription_package_img']; // Change this line to access the file input for the image
        if ($subscription_package_img == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Image Field';
        }

        // Handle Image File Upload
        $imageFilePath = $uploadDir . basename($subscription_package_img['name']);
        $imageFileType = $this->getFileMimeType($subscription_package_img['tmp_name']);

        echo "Image File Type: " . $imageFileType . "<br>";  // Debugging line

        if (in_array($imageFileType, $allowedImageTypes)) {
            if (move_uploaded_file($subscription_package_img['tmp_name'], $imageFilePath)) {
                // Image upload successful
            } else {
                $this->error = 1;
                $this->error_msg .= "Error moving uploaded image file.<br>";
            }
        } else {
            $this->error = 1;
            $this->error_msg .= "Invalid image file type.<br>";
        }

        $date_created = date('Y-m-d H:i:s');
        
        if ($this->error == 0) {
            // Generate the slug for the blog post
            // Use $this->generateSlug instead of generateSlug
            // $slug = $this->generateSlug($title_of_blog, $this->db);
            $this->db->query("INSERT INTO packages (name_of_subscription_package, price_of_subscription_package, Description_of_subscription_package, subscription_package_img, date_created)  VALUES ('$name_of_subscription_package', '$price_of_subscription_package', '$Description_of_subscription_package', '$imageFilePath', '$date_created')");
            
            $this->alert->set("Blog added successfully", 'success');
            header('location:' . BURL . "packages/single");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "packages");
        }
    }

    public function single() {
        // Ensure the user is authenticated
        $this->auth->editor();
        $this->page_title = "M.O.Z Sub Packages | Single";
        $uid = $this->auth->uid;
        $this->set_token();
        $this->auth->user(9);
        $package_list = $this->db->query("SELECT * FROM packages ORDER BY pid DESC LIMIT 20");

        function truncate($text, $chars = 100) {
            if (strlen($text) > $chars) {
                $text = substr($text, 0, $chars) . "...";
            }
            return $text;
        }
    
        // Include the necessary files for the single blog post page
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/packages_single.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    
    


    public function  edit($bid)
    {
        $this->auth->editor();

        $this->page_title = "Edit Blogs";
        $this->set_token();
        // $single = $this->db->query("SELECT * FROM trips,routes WHERE trips.route=routes.rid AND trips.tid='$tid' ");
        $single = $this->db->query("SELECT * FROM blogs WHERE bid='$bid' ");
        if ($single->num_rows > 0) {
            $single = $single->fetch_assoc();
            // $driver = $single['driver'];
            // $vehicle = $single['vehicle'];
        } else {
            $this->alert->set("Blog cannot be found", 'danger');
            die(header('location:' . BURL . "blog"));
        }
        // $routes = $this->db->query("SELECT * FROM routes");
        // $vehicles = $this->db->query("SELECT * FROM vehicles");
        // $drivers = $this->db->query("SELECT * FROM users WHERE type=4");
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/blog_edit.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }



    public function edit_action(){   
    $uploadDir = 'assets/blog_uploads/'; // Specify your upload directory
    $allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];

    $this->auth->editor();
    
    $uid = $this->auth->uid;
    $title_of_blog = $this->clean->post('title_of_blog');
    $bid = $this->clean->post('bid');
    if ($bid == "") {
        $this->error = 1;
        $this->error_msg .= ' Invalid Blog !';
    }

    if ($title_of_blog == "") {
        $this->error = 1;
        $this->error_msg .= ' Empty Title!';
    }

    $blog_content = $this->clean->post('blog_content');
    if ($blog_content == "") {
        $this->error = 1;
        $this->error_msg .= ' Empty Content';
    }

    $subscription_package_img = $_FILES['subscription_package_img'];
    if ($subscription_package_img['error'] == UPLOAD_ERR_NO_FILE) {
        $this->error = 1;
        $this->error_msg .= ' Empty Image Field';
    } else {
        // Handle Image File Upload
        $imageFilePath = $uploadDir . basename($blog_img['name']);
        $imageFileType = $this->getFileMimeType($blog_img['tmp_name']);
        
        echo "Image File Type: " . $imageFileType . "<br>";  // Debugging line

        if (in_array($imageFileType, $allowedImageTypes)) {
            if (move_uploaded_file($blog_img['tmp_name'], $imageFilePath)) {
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
        $title_of_blog = $this->db->real_escape_string($title_of_blog);
        $blog_content = $this->db->real_escape_string($blog_content);

        // Update the database with the escaped values
        $this->db->query("UPDATE blogs SET blog_img='$imagePathForDB', title_of_blog='$title_of_blog', blog_content='$blog_content',  date_created = '$date_created' WHERE bid='$bid'");
        $this->alert->set("Blog Updated successfully", 'success');
        header('location:' . BURL . "blog/single");
    } else {
        $this->alert->set($this->error_msg, 'danger');
        header('location:' . BURL . "blog/single");
    }
}

// Helper function to get the MIME type of a file
private function getFileMimeType($filePath) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $filePath);
    finfo_close($finfo);
    return $mimeType;
}

    // Function to get file MIME type using mime_content_type
    // private function getFileMimeType($filePath) {
    //     if (function_exists('mime_content_type')) {
    //         return mime_content_type($filePath);
    //     } else {
    //         // If mime_content_type function is not available, fallback to a less reliable method
    //         $finfo = finfo_open(FILEINFO_MIME_TYPE);
    //         $mime = finfo_file($finfo, $filePath);
    //         finfo_close($finfo);
    //         return $mime;
    //     }
    // }
}