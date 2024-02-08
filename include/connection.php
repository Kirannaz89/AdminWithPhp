<?php
$db = "crud";
$server = "localhost";
$user = "root";
$password = "";
$connection = mysqli_connect($server,$user,$password,$db);

if(!$connection)
{
	echo "Connection Failed";
	die("connection failed".mysqli_error());
	
}
else {
    // echo "Connection Established";
}
// $db = "spotter_db";
// $server = "localhost";
// $user = "spotter_user";
// $password = "spotter_pass";
// $connection = mysqli_connect($server,$user,$password,$db);

// if(!$connection)
// {
// 	echo "Connection Failed";
// 	die("connection failed".mysqli_error());
	
// }

?>