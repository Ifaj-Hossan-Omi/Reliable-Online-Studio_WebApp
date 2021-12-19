<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");


$_SESSION['username'] = "Omi";

$username = $_SESSION['username'];
$complain_to = $_POST['complainee'];
$details = $_POST['details'];


$sql = "INSERT INTO complain (complain_by, complain_to, details) values('{$username}','{$complain_to}','{$details}')";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
// echo "Now you are a member of ROS!!";
header("refresh:0; url = complain.php");

mysqli_close($conn);




// header("Location: http://localhost/ROS/ROSv1/login.php");    
