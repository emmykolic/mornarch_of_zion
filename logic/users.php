<?php
class users extends boiler
{

    public function __construct()
    {
        parent::__construct();
    }


    public function  defaultb($start = 0)
    {
        $this->auth->editor("users");
        $this->page_title = "User Management";
        $uid = $this->auth->uid;
        $list = $this->db->query("SELECT * FROM users ORDER BY uid DESC LIMIT $start, 250");
        $num = $list->num_rows;
        if (($start + 25) < $num) {
            $is_more = 1;
        }
        $this->set_token();
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/user_defaultb.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }




    public function  add()
    {
        $this->auth->admin();
        $this->page_title = "Add Manager Or Driver ";
        $this->page_js = BURL . "assets/register.js";
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/users_add.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }


    public function action()
    {

        $email = $this->clean->post('email');
        if ($email != "") {
            if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $email) == false) {
                $this->error = 1;
                $this->error_msg .= ' Invalid email!';
            } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                $this->error = 1;
                $this->error_msg .= ' Invalid email!';
            }
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $email = strtolower($email);
            $email_query = $this->db->query("SELECT uid FROM users WHERE email='$email' ");
            if ($email_query->num_rows > 0) {
                $this->error = 1;
                $this->error_msg .= ' email already in use ! ';
            }
        } else {
            $this->error = 1;
            $this->error_msg .= ' Empty email!';
        }

        $password = $this->clean->post('password');
        if ($password == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty password!';
        } else {
            $cpassword = $this->clean->post('cpassword');
            if ($cpassword != $password) {
                $this->error = 1;
                $this->error_msg .= " passwords Don't match!";
            } else {
                $passreal = $password;
                $password = sha1(md5($password));
            }
        }

        $fullname = $this->clean->post('fullname');
        if ($fullname == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty fullname!';
        }

        $phone = $this->clean->post('phone');
        if ($phone == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty phone!';
        }


        $account_type = $this->clean->post('account_type');
        if ($account_type == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Account Type!';
        }

        $username = $this->clean->post('username');
        if ($username == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty username!';
        } else {
            $check = $this->db->query("SELECT uid FROM users WHERE username='$username' ");
            if ($check->num_rows > 0) {
                $this->error = 1;
                $this->error_msg .= ' selected username is not available ! ';
            }
        }

        if ($this->error == 0) {
            $token = sha1(md5($email));
            $dater = time();
            $this->db->query("INSERT INTO users (fullname,email,token,password,date_created,type,username,phone) VALUES ('$fullname','$email','$token','$password','$dater','$account_type','$username','$phone')");
            $this->alert->set("Account Created Succesfully", "success");
            header('location:' . BURL . 'users');
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "users/add");
        }
    }


    public function  edit($uid)
    {
        $this->auth->admin();
        $this->page_title = "Edit Manager Or Driver ";
        $person = $this->db->query("SELECT * FROM  users WHERE uid =$uid ");
        if ($person->num_rows > 0) {
            $person = $person->fetch_assoc();
        } else {
            $this->alert->set("Invalid Account");
            die(header('location:' . BURL . "users"));
        }
        include_once 'themes/' . $this->setting->admin_theme . '/header.php';
        include_once 'themes/' . $this->setting->admin_theme . '/users_edit.php';
        include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
    }

    public function edit_action()
    {
        $this->auth->admin();

        $uid = $this->clean->post('uid');
        if ($uid == "") {
            $this->error = 1;
            $this->error_msg .= ' Invalid user!';
        }


        $fullname = $this->clean->post('fullname');
        if ($fullname == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty fullname!';
        }

        $phone = $this->clean->post('phone');
        if ($phone == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty phone!';
        }


        $account_type = $this->clean->post('account_type');
        if ($account_type == "") {
            $this->error = 1;
            $this->error_msg .= ' Empty Account Type!';
        }

        if ($this->error == 0) {
            $this->db->query("UPDATE users SET fullname='$fullname',type='$account_type',phone='$phone' WHERE uid=$uid");
            $this->alert->set("Account Updated Succesfully", "success");
            header('location:' . BURL . 'users');
        } else {
            $this->alert->set($this->error_msg, 'danger');
            header('location:' . BURL . "users");
        }
    }



    public function username_check()
    {
        $username = $this->clean->post('username');
        $check = $this->db->query("SELECT username FROM users WHERE username = '$username' ");
        if ($check->num_rows > 0) {
            echo '0';
        } else {
            echo '1';
        }
    }



    public function block($uid)
    {
        $this->auth->editor("users");

        $this->db->query("UPDATE users SET is_suspended=1 WHERE uid=$uid");
        $this->alert->set("User Block", 'success');
        header('location:' . BURL . "users");
    }

    public function unblock($uid)
    {
        $this->auth->editor("users");
        $this->db->query("UPDATE users SET is_suspended=0 WHERE uid=$uid");
        $this->alert->set("User Unblocked", 'success');
        header('location:' . BURL . "users");
    }

    public function unverify($uid)
    {
        $this->auth->editor("users");
        $this->db->query("UPDATE users SET is_verified=0 WHERE uid=$uid");
        $this->alert->set("User Unverified", 'success');
        header('location:' . BURL . "users");
    }



    public function search()
    {

        $query = $this->clean->post('query');
        $query = "%" . $query . "%";
        $list = $this->db->query("SELECT * FROM users WHERE (firstname LIKE '$query' OR phone LIKE '$query' OR email LIKE '$query' OR lastname LIKE '$query') AND type IN(4,5,9)  ");
        while ($row = $list->fetch_assoc()) :
?>
            <tr>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div>
                            <?php if ($row['photo'] != "" && file_exists("./" . $row['photo'])) : ?>
                                <img src="<?= BURL ?><?= $row['photo'] ?>" class="avatar avatar-sm me-3" alt="">
                            <?php else : ?>
                                <img src="<?= BURL ?>assets/default.png" class="avatar avatar-sm me-3" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">
                                <?= $row['firstname'] ?> ( <?= ($row['type'] == 5) ? 'Manager' : 'Driver' ?> )<br>
                                <small><?= $row['phone'] ?> <?= $row['email'] ?></small>
                            </h6>
                        </div>
                    </div>
                </td>
                <td>
                    <a class="badge bg-info badge-pill" href="<?= BURL ?>users/edit/<?= $row['uid'] ?>" title="Edit"><i class="bx bx-edit"></i></a>
                    <?php if ($row['is_suspended'] == 0) : ?>
                        <a class="badge bg-danger badge-pill" href="<?= BURL ?>users/block/<?= $row['uid'] ?>" title="Block"><i class="bx bx-user"></i> Block</a>
                    <?php else : ?>
                        <a class="badge bg-success badge-pill" href="<?= BURL ?>users/unblock/<?= $row['uid'] ?>" title="Unblock"><i class="bx bx-user"></i> Unblock</a>
                    <?php endif; ?>


                </td>
            </tr>
<?php endwhile;
    }
}



?>