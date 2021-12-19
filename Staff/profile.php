<?php
include 'pre.php';

// $_SESSION['username'] = "staff1";

$username = $_SESSION['username'];

$sql = "SELECT * FROM staff WHERE username = '$username'";
$result = mysqli_query($conn, $sql) or die();

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result)
?>

    <link rel="stylesheet" href="assets/css/new.css">
    <section class="profile">
        <img src="../uploads/<?php echo $row['img'] ?>" alt="No Image">
        <div class="text">
            <h2 style=" text-align: center; margin-bottom: 20px;">About You</h2>

            <h3><b> Name </b>: <?php echo $row['name'] ?></h3>
            <h3><b> Email </b>: <?php echo $row['email'] ?> </h3>
            <h3><b> Username </b>: <?php echo $row['username'] ?></h3>
            <h3><b> NID </b>: <?php echo $row['nid'] ?></h3>
            <h3><b> Date of Birth </b>: <?php echo $row['dob'] ?></h3>
            <h3> <b>Address </b>: <?php echo $row['address'] ?></h3>
        </div>



    </section>
<?php } else {
    echo " No Profile";
}
mysqli_close($conn);
?>
<!-- </div>
</div>
</body>

</html> -->

</section>
</main>

<!--========== MAIN JS ==========-->
<script src="assets/js/main.js">
    // function setProfilePic(address) {

    // }
</script>

</body>

</html>