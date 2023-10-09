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
                        <a href="propertydetails.php?propertyID=<?php echo $row['propertyID']; ?>" class="text-secondary text-decoration-none">ACCOMMODATIONS</a>
                    </div>
                </div>
                
                <div class="col-lg-7 col-md-12 px-4">
                    <div class="img">
                        <img src="Owner/property/<?php echo $row['pimage1'];?>" height="350" class="d-block w-100 rounded">
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
                                    <div class="days mb-4">
                                        <label class="form-label">How Many Days</label>
                                        <input type="number" class="form-control shadow-none mb-3">
                                    </div>
                                    <div class="days mb-4">
                                        RM <?php  echo $sub_total = number_format($fetch_cart['Price']) * $fetch_cart['Quantity']?>
                                    </div>
                                    
                                    <div class="d-flex justify-content-evenly mb-2">
                                        <a href="book.php" class="btn btn-primary">Book Now</a>
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
                
                <div class="col-12 mt-4 px-4">
                    <div class="card mb-4 border-0 shadow-sm rounded-3">
                        <div class="card-body">
                        <h5>Fill Up Form</h5>
                        <form action="" method="post">

                           <div class="display-order">
                              <?php
        //                         $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
        //                         $total = 0;
        //                         $grand_total = 0;
        //                         if(mysqli_num_rows($select_cart) > 0){
        //                            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
        //                            $total_price = number_format($fetch_cart['Price'] * $fetch_cart['Quantity']);
        //                            $grand_total = $total += $total_price;
        //                      ?>
                              <!--<span>//<?= $fetch_cart['ItemName']; ?>(<?= $fetch_cart['Quantity']; ?>)</span>-->
                              //<?php
        //                         }
        //                      }else{
        //                         echo "<div class='display-order'><span>your cart is empty!</span></div>";
        //                      }
                              ?>
                              <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
                           </div>

                              <div class="flex">
                                 <div class="form-row">
                                     <label for="your-name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control shadow-none mb-3" placeholder="Your name" required>
                                 </div>
                                 <div class="form-row">
                                     <label for="your-phone">Phone Number</label>
                                    <input type="number" name="phone" id="phone" class="form-control shadow-none mb-3" placeholder="Your number" required>
                                 </div>
                                 <div class="form-row">
                                    <label for="your-email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control shadow-none mb-3" placeholder="Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				</div>
                                 <div class="inputBox">
                                    <label class="form-label">Check-in</label>
                                    <input type="date" class="form-control shadow-none mb-3">
                                    <label class="form-label">Check-out</label>
                                    <input type="date" class="form-control shadow-none mb-3">
                                 </div>
                                 <div class="inputBox">
                                    <span>Payment Method</span>
                                    <select name="method">
                                       <option value="cash" selected>Cash</option>
                                       <option value="credit cart">Credit Card</option>
                                       <option value="paypal">PayPal</option>
                                    </select>
                                 </div>
                              </div>
                              <input type="submit" value="Order Now" name="order_btn" class="btn">
                              </div>
                           </form>

                    </div>
                </div>
   
            </div>

            </div>
        </div>

        <?php require './footer.php';?>
        
            <?php }?>
        
    </body>
    
</html>