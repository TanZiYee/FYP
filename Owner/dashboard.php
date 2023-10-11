<?php

session_start();

if(isset($_SESSION['ownerID'])){
    $ownerID = $_SESSION['ownerID'];
}else{
}

include("db.php");
 $connect = mysqli_connect("localhost", "root", "", "airbnb", 3307);  
 $query = "SELECT rentingType, count(*) as number FROM property GROUP BY rentingType";  
 $result = mysqli_query($connect, $query);  

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard - Homify- Owner</title>
        
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
    
    
    <body class="sb-nav-fixed" style= "background: linear-gradient(to right,#A6BCE8 , #FFC0C0);">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Homify Owner</a>
            
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            
            <!-- Navbar-->
<!--            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                       
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" onclick="sweetalert()" >Logout</a></li>
                    </ul>
                </li>
            </ul>-->
        </nav>
        
        <div id="layoutSidenav">
            
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Property
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="BL_manage.php">Booking List</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Back to Home
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>
            
            
            <div id="layoutSidenav_content">
                
                
                 <main>
                    
                     
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><i class="far fa-credit-card	"></i> 
                                        Total Number of Transaction</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a>
                                         <?php
                                            $query ="SELECT property.propertyName, booking.bookingID, booking.userName, booking.email, booking.phoneNum, booking.check_in, booking.check_out, booking.paymentMethod FROM property INNER JOIN booking ON property.propertyID = booking.propertyID WHERE ownerID='$ownerID' ORDER BY bookingID";
                                            $query_run = mysqli_query($con,$query);

                                            $row = mysqli_num_rows($query_run);
                                            
                                            echo "<h5>$row</h5>"                                                   
                                        ?>   
                                        
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><i class="far fa-credit-card	"></i> 
                                        Total Number of Property</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a>
                                         <?php
                                            $query ="SELECT propertyID FROM property WHERE ownerID ='$ownerID' ORDER BY propertyID";
                                            $query_run = mysqli_query($con,$query);

                                            $row = mysqli_num_rows($query_run);
                                            
                                            echo "<h5>$row</h5>"                                                   
                                        ?>   
                                        
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                          <!--Pie Chart-->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Property Renting Type 
                                    </div>
                                
                                <div class="card-body">                              
                                    <div id="piechart" width="100%" height="50"></div>  
                                </div>
                             
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
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
                                        </tr>
                                    </thead>
                                    
                                     <?php
                                      include'db.php';
                                      $user_details="SELECT property.propertyName, booking.bookingID, booking.userName, booking.email, booking.phoneNum, booking.check_in, booking.check_out, booking.subtotal, booking.paymentMethod FROM property INNER JOIN booking ON property.propertyID = booking.propertyID WHERE ownerID='$ownerID'";
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
                                                            

                                      </tr>";
                                      $number++;
                                      }
                                      ?>
                                </table>
                            </div>
                        </div>
                    </div>
                     
                </main>
                
                
                
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; HOMIFY 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
        <script>
            
//             $(document).ready(function(){
//                var empDataTable = $('#datatablesSimple').DataTable({
//                    'processing': true,
//                    'serverSide': true,
//                    'serverMethod': 'post',
//                    'ajax': {
//                        'url':'ajaxfile.php'
//                    },
//                    pageLength: 5,
//                    'columns': [
//                        { data: 'userID' },
//                        { data: 'username' },
//                        { data: 'email' },
//                        { data: 'phone' }
//                    ]
//                });
//            });    
            
            
            
            
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
            var data = google.visualization.arrayToDataTable([  
                      ['rentingType', 'Number'],  
                      <?php  
                      while($row = mysqli_fetch_array($result))  
                      {  
                           echo "['".$row["rentingType"]."', ".$row["number"]."],";  
                      }  
                      ?>  
                ]);  
               
               
            var options = {  
                title: '',  
                //is3D:true,  
                pieHole: 0.4  
               };  
              var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
              chart.draw(data, options);  
            }  
            
            
            function sweetalert(){
            Swal.fire({
            title: 'Are you sure to logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {

              window.location.href="login.php";

            }
          })       
        }
        
        
        
        
        </script>
    </body>
</html>