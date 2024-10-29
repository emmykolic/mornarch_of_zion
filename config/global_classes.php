<?php 
	$this->clean=new cleaner($this->db);
	$this->form=new form($this->db);
	$this->alert=new alert;
	$this->auth=new auth($this->db);
	$this->setting=new setting($this->db);
	$this->api=new api();
	
?>