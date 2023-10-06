<?php
include("db.php");
$propertyID = $_GET['id'];
$sql = "DELETE FROM property WHERE propertyID = {$propertyID}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Property Deleted</p>";
	header("Location:property.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Property Not Deleted</p>";
	header("Location:property.php?msg=$msg");
}
mysqli_close($con);
?>