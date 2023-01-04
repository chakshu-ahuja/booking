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

	$mov_id = $_POST['mov_id'];

	$sql = "SELECT * FROM time WHERE Mov_cod = '$mov_id'";
	$result = $conn->query($sql);

	$time = array();
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $time[] = $row;
	    }
	}
	$conn->close();
	echo json_encode($time);
?>
