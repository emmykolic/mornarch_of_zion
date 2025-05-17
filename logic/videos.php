<?php 
    class videos extends boiler{
        public function __construct(){
            parent::__construct();
            $this->stats = new stats($this->db);
        }

        public function defaultb(){
            $this->auth->user();
            $this->page_title = "M.O.Z Videos";
            // $list = $this->db->query("SELECT * FROM trips,routes WHERE trips.route=routes.rid ORDER BY trips.tid DESC LIMIT $start, 50");
            $uid = $this->auth->uid;
            $this->set_token();
            $this->auth->user(9);
            // $get_genre = $this->db->query("SELECT * FROM genre ");
            // $get_mood = $this->db->query("SELECT * FROM mood ");
            include_once 'themes/' . $this->setting->admin_theme . '/header.php';
            include_once 'themes/' . $this->setting->admin_theme . '/videos_add.php';
            include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
        }

        public function action() {
            $uid = $this->clean->post("uid");
            if ($uid == "") {
                $this->error = 1;
                $this->error_msg.="Unidentified User";
            }
            $name_of_video = $this->clean->post("name_of_video");
            if ($name_of_video == "") {
                $this->error = 1;
                $this->error_msg.="Song Name Was Empty!";
            }
            $video_description = $this->clean->post("video_description");
            if ($video_description == "") {
                $this->error=1;
                $this->error_msg.="Video Description Needed";
            }
            $tag_video = $this->clean->post("tag_video");dlmc
            if (empty($tag_video)) {
                $this->error = 1;
                $this->error_msg .= "Please enter at least one tag.<br>";
            }
            
            $source = $this->clean->post("source");
            if ($source == "") {
                $this->error = 1;
                $this->error_msg.="A Link To The Video is needed!";
            }
            if ($this->error == 0) {
                $this->db->query("INSERT INTO videos (name_of_video, video_description, tag_video, source) VALUES ('$name_of_video', '$video_description', '$tag_video', '$source')");

                $this->alert->set("Upload successful", "success");
                header('location: ' . BURL . 'videos/video_list'); // Redirect to a success page
            }else{
                $this->alert->set($this->error_msg, 'danger');
                header('location:' . BURL . "videos");
            }

        }

        public function video_list() {
            $this->auth->user();
            $this->page_title = "M.O.Z Videos | Video List";
            $uid = $this->auth->uid;
            $this->set_token();
            $get_video = $this->db->query("SELECT * FROM videos ORDER BY vid LIMIT 10 ");
            // if ($exam['source'] != "") :
            // $link = explode("=", $exam['source']);
            // if (count($link) == 1) {
            //     $link = explode("/", $exam['source']);
            //     $link = end($link);
            // } else {
            //     $link = end($link);
            // }
            
            include_once 'themes/' . $this->setting->admin_theme . '/header.php';
            include_once 'themes/' . $this->setting->admin_theme . '/videos_list.php';
            include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
        }
    }
    
?>