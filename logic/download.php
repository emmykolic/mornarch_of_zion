<?php
    class download extends boiler{
        
        public function __construct(){
            parent::__construct();
            $this->stats = new stats($this->db);
        }

        // function download($aid) {
        //     // Fetch audio data from the database
        //     $song_single = $this->db->query("SELECT * FROM audios WHERE aid = '$aid'");
        //     $song_single = $song_single->fetch_assoc();
            
        //     // Set appropriate headers
        //     header('Content-Type: audio/mpeg');
        //     header('Content-Disposition: attachment; filename="' . $song_single['song_name'] . '.mp3"');
            
        //     // Output the audio data
        //     echo $song_single['audio_data'];
        //     exit;
        // }

        function defaultb($aid) {
            // Fetch audio data from the database
            $result = $this->db->query("SELECT * FROM audios WHERE aid = '$aid'");
            $song_single = $result->fetch_assoc();
            
            // Check if audio data is fetched
            if (!$song_single) {
                die("Audio not found.");
            }
        
            // Serve the audio data for download
            header('Content-Type: audio/mpeg');
            header('Content-Disposition: attachment; filename="' . $song_single['song_name'] . '.mp3"');
            
            // Debugging
            echo "Audio Data: " . strlen($song_single['audio_data']) . " bytes"; // Output the size of audio data


            // Output the audio data
            echo $song_single['audio_data'];
            exit;
        }
        

        // function defaultb($aid) {
        //     // Fetch audio data from the database
        //     $song_single = $this->db->query("SELECT * FROM audios WHERE aid = '$aid'");
        //     $song_single = $song_single->fetch_assoc();
            
        //     // Check if audio data is fetched
        //     if (!$song_single) {
        //         die("Audio not found.");
        //     }
        
        //     // Set appropriate Content-Type header
        //     header('Content-Type: audio/mpeg');
        
        //     // Set Content-Disposition header to indicate download and provide filename
        //     header('Content-Disposition: attachment; filename="' . $song_single['song_name'] . '.mp3"');
            
        //     // Output the audio data
        //     echo $song_single['audio_data'];
        //     exit;
        // }
        
    }
    
?>