<?php
class blog extends boiler
{

    public function __construct()
    {
        parent::__construct();
    }


    public function  defaultb($start = 0)
    {
        $this->auth->user();
        $this->page_title = "M.O.Z Blog";
        $uid = $this->auth->uid;
        $this->set_token();
        // $list = $this->db->query("SELECT * FROM trips,routes WHERE trips.route=routes.rid ORDER BY trips.tid DESC LIMIT $start, 50");
        $this->auth->user(9);
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/blog.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function action()
    {
        $uploadDir = 'assets/blog_uploads/'; // Specify your upload directory
        $allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];

        $this->auth->editor();
        $uid = $this->auth->uid;

        $title_of_blog = $this->clean->post('title_of_blog');
        if ($title_of_blog == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Title!';
        }

        $blog_content = $this->clean->post('blog_content');
        if ($blog_content == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Blog Content!';
        }

        $blog_img = $_FILES['blog_img']; // Change this line to access the file input for the image
        if ($blog_img == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Image Field';
        }
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

        $date_created = date();
        
        if ($this->error == 0) {
            $this->db->query("INSERT INTO blogs (title_of_blog,blog_content,blog_img,date_created) VALUES ('$title_of_blog','$blog_content','$imageFilePath','$date_created') ");
            $this->alert->set("Trip added successfully", 'success');
            header('location:' . BURL . "blog/single");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "blog");
        }
    }

    public function  single(){
        $this->auth->user();
        $this->page_title = "M.O.Z Blog | Single";
        $uid = $this->auth->uid;
        $this->set_token();
        $this->auth->user(9);
        $blog_list = $this->db->query("SELECT * FROM blogs ORDER BY bid LIMIT 20");
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/blog_single.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }




    public function  edit($tid)
    {
        $this->auth->editor();

        $this->page_title = "Edit Trip";
        $this->set_token();
        $single = $this->db->query("SELECT * FROM trips,routes WHERE trips.route=routes.rid AND trips.tid='$tid' ");
        if ($single->num_rows > 0) {
            $single = $single->fetch_assoc();
            $driver = $single['driver'];
            $vehicle = $single['vehicle'];
        } else {
            $this->alert->set("Trip cannot be found", 'danger');
            die(header('location:' . BURL . "trips"));
        }
        $routes = $this->db->query("SELECT * FROM routes");
        $vehicles = $this->db->query("SELECT * FROM vehicles");
        $drivers = $this->db->query("SELECT * FROM users WHERE type=4");
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/trips_edit.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }



    public function edit_action()
    {
        $this->auth->editor();
        $uid = $this->auth->uid;
        $route = $this->clean->post('route');
        $tid = $this->clean->post('tid');
        if ($tid == "") {
            $this->error = 1;
            $this->error_msg .= ' Invalid trip!';
        }

        if ($route == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Route!';
        }

        $trip_time = $this->clean->post('trip_time');
        if ($trip_time == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Trip Time';
        }

        $trip_date = $this->clean->post('trip_date');
        if ($trip_date == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Trip Date';
        }

        $vehicle = $this->clean->post('vehicle');
        if ($vehicle == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty vehicle';
        }

        $driver = $this->clean->post('driver');
        if ($driver == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty driver';
        }

        if ($this->error == 0) {

            $this->db->query("UPDATE trips SET route='$route',trip_time='$trip_time',trip_date='$trip_date',vehicle='$vehicle',driver='$driver', manager='$uid' WHERE tid='$tid' ");
            $this->alert->set("Trip Updated successfully", 'success');
            header('location:' . BURL . "trips");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "trips");
        }
    }

    public function delete($tid)
    {
        $this->auth->editor();
        $this->page_title = "Trip delete";
        $uid = $this->auth->uid;
        $this->set_token();
        $single = $this->db->query("DELETE FROM trips WHERE tid='$tid'");
        $this->alert->set("Trip deleted", 'success');
        die(header('location:' . BURL . "Trips"));
    }

    // Function to get file MIME type using mime_content_type
    private function getFileMimeType($filePath) {
        if (function_exists('mime_content_type')) {
            return mime_content_type($filePath);
        } else {
            // If mime_content_type function is not available, fallback to a less reliable method
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $filePath);
            finfo_close($finfo);
            return $mime;
        }
    }
}