<?php
session_start();

// Check if the user is logged in
if(isset($_SESSION['userID'])){
    $userID = $_SESSION['userID'];
} else {
    // Handle the case where the user is not logged in
    // You might want to redirect them to a login page or show an error message.
    // For example:
     header("Location: login.php");
     exit();
}

include "db.php";

if(isset($_POST['add']) && isset($_POST['propertyID'])){
    $propertyID = $_POST['propertyID'];

    // Check if the user has already added the property to their wishlist
    $check_query = mysqli_query($con, "SELECT * FROM wishlist WHERE userID = $userID AND propertyID = $propertyID");

    if (mysqli_num_rows($check_query) == 0) {
        // The user has not added this property to their wishlist, so insert it.
        $insert_query = mysqli_query($con, "INSERT INTO wishlist (userID, propertyID) VALUES ($userID, $propertyID)");

        if ($insert_query) {
            $_SESSION['WishlistStatus'] = 'Property added to your wishlist.';
        } else {
            $_SESSION['WishlistStatus'] = 'Failed to add property to your wishlist.';
        }
    } else {
        // The property is already in the user's wishlist; provide appropriate feedback.
        $_SESSION['WishlistStatus'] = 'Property is already in your wishlist.';
    }
}

// Redirect to a page where you want to display the wishlist
header("Location: wishlist.php");
?>
