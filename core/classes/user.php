<?php
	class user {
		public $firstname;
		public $lastname;
		public $phone;
		public $uid;
		public $token;
		public $email;
		public $country;
		public $error;
		public $msg;
		public $type;
		public $remember_me=0;

		public function __construct($db, $token) {
			$user_data = $db->query("SELECT * FROM users WHERE token='$token'");
			if ($user_data->num_rows > 0) {
				while ($row = $user_data->fetch_assoc()) {
					$now=time();
					$db->query("UPDATE users SET check_in ='$now' WHERE token='$token'");
					$this->uid = $row['uid'];
					$this->email = $row['email'];
					$this->phone = $row['phone'];
					$this->type = $row['type'];
					$this->firstname = $row['firstname'];
					$this->lastname = $row['lastname'];
					$this->token = $row['token'];
					$this->is_suspended = $row['is_suspended'];
					$this->account_type = $row['account_type'];
					$this->reset_code = $row['reset_code'];
					$this->photo = $row['photo'];
					$this->address = $row['address'];
					$this->banner = $row['banner'];
					$this->province = $row['province'];
					$this->bio = $row['bio'];
					$this->error = 0;
				}
			}else {
				$this->error = 1;
				$this->msg = 'User Authentication Failed!';
			}
			
		}

		


	}
