<?php
class update_clicks extends boiler{
    public function __construct()
        {
            parent::__construct();
            $this->stats = new stats($this->db); 
        }

        public function update_clicks()
        {
            if (isset($_POST['aid'])) {
                $aid = intval($_POST['aid']);

                // Update song click count
                $this->db->query("UPDATE audios SET song_clicks = song_clicks + 1 WHERE aid = '$aid'");

                if ($this->db->affected_rows > 0) {
                    echo json_encode(["success" => true]);
                } else {
                    echo json_encode(["success" => false, "error" => $this->db->error]);
                }
            } else {
                echo json_encode(["success" => false, "error" => "Invalid request"]);
            }
        }
    }
?>