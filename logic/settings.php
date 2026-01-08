<?php
class settings extends boiler
{

	public function  defaultb()
	{
		$this->auth->admin();
		$g = new setting($this->db);

		$this->set_token();

		include_once 'themes/' . $this->setting->admin_theme . '/header.php';
		include_once 'themes/' . $this->setting->admin_theme . '/settings_default.php';
		include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
	}

	public function action()
	{
		if ($this->validate() == 1) {
			$this->auth->form_admin();

			$site_name = $this->clean->post('site_name');
			$site_description = $this->clean->post('site_description');
			$site_author = $this->clean->post('site_author');
			$site_url = $this->clean->post('site_url');
			$site_keywords = $this->clean->post('site_keywords');
			$favicon = $this->clean->photo("favicon", "site_files/", "assets/");
			$screenshot = $this->clean->photo("screenshot", "site_files/", "assets/");
			$logo = $this->clean->photo("logo", "site_files/", "assets/");
			$site_address = $this->clean->post('site_address');
			$site_email = $this->clean->post('site_email');
			$site_phone_number = $this->clean->post('site_phone_number');
			$site_twitter = $this->clean->post('site_twitter');
			$site_facebook = $this->clean->post('site_facebook');
			$site_instagram = $this->clean->post('site_instagram');
			$site_youtube = $this->clean->post('site_youtube');
			$site_whatsapp = $this->clean->post('site_whatsapp');
			$site_linkedin = $this->clean->post('site_linkedin');
			$currency = $this->clean->post('currency');
			$admin_theme = $this->clean->post('admin_theme');
			$landing_theme = $this->clean->post('landing_theme');


			if ($this->auth->error == 0) {
				$this->db->query("UPDATE settings SET value='$site_name' WHERE item='site_name'  ");
				$this->db->query("UPDATE settings SET value='$site_description' WHERE item='site_description'  ");
				$this->db->query("UPDATE settings SET value='$site_author' WHERE item='site_author'  ");
				$this->db->query("UPDATE settings SET value='$site_url' WHERE item='site_url' ");
				$this->db->query("UPDATE settings SET value='$site_keywords' WHERE item='site_keywords'  ");
				$this->db->query("UPDATE settings SET value='$site_address' WHERE item='site_address'  ");
				$this->db->query("UPDATE settings SET value='$site_email' WHERE item='site_email'  ");
				$this->db->query("UPDATE settings SET value='$site_phone_number' WHERE item='site_phone_number'  ");
				$this->db->query("UPDATE settings SET value='$site_twitter' WHERE item='site_twitter'  ");
				$this->db->query("UPDATE settings SET value='$site_facebook' WHERE item='site_facebook'  ");
				$this->db->query("UPDATE settings SET value='$site_instagram' WHERE item='site_instagram'  ");
				$this->db->query("UPDATE settings SET value='$site_youtube' WHERE item='site_youtube'  ");
				$this->db->query("UPDATE settings SET value='$currency' WHERE item='site_currency'  ");
				$this->db->query("UPDATE settings SET value='$admin_theme' WHERE item='admin_theme'  ");
				$this->db->query("UPDATE settings SET value='$landing_theme' WHERE item='landing_theme'  ");
				$this->db->query("UPDATE settings SET value='$site_whatsapp' WHERE item='site_whatsapp'  ");
				$this->db->query("UPDATE settings SET value='$site_linkedin' WHERE item='site_linkedin'  ");
				$k = new setting($this->db);
				if ($favicon != "") {
					if (file_exists("./assets/" . $k->site_favicon) == 1) {
						unlink("./assets/" . $k->site_favicon);
					}
					$this->db->query("UPDATE settings SET value='$favicon' WHERE item='site_favicon'  ");
				}
				if ($logo != "") {
					if (file_exists("./assets/" . $k->site_logo) == 1) {
						unlink("./assets/" . $k->site_logo);
					}
					$this->db->query("UPDATE settings SET value='$logo' WHERE item='site_logo'  ");
				}

				if ($screenshot != "") {
					if (file_exists("./assets/" . $k->site_screenshot) == 1) {
						unlink("./assets/" . $k->site_screenshot);
					}
					$this->db->query("UPDATE settings SET value='$screenshot' WHERE item='site_screenshot'  ");
				}

				$this->alert->set("Site Settings Were Changed Successfully", "success");
				header('location:' . BURL . 'settings');
			} else {

				$this->alert->set($this->auth->error_msg, "danger");
				header('location:' . BURL . 'settings');
			}
		} else {
			$this->alert->set("Invalid request", "danger");
			header('location:' . BURL . 'settings');
		}
	}
}
