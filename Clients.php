<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Test Task</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Favicons -->
		<link href="{{asset('favicon.ico')}}" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<!-- Feathericon CSS -->
		<link rel="stylesheet" href="assets/css/feathericon.min.css">
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">

		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
        <!-- Bootstrap Datetimepicker CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
<div class="header">
        
    <!-- Logo -->
    <div class="header-left">
        <a href="/admin/dashboard" class="logo">
            <!-- <img src="assets/img/header-logo.png')}}" alt="Logo"> -->
        </a>
        <a href="/admin/dashboard" class="logo logo-small">
            <!-- <img src="" alt="Logo" width="30" height="30"> -->
        </a>
    </div>
    <!-- /Logo -->
    
    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>
    
    
    
    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->
    
    <!-- Header Right Menu -->
    <ul class="nav user-menu">
        
        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow">
            <!-- <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="/storage/admin/avatars/{{ Auth::guard('admin')->user()->avatar }}" width="31" alt="Rain Reeves"></span>
            </a> -->
            <div class="dropdown-menu">
                <div class="user-header">
                    <h6 class="text-capitalize"> 
                       
                            <small class="badge badge-danger text-muted">Doctor</small>
                      
                    </h6>
                    
                </div>
                <a class="dropdown-item" href="/admin/dashboard">
                    <span>Dashboard</span>
                </a>
                <a class="dropdown-item" href="/admin/admin-profile-setting">
                    <span>Profile Settings</span>
                </a>
                <a class="dropdown-item" href="/admin/change-admin-password">
                    Change Password
                </a>
               <a class="dropdown-item" href="profile.html">My Profile</a> 
                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                     <span>Logout</span>
                </a>

               <!--  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                  
                </form> -->
            </div>
        </li>
        <!-- /User Menu -->
        
    </ul>
    <!-- /Header Right Menu -->
    
</div>
<!-- /Header -->

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span> 
                      
                            <!-- <small class="badge badge-danger text-muted">Doctor</small> -->
                       
                    </span>
                </li>
               <!--  <li id="admin-dashboard-tab"> 
                    <a href="/admin/dashboard">
                        <i class="fe fe-home"></i>
                        <span>Dashboard</span>
                    </a> 
                </li> -->

                <li class="submenu">
                    <a href="#"><i class="fe fe-vector"></i> <span> Clients</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a id='drugs-tab' href="AddClients.php">
                                <span>Add</span>
                            </a>
                        </li>
                        <li><a id='doses-tab' href="EditClients.php">
                                <span>Edit</span>
                            </a>
                        </li>
                        <li><a id='frequencies-tab' href="/admin/frequencies">
                            <span>Delete</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
               <!--  <li id="admin-profile-setting-tab">
                    <a href="/admin/admin-profile-setting">
                        <i class="fe fe-user"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
                <li id="change-admin-password-tab">
                    <a href="/admin/change-admin-password">
                        <i class="fe fe-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                     <i class="fe fe-unlock"></i>
                     <span>Logout</span>
                    </a> -->

                    <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form> -->
                <!-- </li> -->
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->

            <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="page-title">All Clients</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Clients</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                               <!--  <div class="card-header">
                                    <h4 class="card-title">Default Datatable</h4>
                                    <p class="card-text">
                                        This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.
                                    </p>
                                </div> -->
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="datatable table table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Phone</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Muhammad</td>
                                                    <td>Waqar</td>
                                                    <td>+923365759212</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Muhammad</td>
                                                    <td>Waqar</td>
                                                    <td>+923365759212</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Muhammad</td>
                                                    <td>Waqar</td>
                                                    <td>+923365759212</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Muhammad</td>
                                                    <td>Waqar</td>
                                                    <td>+923365759212</td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>          
            </div>
            <!-- /Main Wrapper -->

         
   
		</div>

		<!-- /Main Wrapper -->


		<!-- jQuery -->
		<script src="assets/js/jquery-3.6.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/bootstrap.bundle.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>

		<!-- Bootstrap Datetimepicker JS -->
		<script  src="assets/js/moment.min.js')}}"></script>
		<script  src="assets/js/bootstrap-datetimepicker.min.js"></script>

		

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

		<script>
		
		// for add button in pages
        function sectionToggle()
        {
            $("#section-toggle").slideToggle("slow");
           
        }
		</script>
		
		

		
	</body>
</html>