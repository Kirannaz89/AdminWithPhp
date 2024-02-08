<?php 
session_start();
// include("include/connection.php");
$db = "crud";
$server = "localhost";
$user = "root";
$password = "";
$conn = mysqli_connect($server,$user,$password,$db);



$email=$_POST['Email'];
$password=$_POST['Password'];


				// $conn= new mysqli($server,$user,$password,$db);
				if($conn){

					$sql = 'select * from user where email=? AND password=?';
					$stmt = $conn->prepare($sql);
					if($stmt==false){
						echo"error in statement";
					}

					$stmt->bind_param('ss',$email,$password);
					$stmt->execute();
					$stmt->store_result();
					
					
					if($stmt->num_rows()>0){


						$stmt->bind_result($user_id,$user_name,$user_email,$user_password,$user_phone,$user_address);
						while($stmt->fetch()){
							$_SESSION["loggedin"]=true;
							$_SESSION["id"]=$user_id;
							$_SESSION["name"]=$user_name;
							// $_SESSION["admin_username"]=$admin_username;
							// $_SESSION["admin_password"]=$admin_password;
							// $_SESSION["admin_email"]=$admin_email;
							// $_SESSION["admin_phone"]=$admin_phone;
							// $_SESSION["admin_address"]=$admin_address;
							// $_SESSION["admin_share"]=$admin_share;
							// $_SESSION["parking_fee"]=$parking_fee;					

				

				 		}


						header("Location: dashboard.php");
						//echo $name."--".$password_user; exit();
					}
					else{
						header("Location: index.php?status=F");
					}
					$stmt->free_result();
					$stmt->close();
					
					
				}else{

					echo "Not Connected";
					}

$conn->close();
?>