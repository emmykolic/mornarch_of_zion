<?php
class index extends boiler
{
	public function __construct()
	{
		parent::__construct();
		$this->stats = new stats($this->db); 
	}

	public function  defaultb(){
		$is_landing = 1;
		$this->set_token();
		$audios = $this->db->query("SELECT * FROM audios ORDER BY aid DESC LIMIT 25");
		// $get_blog = $this->db->query("SELECT * FROM blogs ORDER BY bid  OFFSET 0");
		$get_blog = $this->db->query("SELECT * FROM blogs ORDER BY views DESC LIMIT 5");

		// Check if the request is for a blog post (blog detail URL pattern)
        if (preg_match('/index\/blog\/index_blog_details\/(\d+)\/(.+)/', $_SERVER['REQUEST_URI'], $matches)) {
            // $matches[1] should be the blog ID (bid)
            // $matches[2] should be the slug
            $blog_id = (int) $matches[1];
            $slug = $matches[2];

            // Debugging line to check extracted blog ID and slug
            echo "Blog ID received: " . $blog_id . "<br>";
            echo "Slug received: " . $slug . "<br>";

            // Call the blog method with the blog ID
            $blog_controller = new blog();
            $blog_controller->blog($blog_id);
            exit;
        }
		
		// $get_blog = $db->query("SELECT title_of_blog, blog_img, slug FROM blogs ORDER BY popularity DESC");
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/index.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}

	private function formatParagraphs($paragraphs, $breakAfter = 2) {
		$output = '';
		foreach ($paragraphs as $index => $paragraph) {
			$output .= nl2br(htmlspecialchars($paragraph)) . '<br><br>';
			if (($index + 1) % $breakAfter == 0) {
				$output .= '<br>'; // Double break after every 2 paragraphs
			}
		}
		return $output;
	}

	public function single($aid) {
		$this->set_token();
	
		// Fetch audio data from the database
		$song_single_query = $this->db->query("SELECT * FROM audios WHERE aid = '$aid'");

		// Fetch blog post data
		$get_blog = $this->db->query("SELECT * FROM blogs ORDER BY bid");
	
		if ($song_single_query->num_rows > 0) {
			// Fetch the first row (since we're only expecting one result)
			$row = $song_single_query->fetch_assoc();
	
			// Set background image path with base URL
			$backgroundImage = !empty($row['song_img']) ? BURL . $row['song_img'] : BURL . 'assets/default_image.jpg';
	
			// Handle empty fields gracefully
			$song_description = !empty($row['song_description']) ? explode("\n\n", $row['song_description']) : [];
			$song_lyrics = !empty($row['song_lyrics']) ? explode("\n\n", $row['song_lyrics']) : [];
	
			// Format song description and lyrics
			$formattedSongDescription = $this->formatParagraphs($song_description);
			$formattedSongLyrics = $this->formatParagraphs($song_lyrics);
	
			// Include header and theme files
			include_once 'themes/' . $this->setting->landing_theme . '/header.php';
			include_once 'themes/' . $this->setting->landing_theme . '/index_single_music.php';
			include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
		} else {
			echo "No song found.";
		}
	}
	
