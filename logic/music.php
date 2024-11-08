<?php 
require_once __DIR__ . '/../logic/compressAudio.php';
class music extends boiler{
    public function __construct(){
        parent::__construct();
    }

    public function defaultb(){
        $this->page_title = "M.O.Z Music";
        // $list = $this->db->query("SELECT * FROM trips,routes WHERE trips.route=routes.rid ORDER BY trips.tid DESC LIMIT $start, 50");
        $this->set_token();
        $uid = $this->auth->uid;
        $this->auth->user(9);
        $get_genre = $this->db->query("SELECT * FROM genre ");
        $get_mood = $this->db->query("SELECT * FROM mood ");
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/music.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function song_list(){
        $uid = $this->auth->uid;
        $this->set_token();
        $this->auth->user(9);
        $song_list = $this->db->query("SELECT * FROM audios ORDER BY aid LIMIT 20");

        function truncate($text, $chars = 100) {
            if (strlen($text) > $chars) {
                $text = substr($text, 0, $chars) . "...";
            }
            return $text;
        }

        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/music_list.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    // In music.php or the relevant controller

    // In music.php or relevant controller

    public function get_full_lyrics() {
        $aid = intval($_GET['id']);
        $result = $this->db->query("SELECT song_lyrics FROM audios WHERE aid = $aid");
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['song_lyrics'];
        } else {
            http_response_code(404);
            echo 'Lyrics not found';
        }
    }

    public function show(){
        include_once 'themes/' . $this->setting->landing_theme . '/header.php';
        include_once 'themes/' . $this->setting->landing_theme . '/index_music.php';
        include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
    }

    // Function to get genre name based on genre ID
    function getGenreName($gid) {
        // Replace this with your database query to get the genre name based on $gid
        // For example: SELECT genre_name FROM genres WHERE gid = $gid;
        $get_genre = $this->db->query("SELECT * FROM genre WHERE gid = '$gid' ");
        // Execute the query and return the genre name
    }

    // Function to get mood name based on mood ID
    function getMoodName($mid) {
        // Replace this with your database query to get the mood name based on $mid
        // For example: SELECT mood_name FROM moods WHERE mid = $mid;
        $get_mood = $this->db->query("SELECT * FROM mood WHERE mid = '$mid' ");
        // Execute the query and return the mood name
    }


    public function action() {
        $uploadDir = 'assets/music_uploads/'; 
        $uploadDir2 = 'assets/uploads/';
        $allowedAudioTypes = ['audio/mpeg', 'audio/aac', 'audio/wav'];
        $allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    
        $uid = $this->auth->uid;
        $name_of_song = $this->clean->post("name_of_song");
        $genre = $this->clean->post("genre");
        $mood = $this->clean->post("mood");
        $song_description = $this->clean->post("song_description");
        $song_lyrics = $this->clean->post("song_lyrics");
        $song_img = $_FILES['song_img'];
        $audio_File = $_FILES['audioFile'];
        $tag_video = $this->clean->post("tag_video");
        $moz_tune = $this->clean->post("moz_tune");

        // Handle Audio File Upload
        $audioFileType = $audio_File['type'];
        echo "Audio File Type: " . $audioFileType . "<br>";  // Debugging line

        $allowedAudioTypes = ['audio/mpeg', 'audio/aac', 'audio/wav'];

        if (in_array($audioFileType, $allowedAudioTypes)) {
            $audioFilePath = $uploadDir . $audio_File['name'];
            if (move_uploaded_file($audio_File['tmp_name'], $audioFilePath)) {
                // File upload successful
            } else {
                $this->error = 1;
                $this->error_msg .= "Error moving uploaded audio file.<br>";
            }
        } else {
            $this->error = 1;
            $this->error_msg .= "Invalid audio file type.<br>";
        }
    
        // Handle Image File Upload
        $imageFilePath = $uploadDir2 . basename($song_img['name']);
        $imageFileType = $this->getFileMimeType($song_img['tmp_name']);
        
        echo "Image File Type: " . $imageFileType . "<br>";  // Debugging line

        if (in_array($imageFileType, $allowedImageTypes)) {
            if (move_uploaded_file($song_img['tmp_name'], $imageFilePath)) {
                // Image upload successful
                // $this->error = 1;
                // $this->error_msg .= "Image Upload Successful.<br>";
            } else {
                $this->error = 1;
                $this->error_msg .= "Error moving uploaded image file.<br>";
            }
        } else {
            $this->error = 1;
            $this->error_msg .= "Invalid image file type.<br>";
        }

        if ($tag_audio == "") {
            $this->error=1;
            $this->error_msg.="Tag Need Needed";
        }
    
        $date_created = time();
    
        // Insert data into the database
        if ($this->error == 0) {
            $this->db->query("INSERT INTO audios (song_name, song, genre, mood, song_description, song_lyrics, song_img, tag_audio, date_created) 
            VALUES ('$name_of_song', '$audioFilePath', '$genre', '$mood', '$song_description', '$song_lyrics', '$imageFilePath', '$tag_audio', '$date_created')");
    
            $this->alert->set("Upload successful", "success");
            header('Location: ' . BURL . 'music/song_list'); // Redirect to a success page
        } else {
            $this->alert->set($this->error_msg, "danger");
            header('Location: ' . BURL . 'music'); // Redirect back to the upload page
        }
    }

    public function edit($aid){
        $this->page_title = "Edit Trip";
        $this->set_token();
        $this->auth->user(9);
        $this->auth->editor();
    
        // Fetch data for the given $aid
        $single = $this->db->query("SELECT * FROM audios WHERE aid='$aid'");
        // $single = $this->db->query("SELECT * FROM audios INNER JOIN mood ON audios.mood = mood.mid INNER JOIN genre ON audios.genre = genre.gid WHERE aid='$aid'");

        if ($single->num_rows > 0) {
            $single = $single->fetch_assoc();
            $mood = $single['mood'];
            $genre = $single['genre'];
        } else {
            // Redirect if the audio cannot be found
            $this->alert->set("Audio cannot be found", 'danger');
            header('Location:' . BURL . "music/song_list");
            exit; // Stop further execution
        }
    
        // Fetch a list of songs
        // $song_list = $this->db->query("SELECT * FROM audios ORDER BY aid LIMIT 20");
    
        // Include header, content, and footer files
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/music_list_edit.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    // Your edit_action method
    public function edit_action() {
        // Ensure user authentication and authorization
        $this->auth->user(9);
        $this->auth->editor();
        $this->auth->uid;

        // Define upload directories and allowed file types
        $uploadDir = 'assets/music_uploads/';
        $uploadDir2 = 'assets/uploads/';
        $allowedAudioTypes = ['audio/mp3', 'audio/aac', 'audio/wav'];
        $allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

        // Retrieve form data
        $name_of_song = $this->clean->post("name_of_song");
        $genre = $this->clean->post("genre");
        $mood = $this->clean->post("mood");
        $song_description = $this->clean->post("song_description");
        $song_img = $_FILES['song_img'];
        $audio_File = $_FILES['audioFile'];
        // $moz_tune = $this->clean->post("moz_tune");

        // Handle Audio File Upload
        $audioFileType = $audio_File['type'];

        // Handle Audio File Upload
        $audioFileType = $audio_File['type'];

        // Debugging: Output the detected audio file type
        echo "Detected Audio File Type: " . $audioFileType . "<br>";

        // Define allowed audio file types
        $allowedAudioTypes = ['audio/mpeg', 'audio/mp3', 'audio/aac', 'audio/wav'];

        if (in_array($audioFileType, $allowedAudioTypes)) {
            // Proceed with processing the audio file
            $audioFilePath = $uploadDir . $audio_File['name'];

            // Compress the audio file
            $compressedAudioFilePath = compressAudio($audio_File['tmp_name'], $audioFilePath);

            if ($compressedAudioFilePath) {
                // Compression successful, move the compressed file
                if (move_uploaded_file($compressedAudioFilePath, $audioFilePath)) {
                    // File upload successful
                } else {
                    $this->error = 1;
                    $this->error_msg .= "Error moving uploaded audio file.<br>";
                }
            } else {
                // Compression failed
                $this->error = 1;
                $this->error_msg .= "Error compressing audio file.<br>";
            }
        } else {
            // Invalid audio file type
            $this->error = 1;
            $this->error_msg .= "Invalid audio file type. Only MP3, AAC, WAV files are allowed.<br>";

            // Debugging: Output allowed audio file types
            echo "Allowed Audio File Types: " . implode(', ', $allowedAudioTypes) . "<br>";
        }



        // Handle Image File Upload
        $imageFilePath = $uploadDir2 . $song_img['name'];
        $imageFileType = $this->getFileMimeType($song_img['tmp_name']);

        if (in_array($imageFileType, $allowedImageTypes)) {
            if (!move_uploaded_file($song_img['tmp_name'], $imageFilePath)) {
                $this->error = 1;
                $this->error_msg .= "Error moving uploaded image file.<br>";
            }
        } else {
            // Invalid image file type
            $this->error = 1;
            $this->error_msg .= "Invalid image file type.<br>";
        }

        // Check for errors
        if ($this->error == 0) {
            // Update database with song information
            // $this->db->query("UPDATE audios SET ...");

            // Set success message and redirect
            $this->alert->set("Song Was Just Updated Successfully", 'success');
            header('location:' . BURL . "music/song_list");
        } else {
            // Set error message and redirect
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "music/edit?=".$aid);
        }
    }

    public function track_play($aid) {
        // Get the POST data
        $aid = intval($_POST['id']);
        $type = $_POST['type'];
    
        // Determine the column to update based on the type
        if ($type === 'play') {
            $this->db->query("UPDATE audios SET play_count = play_count + 1 WHERE aid = $aid");
        } elseif ($type === 'download') {
            $this->db->query("UPDATE audios SET download_count = download_count + 1 WHERE aid = $aid");
        } else {
            // Invalid type
            http_response_code(400);
            echo 'Invalid type';
            exit;
        }
    
        // Update the database
        if ($this->db->query($query)) {
            // Return a success response
            echo 'Success';
        } else {
            // Return an error response
            http_response_code(500);
            echo 'Database error';
        }
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

?>