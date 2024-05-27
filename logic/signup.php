<?php 
	/**
	 * 
	 */
	class signup extends boiler
	{
		
		public function __construct(){
			parent::__construct();
		}

		public function defaultb(){
            $this->set_token();
			include_once 'themes/' . $this->setting->landing_theme . '/registration.php';
		}

		public function action(){
			if ($this->validate() == 1) {
                $firstname = $this->clean->post('firstname');
                $lastname = $this->clean->post('lastname');
                $email = $this->clean->post('email');
                $password = $this->clean->post('password');
                $cpassword = $this->clean->post('cpassword');
                if ($firstname == "") {
                    $this->error = 1;
                    $this->error_msg.="Firstname Is Empty!";
                }
                if ($lastname == "") {
                    $this->error = 1;
                    $this->error_msg.="Lastname Is Empty!";
                }
                if ($email != "") {
                    $email=filter_var($email, FILTER_SANITIZE_EMAIL);
                    $email=strtolower($email);
                    $user=$this->db->query("SELECT uid FROM users WHERE email='$email' LIMIT 1 ");

                    if ($user->num_rows>0) {
                        $this->error=1; 
                        $this->error_msg.="Email Already Exist";
                    }
                }else{
                    if ($user->num_rows>0) {
                        $this->error=1; 
                        $this->error_msg.="Email is Empty ";
                    }
                }
                if($password==""){
                    $this->error=1; 
                    $this->error_msg.=' Empty password!'; 
                }else{
                    $cpassword=$this->clean->post('cpassword');
                    if($cpassword!=$password){	
                        $this->error=1; 
                        $this->error_msg.=" passwords Don't match!"; 
                    }else{
                        // $password=$password;
                        $password=sha1(md5($password));
                    }
                }
                if ($this->error==0) {
                    $token=sha1(microtime().rand(0, 1000).$email);
                    $this->db->query("INSERT INTO users(firstname,lastname,email,password,token) VALUES('$firstname', '$lastname', '$email', '$password', '$token')");
                    $this->alert->set("Registration successful","success");
                    header('location:'.BURL.'signin');
                }else{
                    $this->alert->set($this->error_msg,"danger");
                    header('location:'.BURL.'signup');
                }

            } else {
                $this->alert->set("Invalid request", "danger");
                header('location:' . BURL . 'signup');
            }
		}
	}
?>