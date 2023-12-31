<?php

/*session_start();*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airbnb Website</title>
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

/*    html{
        font-size: 62.5%;
        scroll-behavior: smooth;
        scroll-padding-top: 6rem;
        overflow-x: hidden;
    }*/

/*    section{
        padding:2rem 9%;
    }

    .products .box-container{
        display: flex;
        flex-wrap: wrap;
        gap:1.5rem;
    }

    .products .box-container .box{
        flex:1 1 30rem;
        box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.1);
        border-radius: .5rem;
        border:.1rem solid rgba(0,0,0,.1);
        position: relative;    
    }

    .products .box-container .box .discount{
        position: absolute;
        top:1rem; left:1rem;
        padding:.7rem 1rem;
        font-size: 2rem;
        color:var(--pink);
        background:rgba(255, 51, 153,.05);
        z-index: 1;
        border-radius: .5rem;
    }

    .products .box-container .box .image{
        position: relative;
        text-align: center;
        padding-top: 2rem;
        overflow:hidden;
    }

    .products .box-container .box .image img{
        height:25rem;
    }

    .products .box-container .box:hover .image img{
        transform: scale(1.1);
    }

    .products .box-container .box .image .icons{
        position: absolute;
        bottom:-7rem; left:0; right:0;
        display: flex;
    }

    .products .box-container .box:hover .image .icons{
        bottom:0;
    }

    .products .box-container .box .image .icons a{
        height: 5rem;
        line-height: 5rem;
        font-size: 2rem;
        width:50%;
        background:var(--blue);
        color:#fff;
    }

    .products .box-container .box .image .icons .cart-btn{
        border-left: .1rem solid #fff7;
        border-right: .1rem solid #fff7;
        width:100%;
    }

    .products .box-container .box .image .icons a:hover{
        background:#333;
    }

    .products .box-container .box .content{
        padding:2rem;
        text-align: center;
    }

    .products .box-container .box .content h3{
        font-size: 2.5rem;
        color:#333;
    }

    .products .box-container .box .content .price{
        font-size: 2.5rem;
        color:var(--pink);
        font-weight: bolder;
        padding-top: 1rem;
    }

    .products .box-container .box .content .price span{
        font-size: 1.5rem;
        color:#999;
        font-weight: lighter;
        text-decoration: line-through;
    }*/
    
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
    
    </style>
    
</head>


<body  style = "background: linear-gradient(to right,#71c9ce , #eeeeee);"  >

<?php require_once 'header.php' ?>
    

        <?php //require_once 'promotion_banner.php' ?>



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

        
      
        
<!--    <section class="categories">
            <div class="container">
                <h1 class="text-center">Categories</h1>

                <a href="food.php">
                <div class="box-3 float-container">
                    <img src="images/food.jpg" alt="Food" class="img-responsive img-curve">

                    <h3 class="float-text text-white">Food</h3>
                </div>
                </a>

                <a href="drink.php">
                <div class="box-3 float-container">
                    <img src="images/drink4.jpg" alt="Drink" class="img-responsive img-curve">

                    <h3 class="float-text text-white">Drink</h3>
                </div>
                </a>

                <a href="merchandise.php">
                <div class="box-3 float-container">
                    <img src="images/merchandise.jpg" alt="Merchandise" class="img-responsive img-curve">

                    <h3 class="float-text text-white">Merchandise</h3>
                </div>
                </a>

                <div class="clearfix"></div>
            </div>
    </section>-->
    
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Booking Availability</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-black shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Rooms</h2>
    
    <div class="container">
        <?php 
            include 'db.php';
            $qry = $con->query("SELECT * FROM property WHERE rentingType='long'");
            while($row=mysqli_fetch_array($qry))
            {
        ?>
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src=<?php echo $row['pimage1']?> class="card-img-top">
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
                        
                        <div class="rating mb-4">
                            <h6 class="rating mb-4">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="property.php" class="btn btn-sm btn outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
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

