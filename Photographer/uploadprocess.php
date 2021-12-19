<?php
session_start();
$id = $_SESSION['id'];

$img_name = $_FILES['img']['name'];
$img_size = $_FILES['img']['size'];
$tmp_name = $_FILES['img']['tmp_name'];
$error = $_FILES['img']['error'];

$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
$img_ex_lc = strtolower($img_ex);
$allowed_exs = array("jpg", "jpeg", "png");
if (in_array($img_ex_lc, $allowed_exs)) {
    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    $img_upload_path = '../uploads/' . $new_img_name;
    move_uploaded_file($tmp_name, $img_upload_path);
} else {
    echo "Can't uploads this type of image";
    header("refresh:5; url = upload.php");
    // header("Location: signup.php?error=$em");

    die();
}


$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");
$sql = "UPDATE task SET img = '$new_img_name', task_status = 'deliverd' WHERE id = '$id'";

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
header("refresh:0; url = alltask.php");

mysqli_close($conn);
