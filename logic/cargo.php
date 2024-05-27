<?php
class cargo extends boiler
{

    public function __construct()
    {
        parent::__construct();
    }


    public function  defaultb($start = 0)
    {
        $this->auth->user();
        $this->page_title = "Trips";
        $list = $this->db->query("SELECT * FROM trips,routes WHERE trips.route=routes.rid ORDER BY trips.tid DESC LIMIT $start, 50");
        $uid = $this->auth->uid;
        $this->set_token();
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/cargo.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function  add()
    {
        $this->auth->editor();
        $this->page_title = "Add New Trip";
        $this->set_token();
        $routes = $this->db->query("SELECT * FROM routes");
        $vehicles = $this->db->query("SELECT * FROM vehicles");
        $drivers = $this->db->query("SELECT * FROM users WHERE type=4");
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/trips_add.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function action()
    {

        $this->auth->editor();
        $uid = $this->auth->uid;

        $route = $this->clean->post('route');
        if ($route == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Route!';
        }

        $trip_time = $this->clean->post('trip_time');
        if ($trip_time == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Trip Time';
        }

        $trip_date = $this->clean->post('trip_date');
        if ($trip_date == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Trip Date';
        }

        $vehicle = $this->clean->post('vehicle');
        if ($vehicle == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty vehicle';
        }

        $driver = $this->clean->post('driver');
        if ($driver == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty driver';
        }

        if ($this->error == 0) {
            $this->db->query("INSERT INTO trips (route,trip_time,trip_date,vehicle,driver) VALUES ('$route','$trip_time','$trip_date','$vehicle','$driver') ");
            $this->alert->set("Trip added successfully", 'success');
            header('location:' . BURL . "trips");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "trips/add");
        }
    }





    public function  edit($tid)
    {
        $this->auth->editor();

        $this->page_title = "Edit Trip";
        $this->set_token();
        $single = $this->db->query("SELECT * FROM trips,routes WHERE trips.route=routes.rid AND trips.tid='$tid' ");
        if ($single->num_rows > 0) {
            $single = $single->fetch_assoc();
            $driver = $single['driver'];
            $vehicle = $single['vehicle'];
        } else {
            $this->alert->set("Trip cannot be found", 'danger');
            die(header('location:' . BURL . "trips"));
        }
        $routes = $this->db->query("SELECT * FROM routes");
        $vehicles = $this->db->query("SELECT * FROM vehicles");
        $drivers = $this->db->query("SELECT * FROM users WHERE type=4");
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/trips_edit.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }



    public function edit_action()
    {
        $this->auth->editor();
        $uid = $this->auth->uid;
        $route = $this->clean->post('route');
        $tid = $this->clean->post('tid');
        if ($tid == "") {
            $this->error = 1;
            $this->error_msg .= ' Invalid trip!';
        }

        if ($route == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Route!';
        }

        $trip_time = $this->clean->post('trip_time');
        if ($trip_time == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Trip Time';
        }

        $trip_date = $this->clean->post('trip_date');
        if ($trip_date == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Trip Date';
        }

        $vehicle = $this->clean->post('vehicle');
        if ($vehicle == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty vehicle';
        }

        $driver = $this->clean->post('driver');
        if ($driver == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty driver';
        }

        if ($this->error == 0) {

            $this->db->query("UPDATE trips SET route='$route',trip_time='$trip_time',trip_date='$trip_date',vehicle='$vehicle',driver='$driver', manager='$uid' WHERE tid='$tid' ");
            $this->alert->set("Trip Updated successfully", 'success');
            header('location:' . BURL . "trips");
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "trips");
        }
    }

    public function delete($tid)
    {
        $this->auth->editor();
        $this->page_title = "Trip delete";
        $uid = $this->auth->uid;
        $this->set_token();
        $single = $this->db->query("DELETE FROM trips WHERE tid='$tid'");
        $this->alert->set("Trip deleted", 'success');
        die(header('location:' . BURL . "Trips"));
    }
}
