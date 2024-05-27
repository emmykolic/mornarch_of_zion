<?php 
class genre extends boiler{
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
        $genre = $this->db->query("SELECT * FROM genre");
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/genre.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function add() {
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/genre_add.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function show(){
        include_once 'themes/' . $this->setting->landing_theme . '/header.php';
        include_once 'themes/' . $this->setting->landing_theme . '/index_music.php';
        include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
    }

    function action() {
        $this->auth->form();
        $genre_name = $this->clean->post("genre_name");
        if ($genre_name == "") {
            $this->error = 1;
            $this->error_msg.="Genre Name Is Empty!";
        }
        if ($this->error == 0) {
            $this->db->query("INSERT INTO genre(genre_name) VALUES('$genre_name')");                 
            $this->alert->set("Genre Added Successfully","success");
            header('location:'.BURL.'genre');
        }else{
            $this->alert->set($this->error_msg,"danger");
            header('location:'.BURL.'genre/add');
        }
    }

    public function edit($gid) {
        $this->auth->editor();

        $this->page_title = "Edit Genre";
        $this->set_token();
        $collect_genre = $this->db->query("SELECT * FROM genre WHERE gid = '$gid' ");
        if ($collect_genre->num_rows > 0) {
            $collect_genre = $collect_genre->fetch_assoc();
            $genre_name = $collect_genre['genre_name'];
        } else {
            $this->alert->set("Genre cannot be found", 'danger');
            die(header('location:' . BURL . "genre"));
        }
        // $routes = $this->db->query("SELECT * FROM routes");
        // $vehicles = $this->db->query("SELECT * FROM vehicles");
        $genre_name = $this->db->query("SELECT * FROM genre WHERE gid = '$gid' ");
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/genre_edit.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function edit_action()
    {
        $this->auth->editor();
        $uid = $this->auth->uid;
        $genre_name = $this->clean->post('genre_name');
        $gid = $this->clean->post('gid');
        if ($gid == "") {
            $this->error = 1;
            $this->error_msg .= ' Invalid trip!';
        }

        if ($genre_name == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Genre Field!';
        }

        if ($this->error == 0) {
            $this->db->query("UPDATE genre SET genre_name='$genre_name' WHERE gid='$gid' ");
            $this->alert->set("Music Genre Updated Successfully", 'success');
            header('location:' . BURL . "genre");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "genre");
        }
    }
}


?>