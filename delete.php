<?php
include("db.php");
$id = $_GET['id'];
$sql = "DELETE FROM discussion WHERE id = {$id}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Post Deleted</p>";
        header("Location:discussion_forum.php?msg=$msg");
}
else{
	$error="<p class='alert alert-warning'>Post Not Deleted</p>";
        header("Location:discussion_forum.php?msg=$error");
}
mysqli_close($con);
?>
