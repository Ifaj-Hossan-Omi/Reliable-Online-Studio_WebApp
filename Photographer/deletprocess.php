<?php

session_start();

// $_SESSION['username'] = "Ombbbi";
$username = $_SESSION['username'];


$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");

$sql = "DELETE FROM photographer WHERE username = '$username'";

// $sql = "UPDATE photographer SET name = '$name' WHERE id = '$id'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
echo "Success";
// header("refresh:1; url = http://localhost/ROS/ROSv3/login.php");
// header("Location: http://localhost/ROS/ROSv17/sign.php");
header('location: ../sign.php');



mysqli_close($conn);

// header("Location: http://localhost/ROS/ROSv1/login.php");    
