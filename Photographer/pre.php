<?php
$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");
session_start();

// $_SESSION['username'] = "Omi";

$username = $_SESSION['username'];

$sql = "SELECT * FROM PHOTOGRAPHER WHERE username = '$username'";
$result = mysqli_query($conn, $sql) or die();
$row = mysqli_fetch_assoc($result)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <link rel="shortcut icon" href="assets/img/logo.png" type="image/png" />


    <title>ROS Photographer Portion</title>
</head>

<body>
    <!--========== HEADER ==========-->
    <header class="header">
        <div class="header__container">
            <img src="../uploads/<?php echo $row['img'] ?>" alt="" class="header__img">

            <a href="#" class="header__logo">Photographer</a>

            <div class="header__search">
                <input type="search" placeholder="Search" class="header__input">
                <i class='bx bx-search header__icon'></i>
            </div>

            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        </div>
    </header>

    <!--========== NAV ==========-->
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="#" class="nav__link nav__logo">
                    <i class='bx bxs-camera nav__icon'></i>
                    <span class="nav__logo-name">ROS</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Personal</h3>

                        <a href="profile.php" class="nav__link a1">
                            <i class='bx bx-user nav__icon'></i>
                            <span class="nav__name">Profile</span>
                        </a>
                        <a href="edit.php" class="nav__link">
                            <i class='bx bx-edit nav__icon'></i>
                            <span class="nav__name">Edit</span>
                        </a>
                        <a href="delete.php" class="nav__link">
                            <i class='bx bxs-trash nav__icon'></i>
                            <span class="nav__name">Delete</span>
                        </a>
                    </div>

                    <div class="nav__items">
                        <h3 class="nav__subtitle">Work</h3>


                        <a href="alltask.php" class="nav__link">
                            <i class='bx bx-edit nav__icon'></i>
                            <span class="nav__name">All Task</span>
                        </a>
                        <a href="orders.php" class="nav__link">
                            <i class='bx bx-mail-send nav__icon'></i>
                            <span class="nav__name">Orders</span>
                        </a>
                        <a href="uploadtask.php" class="nav__link">
                            <i class='bx bx-package nav__icon'></i>
                            <span class="nav__name">Deliver</span>
                        </a>
                    </div>

                    <div class="nav__items">
                        <h3 class="nav__subtitle">Complain</h3>


                        <a href="complain.php" class="nav__link">
                            <i class='bx bxl-telegram nav__icon'></i>
                            <span class="nav__name">Report</span>
                        </a>
                        <a href="previousComplain.php" class="nav__link">
                            <i class='bx bxs-book-content nav__icon'></i>
                            <span class="nav__name">Previous</span>
                        </a>

                    </div>
                </div>
            </div>

            <a href="signout.php" class="nav__link nav__logout">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

    <!--========== CONTENTS ==========-->
    <main>
        <section>