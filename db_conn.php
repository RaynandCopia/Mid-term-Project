<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbase";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Failed to Connect!" . mysqli_connect_error());
}

//echo "Successfully Connected!";
