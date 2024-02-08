<?php 
session_start();

$db = "crud";
$server = "localhost";
$user = "root";
$password = "";
$conn = mysqli_connect($server,$user,$password,$db);

$title=$_POST['title'];
$link=$_POST['link'];

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


            
       
    if($conn){
    
        
        //$sqql = 'INSERT INTO `cities` ( `city_name`,`city_province`,`city_percentage`,`city_per_km_charges`,`city_service_charges`,`city_limit_for_percentage`) VALUES (?,?,?,?,?,?)';
    
            $sqql="INSERT INTO page (page_title,page_link,page_img)
        SELECT * FROM (SELECT '$title' as uskatitle,'$link' as uskilink, '$pageImage' as uskiimage) AS tmp
        WHERE NOT EXISTS (
        SELECT  page_title,page_link,page_img from page where (page_title= '$title' AND page_link='$link' AND page_img= '$pageImage')
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
            header("location: page.php");
            // echo "if inserted";
        }
        else{
            
            $_SESSION["failed_status"]='IF';
            header("location: page.php");
            // echo "if not inserted";
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