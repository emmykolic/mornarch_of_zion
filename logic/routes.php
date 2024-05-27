<?php
class routes extends boiler
{

    public function __construct()
    {
        parent::__construct();
    }


    public function  defaultb($start = 0)
    {
        $this->auth->user();
        $this->page_title = "Posts";
        $list = $this->db->query("SELECT * FROM routes ORDER BY rid DESC LIMIT $start, 50");
        $uid = $this->auth->uid;
        $this->set_token();
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/routes.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function  add()
    {
        $this->auth->admin();
        $this->page_title = "Add New Route";
        $this->set_token();
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/routes_add.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function action()
    {

        $this->auth->admin();
        $uid = $this->auth->uid;
        $take_off = $this->clean->post('take_off');
        if ($take_off == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Take Off point!';
        }

        $drop_off = $this->clean->post('drop_off');
        if ($drop_off == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Drop Off Point';
        }

        $price = $this->clean->post('price');
        if ($price == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty price';
        }

        $max_capacity = $this->clean->post('max_capacity');
        if ($max_capacity == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Daily Maximum Capacity';
        }

        if ($this->error == 0) {
            $this->db->query("INSERT INTO routes (take_off,drop_off,price,max_capacity) VALUES ('$take_off','$drop_off','$price','$max_capacity') ");
            $this->alert->set("Route added successfully", 'success');
            header('location:' . BURL . "routes");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "routes/add");
        }
    }





    public function  edit($rid)
    {
        $this->auth->user();
        $this->page_title = "Edit Routes";
        $uid = $this->auth->uid;
        $this->set_token();
        $single = $this->db->query("SELECT * FROM routes WHERE rid='$rid'");
        if ($single->num_rows > 0) {
            $single = $single->fetch_assoc();
        } else {
            $this->alert->set("Route cannot be found", 'danger');
            die(header('location:' . BURL . "routes"));
        }
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/routes_edit.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }



    public function edit_action()
    {

        $this->auth->admin();
        $uid = $this->auth->uid;
        $take_off = $this->clean->post('take_off');
        if ($take_off == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Take Off point!';
        }

        $drop_off = $this->clean->post('drop_off');
        if ($drop_off == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Drop Off Point';
        }

        $price = $this->clean->post('price');
        if ($price == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty price';
        }

        $max_capacity = $this->clean->post('max_capacity');
        if ($max_capacity == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Daily Maximum Capacity';
        }

        $rid = $this->clean->post('rid');
        if ($rid == "") {
            $this->error = 1;
            $this->error_msg .= ' Invalid route <br>';
        }

        if ($this->error == 0) {
            $this->db->query("UPDATE routes SET take_off='$take_off', drop_off='$drop_off', price='$price', max_capacity='$max_capacity' WHERE rid='$rid' ");
            $this->alert->set("route updated successfully", 'success');
            header('location:' . BURL . "routes");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "routes");
        }
    }

    public function delete($rid)
    {
        $this->auth->user();
        $this->page_title = "Route delete";
        $uid = $this->auth->uid;
        $this->set_token();
        $single = $this->db->query("DELETE FROM routes WHERE rid='$rid'");
        $this->alert->set("Route deleted", 'success');
        die(header('location:' . BURL . "routes"));
    }
}
