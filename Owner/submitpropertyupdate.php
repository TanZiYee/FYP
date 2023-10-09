<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("db.php");
if(!isset($_SESSION['Email']))
{
	header("location:login.php");
}

//// code insert
//// add code

$msg="";
$error="";
if(isset($_POST['update']))
{
	$propertyID=$_REQUEST['id'];
	
	$propertyName=$_POST['propertyName'];
	$content=$_POST['content'];
	$propertyType=$_POST['propertyType'];
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
	
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	$temp_name5 =$_FILES['aimage5']['tmp_name'];
	
	$temp_name6 =$_FILES['floorplan']['tmp_name'];

	move_uploaded_file($temp_name1,"property/$aimage1");
	move_uploaded_file($temp_name2,"property/$aimage2");
	move_uploaded_file($temp_name3,"property/$aimage3");
	move_uploaded_file($temp_name4,"property/$aimage4");
	move_uploaded_file($temp_name5,"property/$aimage5");
	
	move_uploaded_file($temp_name6,"property/$floorplan");
	
	
	$sql = "UPDATE property SET propertyName= '{$propertyName}', content= '{$content}', propertyType='{$propertyType}',
	bathroom='{$bath}', kitchen='{$kitc}', bedroom='{$bed}', balcony='{$balc}',  hall='{$hall}', 
	price='{$price}', city='{$city}', state='{$state}', size='{$asize}', location='{$loc}', feature='{$feature}',
	status='{$status}', pimage1='{$aimage1}', pimage2='{$aimage2}', pimage3='{$aimage3}', pimage4='{$aimage4}', pimage5='{$aimage5}',
	floorplan='{$floorplan}' WHERE propertyID = {$propertyID}";
	 
	
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Property Updated</p>";
		header("Location:property.php?msg=$msg");
	}
	else{
		$error="<p class='alert alert-warning'>Property Not Updated</p>";
		header("Location:property.php?msg=$error");
	}
}						
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<!--Icon-->
<link rel="icon" href="Image/airbnb.ico" />

<!--	Title
	=========================================================-->
<title>Homify</title>
</head>
<body>

<!--	Page Loader
=============================================================
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
--> 


<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("header.php");?>
        <!--	Header end  -->
        
        <!--	Banner   --->
        <!-- <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Update Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Update Property</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> -->
         <!--	Banner   --->
		 
		 
		<!--	Submit property   -->
        <div class="full-row">
            <div class="container">
                    <div class="row">
			<div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center">Update Property</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
								
								<?php
									
									$propertyID=$_REQUEST['id'];
									$query=mysqli_query($con,"select * from property where propertyID='$propertyID'");
									while($row=mysqli_fetch_row($query))
									{
								?>
                                                                <?php $msg?>
                                                                <?php $error?>
												
								<div class="description">
									<h5 class="text-secondary">Basic Information</h5><hr>
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Title</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="propertyName" required value="<?php echo $row['1']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Content</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="content" rows="10" cols="30"><?php echo $row['2']; ?></textarea>
													</div>
												</div>
												
											</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
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
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bathroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bath" required value="<?php echo $row['5']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Kitchen</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="kitc" required value="<?php echo $row['6']; ?>">
													</div>
												</div>
												
											</div>   
											<div class="col-xl-6"><!-- FOR MORE PROJECTS visit: codeastro.com -->
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bedroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bed" required value="<?php echo $row['7']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Balcony</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="balc" required value="<?php echo $row['8']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hall</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="hall" required value="<?php echo $row['9']; ?>">
													</div>
												</div>
												
											</div>
										</div>
										<h5 class="text-secondary">Price & Location</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Price</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required value="<?php echo $row['10']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required value="<?php echo $row['11']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">State</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required value="<?php echo $row['12']; ?>">
													</div>
												</div>
											</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Area Size</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required value="<?php echo $row['13']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required value="<?php echo $row['14']; ?>">
													</div>
												</div>
												
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Feature</label>
											<div class="col-lg-9">
											<p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details</p>
											
											<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												
													<?php echo $row['15']; ?>
												
											</textarea>
											</div>
										</div>
												
										<h5 class="text-secondary">Image & Status</h5><hr>
                                                                                <div class="row">
                                                                                    <div class="col-xl-6">			
                                                                                        <div class="form-group row">
                                                                                            <label class="col-lg-3 col-form-label">Image 1</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input class="form-control" name="aimage1" type="file" required="">
                                                                                                    <img src="property/<?php echo $row['17'];?>" alt="pimage1" height="150" width="180">
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-lg-3 col-form-label">Image 2</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input class="form-control" name="aimage2" type="file" required="">
                                                                                                    <img src="property/<?php echo $row['18'];?>" alt="pimage2" height="150" width="180">
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-lg-3 col-form-label">Image 3</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input class="form-control" name="aimage3" type="file" required="">
                                                                                                    <img src="property/<?php echo $row['19'];?>" alt="pimage3" height="150" width="180">
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-lg-3 col-form-label">Image 4</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input class="form-control" name="aimage4" type="file" required="">
                                                                                                    <img src="property/<?php echo $row['20'];?>" alt="pimage4" height="150" width="180">
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-lg-3 col-form-label">Image 5</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input class="form-control" name="aimage5" type="file" required="">
                                                                                                    <img src="property/<?php echo $row['21'];?>" alt="pimage5" height="150" width="180">
                                                                                                </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xl-6">
                                                                                        <div class="form-group row">
                                                                                            <label class="col-lg-3 col-form-label">Floorplan</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input class="form-control" name="floorplan" type="file" required="">
                                                                                                    <img src="property/<?php echo $row['22'];?>" alt="floorplan" height="150" width="180">
                                                                                                </div>
                                                                                        </div>
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
                                                                                    </div>
                                                                                </div>

										
											<input type="submit" value="Update" class="btn btn-success"name="update" style="margin-left:200px;">
										
									</div>
								</form>
								
							<?php
								} 
							?>
                    </div>            
            </div>
        </div>
	<!--	Submit property   -->
        
        <!-- FOR MORE PROJECTS visit: codeastro.com -->
        <!--	Footer   start-->
		<?php include("footer.php");?>
		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 
<!-- FOR MORE PROJECTS visit: codeastro.com -->
<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/tinymce/init-tinymce.min.js"></script>
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script>
</body>
</html>