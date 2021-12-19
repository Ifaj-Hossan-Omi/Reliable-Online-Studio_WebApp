<?php

$id = $_POST['id'];
$name = $_POST['name'];
$email = strtolower($_POST['email']);
$password = $_POST['password'];
$nid = $_POST['nid'];
$dob = $_POST['dob'];
$address = $_POST['address'];


$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");

$sql = "UPDATE photographer SET name = '$name', email = '$email', password = '$password', nid = '$nid', dob = '$dob', address = '$address' WHERE id = '$id'";

// $sql = "UPDATE photographer SET name = '$name' WHERE id = '$id'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
header("refresh:0; url = profile.php");

mysqli_close($conn);

// header("Location: http://localhost/ROS/ROSv1/login.php");    
