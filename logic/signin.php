<?php
class signin extends boiler
{

	public function  defaultb()
	{
		$this->page_title = "LogIn";
		$this->set_token();
		include_once 'themes/' . $this->setting->landing_theme . '/login.php';
	}

	public function action()
	{
		if ($this->validate() == 1) {
			$email = $this->clean->post('email');
			$password = $this->clean->post('password');
			if (isset($_SESSION['where'])) {
				$where = $_SESSION['where'];
			} else {
				$where = "";
			}
			if ($email == "" || $password == "") {
				$this->error = 1;
				$this->error_msg .= ' Empty login details!';
			}


			if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $email) == true) {
			} elseif (ctype_alnum($email)) {
			} else {
				$this->error = 1;
				$this->error_msg .= ' Invalid username or email ! ';
			}

			$password = sha1(md5($password));

			$login_query = $this->db->query("SELECT * FROM users WHERE (email='$email' AND password='$password') ");
			// error_log("SQL Query: " . $sql);
			if ($login_query->num_rows > 0) {
				$login_query = $login_query->fetch_assoc();

				$email = $login_query['email'];
				$is_suspended = $login_query['is_suspended'];
				if ($is_suspended == 1) {
					$this->error = 1;
					$this->error_msg .= ' Account suspended Contact Site Admin! ';
				}
			} else {
				$this->error = 1;
				$this->error_msg .= ' Invalid details ! ';
			}

			if ($this->error == 0) {
				$tokenx = sha1($email . microtime() . rand(0, 100));
				$this->db->query("UPDATE users SET token='$tokenx' WHERE email='$email'");
				$_SESSION["_auth"] = $tokenx;
				if ($where == "") {
					$where = 'index';
					header('location:' . BURL . $where);
				} else {
					header('location:' . BURL . $where);
				}
			} else {
				error_log("Login Error: " . $this->error_msg);
				$this->alert->set($this->error_msg, 'danger');
				header('location:' . BURL . "index");
			}
		} else {
			$this->alert->set("Invalid request", "danger");
			header('location:' . BURL . 'login');
		}
	}

	// public function action(){
	// 	if ($this->validate() == 1) {
	// 		// $this->auth->form();
	// 		$email=$this->clean->post('email');
	// 		$password=$this->clean->post('password');
	// 		if ($email == "" ) {
	// 			$this->error=1;
	// 			$this->error_msg.="Email Is Empty";
	// 		}
	// 		if ($password=="") {
	// 			$this->error=1;
	// 			$this->error_msg.="Password Is Empty";
	// 		}
	// 		$email=strtolower($email);
	// 		$password=sha1(md5($password));
	// 		$user_query=$this->db->query("SELECT * FROM users WHERE email='$email' AND password='$password' ");
	// 		// if($user_query->num_rows > 0 ){
	// 		// 	$this->error=1; 
	// 		// 	$this->error_msg.=' Invalid details ! ';
	// 		// }
	// 		print($this->error_msg);
	// 		if($this->error==0){
	// 			echo $this->error_msg;
	// 			$token=sha1($email.microtime().rand(0,100));
	// 			$_SESSION["_auth"]=$token;
	// 			$this->db->query("UPDATE users SET token='$token' WHERE password='$password'");
	// 			header('location:'.BURL.'dashboard');
	// 		}else{
	// 			$this->alert->set($this->error_msg,'danger');
	// 			// header('location:'.BURL."login");
	// 		}
	// 	}else{
	// 		$this->alert->set("Invalid Request",'danger');
	// 		// header('location:'.BURL."index");
	// 	}
	// }

	public function  forgot()
	{
		$this->page_title = "Forgot password";
		$this->set_token();
		include_once 'themes/' . $this->setting->admin_theme . '/header.php';
		include_once 'themes/' . $this->setting->admin_theme . '/login_forgot.php';
		include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
	}

	public function  forgot_success()
	{
		$this->page_title = "Reset Password";
		$this->set_token();
		include_once 'themes/' . $this->setting->admin_theme . '/header.php';
		include_once 'themes/' . $this->setting->admin_theme . '/login_forgot_success.php';
		include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
	}
}
