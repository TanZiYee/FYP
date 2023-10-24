<?php

session_start();

//Retrieve user session
if(isset($_SESSION['userID'])){
    $userID = $_SESSION['userID'];
}else{
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homify</title>
    
    <!--Icon-->
   <link rel="icon" href="Image/airbnb.ico" />

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    

    <style>
    * {box-sizing: border-box;}
    body {font-family: Verdana, sans-serif;}
    .mySlides {display: none;}
    img {vertical-align: middle;}

   h1,
    h2 {
      font-family: 'Dancing Script', cursive;
    }

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
        align-items: center;
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
        display: flex;
        justify-content: center;
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

    section{
        padding:2rem 9%;
    }
    </style>
    
</head>


<body  style = "background: linear-gradient(to right,#71c9ce , #eeeeee);"  >

<?php require_once 'header.php' ?>
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/1.jpg" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="images/2.jpg" class="d-block w-100" >
          </div>
          <div class="carousel-item">
            <img src="images/3.jpg" class="d-block w-100" >
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
        
    <section class="categories">
            <div class="container">
                <h2 class="text-center">Categories</h2>
                <br><br>

                <a href="property_short.php">
                <div class="box-3 float-container">
                    <img src="Owner/image/short.jpg" alt="Short-Term" class="img-responsive img-curve">

                    <h3 class="float-text text-white">Short-Term</h3>
                </div>
                </a>
                
                <a href="property_long.php">
                <div class="box-3 float-container">
                    <img src="Owner/image/long.jpg" alt="Long-Term" class="img-responsive img-curve">

                    <h3 class="float-text text-white">Long-Term</h3>
                </div>
                </a>

                <a href="wishlist.php">
                <div class="box-3 float-container">
                    <img src="images/wishlist.jpg" alt="Wishlist" class="img-responsive img-curve">

                    <h3 class="float-text text-white">Your Wishlist</h3>
                </div>
                </a>

                

                <div class="clearfix"></div>
            </div>
    </section>

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    
    
</body>
<?php require_once 'footer.php' ?>


</html>

