<?php
class profile extends boiler{
 	public function __construct(){
 		parent::__construct();
    }

 	public function  defaultb(){
 		$this->page_title="Edit Profile";
		$this->set_token(); 
		$this->auth->admin();
		$uid = $this->auth->uid;
        $profile=$this->db->query("SELECT * FROM users WHERE uid='$uid' ");
		$row=$profile->fetch_assoc();
		// $prow = $row;

		include_once 'themes/'.$this->setting->admin_theme.'/header.php';
 		include_once 'themes/'.$this->setting->admin_theme.'/profile.php';
 		include_once 'themes/'.$this->setting->admin_theme.'/footer.php';
 		
 	}
	public function  change_photo(){
		$this->page_title="Edit Profile";
		$this->auth->admin();
		$uid=$this->auth->uid;
	   	$this->set_token(); 
	   	$profile=$this->db->query("SELECT * FROM users WHERE uid='$uid'");
	   	$profile=$profile->fetch_assoc();

	   	include_once 'themes/'.$this->setting->admin_theme.'/header.php';
		include_once 'themes/'.$this->setting->admin_theme.'/profile_change_photo.php';
		include_once 'themes/'.$this->setting->admin_theme.'/footer.php';
		
	}

	public function action(){
		$this->auth->form();
		$uid = $this->auth->uid;
		$firstname = $this->clean->post("firstname");
		$lastname = $this->clean->post("lastname");
		$phone = $this->clean->post("phone");
		$address = $this->clean->post("address");
		$bio = $this->clean->post("bio");
		if ($firstname == "") {
			$this->error = 1;
			$this->error_msg.="firstname Is Empty!";
		}
		if ($lastname == "") {
			$this->error = 1;
			$this->error_msg.="lastname Is Empty!";
		}
		if ($phone == "") {
			$this->error = 1;
			$this->error_msg.="Phone Number Is Empty";
		}
		if ($address == "") {
			$this->error = 1;
			$this->error_msg.="Address Is Empty";
		}
		if ($bio == "") {
			$this->error = 1;
			$this->error_msg.="Bio Is Empty";
		}
		if ($this->error == 0) {
			$this->db->query("UPDATE users SET firstname = '$firstname', lastname = '$lastname', phone = '$phone', bio = '$bio' WHERE uid = '$uid' ");
			$this->alert->set("Profile Updated Succesfully!","success");
			header('location:'.BURL.'profile');
		}else{
			$this->alert->set($this->error_msg,"danger");
			header('location:'.BURL.'profile');
		}
	}

	public function change_password(){
		$this->page_title="Change Password";
		$this->auth->admin();
		$uid=$this->auth->uid;
		$profile=$this->db->query("SELECT * FROM users WHERE uid='$uid'");
	   	$profile=$profile->fetch_assoc();

	   	include_once 'themes/'.$this->setting->admin_theme.'/header.php';
		include_once 'themes/'.$this->setting->admin_theme.'/profile_change_password.php';
		include_once 'themes/'.$this->setting->admin_theme.'/footer.php';
	}

	public function change_password_action(){
		$this->auth->admin();
		$this->auth->form();
		$uid = $this->auth->uid;
		echo $current_password = $this->clean->post("current_password");
		if ($current_password =="") {
			$this->error = 1;
			$this->error_msg.="Password Field Is Empty!";
		}
		echo $new_password = $this->clean->post("new_password");  
		if ($new_password == "") {
			$this->error = 1;
			$this->error_msg.="New Password Is Empty!";
		}else{
			if ($current_password != $new_password) {
				$this->error = 1;
				$this->error_msg.="Wrong Current Password!";
			}
			$current_password = sha1(md5($current_password));
			// $check_password = $this->db->query("SELECT * FROM users WHERE uid = '$uid' AND password = $current_password");
			// if ($check_password->num_rows < 0 ) {
			//     $this->error=1; 
			//     $this->error_msg.='Current Password Does Not Exist   ';   
			// }
		}  
		$confirm_password = $this->clean->post("confirm_password");
		if ($confirm_password == "") {
			$this->error=1; 
			$this->error_msg.=" Confirm Password Is Empty!"; 
		}
		if ($new_password != $confirm_password) {
			$this->error = 1;
			$this->error_msg.="New Password Does Not Match!";
		}
		if ($this->error == 0) {
			$password = sha1(md5($new_password));
			$this->db->query("UPDATE users SET password = '$password' WHERE uid='$uid' ");
			$this->alert->set("Password Changed Successfully!","success");
			header('location:'.BURL.'profile');
		}else{
			$this->alert->set($this->error_msg,'danger');
			// header('location:'.BURL."profile/profile_change_password");
		}
	}
}
?>