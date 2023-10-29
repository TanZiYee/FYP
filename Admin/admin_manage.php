<?php
session_start();
include("server.php");



if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($con, "DELETE FROM `user` WHERE userID = $delete_id ") or die('query failed');
   if($delete_query){
      $_SESSION['AdminStatus3'] = 'Added Unsuccessfully';          
   }else{
      $_SESSION['AdminStatus3'] = 'Added Unsuccessfully';
   };
};



if(isset($_POST['update_admin'])){
   $update_id = $_POST['update_id'];
   $update_name = $_POST['update_name'];
   $update_email = $_POST['update_email'];
   
   $update_phone = $_POST['update_phone'];
   $update_password = password_hash($_POST['update_password'], PASSWORD_DEFAULT);
   

   $update_query = mysqli_query($con, "UPDATE `user` SET username = '$update_name', email = '$update_email',  phone = '$update_phone', password = '$update_password'WHERE userID = '$update_id'");

   
   if($update_query){
      header('location:admin_manage.php');
      $_SESSION['AdminStatus4'] = 'Added Unsuccessfully';

   }
   
   else{
      $message[] = 'Admin could not be updated';
      header('location:admin_manage.php');
   }

}						

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard - HOMIFY - Admin </title>
        
        <!-- Bootstrap CSS & Sweet Alert CDN-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" />            
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!--Icon-->
        <link rel="icon" href="../Image/airbnb.ico" />



        
        
    </head>
    
    <style>
    :root{
       --blue:#2980b9;
       --red:tomato;
       --orange:orange;
       --black:#333;
       --white:#fff;
       --bg-color:#eee;
       --dark-bg:rgba(0,0,0,.7);
       --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
       --border:.1rem solid #999;
    }


