<?php

//require "dbConfig.php";

//$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);//
$conn = new mysqli('localhost', 'st893', 'StephanieTea', 'manhattanrc');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

?>