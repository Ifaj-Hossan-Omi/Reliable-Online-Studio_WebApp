<?php

$id = $_GET['id'];


$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");

$sql = "UPDATE task SET task_status = 'deny' WHERE id = '$id'";

// $sql = "UPDATE photographer SET name = '$name' WHERE id = '$id'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
header("refresh:0; url = alltask.php");

mysqli_close($conn);

// header("Location: http://localhost/ROS/ROSv1/login.php");    
