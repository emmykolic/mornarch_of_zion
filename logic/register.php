<?php 
	/**
	 * 
	 */
	class register extends boiler
	{
		
		public function __construct(){
			parent::__construct();
		}

		public function defaultb(){
			include_once 'themes/' . $this->setting->admin_theme . '/registration.php';
		}
	}
?>