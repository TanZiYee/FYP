<!DOCTYPE html>

<?php session_start();

    if($_SERVER['REQUEST_METHOD']=="POST")
        if(isset ($_POST['logout'])){
            session_destroy();
            header('location: login.php');
            exit();
        }
    
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Airbnb</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
    <style>
        .card{
  width: 500px;
  border: none;
  border-radius: 10px;
   
  background-color: #fff;
}



.stats{

      background: #f2f5f8 !important;

    color: #000 !important;
}
.articles{
  font-size:10px;
  color: #a1aab9;
}
.number1{
  font-weight:500;
}
.followers{
    font-size:10px;
  color: #a1aab9;

}
.number2{
  font-weight:500;
}
.rating{
    font-size:10px;
  color: #a1aab9;
}
.number3{
  font-weight:500;
}
    </style>
    
</head>

<?php require_once 'header.php'; ?>



<body>
	<div class="container mt-5 d-flex justify-content-center">

            <div class="card p-3">

                <div class="d-flex align-items-center">

                    <div class="image">
                <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" class="rounded" width="155" >
                </div>

                <div class="ml-3 w-100">
                    
                    <h4 class="mb-0 mt-0"><?php echo $_SESSION['ownerName'];?></h4>
                    <span>Email: <?php echo $_SESSION['Email'];?></span><br>
                   <span>Phone Number: <?php echo $_SESSION['phoneNo'];?></span><br>



                   <div class="button mt-2 d-flex flex-row align-items-center">
                       <form method="post" action="">
                           <input type="submit" class="btn btn-sm btn-outline-primary w-100" name="logout" value="Logout"/>
                        </form>
                       
                   </div>


                </div>

                    
                </div>
                
            </div>
             
         </div>
    <br>
    <br>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

<?php require_once 'footer.php'; ?>
</html>
