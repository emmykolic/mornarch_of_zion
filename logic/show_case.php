<?php
class show_case extends boiler
{

    public function __construct()
    {
        parent::__construct();
    }


    public function  defaultb($start = 0)
    {
        $this->auth->admin();
        $this->page_title = "Posts";
        $list = $this->db->query("SELECT * FROM vehicles ORDER BY vid DESC LIMIT $start, 50");
        $uid = $this->auth->uid;
        $this->set_token();
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/show_case.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function  add()
    {
        $this->auth->admin();
        $this->page_title = "Add New Show Case";
        $this->set_token();
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/show_case_add.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function action()
    {

        $this->auth->admin();
        $uid = $this->auth->uid;
        $plate_no = $this->clean->post('plate_no');
        if ($plate_no == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Plate Number!';
        }
        $model = $this->clean->post('model');

        $capacity = $this->clean->post('capacity');
        if ($capacity == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty capacity';
        }

        if ($this->error == 0) {
            $this->db->query("INSERT INTO vehicles (plate_no,model,capacity) VALUES ('$plate_no','$model', '$capacity') ");
            $this->alert->set("vehicle added successfully", 'success');
            header('location:' . BURL . "vehicles");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "vehicles/add");
        }
    }





    public function  edit($vid)
    {
        $this->auth->user();
        $this->page_title = "Edit Vehicle";
        $uid = $this->auth->uid;
        $this->set_token();
        $single = $this->db->query("SELECT * FROM vehicles WHERE vid='$vid'");
        if ($single->num_rows > 0) {
            $single = $single->fetch_assoc();
        } else {
            $this->alert->set("Vehicle cannot be found", 'danger');
            die(header('location:' . BURL . "vehicles"));
        }
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/show_case_edit.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }



    public function edit_action()
    {

        $this->auth->admin();
        $uid = $this->auth->uid;
        $plate_no = $this->clean->post('plate_no');
        if ($plate_no == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Plate Number!<br>';
        }
        $model = $this->clean->post('model');

        $capacity = $this->clean->post('capacity');
        if ($capacity == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty capacity<br>';
        }

        $vid = $this->clean->post('vid');
        if ($vid == "") {
            $this->error = 1;
            $this->error_msg .= ' Invalid vehicle <br>';
        }

        if ($this->error == 0) {
            $this->db->query("UPDATE vehicles SET plate_no='$plate_no', model='$model', capacity='$capacity' WHERE vid='$vid' ");
            $this->alert->set("Vehicle updated successfully", 'success');
            header('location:' . BURL . "vehicles");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "vehicles");
        }
    }

    public function delete($vid)
    {
        $this->auth->user();
        $this->page_title = "vehicle delete";
        $uid = $this->auth->uid;
        $this->set_token();
        $single = $this->db->query("DELETE FROM vehicles WHERE vid='$vid'");
        $this->alert->set("Vehilce deleted", 'success');
        die(header('location:' . BURL . "vehicles"));
    }
}
