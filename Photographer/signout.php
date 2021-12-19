<?php

session_start();

unset($_SESSION['username']);

session_destroy();

// header("Location: http://localhost/ROS/ROSv17/sign.php");
header('location: ../sign.php');