/*    .btn,*/
    .option-btn,
    .delete-btn{
       display: block;
       width: 100%;
       text-align: center;
       background-color: var(--blue);
       color:var(--white);
       font-size: 1rem;
       padding:1rem 2rem;
       border-radius: .5rem;
       cursor: pointer;
       margin-top: 1rem;
    }

    .btn:hover,
    .option-btn:hover,
    .delete-btn:hover{
       background-color: var(--black);
    }

    .option-btn i,
    .delete-btn i{
       padding-right: .5rem;
    }

    .option-btn{
       background-color: var(--orange);
    }

    .delete-btn{
       margin-top: 0;
       background-color: var(--red);
    }    


    .display-product-table table{
       width: 100%;
       text-align: center;
    }

    .display-product-table table thead th{
       padding:1.5rem;
       font-size: 1.3rem;
       background-color: var(--black);
       color:var(--white);
    }

    .display-product-table table td{
       padding:1.5rem;
       font-size: 1rem;
       color:var(--black);
    }

    .display-product-table table td:first-child{
       padding:0;
    }

    .display-product-table table tr:nth-child(even){
       background-color: var(--bg-color);
    }

    .display-product-table .empty{
       margin-bottom: 2rem;
       text-align: center;
       background-color: var(--bg-color);
       color:var(--black);
       font-size: 2rem;
       padding:1.5rem;
    }


    .edit-form-container{
       position: fixed;
       top:0; left:0;
       z-index: 1100;
       background-color: var(--dark-bg);
    /*   padding:2rem;*/
       display: none;
       align-items: center;
       justify-content: center;
       min-height: 100vh;
       width: 100%;
    }

    .edit-form-container form{
       width: 50rem;
       border-radius: .5rem;
       background-color: var(--white);
       text-align: center;
       padding:2rem;
    }

    .edit-form-container form .box{
       width: 30%;
       background-color: var(--bg-color);
       border-radius: .5rem;
       margin:1rem 0;
       font-size: 1.5rem;
       color:var(--black);
       padding:1.2rem 1.0rem;
       text-transform: none;
    }

    </style>
    
 

    
    <body class="sb-nav-fixed" style= "background: linear-gradient(to right,#A6BCE8 , #FFC0C0);">
        
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">HOMIFY Admin</a>
            
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                       
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" onclick="sweetalert()" >Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        
        <div id="layoutSidenav">
            
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
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
                                    <a class="nav-link" href="property_MP.php">Manage Property</a>
                                    <a class="nav-link" href="property_AP.php">Add Property</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Booking
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="booking_list.php">Booking List</a>
                                    <a class="nav-link" href="manage_booking.php">Manage Booking</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Community Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="user_CP.php">Manage User Post</a>
                                    <a class="nav-link" href="owner_CP.php">Manage Owner Post</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Role
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="user_manage.php">Manage User</a>
                                    <a class="nav-link" href="owner_manage.php">Manage Owner</a>
                                    <a class="nav-link" href="admin_manage.php">Manage Admin</a>
                                    <a class="nav-link" href="add_admin.php">Add Admin</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                User Information
                            </a>
                            <a class="nav-link" href="owner.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Owner Information
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>
            
            
            <div id="layoutSidenav_content">
                                
                 <main>
                     <?php 
                        if(isset($_SESSION['AdminStatus4'])){
                            ?>
                            <script>
                            Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Admin Update Successfully',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            </script>
                    <?php
                         unset($_SESSION['AdminStatus4']);  
                        }
                    ?>
                     
                    <?php 
                        if(isset($_SESSION['AdminStatus3'])){
                            ?>
                            <script>
                            Swal.fire(
                                'Admin Deleted !',
                                '',
                                'success'
                            )
                            </script>
                       <?php
                            unset($_SESSION['AdminStatus3']);  
                        }
                    ?>
                            
                            
                    
                     
                    <br>
                    <h3 style="text-align:center">  <i class="fas fa-tasks"></i> Manage Admin</h3>
                    <br>

                     <div class="container">

                         <section class="display-product-table">

                         <table>

                            <thead>
                               <th>Admin ID</th>
                               <th>User Type</th>
                               <th>Admin Name</th>
                               <th>Email</th>
                               <th>Phone</th>
                               <th>Action</th>
                            </thead>

                            <tbody>
                               <?php

                                  $select_products = mysqli_query($con, "SELECT * FROM `user` WHERE usertype='admin'");
                                  if(mysqli_num_rows($select_products) > 0){
                                     while($row = mysqli_fetch_assoc($select_products)){
                               ?>

                               <tr>
                                  <td><?php echo $row['userID']; ?></td>
                                  <td><?php echo $row['usertype']; ?></td>
                                  <td><?php echo $row['username']; ?></td>
                                  <td><?php echo $row['email']; ?></td>
                                  <td><?php echo $row['phone']; ?></td>
                                  <td>
                                     <a href="admin_manage.php?delete=<?php echo $row['userID']; ?>" class="delete-btn"  onclick="return confirm('Are your sure you want to delete this?');"> <i class="fas fa-trash"></i> Delete </a>
                                     <a href="admin_manage.php?edit=<?php echo $row['userID']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Update </a>
                                  </td>
                               </tr>

                               <?php
                                  };    
                                  }else{
                                     echo "<div class='empty'>No product added</div>";
                                  };
                               ?>
                            </tbody>
                         </table>

                         </section>




                         <section class="edit-form-container">

                             <?php

                             if(isset($_GET['edit'])){
                                $edit_id = $_GET['edit'];
                                $edit_query = mysqli_query($con, "SELECT * FROM `user` WHERE usertype='admin' && userID = $edit_id");
                                if(mysqli_num_rows($edit_query) > 0){
                                   while($fetch_edit = mysqli_fetch_assoc($edit_query)){
                             ?>

                             <form action="" method="post" enctype="multipart/form-data">
                                
                                <input type="hidden" name="update_id" value="<?php echo $fetch_edit['userID']; ?>">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Name</label>
					<div class="col-lg-9">
                                            <input type="text" class="form-control" required name="update_name" value="<?php echo $fetch_edit['username']; ?>" >
					</div>
				</div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Email</label>
					<div class="col-lg-9">
                                            <input type="text" class="form-control" required name="update_email" value="<?php echo $fetch_edit['email']; ?>" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" >
					</div>
				</div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Phone</label>
					<div class="col-lg-9">
                                            <input type="phone" class="form-control" required name="update_phone" value="<?php echo $fetch_edit['phone']; ?>" >
					</div>
				</div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Password</label>
					<div class="col-lg-9">
                                            <input type="password" class="form-control" required name="update_password" value="<?php echo $fetch_edit['password']; ?>" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
					</div>
				</div>
                                <input type="submit" value="Update the Item" name="update_admin" class="option-btn">
                                <a href="admin_manage.php" class="option-btn"> Cancel </a>

                             </form>

                             <?php
                                      };
                                   };
                                   echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
                                };
                             ?>

                         </section>

                     </div>
                     
                     
                </main>
                
                <br>
                
                
                
                
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
        
        
        
        
        let menu = document.querySelector('#menu-btn');
        let navbar = document.querySelector('.header .navbar');

        menu.onclick = () =>{
           menu.classList.toggle('fa-times');
           navbar.classList.toggle('active');
        };

        window.onscroll = () =>{
           menu.classList.remove('fa-times');
           navbar.classList.remove('active');
        };


        document.querySelector('#close-edit').onclick = () =>{
           document.querySelector('.edit-form-container').style.display = 'none';
           window.location.href = 'SC_MP.php';
        }; 

        
        
        
        </script>
        
        
        
        
    </body>
</html>
