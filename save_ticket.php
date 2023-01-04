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

	$mov_name = $_POST['mov_name'];
	$tkt_date = $_POST['tkt_date'];
	$tkt_time = $_POST['tkt_time'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	$sql = "INSERT INTO tickets (movie_name, tkt_date, tkt_time, name, eml)
	VALUES ('$mov_name', '$tkt_date', '$tkt_time', '$name', '$email')";

	if ($conn->query($sql) === TRUE) {
	    echo "Ticket Booked successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>