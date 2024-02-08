<?php 
session_start();

$db = "crud";
$server = "localhost";
$user = "root";
$password = "";
$conn = mysqli_connect($server,$user,$password,$db);

$title=$_POST['post_title'];
$description=$_POST['post_description'];

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




  
    if($conn){
    
        
        //$sqql = 'INSERT INTO `cities` ( `city_name`,`city_province`,`city_percentage`,`city_per_km_charges`,`city_service_charges`,`city_limit_for_percentage`) VALUES (?,?,?,?,?,?)';
    
            $sqql="INSERT INTO post (post_title,post_description,post_img)
        SELECT * FROM (SELECT '$title' as uskatitle,'$description' as uskidescription, '$postImage' as uskiimage) AS tmp
        WHERE NOT EXISTS (
        SELECT  post_title,post_description,post_img from post where (post_title= '$title' AND post_description='$description' AND post_img= '$postImage')
    ) LIMIT 1";


        $stmt = $conn->prepare($sqql);
        if($stmt==false){
            echo"error in stmt";
        }
        //$stmt->bind_param('ssssss',$city_name,$city_province,$city_percentage,$city_per_km_charges,$city_service_charges,$city_limit_for_percentage);
        $stmt->execute();
        $stmt->store_result();
    
        $affected = $stmt-> affected_rows;
            
    
          if($affected == 1){
               //echo 'Inserted';
    
            $_SESSION["status_updated"]='SU';
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
    
    
    }else{
        $_SESSION["status"]='F';
        header("Location: index.php");
    }
        
             
        
        
    $conn->close();
    // }				
    // else{ 
    //     header("Location: index.php?status=S_FAILED");
    // }




?>