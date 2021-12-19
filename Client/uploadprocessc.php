<?php


session_start();


if(isset($_SESSION['username'])){


}
else{

    header('location: ../sign.html');
}


$details=$_POST['details'];

//$id = $_SESSION['id'];
$username = $_SESSION['username'];

$img_name = $_FILES['img']['name'];
$img_size = $_FILES['img']['size'];
$tmp_name = $_FILES['img']['tmp_name'];
$error = $_FILES['img']['error'];

$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
$img_ex_lc = strtolower($img_ex);
$allowed_exs = array("jpg", "jpeg", "png");
if (in_array($img_ex_lc, $allowed_exs)) {
    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    $img_upload_path = 'uploadsorder/' . $new_img_name;
    move_uploaded_file($tmp_name, $img_upload_path);
} else {
    echo "Can't uploads this type of image";
    header("refresh:5; url = uploadc.php");
    // header("Location: signup.php?error=$em");

    die();
}


$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");
//$sql = "INSERT INTO task SET img = '$new_img_name', task_status = 'waiting for respond' ;

$sql = "INSERT INTO task(task_details,img, task_status, client) VALUES ('$details','$new_img_name', 'waiting for respond', '$username')";


if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}



/*
echo "Success";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
echo "Success";
header("refresh:5; url = uploadc.php");
*/
mysqli_close($conn);
