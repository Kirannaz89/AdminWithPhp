<?php
session_start();
$server = "localhost";
$user = "root";
$password = "";
$db = "crud";



// Create connection
$conn = new mysqli($server, $user, $password, $db);

$page_id = $_GET['id'];

echo $page_id;

$sql = "DELETE FROM page WHERE id='$page_id'";
$data = mysqli_query($conn,$sql);
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: page.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$_SESSION['status_deleted']='SD';
header("Location: page.php");
exit;

$conn->close();
?> 