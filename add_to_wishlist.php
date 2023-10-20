<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['userID'])) {
    // Assuming you have a database connection named $con
    include 'db.php';

    // Get the userID from the session
    $userID = $_SESSION['userID'];

    if (isset($_POST['add']) && isset($_POST['propertyID'])) {
        // Get the propertyID from the form
        $propertyID = $_POST['propertyID'];

        // Insert the property into the user's wishlist
        $insertQuery = "INSERT INTO wishlist (userID, propertyID) VALUES (?, ?)";
        $stmt = $con->prepare($insertQuery);

        if ($stmt === false) {
            die("Error in SQL statement: " . $con->error);
        }

        $stmt->bind_param("ii", $userID, $propertyID);

        if ($stmt->execute()) {
            // Property added to wishlist successfully
            header("Location: propertydetails.php?propertyID=$propertyID");
        } else {
            // Handle the case where adding to the wishlist failed
            echo "Failed to add property to wishlist: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close();
    }
} else {
    // Redirect to a login page or show a message that the user needs to log in to add to the wishlist
    header("Location: login.php");
    exit;
}
?>
