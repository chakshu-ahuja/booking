<?php
$host="localhost";
$username="root";
$password="";
$database="movies_booking";
$link=mysqli_connect($host,$username,$password,$database) or die('database connection error'.mysqli_error($link));
?>