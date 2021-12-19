<?php

session_start();

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$nid = $_SESSION['nid'];
$dob = $_SESSION['dob'];
$address = $_SESSION['address'];


$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");

$sql = "UPDATE client SET name = '$name', email = '$email', password = '$password', nid = '$nid', dob = '$dob', address = '$address' WHERE id = '$id'";

// $sql = "UPDATE client SET name = '$name' WHERE id = '$id'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
echo "Success";
header("refresh:5; url = profilec.php");

mysqli_close($conn);

// header("Location: http://localhost/ROS/ROSv1/login.php");    
