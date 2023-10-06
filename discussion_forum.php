<?php 
session_start();
include("db.php");

// code insert
// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$username=$_POST['username'];
	$post=$_POST['post'];
	
	$sql="insert into discussion (username,post)
	values('$username','$post')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Post Added Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Post Not Inserted</p>";
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
<link rel="shortcut icon" href="../Image/airbnb.ico">

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
<!-- FOR MORE PROJECTS visit: codeastro.com -->
<!--	Title
	=========================================================-->
<title>Airbnb</title>
</head>
<body  style = "background: linear-gradient(to right,#71c9ce , #eeeeee);"  >

<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("header.php");?>
        
        <!--	Header end  -->
        
        
        
        <div class="full-row">
            <br>
            <div class="container">
                    <div class="row">
			<div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center">Add Post</h2>
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
                                                    <label class="col-lg-2 col-form-label">Username</label>
							<div class="col-lg-9">
                                                            <input type="text" class="form-control" name="username" required placeholder="Enter Name">
							</div>
						</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
						<div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Write your question: </label>
							<div class="col-lg-9">
                                                            <textarea class="tinymce form-control" name="post" rows="10" cols="30"></textarea>
							</div>
						</div>						
                                            </div>
                                        </div>
					<input type="submit" value="Add Post" class="btn btn-info"name="add" style="margin-left:200px;">
										
                            </div>
			</form>
                    </div>
                
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
                            <div class="description">
				<h5 class="text-secondary">Recent Post</h5><hr>
                                    <?php 
                                    include 'db.php';
                                    $qry = $con->query("SELECT * FROM discussion");
                                    while($row=mysqli_fetch_array($qry))
                                    {
                                  ?>
					<div class="card mb-4 border-0 shadow">
                                          <div class="row g-0 p-3 align-items-center">
                                            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                              <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" class="img rounded align-items-center" height="100px" width="100px">
                                              <h6 class="mb-3 align-content-center"><?php echo $row['username']?></h6>
                                            </div>
                                            <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                                <div class="post">
                                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                        <?php echo $row['post']?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-primary w-100 mb-2">Delete</a>
                                            </div>
                                          </div>
                                        </div>
                                    <?php } ?>						
                            </div>
			</form>
                    </div>
                
                
                <br>
            </div>
        </div>
	<!--	Submit property   -->
        
        
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