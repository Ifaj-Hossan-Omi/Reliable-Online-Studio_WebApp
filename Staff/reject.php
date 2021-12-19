<?php

$id = $_GET['id'];


$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");

$sql = "UPDATE complain SET complain_status = 'reject' WHERE id = '$id'";


// $sql = "UPDATE photographer SET name = '$name' WHERE id = '$id'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
echo "Success";
header("refresh:0; url = previousComplain.php");

mysqli_close($conn);

// header("Location: http://localhost/ROS/ROSv1/login.php");    