	public function music() {
		$this->set_token();
	
		// Check if the request is an AJAX request
		if (isset($_GET['ajax']) && $_GET['ajax'] === '1') {
			// This is an AJAX request, so fetch additional songs based on offset
			$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
			$limit = 6; // Set batch size for loading songs
	
			// Query to fetch the next batch of songs
			$song_query = $this->db->query("SELECT * FROM audios ORDER BY aid DESC LIMIT $limit OFFSET $offset");
	
			$songs = [];
			if ($song_query->num_rows > 0) {
				while ($row = $song_query->fetch_assoc()) {
					$songs[] = [
						'aid' => $row['aid'],
						'song_name' => htmlspecialchars($row['song_name']),
						'song_img' => BURL . $row['song_img']
					];
				}
			}
	
			// Send JSON response for AJAX
			header('Content-Type: application/json');
			echo json_encode($songs);
			exit;
		}
	
		// Initial page load for the first set of songs
		$limit = 6;
		$offset = 0;
		$full_song_query = $this->db->query("SELECT * FROM audios ORDER BY aid DESC LIMIT $limit OFFSET $offset");
	
		// Include header, content, and footer files
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/index_music.php';
		// include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}
    

	// public function blog($bid) {
	// 	$this->page_title = "M.O.Z | Blog";
	// 	$is_landing = 1;
	// 	$this->set_token();
	
	// 	function shorten_text($text, $max_length = 100) {
	// 		if (strlen($text) > $max_length) {
	// 			$shortened = substr($text, 0, $max_length) . '...';
	// 		} else {
	// 			$shortened = $text;
	// 		}
	// 		return $shortened;
	// 	}        
	
	// 	// Initial fetch of blog posts
	// 	$get_blog = $this->db->query("SELECT * FROM blogs ORDER BY bid LIMIT 2 OFFSET 0");
	// 	// $blog_list = $this->db->query("SELECT * FROM blogs ORDER BY bid LIMIT 20");
    //     $blog_id = $row['bid']; // Assuming you have the blog post ID 
    //     $this->db->query("UPDATE blogs SET views = views + 1  WHERE bid = '$blog_id'");
    //     $slug = generateUniqueSlug($title_of_blog, $db);
	// 	include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/index_blog_details.php';
	// 	// include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// }

	function generateSlug($string, $db) {
		// Convert the string to lowercase
		$slug = strtolower($string);
	
		// Replace any non-alphanumeric characters with hyphens
		$slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);
	
		// Remove any trailing hyphens
		$slug = trim($slug, '-');
	
		// Optionally, you can check if this slug is unique in the database
		$result = $db->query("SELECT bid FROM blogs WHERE slug = '$slug' LIMIT 1");
		if ($result->num_rows > 0) {
			// If the slug already exists, append a unique identifier
			$slug .= '-' . uniqid();
		}
	
		return $slug;
	}	

	// public function blog($bid) {
	// 	$this->page_title = "M.O.Z | Blog";
	// 	$this->set_token();

	// 	echo "Blog ID received: " . $bid . "<br>"; // Debugging output
	
	// 	// Function to shorten text
	// 	function shorten_text($text, $max_length = 100) {
	// 		return (strlen($text) > $max_length) ? substr($text, 0, $max_length) . '...' : $text;
	// 	}
	
	// 	// Cast bid to integer to avoid SQL injection
	// 	$bid = (int) $bid;
	
	// 	// Fetch blog post data
	// 	$get_blog = $this->db->query("SELECT * FROM blogs WHERE bid = $bid LIMIT 1");
	
	// 	if ($get_blog->num_rows > 0) {
	// 		echo "Blog post not found.";
	// 		return;
	// 	}
	
	// 	$row = $get_blog->fetch_assoc();
	
	// 	// Generate slug if it's not set (assuming $title_of_blog exists)
	// 	$slug = generateSlug($row['title_of_blog'], $this->db);
	
	// 	// Increment view count
	// 	$this->db->query("UPDATE blogs SET views = views + 1 WHERE bid = $bid");
	
	// 	// Debugging output to ensure the correct data is fetched
	// 	echo "Blog ID: " . $bid . "<br>";
	// 	echo "Blog Title: " . $row['title_of_blog'] . "<br>";
	// 	echo "Slug: " . $slug . "<br>";
	
	// 	// Include the header and blog details template
	// 	include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/index_blog_details.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// }

