<?php include 'headerc.php';

session_start();


if(isset($_SESSION['username'])){


}
else{

    header('location: ../sign.html');
}


$username = $_SESSION['username'];

?>

<?php
    require_once 'controller/readData.php';
    $users = fetchUsers($username);
?>



<?php

    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr =$birthdate=  $passwordErr=$addressErr =$nidErr=  $usernameErr = "";

    $name = $email = $gender = $birthdateErr =$password =$address= $nid=$username = "";

    $check=0;

    //echo "test";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {



      
      
      //name validation//name validation//name validation
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } 
      else {
        $name = test_input($_POST["name"]);
        //validating alphabet
        if (!preg_match("/^([A-Za-z0-9,. ]{8,}$)/",$name)) {
          $nameErr = "Contain a-z, A-Z  and at least 8 charactars";
        }
        else
          $check++;
          //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
      }




      //email validation//email validation//email validation
    
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } 
      else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Must be a valid email_address : anything@example.Com";
        }
        else
          $check++;
      }
      



      //password validation//password validation//password validation

      if(empty($_POST["password"])){
        $passwordErr=" Must need to fill password";
      }else
        $password=test_input($_POST["password"]);


      if (!preg_match("/^[0-9a-zA-Z@%#$]{8,}$/",$password)) {
            $passwordErr = "Minimum (8) characters need  one special characters (@, #, $, %)";

      }else
          $check++; 



    //nid validation//nid validation//nid validation
    
      if (empty($_POST["nid"])) {
        $nidErr = "Nid is required";
      } 
      else 
        $nid = test_input($_POST["nid"]);

        
    if (!preg_match("/^([0-9])+$/",$nid)) {
        $nidErr = "Please enter  integer numbers";
      }
      else
        $check++;



      




    //date validation 
      if(empty($_POST["birthdate"])){
        $birthdateErr = " select up year, month, date ";
      }
      else{
        $birthdate = test_input($_POST["birthdate"]);
        $check++;
      }



    //address validation//address validation//address validation
    /*
      if (empty($_POST["address"])) {
        $addressErr = "Address is required";
      } 
      else 
        $address = test_input($_POST["address"]);

        
    if (!preg_match("/^([A-Za-z,. ]{4,}$)/",$nid)) {
        $addressErr = "Please enter  Only alphabet and atleast 4 characters";
      }
      else
        $check++;
      
*/


      //form changing 
      if ($check == 5) {
            $_SESSION['id']=$_REQUEST['id'];

            $_SESSION['name']=$_REQUEST['name'];
            $_SESSION['email']=$_REQUEST['email'];
            $_SESSION['password']=$_REQUEST['password'];
            $_SESSION['dob']=$_REQUEST['birthdate'];
            $_SESSION['nid']=$_REQUEST['nid'];
            $_SESSION['address']=$_REQUEST['address'];

            header('location:editprocessc.php');
      }
  }
  

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>













<div id="main-content">
    <h2>Update Profile</h2>



    <form class="post-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

            <section class="form-group">
                <input type="hidden" name="id" value="<?php echo $users['id'] ?>" >

                <label> Name </label>
                <input type="text" name="name" value="<?php echo $users['name'] ?>" id="name" onkeyup="nameVal()">
                <span class="error" id="nameErr"><?php echo $nameErr;?></span>
            </section>
            <section class="form-group">
                <label> Email </label>
                <input type="text" name="email" value="<?php echo $users['email'] ?>" id="email" onkeyup="emailVal()" >
                <span class="error" id="emailErr"><?php echo $emailErr;?></span>
            </section>
            <section class="form-group">
                <br>
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $users['password'] ?>" id="password" onkeyup="passVal()" >
                <span class="error" id="passwordErr"><?php echo $passwordErr;?></span>
            </section>
            <section class="form-group">
                <label>NID</label>
                <input  name="nid" value="<?php echo $users['nid'] ?>" id="nid" onkeydown="nidVal()" >
                <span class="error" name="nidErr" id="nidErr"><?php echo $nidErr;?></span>
            </section>
            <section class="form-group">
                <label>Date of birth</label>
                <input type="date" name="birthdate" value="<?php echo date("Y-m-d", strtotime($users['dob'])); ?>" id="birthdate" onkeyup="dateVal()">
                <span class="error" name="birthdateErr" id="birthdateErr" ><?php echo $birthdateErr;?></span>
            </section>
            <section class="form-group">
                <label>Address</label>
                <input type="text" name="address" value="<?php echo $users['address'] ?>" id="address" onkeyup="addressVal()">
                <span class="error" name="addressErr" id="addressErr"><?php echo $addressErr;?></span>
            </section>
            <input class="submit" type="submit" value="Update" />
        </form>


</div>
</div>
</body>

<script type="text/javascript" src="javascript/EditJavascript.js"></script>

</html>