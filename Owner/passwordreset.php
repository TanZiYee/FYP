

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
        
        
	<!-- Main Style Css -->
        <link rel="stylesheet" href="css/style.css"/>
        
        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <!--Icon-->
        <link rel="icon" href="../Image/airbnb.ico" /> 
    
        
    <style>
        
    body {
    margin:  0;  
    }
    
    .page-content {
            width: 100%;
            margin:  0 auto;
            background: linear-gradient(to right,#2F2F9C,#D6D6F2);
            display: flex;
            display: -webkit-flex;
            justify-content: center;
            -o-justify-content: center;
            -ms-justify-content: center;
            -moz-justify-content: center;
            -webkit-justify-content: center;
            align-items: center;
            -o-align-items: center;
            -ms-align-items: center;
            -moz-align-items: center;
            -webkit-align-items: center;
    }
    .form-v5-content  {
            background: #fff;
            width: 670px;
            border-radius: 8px;
            -o-border-radius: 8px;
            -ms-border-radius: 8px;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            margin: 175px 0;
            font-family: 'Roboto', sans-serif;
            color: #333;
            font-weight: 400;
            position: relative;
            font-size: 18px;
    }
    .form-v5-content .form-detail {
            padding: 30px 45px 30px 45px;
            position: relative;
    }
    .form-detail h2 {
            font-weight: 700;
            font-size: 25px;
            text-align: center;
            position: relative;
            padding: 3px 0 20px;
            margin-bottom: 40px;
    }
    .form-detail h2::after {
            background: #3786bd;
            width: 50px;
            height: 2px;
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
        transform: translateX(-50%);
        -o-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -webkit-transform: translateX(-50%);
    }
    .form-detail .form-row {
            position: relative;
    }
    .form-detail .form-row-last {
            text-align: center;
    }
    .form-detail label {
            display: block;
            font-size: 18px;
            padding-bottom: 10px;
    }
    .form-detail .input-text {
            margin-bottom: 26px;
    }
    .form-detail input {
            width: 94.5%;
        padding: 10.5px 15px;
        border: 1px solid #e5e5e5;
        appearance: unset;
        -moz-appearance: unset;
        -webkit-appearance: unset;
        -o-appearance: unset;
        -ms-appearance: unset;
        outline: none;
        -moz-outline: none;
        -webkit-outline: none;
        -o-outline: none;
        -ms-outline: none;
        border-radius: 4px;
            -o-border-radius: 4px;
            -ms-border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            font-size: 18px;
    }
    .form-detail input:focus {
            border: 1px solid #b3b3b3;
    }
    .form-detail .register {
            font-size: 18px;
            color: #fff;
            background: #3786bd;
            border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            width: 180px;
            box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2);
            -o-box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2);
            -ms-box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2);
            -webkit-box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2);
            border: none;
            margin: 19px 0 40px;
            cursor: pointer;
    }
    .form-detail .register:hover {
            background: #2f73a3;
    }
    .form-detail .form-row-last input {
            padding: 14px;
    }
    .form-detail i {
            font-size: 14px;
            color: #999;
            right: 15px;
            top: 50%;
            transform: translateX(-50%);
            position: absolute;
    }
    input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
      color: #999;
      font-size: 16px;
    }
    input::-moz-placeholder { /* Firefox 19+ */
      color: #999;
      font-size: 16px;
    }
    input:-ms-input-placeholder { /* IE 10+ */
      color: #999;
      font-size: 16px;
    }
    input:-moz-placeholder { /* Firefox 18- */
      color: #999;
      font-size: 16px;
    }

    /* Responsive */
    @media screen and (max-width: 767px) {
            .form-v5-content {
                margin: 175px 20px;
            }
    }
    

    </style>
    
</head>

<?php require_once 'login_header.php'; ?>

<?php
include_once('db.php');
if(isset($_REQUEST['pwdrst']))
{
  $Email = $_REQUEST['Email'];
  $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
  if($password)
  {
    $reset_pwd = mysqli_query($con,"update owner set password='$password' where Email='$Email'");
    if($reset_pwd>0)
    {
      $msg = 'Your password updated successfully! <a href="login.php">Login</a>';
    }
    else
    {
      $msg = "Error while updating password.";
    }
  }
  else
  {
    $msg = "Password and Confirm Password do not match";
  }
}

if($_GET['secret'])
{
  $Email = base64_decode($_GET['secret']);
  $check_details = mysqli_query($con,"select Email from owner where Email='$Email'");
  $res = mysqli_num_rows($check_details);
  if($res>0)
    { ?>

        
<body class="form-v5">

        
    <div class="page-content">
		<div class="form-v5-content">
                    
			<form class="form-detail" id="validate_form" method="post">
                            
				<h2>Reset Password</h2>
                                
                                <input type="hidden" name="Email" value="<?php echo $Email; ?>"/>
				<div class="form-row">
					<label for="your-email" class="fas fa-envelope"> Password</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="Your Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
					
				</div>
                               
				<div class="form-row-last">
					<input type="submit" name="pwdrst" class="login" value="Reset Password">
				</div>
                                
                                <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
			</form>
                    
		</div>
	</div>
 
</body>
<?php } } ?>

<?php require_once 'footer.php'; ?>

</html>

