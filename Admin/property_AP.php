<?php
session_start();
include("server.php");


// code insert
// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$propertyName=$_POST['propertyName'];
	$content=$_POST['content'];
	$propertyType=$_POST['propertyType'];
        $rtype=$_POST['rtype'];
        $bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$price=$_POST['price'];
	$city=$_POST['city'];
        $state=$_POST['state'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$feature=$_POST['feature'];
	$status=$_POST['status'];
//        $isFeatured=$_POST['isFeatured'];
//        $ownerID=$_SESSION['ownerID'];
//        $ownerName=$_POST['ownerName'];
//        $userID=$_POST['userID'];
//        $availability=$_POST['availability'];
//        $dateTime=$_POST['dateTime'];
	
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	$aimage4=$_FILES['aimage4']['name'];
	$aimage5=$_FILES['aimage5']['name'];
	
	$floorplan=$_FILES['floorplan']['name'];
        $bill=$_FILES['bill']['name'];
	
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	$temp_name5 =$_FILES['aimage5']['tmp_name'];
	
	$temp_name6 =$_FILES['floorplan']['tmp_name'];
        $temp_name7 =$_FILES['bill']['tmp_name'];

	move_uploaded_file($temp_name1,"../Owner/property/$aimage1");
	move_uploaded_file($temp_name2,"../Owner/property/$aimage2");
	move_uploaded_file($temp_name3,"../Owner/property/$aimage3");
	move_uploaded_file($temp_name4,"../Owner/property/$aimage4");
	move_uploaded_file($temp_name5,"../Owner/property/$aimage5");
	
	move_uploaded_file($temp_name6,"../Owner/property/$floorplan");
        move_uploaded_file($temp_name7,"../Owner/property/$bill");
        
	
	$sql="insert into property (propertyName,content,propertyType,rentingType,bathroom,kitchen,bedroom,balcony,hall,price,city,state,size,location,feature,status,pimage1,pimage2,pimage3,pimage4,pimage5,floorplan,bill)
	values('$propertyName','$content','$propertyType','$rtype','$bath','$kitc','$bed','$balc','$hall','$price','$city','$state','$asize','$loc','$feature','$status','$aimage1','$aimage2','$aimage3','$aimage4','$aimage5','$floorplan', '$bill')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}
}							
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
        
        <!--Icon-->
        <link rel="icon" href="../Image/airbnb.ico" />
       
        
        
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
                            title: 'Product Added Successfully',
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
                            <h2 class="text-secondary double-down-line text-center">Submit Property</h2>
                        </div>
                    </div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
                            <div class="description">
				<h5 class="text-secondary">Basic Information</h5><hr>
                                    <?php echo $error; ?>
                                    <?php echo $msg; ?>	
					<div class="row">
                                            <div class="col-xl-12">
						<div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Title</label>
							<div class="col-lg-9">
                                                            <input type="text" class="form-control" name="propertyName" required placeholder="Enter Title">
							</div>
						</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
                                                <br>
						<div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Content</label>
							<div class="col-lg-9">
                                                            <textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
							</div>
						</div>
                                                <br>
                                            </div>
                                            <div class="col-xl-6">
						<div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Property Type</label>
                                                        <div class="col-lg-9">
                                                            <select class="form-control" required name="propertyType">
								<option value="">Select Type</option>
								<option value="Apartment">Serviced Apartment</option>
                                                            </select>
							</div>
						</div>
                                                <br>
						<div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Renting Type</label>
							<div class="col-lg-9">
                                                            <select class="form-control" required name="rtype">
                                                                <option value="">Select Status</option>
								<option value="long">Long-Term</option>
								<option value="short">Short-Term</option>
                                                            </select>
							</div>
						</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
                                                <br>
						<div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Bathroom</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" name="bath" required placeholder="Enter Bathroom (only no 1 to 10)">
							</div>
						</div>
                                                <br>
						<div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Kitchen</label>
							<div class="col-lg-9">
                                                            <input type="text" class="form-control" name="kitc" required placeholder="Enter Kitchen (only no 1 to 10)">
							</div>
						</div>
                                                <br>
                                            </div>   
                                            <div class="col-xl-6">
						<div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Bedroom</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" name="bed" required placeholder="Enter Bedroom  (only no 1 to 10)">
							</div>
						</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
                                                <br>
						<div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Balcony</label>
							<div class="col-lg-9">
                                                            <input type="text" class="form-control" name="balc" required placeholder="Enter Balcony  (only no 1 to 10)">
							</div>
						</div>
                                                <br>
						<div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Hall</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" name="hall" required placeholder="Enter Hall  (only no 1 to 10)">
							</div>
						</div>
                                                <br>
                                            </div><!-- FOR MORE PROJECTS visit: codeastro.com -->
                                        </div>
					<h5 class="text-secondary">Price & Location</h5><hr>
                                        <div class="row">
                                            <div class="col-xl-6">
						<div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Price</label>
							<div class="col-lg-9">
                                                            <input type="text" class="form-control" name="price" required placeholder="Enter Price">
							</div>
						</div>
                                                <br>
						<div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">City</label>
							<div class="col-lg-9">
                                                            <input type="text" class="form-control" name="city" required placeholder="Enter City">
							</div>
						</div>
                                                <br>
						<div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">State</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" name="state" required placeholder="Enter State">
							</div>
						</div>
                                                <br>
                                            </div><!-- FOR MORE PROJECTS visit: codeastro.com -->
                                            <div class="col-xl-6">
						<div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Area Size</label>
							<div class="col-lg-9">
                                                            <input type="text" class="form-control" name="asize" required placeholder="Enter Area Size (in sqrt)">
							</div>
						</div>
                                                <br>
						<div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Address</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" name="loc" required placeholder="Enter Address">
							</div>
						</div>
                                                <br>
                                            </div><!-- FOR MORE PROJECTS visit: codeastro.com -->
                                        </div>					
					<div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Feature</label>
                                                <div class="col-lg-9">
                                                    <p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details</p>			
							<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
    Property Age : 10 Years
    Swimming Pool : Yes
    Parking : Yes
    GYM : Yes
    Security : Yes
    Dining Capacity : 10 People
    Church/Temple  : No
    Elevator : Yes
    CCTV : Yes
							</textarea>
                                                    </div><!-- FOR MORE PROJECTS visit: codeastro.com -->
                                                    <br>
						</div>
												
						<h5 class="text-secondary">Image & Status</h5><hr>
						<div class="row">
                                                    <div class="col-xl-6">			
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Image 1</label>
								<div class="col-lg-9">
                                                                    <input class="form-control" name="aimage1" type="file" required="">
								</div>
							</div>
                                                        <br>
							<div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Image 2</label>
								<div class="col-lg-9">
                                                                    <input class="form-control" name="aimage2" type="file" required="">
								</div>
							</div>
                                                        <br>
							<div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Image 3</label>
								<div class="col-lg-9">
                                                                    <input class="form-control" name="aimage3" type="file" required="">
								</div>
							</div>
                                                        <br>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Image 4</label>
								<div class="col-lg-9">
                                                                    <input class="form-control" name="aimage4" type="file" required="">
								</div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Image 5</label>
								<div class="col-lg-9">
                                                                    <input class="form-control" name="aimage5" type="file" required="">
								</div>
							</div>
                                                        <br>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Floorplan</label>
								<div class="col-lg-9">
                                                                    <input class="form-control" name="floorplan" type="file" required="">
								</div>
							</div>
                                                        <br>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Electric Bill</label>
								<div class="col-lg-9">
                                                                    <input class="form-control" name="bill" type="file" required="">
								</div>
							</div>
                                                        <br>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Status</label>
                                                                <div class="col-lg-9">
                                                                    <select class="form-control"  required name="status">
                                                                        <option value="">Select Status</option>
                                                                        <option value="available">Available</option>
									<option value="rent out">Rent Out</option>
                                                                    </select>
								</div>
							</div>
                                                        <br>
                                                    </div>
						</div>
						<hr>
						<input type="submit" value="Submit Property" class="btn btn-info"name="add" style="margin-left:200px;">
										
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