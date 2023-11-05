<?php
session_start();

$con = mysqli_connect("localhost","root","","airbnb", 3307);


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $usertype = $_POST['usertype'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
 

$s = " select * from user where username = '$username'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['status2']="Username Already Taken";
}

else{
    
    $reg = " insert into user(username, email, phone, password) values ('$username', '$email', '$phone', '$password')";
    mysqli_query($con, $reg);
    $_SESSION['status']="Successfully";
    header('location: login.php');
    die;
}
}
?> 




<!DOCTYPE html>
<html>
<head>
    
	<meta charset="utf-8">
	<title>Homify</title>
        
        
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
        
        <!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
        
        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
	<!-- Main Style Css -->
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/signup.css">
        
        <!--Icon-->
        <link rel="icon" href="Image/airbnb.ico" /> 
      
</head>

<?php require_once 'login_header.php'; ?>

    <?php 

    if(isset($_SESSION['status2'])){
        ?>

        <script>
            Swal.fire(
                'Oops...',
                'Username Already Taken',
                'question'
            );

        </script>  

        <?php unset($_SESSION['status2']);
        }
        ?>



    <?php 
    if(isset($_SESSION['status'])){
        ?>

        <script>
            Swal.fire(
                'Congratulations!',
                'Registration Successful',
                'success'
    );  
        </script>

        <?php unset($_SESSION['status']);
        }
        ?>
    
    
<body class="form-v5" style = "background: linear-gradient(to right,#1F6ED4 , #B9EDF8);" >
	<div class="page-content">
		<div class="form-v5-content">
			<form class="form-detail" action="" method="post">
				<h2>Sign Up</h2> 
                                
<!--				^: Asserts the start of the string.
                                [A-Za-z]: Matches any alphabet character (both uppercase and lowercase) as the first character.
                                [A-Za-z0-9]*: Matches zero or more occurrences of alphabet characters or digits.
                                [A-Za-z0-9]$: Matches an alphabet character or digit followed by the end of the string.
                                $: Asserts the end of the string.-->
                                <div class="form-row" >  
                                    <label for="full-name" class="fas fa-user">Username</label>          
					<input type="text" name="username" id="username" class="input-text" placeholder="Your Name" required pattern="^[A-Za-z][A-Za-z0-9]*[A-Za-z0-9]$" title="The username must start with an alphabet character (A-Z or a-z), followed by any combination of alphabet characters, numbers, and underscores, and it cannot end with an underscore.">                                       
				</div>
                                
    <!--                        [^@]+: Matches one or more characters that are not '@'. This represents the part before the '@' in an email address.
                                @: Matches the '@' symbol literally.
                                [^@]+: Matches one or more characters that are not '@'. This represents the part after the '@' but before the dot in the domain.
                                \.: Matches the dot '.' literally.
                                [a-zA-Z]{2,6}: Matches 2 to 6 alphabetic characters. This represents the top-level domain (TLD) such as .com, .org, .net, etc.-->
				<div class="form-row">
					<label for="your-email" class="fas fa-envelope" > Email</label>
					<input type="email" name="email" id="your-email" class="input-text" placeholder="Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				</div>
                                <div class="form-row">
					<label for="your-phone" class="fas fa-phone" > Phone</label>
                                        <input type="text" name="phone" id="your-phone" class="input-number" placeholder="Your Phone" required>
				</div>
                                <br>
                                
                                <!--(?=.*\d): At least one digit is required.
                                (?=.*[a-z]): At least one lowercase letter is required.
                                (?=.*[A-Z]): At least one uppercase letter is required.
                                .{8,}: The password must be at least 8 characters in length.-->
				<div class="form-row">                                   
					<label for="password" class="fas fa-lock" > Password</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="Your Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Register">
				</div>
			</form>            
		</div>           
	</div>
</body>

<?php require_once 'footer.php'; ?>
</html>