	public function blog($bid) {
		$this->page_title = "M.O.Z | Blog";
		$is_landing = 1;
		$this->set_token();

		// Debugging line to check if $bid is received correctly
		echo "Received Blog ID: " . $bid . "<br>";
	
		// Check if $bid is valid
		if ($bid <= 0) {
			echo "Invalid blog ID.";
			return;
		}
	
		// Fetch blog post data
		$get_blog = $this->db->query("SELECT * FROM blogs WHERE bid = '$bid' LIMIT 1");
	
		// Debugging line to check if the query returned any rows
		if ($get_blog->num_rows == 0) {
			echo "Blog post not found.";
			return;
		}
	
		$row = $get_blog->fetch_assoc();
		echo "<pre>"; print_r($row); echo "</pre>"; // Debugging line to check fetched blog data
	
		// Generate slug if it's not set (assuming $title_of_blog exists)
		if (!isset($row['slug']) || empty($row['slug'])) {
			$slug = generateSlug($row['title_of_blog'], $this->db);
		} else {
			$slug = $row['slug'];
		}
	
		// Update the view count for the blog
		$this->db->query("UPDATE blogs SET views = views + 1 WHERE bid = '$bid'");
	
		// Include header and blog details template
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/index_blog_details.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}


	public function blog_view() {
		$this->page_title = "M.O.Z | Blog";
		$is_landing = 1;
		$this->set_token();
	
		// Fetch blog post data
		$get_blog = $this->db->query("SELECT * FROM blogs ORDER BY bid");
	
		// Fetch blog post data
		$collect_blog = $this->db->query("SELECT * FROM blogs ORDER BY bid");

		function shorten_text($text, $max_length = 100) {
			if (strlen($text) > $max_length) {
				$shortened = substr($text, 0, $max_length) . '...';
			} else {
				$shortened = $text;
			}
			return $shortened;
		}  
	
		if ($collect_blog->num_rows == 0) {
			echo "Blog post not found.";
			return;
		}
	
		$row = $collect_blog->fetch_assoc();

		$bid = $row['bid'];
	
		// Generate slug if it's not set (assuming $title_of_blog exists)
		if (!isset($row['slug']) || empty($row['slug'])) {
			$slug = generateSlug($row['title_of_blog'], $this->db);
		} else {
			$slug = $row['slug'];
		}
	
		// Update the view count for the blog
		$this->db->query("UPDATE blogs SET views = views + 1 WHERE bid = '$bid'");
	
		// Include header and blog details template
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/index_blog.php';
		// include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}
	
	public function fetch_posts() {
		$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 2;
		$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
	
		$query = "SELECT * FROM blogs ORDER BY bid LIMIT $limit OFFSET $offset";
		$result = $this->db->query($query);
	
		$posts = [];
		while ($row = $result->fetch_assoc()) {
			$posts[] = $row;
		}
	
		echo json_encode($posts);
	}
	

	// public function fetchPosts($limit, $offset) {
	// 	$query = "SELECT * FROM blogs ORDER BY bid LIMIT ? OFFSET ?";
	// 	$stmt = $this->db->prepare($query);
	// 	$stmt->bind_param('ii', $limit, $offset);
	// 	$stmt->execute();
	// 	$result = $stmt->get_result();
	
	// 	$posts = [];
	// 	while ($row = $result->fetch_assoc()) {
	// 		$posts[] = $row;
	// 	}
	
	// 	echo json_encode($posts);
	// }

	
	public function video() {
		$this->auth->user();
		$this->page_title = "M.O.Z Videos | Video List";
		$uid = $this->auth->uid;
		$this->set_token();
	
		// Fetch data from both videos and audio tables
		// $get_video = $this->db->query("SELECT videos.*, audios.song_name FROM videos INNER JOIN audios ON videos.song_id = audios.aid ORDER BY videos.vid LIMIT 10");
		$get_video = $this->db->query("SELECT videos.*, audios.song_name, audios.song_img FROM videos INNER JOIN audios ON videos.vid = audios.aid ORDER BY videos.vid LIMIT 10");
		
		// Fetch blog post data
		$get_blog = $this->db->query("SELECT * FROM blogs ORDER BY bid");

	
		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
		include_once 'themes/' . $this->setting->landing_theme . '/index_videos.php';
		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	}

	private function formatParagraphss($paragraphs) {
		$formattedText = '';
		foreach ($paragraphs as $paragraph) {
			$formattedText .= '<p>' . htmlspecialchars($paragraph) . '</p>';
		}
		return $formattedText;
	}
	
	public function video_view($vid) {
		$this->set_token();
		$this->auth->user();
		$this->page_title = "M.O.Z Videos | Video List";
		$uid = $this->auth->uid;
	
		// Fetch data from both videos and audio tables
		$get_video_query = $this->db->query("SELECT videos.*, audios.song_name, audios.song_img, audios.song_description, audios.song_lyrics FROM videos INNER JOIN audios ON videos.vid = audios.aid WHERE videos.vid = '$vid' LIMIT 1");
		// Fetch blog post data
		$get_blog = $this->db->query("SELECT * FROM blogs ORDER BY bid");
	
		if ($get_video_query->num_rows > 0) {
			$row = $get_video_query->fetch_assoc();

			// Tags processing
			$tags = explode(',', $row['tag_video']); // Split tags by comma

			// Set background image path
			$backgroundImage = !empty($row['song_img']) ? BURL . $row['song_img'] : BURL . 'assets/default_image.jpg';

			// Handle empty fields gracefully
			// $song_description = !empty($row['song_description']) ? explode("\n\n", $row['song_description']) : [];
			// $song_lyrics = !empty($row['song_lyrics']) ? explode("\n\n", $row['song_lyrics']) : [];
	
			// Convert line breaks in song lyrics and description into HTML line breaks
			$formattedSongLyrics = nl2br(htmlspecialchars($row['song_lyrics']));
			$formattedSongDescription = nl2br(htmlspecialchars($row['song_description']));

			// Initialize video ID as empty
			$videoId = '';

			// Check if source URL exists and extract video ID accordingly
			if (!empty($row['source'])) {
				$url = $row['source'];

				// Parse the URL and extract the video ID from different possible formats
				if (strpos($url, 'watch?v=') !== false) {
					// Full YouTube URL with watch?v=
					$videoId = explode('watch?v=', $url)[1];
				} elseif (strpos($url, 'youtu.be/') !== false) {
					// Short YouTube URL
					$videoId = explode('youtu.be/', $url)[1];
				} elseif (strpos($url, 'youtube.com/embed/') !== false) {
					// Already in embed format
					$videoId = explode('embed/', $url)[1];
				} else {
					// Catch all for unusual cases by taking the last segment
					$parts = explode('/', rtrim($url, '/'));
					$videoId = end($parts);
				}

				// Ensure no query parameters remain in the video ID
				$videoId = strtok($videoId, '&');
			}
	
			// Include header and theme files
			include_once 'themes/' . $this->setting->landing_theme . '/header.php';
			include_once 'themes/' . $this->setting->landing_theme . '/index_video_view.php';
			include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
		} else {
			echo "No song found.";
		}
	}
	


	// public function booking_action()
	// {
	// 	$this->validate();
	// 	$route = $this->clean->post('route');
	// 	$trip_date = $this->clean->post('trip_date');
	// 	$ticket_type = $this->clean->post('ticket_type');
	// 	if ($route == "" || $trip_date == "" || $ticket_type == "") {
	// 		$this->error = 1;
	// 		$this->error_msg .= " Fill up empty fields";
	// 	}

	// 	$check_route = $this->db->query("SELECT * FROM routes WHERE rid=$route");
	// 	if ($check_route->num_rows < 1) {
	// 		$this->error = 1;
	// 		$this->error_msg .= " invalid Route";
	// 	} else {
	// 		$check_route = $check_route->fetch_assoc();
	// 		$price = $check_route['price'];
	// 	}
	// 	if ($this->error == 0) {
	// 		$trips = $this->db->query("SELECT * FROM trips,routes WHERE trips.route=routes.rid AND trips.route=$route AND trips.trip_date='$trip_date'");
	// 		include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 		include_once 'themes/' . $this->setting->landing_theme . '/index_booking_action.php';
	// 		include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// 	} else {
	// 		echo $this->error_msg;
	// 		$this->alert->set($this->error_msg, "danger");
	// 		header('location:' . BURL . "/index");
	// 	}
	// }

	// public function booking_action_action()
	// {

	// 	$ticket_type = $this->clean->post('ticket_type');

	// 	if ($ticket_type == "") {
	// 		$this->error = 1;
	// 		$this->error_msg .= "Cannot detect your ticket type<br>";
	// 	} else {
	// 		$route = $this->clean->post('route');
	// 		if ($route == "") {
	// 			$this->error = 1;
	// 			$this->error_msg .= " Cannot detect your route, please try again<br>";
	// 		} else {
	// 			$check_route = $this->db->query("SELECT * FROM routes WHERE rid=$route");
	// 			if ($check_route->num_rows < 1) {
	// 				$this->error = 1;
	// 				$this->error_msg .= " invalid Route<br>";
	// 			} else {
	// 				$check_route = $check_route->fetch_assoc();
	// 				$price = $check_route['price'];
	// 				if ($ticket_type == "Single Ticket") {
	// 					$cost = $price;
	// 				} elseif ($ticket_type == "Return Ticket") {
	// 					$cost = $price * 2;
	// 				} else {
	// 					$this->error = 1;
	// 					$this->error_msg .= " Something went wrong, couldn't calculate your ticket cost!<br>";
	// 				}
	// 			}
	// 		}
	// 	}
	// 	$trip = $this->clean->post('trip');
	// 	if ($trip != "") {
	// 		$check_trip = $this->db->query("SELECT * FROM trips WHERE tid=$trip");
	// 		if ($check_trip->num_rows < 1) {
	// 			$this->error = 1;
	// 			$this->error_msg .= " invalid Trip<br>";
	// 		}
	// 		$pref_time = "Trip official time";
	// 	} else {
	// 		$pref_time = $this->clean->post('pref_time');
	// 		$trip = 0;
	// 		if ($pref_time == "") {
	// 			$this->error = 1;
	// 			$this->error_msg .= " Something went wrong! <br>";
	// 		}
	// 	}

	// 	$trip_date = $this->clean->post('trip_date');

	// 	$name = $this->clean->post('name');
	// 	if ($name == "") {
	// 		$this->error = 1;
	// 		$this->error_msg .= " Fill up the name field <br>";
	// 	}
	// 	$email = $this->clean->post('email');
	// 	if ($email == "") {
	// 		$this->error = 1;
	// 		$this->error_msg .= " Fill up the email field <br>";
	// 	}
	// 	$address = $this->clean->post('address');
	// 	if ($address == "") {
	// 		$this->error = 1;
	// 		$this->error_msg .= " Fill up the address field <br>";
	// 	}
	// 	$phone = $this->clean->post('phone');
	// 	if ($phone == "") {
	// 		$this->error = 1;
	// 		$this->error_msg .= " Fill up the phone no field <br>";
	// 	}
	// 	$nok_name = $this->clean->post('nok_name');
	// 	if ($nok_name == "") {
	// 		$this->error = 1;
	// 		$this->error_msg .= " Fill up the next of kin name field field <br>";
	// 	}
	// 	$nok_address = $this->clean->post('nok_address');
	// 	if ($nok_address == "") {
	// 		$this->error = 1;
	// 		$this->error_msg .= " Fill up next of kin address field <br>";
	// 	}
	// 	$nok_phone = $this->clean->post('nok_phone');
	// 	if ($nok_phone == "") {
	// 		$this->error = 1;
	// 		$this->error_msg .= " Fill up next of kin phone no field <br>";
	// 	}

	// 	$ref = $this->clean->post('ref');
	// 	if ($ref == "") {
	// 		$this->error = 1;
	// 		$this->error_msg .= " no reference for this transaction";
	// 	}


	// 	if ($this->error == 0) {
	// 		$code = new codegen($this->db, 'bookings', "pin");
	// 		$pin = $code->unique(10);
	// 		$this->db->query("INSERT INTO bookings (trip_date, route, fullname, phone, nok_fullname, nok_phone, nok_address, address, prefered_time, email, ticket_type, trip , pin, ref) VALUES ('$trip_date','$route','$name','$phone','$nok_name','$nok_phone','$nok_address','$address','$pref_time','$email','$ticket_type','$trip','$pin','$ref') ");
	// 		$result = array();
	// 		//The parameter after verify/ is the transaction reference to be verified
	// 		$url = 'https://api.paystack.co/transaction/verify/' . $ref;

	// 		$ch = curl_init();
	// 		curl_setopt($ch, CURLOPT_URL, $url);
	// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// 		curl_setopt(
	// 			$ch,
	// 			CURLOPT_HTTPHEADER,
	// 			[
	// 				'Authorization: Bearer ' . PAY_STACK_SECRET_KEY
	// 			]
	// 		);
	// 		$request = curl_exec($ch);
	// 		curl_close($ch);

	// 		if ($request) {
	// 			$result = json_decode($request, true);
	// 			if ($result) {
	// 				if ($result['data']) {
	// 					//something came in
	// 					if ($result['data']['status'] == 'success') {
	// 						$chargeAmount = ($result['data']['amount']) / 100;
	// 						if ($chargeAmount == $cost) {
	// 							$this->db->query("UPDATE bookings SET status=1 WHERE ref='$ref'");
	// 							$title = "Your Genext Ticket";
	// 							$message = "You Completeted a payment for a trip with Genext motors. <br>";
	// 							$message .= "Your ticket pin is $pin <br>";
	// 							$message .= "If you please keep this pin safe it would be used to validate you ticket <br>";
	// 							$body = "
	// 							<html>
	// 							<body> 
	// 								<div style='width:100%;margin:0px auto;background-color:red;padding-top:50px;'>
	// 									<div style='width:70%;margin:0px auto;background-color:white;padding:25px;'>
	// 										<h2>" . $title . "</h1>
	// 										<p>" . $message . "</p>
	// 									</div>
	// 								</div>
	// 							</body>
	// 							</html>
	// 								";
	// 							$this->mail->send($email, $title, $body);
	// 							echo 1;
	// 						} else {
	// 							echo "a problem has occured with your payment";
	// 						}
	// 					} else {
	// 						echo "Transaction was not successful: Last gateway response was: " . $result['data']['gateway_response'];
	// 					}
	// 				} else {
	// 					echo $result['message'];
	// 				}
	// 			} else {
	// 				//print_r($result);
	// 				die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
	// 			}
	// 		} else {
	// 			//var_dump($request);
	// 			die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
	// 		}
	// 	} else {
	// 		echo $this->error_msg;
	// 	}
	// }


	// public function  payment_success($ref = "")
	// {
	// 	$this->page_title = "Payment Success";
	// 	$this->set_token();
	// 	include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/index_payment_success.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// }


	// public function  contact()
	// {
	// 	$this->page_title = "Contact Us";
	// 	$this->page_description = $this->setting->site_description;
	// 	$this->page_keywords = "Buy, Rent, lease, properties, agent, hire artisans, property advisor";
	// 	$this->page_author = "Eauston Properties";
	// 	$this->page_image = $this->setting->site_logo;
	// 	$this->set_token();
	// 	include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/index_contact.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// }

	// public function contactAction()
	// {
	// 	$this->validate();
	// 	$email = $this->clean->post('email');
	// 	$name = $this->clean->post('name');
	// 	$phone = $this->clean->post('phone');
	// 	$message = $this->clean->post('message');
	// 	if ($phone == "" || $email == "" || $name == "") {
	// 		$this->error = 1;
	// 		$this->error_msg .= " Fill up empty fields";
	// 	}
	// 	if (preg_match('/^[A-Za-z\s\. ]+$/', $name) == false) {
	// 		$this->error = 1;
	// 		$this->error_msg .= ' Invalid Name ! ';
	// 	}
	// 	if ($this->error == 0) {
	// 		$mail = new mail();
	// 		$title = "Email from " . $name;
	// 		$body = '<title>' . $title . '</title>
	// 	   </head><body style="background-color: #ccc; padding:5%;"><div style="min-height:200px;background-color: white;width:70%;margin: 20px auto;border-radius: 10px; padding:15px;">
	// 	   <h2 style="color:#ccc">' . $title . '</h2>
	// 	   <p>Phone:' . $phone . '</p>
	// 	   <p>Email:' . $email . '</p>
	// 	   <p>Message:' . $message . '</p>
	// 	   </div></body></html>';
	// 		$mail->send($title, $body, $this->setting->site_email);


	// 		$this->alert->set("Your message has been sent", "success");
	// 		header('location:' . BURL . "/index/contact");
	// 	} else {

	// 		$this->alert->set($this->error_msg, "danger");
	// 		header('location:' . BURL . "/index/contact");
	// 	}
	// }


	// public function  privacyPolicy()
	// {
	// 	$this->page_title = "Privacy Policy";
	// 	$this->set_token();
	// 	include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/privacyPolicy.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// }


	// public function  returnPolicy()
	// {
	// 	$this->page_title = "Return Policy";
	// 	$this->set_token();
	// 	include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/returnPolicy.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// }

	// public function  disclaimer()
	// {
	// 	$this->page_title = "Disclaimer";
	// 	$this->set_token();
	// 	include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/disclaimer.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// }

	// public function  terms()
	// {
	// 	$this->page_title = "Terms";
	// 	$this->set_token();
	// 	include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/terms.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// }


	// public function  testimony()
	// {

	// 	$name = $this->clean->post('name');
	// 	$testimony = $this->clean->post('testimony');
	// 	$dated = time();
	// 	if ($testimony == "" || $name == "") {
	// 		$this->error = 1;
	// 		$this->error_msg .= " Fill up empty fields";
	// 	}

	// 	if ($this->error == 0) {
	// 		$this->db->query("INSERT INTO testimonies (name, testimony, date_created) VALUES ('$name' , '$testimony' ,'$dated') ");
	// 		echo "<div class='alert alert-success'>Your Testimony has been submitted</div>";
	// 	} else {
	// 		echo "<div class='alert alert-danger'>" . $this->error_msg . "</div>";
	// 	}
	// }


	// public function testimony_delete($tid)
	// {
	// 	$this->auth->editor();
	// 	$this->db->query("DELETE FROM testimonies WHERE tid='$tid'");
	// 	$this->alert->set("Testimony Deleted", 'success');
	// 	header('location:' . BURL . "index/testimony_mgt");
	// }

	// public function testimony_approve($tid)
	// {
	// 	$this->auth->editor();
	// 	$this->db->query("UPDATE testimonies SET is_approved=1 WHERE tid='$tid'");
	// 	$this->alert->set("Testimony Approved", 'success');
	// 	header('location:' . BURL . "index/testimony_mgt");
	// }

	// public function  testimony_mgt($start = 0)
	// {
	// 	$this->auth->editor();
	// 	$this->page_title = "Testimonies";
	// 	$testimonies = $this->db->query("SELECT * FROM testimonies WHERE is_approved=0 ");

	// 	include_once 'themes/' . $this->setting->admin_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->admin_theme . '/index_testimonies_mgt.php';
	// 	include_once 'themes/' . $this->setting->admin_theme . '/footer.php';
	// }

	// public function  cargo()
	// {
	// 	$this->page_title = "waybill/cargo";
	// 	$this->set_token();
	// 	include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/index_cargo.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// }

	// public function music() {
	// 	$this->page_title = "Music";
	// 	// $this->set_token();
	// 	include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/index_music.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// }

	// public function  charter()
	// {
	// 	$this->page_title = "waybill/cargo";
	// 	$this->set_token();
	// 	include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/index_charter.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// }

	// public function  partner()
	// {
	// 	$this->page_title = "Be Our Partner";
	// 	$this->set_token();
	// 	include_once 'themes/' . $this->setting->landing_theme . '/header.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/index_partner.php';
	// 	include_once 'themes/' . $this->setting->landing_theme . '/footer.php';
	// }

	// public function  partner_action()
	// {
	// 	if ($this->validate() == 1) {
	// 		$username = $this->clean->post("username");
	// 		if ($username == "") {
	// 			$this->error = 1;
	// 			$this->error_msg .= " Username Field Is Empty <br>";
	// 		}
	// 		$fullname = $this->clean->post("fullname");
	// 		if ($fullname == "") {
	// 			$this->error = 1;
	// 			$this->error_msg .= "Fullname Field Is Empty <br>";
	// 		}
	// 		$email = $this->clean->post("email");
	// 		if ($email != "") {
	// 			$email=filter_var($email, FILTER_SANITIZE_EMAIL);
	// 			$email=strtolower($email);
	// 			$pid=$this->db->query("SELECT pid FROM partnership WHERE email='$email' LIMIT 1 ");

	// 			if ($pid->num_rows>0) {
	// 				$this->error=1; 
	// 				$this->error_msg.="Email Already Exist";
	// 			}
	// 		}else{
	// 			if ($pid->num_rows>0) {
	// 				$this->error=1; 
	// 				$this->error_msg.="Email Field is Empty ";
	// 			}
	// 		}
	// 		$phone = $this->clean->post("phone");
	// 		if ($phone == "") {
	// 			$this->error = 1;
	// 			$this->error_msg .= " Phone Field Is Empty <br>";
	// 		}
	// 		$password = $this->clean->post("password");
	// 		if($password==""){
	// 			$this->error=1; 
	// 			$this->error_msg.=' Empty password!'; 
	// 		}else{
	// 			$cpassword=$this->clean->post('cpassword');
	// 			if($cpassword!=$password){	
	// 				$this->error=1; 
	// 				$this->error_msg.=" passwords Don't match!"; 
	// 			}else{
	// 				// $password=$password;
	// 				$password=sha1(md5($password));
	// 			}
	// 		}
			
	// 		$account_type = $this->clean->post("account_type");
	// 		if ($account_type == "") {
	// 			$this->error=1; 
	// 			$this->error_msg.=" Partnership Type Wasn't Selected!";
	// 		}

	// 		$terms = $this->clean->post("terms");
	// 		if ($terms == "") {
	// 			$this->error=1; 
	// 			$this->error_msg.=" Terms Wasn't Checked box!";
	// 		}

	// 		if ($this->error==0) {
	// 			echo $this->db->error;
	// 			echo "GO";
	// 			$token=sha1(microtime().rand(0, 1000).$email);
	// 			$this->db->query("INSERT INTO partnership (username,fullname,email,phone,password,partnership_type,terms,token) VALUES ('$username', '$fullname', '$email', '$phone', '$password', '$account_type', '$terms', '$token') ");
	// 			$this->alert->set("You Are Now Mornarch Of Zion Partner","success");
	// 			header('location:'.BURL.'index');
	// 		}else{
	// 			$this->alert->set($this->error_msg,"danger");
	// 			header('location:'.BURL.'index/index_partner');
	// 		}
	// 	}else{
	// 		$this->alert->set("Invalid Request", "danger");
	// 		header('location:'.BURL.'index/index_partner');

	// 	}
		
	// }
}
