<?php
session_start();
include("server.php");

if(isset($_POST['add_admin'])){
   $usertype = $_POST['usertype'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $password = $_POST['password'];

   $insert_query = mysqli_query($con, "INSERT INTO `user`(`usertype`, `username`, `email` , `phone`, `password`) VALUES ('$usertype','$username','$email','$phone', '$password');") or die('query failed');


   if($insert_query){
      $message[] = 'Admin Add Succesfully';
      $_SESSION['AdminStatus'] = 'Added Successfully';
   }else{
      $message[] = 'Could Not Add Admin';
      $_SESSION['AdminStatus2'] = 'Added Unsuccessfully';
   }
};

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard - Homify - Admin </title>
        
        <!-- Bootstrap CSS & Sweet Alert CDN-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" />            
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        
        
       
        
        
    </head>
    
    
    <body class="sb-nav-fixed" style= "background: linear-gradient(to right,#A6BCE8 , #FFC0C0);">
        
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">HOMIFY Admin</a>
            
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                       
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" onclick="sweetalert()" >Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        
        <div id="layoutSidenav">
            
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Property
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="property_MP.php">Manage Property</a>
                                    <a class="nav-link" href="property_AP.php">Add Property</a>
                                    <a class="nav-link" href="booking_list.php">Booking List</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Community Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="user_CP.php">Manage User Post</a>
                                    <a class="nav-link" href="owner_CP.php">Manage Owner Post</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Role
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="user_manage.php">Manage User</a>
                                    <a class="nav-link" href="owner_manage.php">Manage Owner</a>
                                    <a class="nav-link" href="admin_manage.php">Manage Admin</a>
                                    <a class="nav-link" href="add_admin.php">Add Admin</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                User Information
                            </a>
                            <a class="nav-link" href="owner.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Owner Information
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>
            
            
            <div id="layoutSidenav_content">
                
                
                 <main>
                 
                    <?php 

                        if(isset($_SESSION['AdminStatus'])){

                            ?>
                            <script>
                            Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Admin Added Successfully',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            </script>

                    <?php
                         unset($_SESSION['AdminStatus']);  
                     }

                     ?>
        
                  <br>
                  <br>
                
                  
                  <div class="full-row">
                  <div class="container">
                    <div class="row">
			<div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center">Add Admin</h2>
                        </div>
                    </div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
                            <div class="description">
				<h5 class="text-secondary">Basic Information</h5><hr>
					<div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">User Type</label>
                                                        <div class="col-lg-9">
                                                            <select class="form-control" required name="usertype">
								<option value="">Select Type</option>
								<option value="admin">Admin</option>
                                                            </select>
							</div>
						</div>
                                                <br>
						<div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Admin Name</label>
							<div class="col-lg-9">
                                                            <input type="text" class="form-control" name="username" required placeholder="Enter Name">
							</div>
						</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
                                                <br>
						<div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Email</label>
							<div class="col-lg-9">
                                                            <input type="text" class="form-control" name="email" rows="10" cols="30" required placeholder="Enter Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
							</div>
						</div>
                                                <br>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Phone</label>
							<div class="col-lg-9">
                                                            <input type="phone" class="form-control" name="phone" rows="10" cols="30" required placeholder="Enter Phone">
							</div>
						</div>
                                                <br>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Password</label>
							<div class="col-lg-9">
                                                            <input type="password" class="form-control" name="password" rows="10" cols="30" required placeholder="Enter Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
							</div>
						</div>
                                                <br>
                                            </div>
                                        </div>
                                        <input type="submit" value="Add Admin" class="btn btn-info"name="add_admin" style="margin-left:200px;">
										
                            </div>
			</form>
                    </div>            
            </div>
        </div>
                     
                    
                </main>
                
                
                
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; HOMIFY 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        
        
        
        <script>
               
            
            
            function sweetalert(){
            Swal.fire({
            title: 'Are you sure to logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {

              window.location.href="login.php";

            }
          })       
        }
        </script>
    </body>
</html>



               