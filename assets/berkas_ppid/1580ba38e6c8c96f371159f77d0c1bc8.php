
<?php
$servername = "103.146.203.123";
$database 	= "smknpari_db_ppid";
$username 	= "smknpari_original";
$password 	= "mikrotik12";
// Create connection
$connect 	=  new mysqli ($servername, $username, $password, $database);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

?>