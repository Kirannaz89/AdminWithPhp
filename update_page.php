
<?php
session_start();
$db = "crud";
$server = "localhost";
$user = "root";
$password = "";
// $conn = mysqli_connect($server,$user,$password,$db);

$page_id = $_GET['id'];
$page_title = $_POST['page_title'];
$page_link = $_POST['page_link'];
$pageImage = $_FILES['page_img']['name'];
$pageImageTmp = $_FILES['page_img']['tmp_name'];

 if((isset($_SESSION["loggedin"]))){
				

     if ((($_FILES["page_img"]["type"] == "image/gif") || ($_FILES["page_img"]["type"] == "image/jpeg") || ($_FILES["page_img"]["type"] == "image/png") || ($_FILES["page_img"]["type"] == "image/jpg") || ($_FILES["post_img"]["type"] == "image/webp")) && ($_FILES["page_img"]["size"] < 1000000)) 
     	{
     				$uniquesavename=time().uniqid(rand());
     				$pageImage=$uniquesavename.$pageImage;
    
    
     			 move_uploaded_file($_FILES["page_img"]["tmp_name"],"page_uploads/" . $uniquesavename . $_FILES["page_img"]["name"]);
                
        
                
    
        }
    
       else {
		 $_SESSION["wrong_format"]= 'W';
      header("location: page.php");
    exit();
     }
    
 }
echo $page_id.$page_title.$page_link.$pageImage;
$conn= new mysqli($server , $user , $password , $db);
if($conn){

	// echo $change_image;
	// exit();
	$sql = "UPDATE page SET page_title=? , page_link=? , page_img=? WHERE id = $page_id ;";
	$stmt = $conn->prepare($sql);
	if($stmt==false){
		echo"error in stmt";
	}
	$stmt->bind_param('sss',$page_title,$page_link,$pageImage);
	$stmt->execute();
	$stmt->store_result();
	$affected = $stmt-> affected_rows;
            
    
	if($affected == 1){
		 //echo 'Inserted';

	  $_SESSION["updated_status"]='US';
	  header("location: page.php");
	  exit();
  }
  else{
	  
	  $_SESSION["failed_status"]='IF';
	  header("location: page.php");
	  exit();
  }
  
	$stmt->free_result();
	$stmt->close();
	
	
	
$conn->close();


	}
?>
