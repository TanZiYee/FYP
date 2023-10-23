<?php

session_start();

if(isset($_SESSION['userID'])){
    $userID = $_SESSION['userID'];
}else{
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homify</title>
        
        <!--Icon-->
        <link rel="icon" href="Image/airbnb.ico" />

    <style>
        .card {
            width: 1000px;
            height: 300px;
        }
    </style>
    </head>
    <body  style = "background: linear-gradient(to right,#71c9ce , #eeeeee);"  >
        <?php require './header.php'; ?>
        
        <div class="my-5 px-4">
            <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
            <div class="h-line bg-dark">
            </div>
        </div>
            
        <div class="container">
            <div class="row">
                
                <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                    <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                      <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                                <label class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Check-out</label>
                                <input type="date" class="form-control shadow-none mb-3">
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">ACCOMMODATION TYPE</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f1">Serviced Apartment</label>
                                </div>
                            </div>
                        </div>
                      </div>
                    </nav>
                </div>
                
                <div class="col-lg-9 col-md-12 px-4">
                    
                    <?php 
                        include 'db.php';
                        $qry = $con->query("SELECT * FROM property WHERE rentingType='long' && status='available'");
                        while($row=mysqli_fetch_array($qry))
                        {
                    ?>
                    
                    <div class="card mb-4 border-0 shadow">
                      <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                          <img src="Owner/property/<?php echo $row['pimage1'];?>" class="img rounded align-items-center" height="250px" width="400px">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3"><?php echo $row['propertyName']?></h5>
                            <div class="features mb-3">
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
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <h6 class="mb-4">RM <?php echo $row['price']?> per month</h6>
                            <a href="long_confirm_booking.php?propertyID=<?php echo $row['propertyID']; ?>" class="btn btn-primary w-100 mb-2">Book Now</a>
                            <a href="long_propertydetails.php?propertyID=<?php echo $row['propertyID']; ?>" class="btn btn-sm w-100 btn-outline-dark">More Details</a>
                        </div>
                      </div>
                    </div>
                    
                    <?php } ?>
                </div>
                
            </div>
        </div>
        <br>

        <?php require './footer.php';?>
        
        
    </body>
    
</html>