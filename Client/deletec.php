




<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: ../sign.html');
}

?>




<?php include 'headerc.php'; ?>


<div id="main-content">
    <h2>Are you sure you want to delete your account?</h2>
    <a href="deleteprocessc.php">Yes</a>
    <a href="profilec.php">No</a>

</div>
</div>
</body>

</html>