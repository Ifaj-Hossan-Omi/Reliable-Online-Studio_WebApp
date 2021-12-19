



<?php
$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>ROS</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="logo.png" type="image/png" />
</head>

<body>
    <div id="wrap>per">
        <header id="header">
            <h1>Reliable Online Studio</h1>
        </header>
        <section id="menu">
            <ul>
                <li>
                    <a href="profilec.php">My Profile</a>
                </li>
                <li>
                    <a href="myorders.php">MY Orders</a>
                </li>
                <li>
                    <a href="uploadc.php">Upload Orders</a>
                </li>
                <li>
                    <a href="pending.php">Pending Orders</a>
                </li>
                <li>
                    <a href="editc.php">Edit Profile</a>
                </li>
                <li>
                    <a href="deletec.php">Delete Profile</a>
                </li>
                <li>
                    <a href="logout.php">Log out</a>
                </li>
            </ul>
        </section>