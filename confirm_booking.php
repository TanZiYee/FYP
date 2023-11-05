
<?php
session_start();

if(isset($_SESSION['userID'])){
    $userID = $_SESSION['userID'];
}else{
}

$con = mysqli_connect("localhost","root","","airbnb", 3307);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $price = floatval($_POST['price']);
    
     // Calculate the total cost
    $totalCost = calculateTotalCost($price, $check_in, $check_out);
    $_SESSION['totalCost'] = $totalCost;
    $_SESSION['check_in'] = $check_in;
    $_SESSION['check_out'] = $check_out;
    

    // Insert booking details into the database
    $insertResult = insertBooking($check_in, $check_out, $price, $totalCost, $userID);

    if ($insertResult === true) {
        echo "Total cost for your stay: RM" . number_format($totalCost, 2);
    } else {
        echo "Booking failed. Please try again later.";
    }
}

function calculateTotalCost($price, $check_in, $check_out) {
    // Convert the check-in and check-out dates to DateTime objects
    $check_in = new DateTime($check_in);
    $check_out = new DateTime($check_out);

    // Calculate the number of nights
    $interval = $check_in->diff($check_out);
    $numNights = $interval->days;

    // Calculate the total cost
    $totalCost = $price * $numNights;

    return $totalCost;
}

function insertBooking($check_in, $check_out, $price, $totalCost, $userID) {
    // Include your database connection here (e.g., require 'db.php';)
    require 'db.php';
        $_SESSION['userID'] = $userID;
    
    // Prepare an SQL INSERT statement
    $sql = "INSERT INTO cart (check_in, check_out, price, totalCost, userID) VALUES (?, ?, ?, ?, ?)";

    // Assuming you have a database connection named $con
    $stmt = $con->prepare($sql);

    if ($stmt === false) {
        return false; // Return false if the query preparation fails
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssddi", $check_in, $check_out, $price, $totalCost, $userID);

    // Execute the query
    $result = $stmt->execute();

    // Close the statement
    $stmt->close();

    return $result; // Return true if the query is successful, false otherwise
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
        
        <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        
        <style>
            .card{
/*                width: 700px;
                height: 300px;*/
            }
            
            .btn{
                color: blue;
            }
        </style>
    </head>
    <body  style = "background: linear-gradient(to right,#71c9ce , #eeeeee);"  >
        <?php require './header.php'; ?>
        
        
        
        <br>
        <br>
        
        <?php
            // Retrieve with propertyID
            include 'db.php'; // Include your database connection

            // Check if propertyID is provided in the URL
            if (!isset($_GET['propertyID'])) {
                header("Location: category.php"); // Redirect to a different page if propertyID is missing
                exit;
            }

            $propertyID = $_GET['propertyID'];

            // Define a SQL query to fetch room details based on 'propertyID'
            $sql = "SELECT * FROM property WHERE propertyID = ?";
            $_SESSION['propertyID'] = $propertyID;

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
                    <h2 class="fw-bold">CONFIRM BOOKING</h2>
                    <div style="font-size: 14px;">
                        <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                        <span class="text-secondary"> > </span>
                        <a href="property.php" class="text-secondary text-decoration-none">ACCOMMODATIONS</a>
                        <span class="text-secondary"> > </span>
                        <a href="property.php" class="text-secondary text-decoration-none">CONFIRM</a>
                    </div>
                </div>
                
                <div class="col-lg-7 col-md-12 px-4">
                           <?php
                            $imagePaths = ["pimage1"]; // Adjust the column names if needed
                            $active = true; // Set the first item as active

                            foreach ($imagePaths as $imagePath) {
                                // Determine the appropriate class for the carousel item
                                $carouselClass = ($active) ? 'active' : '';
                                $active = false; // Set active to false for subsequent items
                            
                                // Display the property images
                                ?>

                            <div class="card p-3 shadow-sm rounded">
                                <img src="Owner/property/<?php echo $row[$imagePath]; ?>" class="d-block w-100" width="650px" height="350px">
                                <h5 class="fw-bold"><?php echo $row['propertyName'] ?></h5>
                                <h6>RM <?php echo $row['price']; ?> per night</h6>
                            </div>
                    
                            <?php } ?>
                        <br>
                        <br>
                </div>
                
                <div class="col-lg-5 col-md-12 px-4">
                    <div class="card mb-4 border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <form method="POST" action="">
                                <h6 class="mb-3">BOOKING DETAILS</h6>
                                <label for="check_in_date">Check-in Date:</label>
                                <input type="date" id="check_in" name="check_in" required><br>

                                <label for="check_out_date">Check-out Date:</label>
                                <input type="date" id="check_out" name="check_out" required><br>

                                <label for="price">Price Per Night (RM):</label>
                                <input type="number" id="price" name="price" value= <?php echo $row['price']; ?> required><br>
                                

                                <button type="submit" class="btn btn-primary w-100 mb-1">Calculate Total Cost</button>
                                
                                <div class="col-12 mb-3">
                                    <h6 class="mb-3 text-danger">Provide check-in, check-out date & days!</h6>
                                    <a href="checkout.php?propertyID=<?php echo $row['propertyID']; ?>" class="btn btn-primary w-100 mb-1">Pay Now</a>
                                </div>
                                <div id="paypal-payment-button"></div>
                            </form>
                        </div>    
                    </div>
                        <?php } ?>
                </div>
                
                
                <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
                    
                </div>
               
                    
                   
                
                
            </div>
        </div>

        <?php require './footer.php';?>
        
<script src="https://www.paypal.com/sdk/js?client-id=Aen8MDfk0jNq2bAsAUwzkMNCi0tgF-KMLuI0elE6EDqFQ9jYh7EmcyywPn0sHDBQ8s3IBsBAcpumJ-9I"></script>
<script>paypal.Buttons().render("#paypal-payment-button");</script>
        
    </body>
    
</html>