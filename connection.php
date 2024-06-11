<?php
//Create database parameters
$dbhost = "localhost";
$dbusername = "root";
$dbpass = "";
$dbname = "ccstdocrepo";

// Create connection
$conn = new mysqli($dbhost, $dbusername, $dbpass, $dbname);

//Check connection
if($conn->connect_error)
{
    die("Something went wrong!: ". $conn->connect_error);
}
?>