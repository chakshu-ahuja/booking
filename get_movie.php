<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "movies_booking";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM movie";
	$result = $conn->query($sql);

	$movie = array();
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $movie[] = $row;
	    }
	}
	$conn->close();
	echo json_encode($movie);
?>
