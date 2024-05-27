<?php
class messages extends boiler
{

    public function  defaultb($start = 0)
    {
        $this->auth->user();
        $this->page_title = "inbox";
        $this->set_token();
        $uid = $this->auth->uid;
        $all_messages = $this->db->query("SELECT * FROM messages WHERE reciever='$uid' GROUP BY sender ORDER BY is_read , mid DESC");
        $all_messages = $all_messages->num_rows;
        $messages = $this->db->query("SELECT * FROM messages WHERE reciever='$uid' GROUP BY sender ORDER BY is_read , mid DESC  LIMIT $start, 50");
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/messages_default.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function  single($me = 0, $person = 0)
    {
        $this->page_title = "conversation";
        $messages = $this->db->query("SELECT * FROM messages WHERE (reciever='$me' AND sender='$person') OR (reciever='$person' AND sender='$me') ORDER BY mid DESC LIMIT 50");
        $this->db->query("UPDATE messages SET is_read=1 WHERE sender='$person' AND reciever='$me' ");
        $other = $this->db->query("SELECT * FROM users WHERE uid='$person' ");
        if ($other->num_rows > 0) {
            $other = $other->fetch_assoc();
            $other_guy = $other['fullname'];
        } else {
            $other_guy = "unknown";
        }
        $this->set_token();
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/messages_single.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }



    public function send()
    {
        $message = $this->clean->post('message');
        if ($message == "") {
            $this->error = 1;
            $this->error_msg .= ' empty message!<br>';
        }

        $sender = $this->clean->post('sender');
        if ($sender == "") {
            $this->error = 1;
            $this->error_msg .= ' empty sender!<br>';
        }

        $reciever = $this->clean->post('reciever');
        if ($reciever == "") {
            $this->error = 1;
            $this->error_msg .= ' empty reciever!<br>';
        }

        if ($this->error == 0) {
            $dater = time();
            $this->db->query("INSERT INTO messages (sender,reciever,message,date_created) VALUES ('$sender','$reciever','$message','$dater')");
            header('location:' . BURL . "messages/single/" . $sender . "/" . $reciever);
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "messages/single/" . $sender . "/" . $reciever);
        }
    }
}
