<?php 
session_start();

if(isset($_SESSION['userID'])){
    $userID = $_SESSION['userID'];
}else{
}

include("db.php");

// code insert
// add code
$error="";
$msg="";
$subtotal = $_SESSION['totalCost'];
$check_in = $_SESSION['check_in'];
$check_out = $_SESSION['check_out'];

if(isset($_POST['book']))
{
	
	$userName = $_POST['userName'];
        $email = $_POST['email'];
        $phoneNum = $_POST['phoneNum'];
        $subtotal = $_SESSION['totalCost'];
        $check_in = $_SESSION['check_in'];
        $check_out = $_SESSION['check_out'];
        $paymentMethod = $_POST['paymentMethod'];
        $userID = $_SESSION['userID'];
        $propertyID = $_SESSION['propertyID'];
	
	$sql="insert into booking (userName,email,phoneNum,subtotal,check_in, check_out, paymentMethod,  paymentStatus, userID, propertyID )
	values('$userName','$email', '$phoneNum', '$subtotal', '$check_in', '$check_out', '$paymentMethod', 'Pending', '$userID', '$propertyID')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
                        // Invoice
			$msg="<p class='alert alert-success'>Booking Successfully</p>";
                        echo "
                          <div class='order-message-container'>
                          <br>
                          <div class='message-container'>
                          <br>
                          <br>
                          <br>
                             <h3>Invoice</h3>
                             <div class='order-detail'>
                                <span class='total'> Total : RM".$subtotal."/-  </span>
                             </div>
                             <div class='customer-details'>
                                <p> Your Name : <span>".$userName."</span> </p>
                                <p> Your Email : <span>".$email."</span> </p>
                                <p> Your Number : <span>".$phoneNum."</span> </p>
                                <p> Your Check-In Date : <span>".$check_in."</span> </p>
                                <p> Your Check-Out Date : <span>".$check_out."</span> </p>
                                <p> Your Payment Method : <span>".$paymentMethod."</span> </p>
                                <p>(*Pay when meets the owner*)</p>
                             </div>
                                <a href='index.php' class='btn btn-info'>Continue Renting!</a>
                                <br>
                             </div>
                          </div>
                          ";
                        
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Booking Failed</p>";
		}
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
            
            
       .checkout-form form{
           padding:2rem;
           border-radius: .5rem;
           background-color: lightblue;
        }

        .checkout-form form .flex{
           display: flex;
           flex-wrap: wrap;
           gap:1.5rem;
        }

        .checkout-form form .flex .inputBox{
           flex:1 1 40rem;
        }

        .checkout-form form .flex .inputBox span{
           font-size: 2rem;
           color:var(--black);
        }

        .checkout-form form .flex .inputBox.btn{
           color: white;
        }


        .checkout-form form .flex .inputBox input,
        .checkout-form form .flex .inputBox select{
           width: 100%;
           background-color: var(--white);
           font-size: 1.7rem;
           color:var(--black);
           border-radius: .5rem;
           margin:1rem 0;
           padding:1.2rem 1.4rem;
           text-transform: none;
           border:var(--border);
        }

        .display-order{
           max-width: 50rem;
           background-color: white;
           border-radius: .5rem;
           text-align: center;
           padding:1.5rem;
           margin:0 auto;
           margin-bottom: 2rem;
           box-shadow: var(--box-shadow);
           border:var(--border);
        }

        .display-order span{
           display: inline-block;
           border-radius: .5rem;
           background-color: var(--bg-color);
           padding:.5rem 1.5rem;
           font-size: 2rem;
           color:var(--black);
           margin:.5rem;
        }

        .display-order span.grand-total{
           width: 100%;
           background-color: lightskyblue;
           color:var(--white);
           padding:1rem;
           margin-top: 1rem;
        }

        .order-message-container{
           position: fixed;
           top:0; left:0;
           height: 100vh;
           overflow-y: scroll;
           overflow-x: hidden;
           padding:2rem;
           display: flex;
           align-items: center;
           justify-content: center;
           z-index: 1100;
           background-color: var(--dark-bg);
           width: 100%;
        }

        .order-message-container::-webkit-scrollbar{
           width: 1rem;
        }

        .order-message-container::-webkit-scrollbar-track{
           background-color: var(--dark-bg);
        }

        .order-message-container::-webkit-scrollbar-thumb{
           background-color: var(--blue);
        }

        .order-message-container .message-container{
           width: 50rem;
           height: 58rem;
           background-color: white;
           border-radius: .5rem;
           padding:1rem;
           text-align: center;
        }

        .order-message-container .message-container h3{
           font-size: 2.5rem;
           color:var(--black);
        }

        .order-message-container .message-container .order-detail{
           background-color: lightsteelblue;
           border-radius: .3rem;
           padding:1rem;
           margin:1rem 0;
        }

        .order-message-container .message-container .order-detail span{
           background-color: var(--white);
           border-radius: .5rem;
           color:var(--black);
           font-size: 2rem;
           display: inline-block;
           padding:1rem 1.5rem;
           margin:1rem;
        }

        .order-message-container .message-container .order-detail span.total{
           display: block;
           background: lightsteelblue;
           color:var(--white);
        }

        .order-message-container .message-container .customer-details{
           margin:1.5rem 0;
        }

        .order-message-container .message-container .customer-details p{
           padding:1rem 0;
           font-size: 1rem;
           color:var(--black);
        }

        .order-message-container .message-container .customer-details p span{
           color:var(--blue);
           padding:0 .2rem;
           text-transform: none;
        }
        </style>
    </head>
    <body  style = "background: linear-gradient(to right,#71c9ce , #eeeeee);"  >
        
        <?php require './header.php'; ?>
        
        
        <br>
        <br>
        
        
        <div class="container">
            <section class="checkout-form">
                <div class="col-12 my-5 mb-4 px-4">
                    <h2 class="fw-bold">COMPLETE YOUR ORDER</h2>
                </div>
                
                <div class="flex">
                    <div class="card mb-4 border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <form method="post" id="booking_form">
                                <h6 class="mb-3">CHECKOUT FORM</h6>
                                <?php echo $error; ?>
                                    <?php echo $msg; ?>	
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control shadow-none" name="userName" required placeholder="Enter Your Name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control shadow-none" name="email" required placeholder="Enter Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="phone" class="form-control shadow-none" name="phoneNum" required placeholder="Enter Your Phone">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label"> Total Price (RM): </label>
                                        <input type="number" class="form-control shadow-none" value= '<?php echo $subtotal; ?>' name="subtotal" min="1" step="0.01" required placeholder="Enter Your Total" title="The subtotal cannot be zero. Please confirm booking again in order for you to checkout.">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Check-in</label>
                                        <input type="date" class="form-control shadow-none" value='<?php echo $check_in; ?>' name="check_in" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Check-out</label>
                                        <input type="date" class="form-control shadow-none" value='<?php echo $check_out; ?>' name="check_out" required>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Payment Method</label>
                                        <select class="form-control" required name="paymentMethod">
                                            <option value="Cash">Cash</option>
                                            <option value="credit">Credit or Debit Card</option>
                                            <option value="paypal">PayPal</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <input type="submit" value="Checkout" class="btn btn-info w-100 mb-1" name="book">
                            </form>
                        </div>    
                    </div>
                </div>
            </section>
        </div>

        <?php require './footer.php';?>
        
        
    </body>
    
</html>