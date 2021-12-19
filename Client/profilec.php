

<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: ../sign.html');
}

?>



<?php
include 'headerc.php';


$username = $_SESSION['username'];

$sql = "SELECT * FROM CLIENT WHERE username = '$username'";
$result = mysqli_query($conn, $sql) or die();

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result)
    
?>
    <section class="post-form">
        <h3> NAME : <?php echo $row['name'] ?></h3>
        <h3> E-MAIL : <?php echo $row['email'] ?> </h3>
        <h3> USERNAME : <?php echo $row['username'] ?></h3>
        <h3> NID : <?php echo $row['nid'] ?></h3>
        <h3> DOB : <?php echo $row['dob'] ?></h3>
        <h3> ADDRESS : <?php echo $row['address'] ?></h3>

        <!--
        <a href="editc.php">Edit</a>
        <a href="deletec.php">Delete Profile</a>
        <a href ="pending.php">Pending Orders </a>
        <a href ="logout.php"> LOG OUT </a>
        -->
    </section>
<?php } 
else {
    echo " No Profile";
}
mysqli_close($conn);
?>
</div>
</div>
</body>

</html>
