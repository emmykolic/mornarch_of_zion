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

    /**
     * Generates a URL-friendly slug from a given string
     * and ensures it is unique by checking against the database.
     */
    public function generateSlug($title, $db) {
        // Convert the title to lowercase and replace spaces and special characters
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));

        // Ensure slug is unique by appending a number if necessary
        $original_slug = $slug;
        $counter = 1;

        // Query to check if the slug already exists in the database
        $result = $db->query("SELECT * FROM blogs WHERE slug = '$slug'");

        while ($result->num_rows > 0) {
            $slug = $original_slug . '-' . $counter;
            $result = $db->query("SELECT * FROM blogs WHERE slug = '$slug'");
            $counter++;
        }

        return $slug;
    }

    public function action() {
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

        $date_created = date('Y-m-d H:i:s');
        
        if ($this->error == 0) {
            // Generate the slug for the blog post
            // Use $this->generateSlug instead of generateSlug
            $slug = $this->generateSlug($title_of_blog, $this->db);
            $this->db->query("INSERT INTO blogs (title_of_blog, blog_content, blog_img, slug, date_created) 
                            VALUES ('$title_of_blog', '$blog_content', '$imageFilePath', '$slug', '$date_created')");
            
            $this->alert->set("Blog added successfully", 'success');
            header('location:' . BURL . "blog/single");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "blog");
        }
    }

    public function single() {
        // Ensure the user is authenticated
        $this->auth->user();
        $this->page_title = "M.O.Z Blog | Single";
        $uid = $this->auth->uid;
        $this->set_token();
        $this->auth->user(9);
        $blog_list = $this->db->query("SELECT *, slug FROM blogs ORDER BY bid DESC LIMIT 20");
        //$blog_id = $row['bid']; // Assuming you have the blog post ID 
        // $this->db->query("UPDATE blogs SET views = views + 1  OR slug = '$slug' WHERE bid = '$blog_id'");
        // $slug = generateSlug($title, $db);

        function truncate($text, $chars = 100) {
            if (strlen($text) > $chars) {
                $text = substr($text, 0, $chars) . "...";
            }
            return $text;
        }
        
        // Get the blog ID from the URL
        // $blog_id = isset($_GET['bid']) ? (int)$_GET['bid'] : 0;
        
        // Debugging line to check the blog ID
        // echo "Blog ID: " . $blog_id . "<br>";
        
        // Fetch the blog post based on the blog ID
        // $blog_list = $this->db->query("SELECT * FROM blogs LIMIT 1");
    
        // // Check if the blog post exists
        // if ($blog_list->num_rows > 0) {
        //     // Fetch the blog post data
        //     $row = $blog_list->fetch_assoc();
        //     $blog_id = $row['bid'];
        //     $slug = $row['slug'];
        //     $title_of_blog = $row['title_of_blog'];
        //     $blog_content = $row['blog_content'];
        //     $views = $row['views'];
    
            // Increment the views count for this blog post
            // $this->db->query("UPDATE blogs SET views = views + 1 WHERE bid = '$blog_id'");
        // } else {
        //     echo "Blog post not found.";
        //     exit;
        // }
    
        // Include the necessary files for the single blog post page
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/blog_single.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function getBlogID($title_of_blog) {
        // Sanitize the input to prevent SQL injection
        $title_of_blog = $this->db->real_escape_string($title_of_blog);
        
        // Query to get the blog ID (bid) from the blogs table where the title matches
        $query = $this->db->query("SELECT bid FROM blogs WHERE title_of_blog = '$title_of_blog' LIMIT 1");
        
        // Execute the query
        $result = $this->db->query($query);
        
        // Check if the result has any rows
        if ($result->num_rows > 0) {
            // Fetch the row as an associative array
            $row = $result->fetch_assoc();
            
            // Access the bid (blog ID) from the result
            $blog_id = $row['bid'];
            
            // Debugging line to check the blog ID
            echo "Blog ID from getBlogID: " . $blog_id . "<br>";
            
            // Return the blog ID
            return $blog_id;
        } else {
            // If no blog was found, return false
            echo "Blog post not found.";
            return false;
        }
    }

    // public function single() {
    //     // Ensure the user is authenticated
    //     $this->auth->user();
    //     $this->page_title = "M.O.Z Blog | Single";
    //     $uid = $this->auth->uid;
    //     $this->set_token();
    
    //     // Get the blog ID from the URL if provided, otherwise use the title to get the blog ID
    //     // $blog_id = isset($_GET['bid']) ? (int)$_GET['bid'] : 0;
        
    //     // If the blog ID is not present in the URL, try getting it by blog title (or another field)
    //     // if ($blog_id == 0 && isset($_GET['title_of_blog'])) {
    //         // Fetch the blog ID using the title_of_blog from the URL
    //         // $title_of_blog = $_GET['title_of_blog'];
    //         // $blog_id = $this->getBlogID($title_of_blog);
    //     // }
    
    //     // Debugging line to check the blog ID
    //     // echo "Blog ID in single: " . $blog_id . "<br>";
        
    //     // Check if the blog_id is valid
    //     if ($blog_id > 0) {
    //         // Fetch the blog post based on the blog ID
    //         $result = $this->db->query("SELECT * FROM blogs WHERE bid = '$blog_id' LIMIT 1");
    
    //         // Check if the blog post exists
    //         if ($result->num_rows > 0) {
    //             // Fetch the blog post data
    //             $row = $result->fetch_assoc();
    //             $blog_id = $row['bid'];
    //             $slug = $row['slug'];
    //             $title_of_blog = $row['title_of_blog'];
    //             $blog_content = $row['blog_content'];
    //             $views = $row['views'];
    
    //             // Increment the views count for this blog post
    //             $this->db->query("UPDATE blogs SET views = views + 1 WHERE bid = '$blog_id'");
    //         } else {
    //             echo "Blog post not found.";
    //             exit;
    //         }
    //     } else {
    //         // If the blog ID is invalid (like 0), show an error message
    //         echo "Invalid blog ID.";
    //         exit;
    //     }
    
    //     // Include the necessary files for the single blog post page
    //     include_once 'themes/' . $this->setting->admin_theme . '/header.php';
    //     include_once 'themes/' . $this->setting->admin_theme . '/blog_single.php';
    //     include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    // }
    
        
        
    
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

    $blog_img = $_FILES['blog_img'];
    if ($blog_img['error'] == UPLOAD_ERR_NO_FILE) {
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