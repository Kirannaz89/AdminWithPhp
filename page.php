<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Page</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
		<!-- Animation css -->
		<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		

		<?php 
		include("include/header.php");
		// include("include/sidebar.php");
		?>
		<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li > 
								<a href="dashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li> 
								<a href="post.php"><i class="fe fe-users"></i> <span>Posts</span></a>
							</li>
							<li class="active"> 
								<a href="page.php"><i class="fe fe-users"></i> <span>Pages</span></a>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				<?php

	if(isset($_SESSION['status_updated'])){
        if($_SESSION['status_updated']=="SU")
        {
            echo "<div id='hideMe'"?>style="color: blue"<?php echo"><h4>Added Success</h4></div>";
            unset($_SESSION['status_updated']);
        }
	}
	if(isset($_SESSION['failed_status'])){
        if($_SESSION['failed_status']=="IF")
        {
            echo "<div id='hideMe'"?>style="color: red"<?php echo"><h4>Already Added Record</h4></div>";
            unset($_SESSION['failed_status']);
        }
	}


if(isset($_SESSION['updated_status'])){
	if($_SESSION['updated_status']=="US")
	{
		echo "<div id='hideMe'"?>style="color: blue"<?php echo"><h4>updated success</h4></div>";
		unset($_SESSION['updated_status']);
	}
}
if(isset($_SESSION['failed_status'])){
	if($_SESSION['failed_status']=="IF")
	{
		echo "<div id='hideMe'"?>style="color: red"<?php echo"><h4>Already Added Record</h4></div>";
		unset($_SESSION['failed_status']);
	}
}


if(isset($_SESSION['status_deleted'])){
	if($_SESSION['status_deleted']=="SD")
	{
		echo "<div id='hideMe'"?>style="color: blue"<?php echo"><h4>deleted success</h4></div>";
		unset($_SESSION['status_deleted']);
	}
}
?>
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Pages</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Pages</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Pages</th>
													<th class="text-end">Actions</th>
												</tr>
											</thead>
											<tbody>


<?php   
$db = "crud";
$server = "localhost";
$user = "root";
$password = "";
$conn = mysqli_connect($server,$user,$password,$db);





$sql = "SELECT * FROM page";
$data = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($data))
{        

$page_id = $row['id'];
$page_title = $row['page_title'];
$page_link = $row['page_link'];
$page_Image = $row['page_img'];

?>



												<tr>
													<td><?php echo $page_id; ?></td>
													
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm me-2">
															<?php  echo "<img src='page_uploads/$page_Image' height='100px' width='100px'"; ?>
															</a>
															<a href="profile.html"><?php echo $page_title ?></a>
														</h2>
													</td>
												
													<td class="text-end">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#edit_specialities_details<?php echo $page_id ?>">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-bs-toggle="modal" href="#delete_modal<?php echo $page_id ?>" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>

			<div class="modal fade" id="delete_modal<?php echo $page_id ?>" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-content p-2">
							<form action="delete_page.php?id=<?php echo $page_id ?>" method="POST">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?<?php echo $page_id ?></p>
								<button type="submit" class="btn btn-primary">Save</button>
								<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- /ADD Modal -->
			
			<!-- Edit Details Modal -->
			<div class="modal fade" id="edit_specialities_details<?php echo $page_id ?>" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit page</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						



							<form action="update_page.php?id=<?php echo $page_id ?>" method="POST" enctype="multipart/form-data">
								<div class="row form-row">
											<input type="hidden" name="id" class="form-control" value="<?php echo $page_id?>">
			
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Title</label>
											<input type="text" class="form-control" name="page_title" value="<?php echo $page_title?>">
										</div>
									</div>

                                    <div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Link</label>
											<input type="text" class="form-control" name="page_link" value="<?php echo $page_link?>">
										</div>
									</div>
									 <div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Image</label>
											<input type="file" name="page_img" class="form-control" value = "<?php  echo "<img src='page_uploads/$page_Image' height='100px' width='100px'>"; ?>>"
										</div>
									</div> 
									
								</div>
								<button type="submit" class="btn btn-primary w-100" value="update">Save Changes</button>
							</form>

				
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->


												<?php } ?>















											
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			
			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Pages</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="pageAction.php" method="POST" enctype="multipart/form-data">
								<div class="row form-row">
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>Title</label>
											<input type="text" class="form-control" name="title">
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>Link</label>
											<textarea type="text" class="form-control" name="link"></textarea>
										</div>
									</div>
									 <div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Image</label>
											<input type="file" name="page_img" class="form-control">
										</div>
									</div> 
									
								</div>
								<button type="submit" class="btn btn-primary w-100">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Delete Modal -->




		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.6.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>
</html>