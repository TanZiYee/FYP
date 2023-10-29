
<?php
$conn = new mysqli('localhost','root','','airbnb',3307);
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}