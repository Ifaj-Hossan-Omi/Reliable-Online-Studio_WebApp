<?php

session_start();

//$_SESSION['username'] = "";
$username = $_SESSION['username'];


$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");

$sql = "DELETE FROM client WHERE username = '$username'";

// $sql = "UPDATE photographer SET name = '$name' WHERE id = '$id'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
echo "Success";

session_destroy();


mysqli_close($conn);

header("Location: ../sign.php");
