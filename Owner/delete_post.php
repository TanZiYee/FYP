
<?php

session_start();

if(isset($_SESSION['ownerID'])){
    $ownerID = $_SESSION['ownerID'];
}else{
}

include("db.php");
$id = $_GET['id'];

// Retrieve the user_id associated with the post
$sql = "SELECT ownerID FROM discussion_owner WHERE id = {$id}";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $postUserId = $row['ownerID'];

    // Compare the user's ID from the session with the post's user ID
    if ($ownerID === $postUserId) {
        // The logged-in user is the owner of the post, so allow deletion
        $deleteSQL = "DELETE FROM discussion_owner WHERE id = {$id}";
        $deleteResult = mysqli_query($con, $deleteSQL);
        
        if ($deleteResult) {
            $msg = "<p class='alert alert-success'>Post Deleted</p>";
            header("Location: discussion.php?msg=$msg");
        } else {
            $error = "<p class='alert alert-warning'>Post Not Deleted</p>";
            header("Location: discussion.php?msg=$error");
        }
    } else {
        // The logged-in user is not the owner of the post, so deny deletion
        $error = "<p class='alert alert-warning'>You do not have permission to delete this post.</p>";
        header("Location: discussion.php?msg=$error");
    }
} else {
    // Handle cases where the post does not exist or other errors
    $error = "<p class='alert alert-warning'>Post Not Found</p>";
    header("Location: discussion.php?msg=$error");
}

mysqli_close($con);

?>
