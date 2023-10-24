<?php

session_start();

if(isset($_SESSION['userID'])){
    $userID = $_SESSION['userID'];
}else{
}

include("db.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Homify</title>
        
        <!-- Bootstrap CSS & Sweet Alert CDN-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" />            
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        
        
        
        <!-- Datatable CDN -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href='//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
        
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>  
        
        
        
        <!--Google Chart CDN-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
        
    </head>
    
    
    <body class="sb-nav-fixed" style= "background: linear-gradient(to right,#71c9ce , #eeeeee);">
        <?php include 'header.php' ?>
        <div id="layoutSidenav">
            
            
            <div id="layoutSidenav_content">
                
                <!--Display booking list-->
                 <main>
                    
                     
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Booking List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Booking List</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Booking List
                            </div>
                            <div class="card-body">
                              <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                           <th>Booking ID</th>
                                           <th>Property Name</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Check-In Date</th>
                                            <th>Check-Out Date</th>
                                            <th>Subtotal</th>
                                            <th>Payment Method</th>
                                            <th>Booking Status</th>
                                        </tr>
                                    </thead>
                                    
                                    <!--Retrieve from database-->
                                    <!--Inner join to get data from different table-->
                                    
                                     <?php
                                      include'db.php';
                                      $user_details="SELECT property.propertyName, booking.bookingID, booking.userName, booking.email, booking.phoneNum, booking.check_in, booking.check_out, booking.subtotal, booking.paymentMethod, booking.paymentStatus FROM property INNER JOIN booking ON property.propertyID = booking.propertyID WHERE userID='$userID'";
                                      $result_user=mysqli_query($con, $user_details);
                                      while($row_orders=mysqli_fetch_assoc($result_user)){
                                          $bookingID=$row_orders['bookingID'];
                                          $propertyName=$row_orders['propertyName'];
                                          $userName=$row_orders['userName'];
                                          $email=$row_orders['email'];
                                          $phoneNum=$row_orders['phoneNum'];
                                          $check_in=$row_orders['check_in'];
                                          $check_out=$row_orders['check_out'];
                                          $subtotal=$row_orders['subtotal'];
                                          $paymentMethod=$row_orders['paymentMethod'];
                                          $paymentStatus=$row_orders['paymentStatus'];
                                          $number=1;
                                          echo "<tr>
                                        <td>$bookingID</td>
                                        <td>$propertyName</td>
                                        <td>$userName</td>
                                        <td>$email</td>
                                        <td>$phoneNum</td>
                                        <td>$check_in</td>
                                        <td>$check_out</td>
                                        <td>RM $subtotal</td>
                                        <td>$paymentMethod</td>
                                        <td>$paymentStatus</td>
                                                            

                                      </tr>";
                                      $number++;
                                      }
                                      ?>
                                </table>
                            </div>
                        </div>
                    </div>
                     
                </main>
                <br>
                <br>
                
               <?php include 'footer.php' ?>
            </div>
        </div>
        
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
    </body>
</html>