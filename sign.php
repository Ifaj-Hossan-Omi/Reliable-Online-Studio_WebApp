<?php

session_start();
$flag = 0;
$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $formIdentifier = $_POST['formIdentifier'];
  if ($formIdentifier == "signin") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * from client where username ='$username' && password='$password' ";


    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);


    if ($num == 1) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];
      header('location:Client/profilec.php');
    }
    $sql = "SELECT * from photographer where username ='$username' && password='$password' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];
      header('location:Photographer/profile.php');
    }
    $sql = "SELECT * from staff where username ='$username' && password='$password' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];
      header('location:Staff/profile.php');
    } else {
      $flag = 1;
    }
  } else {
    $name = $_POST['name'];
    $email = strtolower($_POST['email']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nid = $_POST['nid'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $type = $_POST['type'];



    $img_name = $_FILES['img']['name'];
    $img_size = $_FILES['img']['size'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $error = $_FILES['img']['error'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_exs = array("jpg", "jpeg", "png");
    if (in_array($img_ex_lc, $allowed_exs)) {
      $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
      $img_upload_path = 'uploads/' . $new_img_name;
      move_uploaded_file($tmp_name, $img_upload_path);
    } else {
      echo "Can't uploads this type of image";
      header("refresh:1; url = sign.php");
      // header("Location: signup.php?error=$em");

      die();
    }


    $conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");

    $sql = "SELECT * FROM {$type} WHERE email = '$email' or username = '$username'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // echo "Email or username already exist";
      $flag = 2;
    } else {
      $sql = "INSERT INTO {$type}(img, name, email, username, password, nid, dob, address) values('{$new_img_name}','{$name}','{$email}', '{$username}','{$password}','{$nid}', '{$dob}', '{$address}')";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
      // echo "Now you are a member of ROS!!";
      header("refresh:0; url = sign.php");

      mysqli_close($conn);
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="sign.css" />
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/png" />

  <title>Signin/Signup</title>
</head>

<body>
  <script>
    function ValidateRegistration() {
      let flag = true;

      var password = document.getElementById("pass").value;
      document.getElementById("errorEmail").innerHTML = "";
      document.getElementById("errorPass").innerHTML = "";

      if (password.length < 8) {
        document.getElementById("errorPass").innerHTML = "Password Must be 8 character long";
        // return false;
        flag = false;
      }

      var email = document.getElementById("em").value;
      var atposition = email.indexOf("@");
      var dotposition = email.lastIndexOf(".");
      if (
        atposition < 1 ||
        dotposition < atposition + 2 ||
        dotposition + 2 >= email.length
      ) {
        // alert("Please enter a valid e-mail address!!");
        document.getElementById("errorEmail").innerHTML = "Please enter a valid e-mail address";
        // return false;
        flag = false;
      }
      if (flag == false) {
        return false;
      }
      return true;
    }
  </script>
  <div class="main-container <?PHP
                              if ($flag == 2) {
                                echo "sign-up-mode";
                              }
                              ?>">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="sign.php" method="post" enctype="multipart/form-data" class="sign-in-form">
          <input type="hidden" name="formIdentifier" value="signin" />

          <h2 class="title">Sign in</h2>
          <p style="color: red">
            <?PHP
            if ($flag == 1) {
              echo "Wrong username or password";
            }
            ?>

          </p>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="username" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Enter your password" required />
          </div>
          <input type="submit" value="Login" class="btn solid" />
        </form>
        <form class="sign-up-form" action="sign.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateRegistration()">
          <h2 class="title">Sign up</h2>
          <p id="errorName" style="color: red">
            <?PHP
            if ($flag == 2) {
              echo "Email or Username already exists";
            }
            ?>
          </p>
          <input type="hidden" name="formIdentifier" value="signup" />

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="name" placeholder="Name" required />
          </div>

          <p id="errorEmail" style="color: red"></p>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input id="em" type="text" name="email" placeholder="Email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-at"></i>
            <input type="text" name="username" placeholder="Username" required />
          </div>
          <p id="errorPass" style="color: red"></p>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input id="pass" type="password" name="password" placeholder="Password" required />
          </div>
          <div class="input-field">
            <i class="fas fa-address-card"></i>
            <input type="number" name="nid" placeholder="Nid" required />
          </div>
          <div class="input-field">
            <i class="fas fa-calendar-alt"></i>
            <input type="date" name="dob" placeholder="Date of Birth" required />
          </div>
          <div class="input-field">
            <i class="fas fa-map-marked-alt"></i>
            <input type="text" name="address" placeholder="Enter your address" required />
          </div>
          <div class="selection-panel">
            <h4>I am a..</h4>

            <input type="radio" name="type" value="client" required />
            <label for="html">Client</label>
            <input type="radio" name="type" value="photographer" required />
            <label for="html">Photographer</label>
          </div>

          <div class="image-select">
            <div>
              <label>Select your image : </label>
            </div>
            <div>
              <input type="file" name="img" />
            </div>
          </div>

          <input type="submit" class="btn" value="Sign up" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>
          <button class="btn btn-dark" id="sign-up-btn">Sign up</button>
        </div>
        <img src="img/logpic.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>
          <button class="btn btn-dark" id="sign-in-btn">Sign in</button>
        </div>
        <img src="img/regpic.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="sign.js">

  </script>
</body>

</html>