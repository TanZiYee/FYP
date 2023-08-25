<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("localhost","root","","airbnb", 3307);
    // Check connection
if(!$con = mysqli_connect("localhost","root","","airbnb",3307))
{
	die("failed to connect!");
}
?>