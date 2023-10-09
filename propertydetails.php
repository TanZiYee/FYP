<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homify</title>
        
        <!--Icon-->
        <link rel="icon" href="Image/airbnb.ico" />
        
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        
        <style>
            .card{
/*                width: 700px;
                height: 300px;*/
            }
        </style>
    </head>
    <body  style = "background: linear-gradient(to right,#71c9ce , #eeeeee);"  >
        <?php require './header.php'; ?>
        
        <br>
        <br>
        
        <?php
//            include 'db.php';
//            
//            if(!isset($_GET['propertyID'])){
//                header("location: propertydetails.php");
//                exit;
//            }
//            
//            $data = filtration($_GET);
//            
//            $qry = select("SELECT * FROM property WHERE `propertyID`=?" ,$data['propertyID']);
//            
//            if(mysqli_num_rows($qry)==0){
//                header("location: propertydetails.php?propertyID=" . $data['propertyID']);
//                exit;
//            }
//            
//            $row = mysqli_fetch_assoc($qry);
        
            include 'db.php'; // Include your database connection

            // Check if propertyID is provided in the URL
            if (!isset($_GET['propertyID'])) {
                header("Location: property.php"); // Redirect to a different page if propertyID is missing
                exit;
            }

            $propertyID = $_GET['propertyID'];

            // Define a SQL query to fetch room details based on 'propertyID'
            $sql = "SELECT * FROM property WHERE propertyID = ?";

            // Assuming you have a database connection named $con
            $stmt = $con->prepare($sql);

            if ($stmt === false) {
                die("Error in SQL statement: " . $con->error);
            }

            // Bind 'propertyID' as a parameter to the SQL query
            $stmt->bind_param("i", $propertyID); // Assuming 'propertyID' is an integer

            // Execute the query
            $stmt->execute();

            if ($stmt->error) {
                die("Error executing SQL statement: " . $stmt->error);
            }

            // Get the result set
            $result = $stmt->get_result();

            if ($result === false) {
                die("Error getting result set: " . $stmt->error);
            }

            // Check if any rooms were found
            if ($result->num_rows == 0) {
                echo "No rooms found for propertyID: $propertyID"; // Display a message if no rooms are found
            } else {
                // Display room details
                $row = $result->fetch_assoc();
                
            // Close the database connection
            $stmt->close();
        ?>
        
        
            
        <div class="container">
            <div class="row">
                <div class="col-12 my-5 mb-4 px-4">
                    <h2 class="fw-bold"><?php echo $row['propertyName'] ?></h2>
                    <div style="font-size: 14px;">
                        <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                        <span class="text-secondary"> > </span>
                        <a href="property.php" class="text-secondary text-decoration-none">ACCOMMODATIONS</a>
                    </div>
                </div>
                
                <div class="col-lg-7 col-md-12 px-4">
                    <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                           <?php
                            $imagePaths = ["pimage1", "pimage2", "pimage3", "pimage4", "pimage5", "floorplan"]; // Adjust the column names if needed
                            $active = true; // Set the first item as active

                            foreach ($imagePaths as $imagePath) {
                                // Determine the appropriate class for the carousel item
                                $carouselClass = ($active) ? 'active' : '';
                                $active = false; // Set active to false for subsequent items
                            
                                // Display the property images
                                ?>
                                <div class="carousel-item <?php echo $carouselClass; ?>">
                                    <img src="Owner/property/<?php echo $row[$imagePath]; ?>" class="d-block w-100" width="650px" height="350px">
                                </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#propertyCarousel" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#propertyCarousel" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                          <?php
//                            $property_image = "./images/1.jpg";
//                            $img_q = mysqli_query($con, "SELECT * FROM property
//                                    WHERE `propertyID`='$row[propertyID]'");
//                            
//                            if(mysqli_num_rows($img_q)>0){
//                                $active_class= 'active';
//                                
//                                while($img_res = mysqli_fetch_assoc($img_q))
//                                {
//                                  echo"<div class='carousel-item $active_class'> 
//                                    <img src='$property_image' class='d-block w-100'>
//                                  </div>
//                                  ";
//                                  $active_class='';
//                                }
//                            }
//                            else{
//                                echo"<div class='carousel-item active'> 
//                                    <img src='$property_image' class='d-block w-100'>
//                                </div>";
//                            }
                          
                          
//                            include 'db.php';
//                            $img = $con->query("SELECT * FROM property WHERE propertyID='$row[propertyID]'");
//                            while($row=mysqli_fetch_array($img))
//                            {
        
                          ?>
<!--                        <div class="carousel-item active">
                          <img src="Owner/property/<?php // echo $row['pimage1'];?>" height="350" class="d-block w-100 rounded">
                        </div>
                        <div class="carousel-item">
                          <img src="Owner/property/<?php // echo $row['pimage2'];?>" height="350" class="d-block w-100 rounded">
                        </div>
                        <div class="carousel-item">
                            <img src="Owner/property/<?php // echo $row['pimage3'];?>" height="350" class="d-block w-100 rounded">
                        </div>
                        <div class="carousel-item">
                            <img src="Owner/property/<?php // echo $row['pimage4'];?>" height="350" class="d-block w-100 rounded">
                        </div>
                        <div class="carousel-item">
                            <img src="Owner/property/<?php // echo $row['pimage5'];?>" height="350" class="d-block w-100 rounded">
                        </div>-->
                          
                          
                           <?php // } ?>
                          
                      <!--</div>-->
                        <br>
                          <br>
<!--                      <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>-->
                    </div>
                </div>
                
                <div class="col-lg-5 col-md-12 px-4">
                    <div class="card mb-4 border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <?php
                            // Define an SQL query to fetch room details
                            $roomSql = "SELECT * FROM property WHERE propertyID = ?";

                            // Assuming you have a database connection named $con
                            $roomStmt = $con->prepare($roomSql);

                            if ($roomStmt === false) {
                                die("Error in SQL statement: " . $con->error);
                            }

                            // Bind 'propertyID' as a parameter to the SQL query
                            $roomStmt->bind_param("i", $propertyID); // Assuming 'propertyID' is an integer

                            // Execute the query
                            $roomStmt->execute();

                            if ($roomStmt->error) {
                                die("Error executing SQL statement: " . $roomStmt->error);
                            }

                            // Get the result set for room details
                            $roomResult = $roomStmt->get_result();

                            if ($roomResult === false) {
                                die("Error getting result set: " . $roomStmt->error);
                            }
                            ?>
                            
                            <?php while ($roomDetails = $roomResult->fetch_assoc()): ?>
                                <div>
                                    <h4>RM <?php echo $roomDetails['price']; ?> per night</h4>
                                    <p><?php echo $roomDetails['content']; ?></p>
                                    <br>
                                    <div class="location mb-4">
                                        <h6 class="mb-1">Location</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            <?php echo $roomDetails['location']?>
                                        </span>
                                    </div>
                                    <div class="property_type mb-4">
                                        <h6 class="mb-1">Property Type</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            <?php echo $roomDetails['propertyType']?>
                                        </span>
                                    </div>
                                    <div class="features mb-4">
                                        <h6 class="mb-1">Features</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            <?php echo $roomDetails['bedroom']?> Bedroom
                                        </span>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            <?php echo $roomDetails['bathroom']?> Bathroom
                                        </span>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            <?php echo $roomDetails['balcony']?> Balcony
                                        </span>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            <?php echo $roomDetails['hall']?> Hall
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
                                    <div class="area mb-4">
                                        <h6 class="mb-1">Area</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            <?php echo $roomDetails['size']?> sq. ft.
                                        </span>
                                    </div>
                                    <br>
                                    <div class="description mb-4">
                                        <h6 class="mb-1">Description</h6>
                                        <p><?php echo $roomDetails['feature']; ?></p>
                                    </div>
                                
                                    <div class="d-flex justify-content-evenly mb-2">
                                        <a href="confirm_booking.php?propertyID=<?php echo $row['propertyID']; ?>" class="btn btn-primary">Book Now</a>
                                    </div>
                                    <!-- Add more room details as needed -->
                                </div>
                            <?php endwhile; ?>

                            <!-- Close the room details statement -->
                            <?php $roomStmt->close(); ?>
                            
                           
                            <?php // }?>
                        </div>
                            
                    </div>
                </div>
                
                
                <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
                    
                </div>
               
                    
                   
                
                
            </div>
        </div>

        <?php require './footer.php';?>
        
            <?php }?>
        
    </body>
    
</html>