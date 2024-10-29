<?php
// include 'db_connection.php'; // Include your database connection script

$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 2;
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

$limit = $this->db->quer("SELECT * FROM blogs ORDER BY bid LIMIT $limit OFFSET $offset");
$result = $this->db->query($query);

$posts = [];
while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}

echo json_encode($posts);


?>
