<?php
class mail
{

	public $sender = "";
	public $header = "";
	public $error = 0;
	public $error_msg;

	public function __construct()
	{
		$this->header .= 'X-Mailer: PHP/' . phpversion();
		$this->header .= "X-Priority: 1\n";
		$this->header .= "Return-Path:" . DEFAULTSENDER . "\n";
		$this->header .= "MIME-Version: 1.0\r\n";
		$this->header .= "Content-Type: text/html; charset=iso-8859-1\n";
		$this->sender  = "From: " . DEFAULTSENDERNAME . " <" . DEFAULTSENDER . ">\n";
		$this->sender .= "Cc: " . DEFAULTSENDERNAME . " <" . DEFAULTSENDER . ">\n";
		$this->sender .= "X-Sender: " . DEFAULTSENDERNAME . "<" . DEFAULTSENDER . ">\n";
	}

	public function send($to, $subject, $body, $from = "", $from_name = "")
	{
		if ($from != "" && $from_name == "") {
			$this->sender  = "From: " . DEFAULTSENDERNAME . " <" . $from  . ">\n";
			$this->sender .= "Cc: " . DEFAULTSENDERNAME . " <" . $from  . ">\n";
			$this->sender .= "X-Sender: " . DEFAULTSENDERNAME . "<" . $from  . ">\n";
		} elseif ($from != "" && $from_name != "") {
			$this->sender  = "From: " . $from_name . " <" . $from  . ">\n";
			$this->sender .= "Cc: " . $from_name . " <" . $from  . ">\n";
			$this->sender .= "X-Sender: " . $from_name . "<" . $from  . ">\n";
		}

		$this->header = $this->sender . $this->header;
		$send = mail($to, $subject, $body, $this->header);

		if ($send == false) {
			$this->error = 1;
			$this->error_msg .= " email did not send";
		}
	}
}
