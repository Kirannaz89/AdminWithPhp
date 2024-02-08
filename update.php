
<?php
session_start();
$db = "crud";
$server = "localhost";
$user = "root";
$password = "";
// $conn = mysqli_connect($server,$user,$password,$db);

$post_id = $_GET['id'];
$post_title = $_POST['post_title'];
$post_description = $_POST['post_description'];
$postImage = $_FILES['post_img']['name'];
$postImageTmp = $_FILES['post_img']['tmp_name'];

 if((isset($_SESSION["loggedin"]))){
				

     if ((($_FILES["post_img"]["type"] == "image/gif") || ($_FILES["post_img"]["type"] == "image/jpeg") || ($_FILES["post_img"]["type"] == "image/png") || ($_FILES["post_img"]["type"] == "image/jpg") || ($_FILES["post_img"]["type"] == "image/webp")) && ($_FILES["post_img"]["size"] < 1000000)) 
     	{           
		
     				$uniquesavename=time().uniqid(rand());
     				$postImage=$uniquesavename.$postImage;
    
    
					 move_uploaded_file($_FILES["post_img"]["tmp_name"],"post_uploads/" . $uniquesavename . $_FILES["post_img"]["name"]);
                
        
                
    
        }
    
       else {
		 $_SESSION["wrong_format"]= 'W';
      header("location: post.php");
    exit();
     }
    
 }
echo $post_id.$post_title.$post_description.$postImage;
$conn= new mysqli($server , $user , $password , $db);
if($conn){

	// echo $change_image;
	// exit();
	$sql = "UPDATE post SET post_title=? , post_description=? , post_img=? WHERE id = $post_id ;";
	$stmt = $conn->prepare($sql);
	if($stmt==false){
		echo"error in stmt";
	}
	$stmt->bind_param('sss',$post_title,$post_description,$postImage);
	$stmt->execute();
	$stmt->store_result();
	$affected = $stmt-> affected_rows;
            
    
	if($affected == 1){
		 //echo 'Inserted';

	  $_SESSION["updated_status"]='US';
	  header("location: post.php");
	  exit();
  }
  else{
	  
	  $_SESSION["failed_status"]='IF';
	  header("location: post.php");
	  exit();
  }
  
	$stmt->free_result();
	$stmt->close();
	
	
	
$conn->close();


	}
?>
