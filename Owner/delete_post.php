<?php
include("db.php");
$id = $_GET['id'];
$sql = "DELETE FROM discussion_owner WHERE id = {$id}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Post Deleted</p>";
        header("Location:discussion.php?msg=$msg");
}
else{
	$error="<p class='alert alert-warning'>Post Not Deleted</p>";
        header("Location:discussion.php?msg=$error");
}
mysqli_close($con);
?>
