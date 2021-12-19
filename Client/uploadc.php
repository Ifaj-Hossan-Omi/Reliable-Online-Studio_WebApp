<?php include 'headerc.php';
session_start();


if(isset($_SESSION['username'])){


}
else{

    header('location: ../sign.html');
}


$username = $_SESSION['username'];

    /*
    $details=$detailsErr="";

    $check=0;

    if (empty($_POST["details"])) {
        $detailsErr = "Details is required";
    } 
    else {
        $details = test_input($_POST["details"]);
    //validating alphabet
    if (!preg_match("/^([A-Za-z0-9,. ]{8,}$)/",$details)) {
      $detailsErr = "Contain a-z, A-Z  and at least 8 charactars";
    }
    else
      $check++;
      //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
    }



    if($check==0){

        header('Location:uploadprocessc.php');

    }*/

?>




<h2>Please upload your order file</h2>

<form class="post-form" action="uploadprocessc.php" method="post" enctype="multipart/form-data">
    <section class="form-group">

        <label>Details : </label>
        <input type="text" name="details" id="details" onkeyup="detailsVal()"><br>
        <span class="error" name="detailsErr" id="detailsErr"></span><br>

        <label>Select your image : </label>
        <input type="file" name="img">
    </section>
    <div id="button">
        
    </div>
</form>

</div>
</body>

<script type="text/javascript" src="javascript/EditJavascript.js"></script>

</html>