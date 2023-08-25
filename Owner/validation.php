<?php

//header('location: login.php');
session_start();

$con = mysqli_connect("localhost","root","","airbnb",3307);

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $Email = $_POST['Email'];
    $password = $_POST['password'];
 

$s = " select * from owner where Email = '$Email' && password = '$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    while ($row=$result->fetch_assoc()){
        $_SESSION['ownerName']=$row['ownerName'];
        $_SESSION['Email']=$row['Email'];
        $_SESSION['phoneNo']=$row['phoneNo'];
    }
    
    $_SESSION['Login']=true;
    header('location: index.php');
    
}else{
    header('location: login.php');
    }
}
?> 