<?php

//header('location: login.php');
session_start();

$con = mysqli_connect("localhost", "root", "", "airbnb", 3307);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Email = $_POST['Email'];
    $password = $_POST['password'];

    // Query the user's information from the database
    $s = "SELECT * FROM owner WHERE Email = '$Email'";
    $result = mysqli_query($con, $s);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row && password_verify($password, $row['password'])) {
            // Password is correct, set session variables and redirect
            $_SESSION['ownerID'] = $row['ownerID'];
            $_SESSION['ownerName'] = $row['ownerName'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['phoneNo'] = $row['phoneNo'];
            $_SESSION['Login'] = true;
         
            header('location: index.php');
        } else {
            // Password is incorrect, redirect to login page
            header('location: login.php');
        }
    } else {
        // Query error, handle accordingly
        // For security reasons, you might want to log this error
        // and not reveal specific details to the user
        echo "Login error. Please try again later.";
    }
}
?> 