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
        $tag_audio = $this->clean->post("tag_audio"); // from hidden input
        $moz_tune = $this->clean->post("moz_tune");
    
        $this->error = 0;
        $this->error_msg = "";
    
        $audioFilePath = null;
        $imageFilePath = null;
    
        // Audio File Upload
        if (isset($_FILES['audioFile']) && $_FILES['audioFile']['error'] === UPLOAD_ERR_OK) {
            $audio_File = $_FILES['audioFile'];
            $audioFileType = mime_content_type($audio_File['tmp_name']);
    
            if (in_array($audioFileType, $allowedAudioTypes)) {
                $audioFilePath = $uploadDir . basename($audio_File['name']);
                if (!move_uploaded_file($audio_File['tmp_name'], $audioFilePath)) {
                    $this->error = 1;
                    $this->error_msg .= "Error moving uploaded audio file.<br>";
                }
            } else {
                $this->error = 1;
                $this->error_msg .= "Invalid audio file type.<br>";
            }
        } else {
            $this->error = 1;
            $this->error_msg .= "Audio file not uploaded properly.<br>";
        }
    
        // Image File Upload
        if (isset($_FILES['song_img']) && $_FILES['song_img']['error'] === UPLOAD_ERR_OK) {
            $song_img = $_FILES['song_img'];
            $imageFileType = mime_content_type($song_img['tmp_name']);
    
            if (in_array($imageFileType, $allowedImageTypes)) {
                $imageFilePath = $uploadDir2 . basename($song_img['name']);
                if (!move_uploaded_file($song_img['tmp_name'], $imageFilePath)) {
                    $this->error = 1;
                    $this->error_msg .= "Error moving uploaded image file.<br>";
                }
            } else {
                $this->error = 1;
                $this->error_msg .= "Invalid image file type.<br>";
            }
        } else {
            $this->error = 1;
            $this->error_msg .= "Image file not uploaded properly.<br>";
        }
    
        if (empty($tag_audio)) {
            $this->error = 1;
            $this->error_msg .= "Please enter at least one tag.<br>";
        }
        
        echo $this->error_msg;
        // $date_created = time();
        $date_created = date('Y-m-d H:i:s');

    
        if ($this->error == 0) {
            $this->db->query("INSERT INTO audios (song_name, song, genre, mood, song_description, song_lyrics, song_img, tag_audio, date_created) VALUES ('$name_of_song', '$audioFilePath', '$genre', '$mood', '$song_description', '$song_lyrics', '$imageFilePath', '$tag_audio', '$date_created')");
    
            $this->alert->set("Upload successful", "success");
            header("Location: " . BURL . "music/song_list");
            exit;
        } else {
            $this->alert->set($this->error_msg, "danger");
        }
    }    

    // public function getAudioWithTags($audioId) {
    //     $audio = $this->db->query("SELECT * FROM audios WHERE id = $audioId")->row();
    //     if ($audio) {
    //         $tagsResult = $this->db->query("SELECT t.name FROM tags t JOIN audio_tags at ON t.id = at.tag_id JOIN audios a ON at.audio_id = a.id WHERE a.id = $audioId")->result_array();
    //         $audio->tags = array_column($tagsResult, 'name'); // Extract just the tag names
    //     }
    //     return $audio;
    // }

    public function edit($aid=0){
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

    public function edit_action() {
        $this->auth->user(9);
        $this->auth->editor();
    
        $uploadDir = 'assets/music_uploads/';
        $uploadDir2 = 'assets/uploads/';
        $allowedAudioTypes = ['audio/mpeg', 'audio/mp3', 'audio/aac', 'audio/wav'];
        $allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    
        $this->error = 0;
        $this->error_msg = "";
    
        // Get audio ID
        $aid = intval($_POST['aid'] ?? 0);
        if ($aid <= 0) {
            $this->error = 1;
            $this->error_msg .= "Invalid song ID.<br>";
        }

        // $aid = intval($_GET['aid'] ?? 0); // Or use $_POST depending on source
    
        // Get fields
        $name_of_song = $this->clean->post("name_of_song");
        $genre = $this->clean->post("genre");
        $mood = $this->clean->post("mood");
        $song_description = $this->clean->post("song_description");
        $song_lyrics = $this->clean->post("song_lyrics");
        $tag_audio = $this->clean->post("tag_audio");
    
        // Get previous song record for file fallback
        // $prev = $this->db->get_row("SELECT * FROM audios WHERE aid = '$aid' ");
        // if (!$prev) {
        //     $this->error = 1;
        //     $this->error_msg .= "Song not found.<br>";
        // }

        $result = $this->db->query("SELECT * FROM audios WHERE aid='$aid'");
        $song = $result ? $result->fetch_assoc() : null;

    
        // Handle audio file update (optional)
        if (isset($_FILES['audioFile']) && $_FILES['audioFile']['error'] === UPLOAD_ERR_OK) {
            $audio_File = $_FILES['audioFile'];
            $audioFileType = mime_content_type($audio_File['tmp_name']);
            if (in_array($audioFileType, $allowedAudioTypes)) {
                $audioFilePath = $uploadDir . basename($audio_File['name']);
                move_uploaded_file($audio_File['tmp_name'], $audioFilePath);
            } else {
                $this->error = 1;
                $this->error_msg .= "Invalid audio file type.<br>";
            }
        } else {
            $audioFilePath = $prev['song']; // keep previous
        }
    
        // Handle image update (optional)
        if (isset($_FILES['song_img']) && $_FILES['song_img']['error'] === UPLOAD_ERR_OK) {
            $song_img = $_FILES['song_img'];
            $imageFileType = mime_content_type($song_img['tmp_name']);
            if (in_array($imageFileType, $allowedImageTypes)) {
                $imageFilePath = $uploadDir2 . basename($song_img['name']);
                move_uploaded_file($song_img['tmp_name'], $imageFilePath);
            } else {
                $this->error = 1;
                $this->error_msg .= "Invalid image file type.<br>";
            }
        } else {
            $imageFilePath = $prev['song_img']; // keep previous
        }
    
        if (empty($tag_audio)) {
            $this->error = 1;
            $this->error_msg .= "Please enter at least one tag.<br>";
        }

        $date_created = date('Y-m-d H:i:s');
    
        // Update
        if ($this->error == 0) {
            $this->db->query("UPDATE audios SET 
                song_name = '$name_of_song',
                song = '$audioFilePath',
                genre = '$genre',
                mood = '$mood',
                song_description = '$song_description',
                song_lyrics = '$song_lyrics',
                tag_audio = '$tag_audio',
                song_img = '$imageFilePath',
                date_created = '$date_created'
                WHERE aid = '$aid' ");
    
            $this->alert->set("Song Was Just Updated Successfully", 'success');
            header('location:' . BURL . "music/song_list");
            exit;
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "music/edit?aid=$aid");
            exit;
        }
    }

    function delete($aid) {
        $this->auth->editor();
        $this->page_title = "Song Delete";
        $uid = $this->auth->uid;
        $this->set_token();
        $delete_audio = $this->db->query("DELETE FROM audios WHERE aid='$aid'");
        $this->alert->set("Audio Deleted", 'danger');
        die(header('location:' . BURL . "music/song_list"));
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