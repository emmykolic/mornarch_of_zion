<?php 
class mood extends boiler{
    public function __construct(){
        parent::__construct();
    }

    public function defaultb(){
        $this->auth->user();
        $this->page_title = "M.O.Z Music";
        // $list = $this->db->query("SELECT * FROM trips,routes WHERE trips.route=routes.rid ORDER BY trips.tid DESC LIMIT $start, 50");
        $uid = $this->auth->uid;
        $this->set_token();
        $this->auth->user(9);
        $mood = $this->db->query("SELECT * FROM mood");
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/music_mood.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function add(){
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/music_mood_add.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    function action() {
        $this->auth->form();
        $mood_name = $this->clean->post("mood_name");
        if ($mood_name == "") {
            $this->error = 1;
            $this->error_msg.="Name Of Mood Is Empty!";
        }
        if ($this->error == 0) {
            $this->db->query("INSERT INTO mood(mood_name) VALUES('$mood_name')");                 
            $this->alert->set("Mood Added Successfully","success");
            header('location:'.BURL.'mood');
        }else{
            $this->alert->set($this->error_msg,"danger");
            header('location:'.BURL.'mood/add');
        }
    }

    public function edit($mid) {
        $this->auth->editor();

        $this->page_title = "Edit Mood";
        $this->set_token();
        $collect_mood = $this->db->query("SELECT * FROM mood WHERE mid = '$mid' ");
        if ($collect_mood->num_rows > 0) {
            $collect_mood = $collect_mood->fetch_assoc();
            $mood_name = $collect_mood['mood_name'];
        } else {
            $this->alert->set("Mood cannot be found", 'danger');
            die(header('location:' . BURL . "mood"));
        }
        // $routes = $this->db->query("SELECT * FROM routes");
        // $vehicles = $this->db->query("SELECT * FROM vehicles");
        $mood_name = $this->db->query("SELECT * FROM mood WHERE mid = '$mid' ");
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/music_mood_edit.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function edit_action()
    {
        $this->auth->editor();
        $uid = $this->auth->uid;
        $mood_name = $this->clean->post('mood_name');
        $mid = $this->clean->post('mid');
        if ($mid == "") {
            $this->error = 1;
            $this->error_msg .= ' Invalid trip!';
        }

        if ($mood_name == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Mood_name!';
        }

        if ($this->error == 0) {

            $this->db->query("UPDATE mood SET mood_name='$mood_name' WHERE mid='$mid' ");
            $this->alert->set("Music Mood Updated Successfully", 'success');
            header('location:' . BURL . "mood");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "mood");
        }
    }

    function delete($mid) {
        $this->auth->editor();
        $this->page_title = "Mood Delete";
        $uid = $this->auth->uid;
        $this->set_token();
        $delete_mood = $this->db->query("DELETE FROM mood WHERE mid='$mid'");
        $this->alert->set("Mood Deleted", 'danger');
        die(header('location:' . BURL . "mood"));
    }
}

?>