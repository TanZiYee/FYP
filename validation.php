<?php

//header('location: login.php');
session_start();

$con = mysqli_connect("localhost","root","","airbnb",3307);

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];
 

$s = " select * from user where email = '$email' && password = '$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    while ($row=$result->fetch_assoc()){
        $_SESSION['username']=$row['username'];
        $_SESSION['email']=$row['email'];
        $_SESSION['phone']=$row['phone'];
    }
    
    $_SESSION['Login']=true;
    header('location: index.php');
    
}else{
    header('location: login.php');
    }
}
?> 