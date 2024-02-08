<?php
session_start();
$server = "localhost";
$user = "root";
$password = "";
$db = "crud";



// Create connection
$conn = new mysqli($server, $user, $password, $db);

$post_id = $_GET['id'];

echo $post_id;

$sql = "DELETE FROM post WHERE id='$post_id'";
$data = mysqli_query($conn,$sql);
if ($conn->query($sql) === TRUE) {
  echo "post deleted successfully";
  header("Location: post.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
$_SESSION['status_deleted']='SD';
header("Location: post.php");
exit;
   
$conn->close();
?> 