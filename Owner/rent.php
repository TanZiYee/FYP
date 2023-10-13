<?php 
session_start();

// Check if the user is logged in
if (!isset($_SESSION['ownerID'])) {
    // User is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Get the logged-in owner's ID from the session
$ownerID = $_SESSION['ownerID'];

// Include your database connection code here
include 'db.php';

// Query to retrieve properties based on the owner's ID
$query = "SELECT * FROM property WHERE ownerID = '$ownerID'";

// Execute the query and fetch properties
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
 
// Now, you can loop through the results and process them as needed
while ($row = mysqli_fetch_assoc($result)) {
    // Process each property here
    // You can access the property details using $row['column_name']
}

// Close the database connection when you're done
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homify</title>
    <!--Icon-->
   <link rel="icon" href="../Image/airbnb.ico" /> 

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    

    <style>
    * {box-sizing: border-box;}
    body {font-family: Verdana, sans-serif;}
    .mySlides {display: none;}
    img {vertical-align: middle;}

   

    /* Fading animation */
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @keyframes fade {
      from {opacity: .4} 
      to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .text {font-size: 11px}
    }
        *{
        margin: 0 0;
        padding: 0 0;
        font-family: Arial, Helvetica, sans-serif;
    }
    .container{
        width: 80%;
        margin: 0 auto;
        padding: 1%;
    }
    .img-responsive{
        width: 100%;
    }
    .img-curve{
        border-radius: 15px;
    }

    .text-right{
        text-align: right;
    }
    .text-center{
        text-align: center;
    }
    .text-left{
        text-align: left;
    }
    .text-white{
        color: white;
    }

    .clearfix{
        clear: both;
        float: none;
    }

    a{
        color: #ff6b81;
        text-decoration: none;
    }
    a:hover{
        color: #ff4757;
    }

    .btn{
        padding: 1%;
        border: none;
        font-size: 1rem;
        border-radius: 5px;
    }
    .btn-primary{
        background-color: #ff6b81;
        color: white;
        cursor: pointer;
    }
    .btn-primary:hover{
        color: white;
        background-color: #ff4757;
    }
    h2{
        color: #2f3542;
        font-size: 2rem;
        margin-bottom: 2%;
    }
    h3{
        font-size: 1.5rem;
    }
    .float-container{
        position: relative;
    }
    .float-text{
        position: absolute;
        bottom: 50px;
        left: 40%;
    }
    fieldset{
        border: 1px solid white;
        margin: 5%;
        padding: 3%;
        border-radius: 5px;
    }

    .categories{
        padding: 4% 0;
    }

    .box-3{
        width: 28%;
        float: left;
        margin: 2%;
    }



    :root{
        --pink:#e84393;
    }

    *{
        margin:0; padding:0;
        box-sizing: border-box;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        outline: none; border:none;
        text-decoration: none;
        text-transform: capitalize;
        transition: .2s linear;
    }
    
    .custom-bg{
        background-color: #2ec1ac;
    }
    .custom-bg:hover{
        background-color: #279e8c;
    }
    
    .availability-form{
        margin-top: -50px;
        z-index: 2;
        position: relative;
    }
    
    @media screen and (max-width: 575px) {
        .availability-form{
            margin-top: 0px;
            padding: 0 35px;
        }
    }
    
    .container{
        display: grid;
        grid-template-columns: auto auto auto auto;
        flex: 1;
        flex-direction: column;
        padding: 10px;
        padding: 50px 50px 50px 50px;
    }
    
    .card{
        align-items: center;
        display: flex;
        flex-direction: column;
        background-color: white;
        width: 380px;
        height: 660px;
    }
    
    .btn{
        
    }
    
    </style>
    
</head>

<body  style = "background: linear-gradient(to right,#71c9ce , #eeeeee);"  >

<?php require_once 'header.php' ?> 
    
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Rooms</h2>

    
    <div class="container my-5"> 
        <?php 
            include 'db.php';
            $qry = $con->query("SELECT * FROM property WHERE status='rent out' and ownerID ='$ownerID'");
            while($row=mysqli_fetch_array($qry))
            {
        ?>
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
        
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="property/<?php echo $row['pimage1'];?>" height="200" class="d-block w-100">
                          </div>
                          <div class="carousel-item">
                            <img src="property/<?php echo $row['pimage2'];?>" height="200" class="d-block w-100" >
                          </div>
                          <div class="carousel-item">
                            <img src="property/<?php echo $row['pimage3'];?>" height="200" class="d-block w-100" >
                          </div>
                          <div class="carousel-item">
                            <img src="property/<?php echo $row['pimage4'];?>" height="200" class="d-block w-100" >
                          </div>
                          <div class="carousel-item">
                            <img src="property/<?php echo $row['pimage5'];?>" height="200" class="d-block w-100" >
                          </div>
                        </div>
        
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                        </div>
        
    
<!--                    <img src="../images/1.jpg" class="card-img-top">-->
                    <div class="card-body">
                        <h5><?php echo $row['propertyName']?></h5>
                        <h6 class="mb-4">RM <?php echo $row['price']?> per night</h6>
                        <p class="card-text"><?php echo $row['content']?></p>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $row['bedroom']?> Bedroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $row['bathroom']?> Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $row['balcony']?> Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $row['hall']?> Hall
                            </span>
                        </div>
<!--                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Television
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AC
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Heater
                            </span>
                        </div>-->
                        <div class="rating mb-4">
                            <h6 class="rating mb-4">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                        <a class="btn btn-info" name="update" href="submitpropertyupdate.php?id=<?php echo $row['0'];?>">Update</a>
                        <a class="btn btn-info" href="submitpropertydelete.php?id=<?php echo $row['0'];?>">Delete</a>
                        </div>
                    </div>
            
                    
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
   
    <br><br><br>
    <br><br><br>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    
    
</body>
<?php require_once 'footer.php' ?>
</html>
