<?php
include 'pre.php';

// $_SESSION['username'] = "Omi";

$username = $_SESSION['username'];

$sql = "SELECT * FROM PHOTOGRAPHER WHERE username = '$username'";
$result = mysqli_query($conn, $sql) or die();

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result)
?>

    <link rel="stylesheet" href="assets/css/new.css">
    <section class="profile">
        <img src="../uploads/<?php echo $row['img'] ?>" alt="No Image">
        <h2 class="bold" style=" font-size: 30px; text-align: center; margin-bottom: 40px;">About You</h2>

        <div style="margin-left: 30px;" class="text">

            <h3><b class="bold"> Name </b>: <?php echo $row['name'] ?></h3>
            <h3><b class="bold"> Email </b>: <?php echo $row['email'] ?> </h3>
            <h3><b class="bold"> Username </b>: <?php echo $row['username'] ?></h3>
            <h3><b class="bold"> NID </b>: <?php echo $row['nid'] ?></h3>
            <h3><b class="bold"> Date of Birth </b>: <?php echo $row['dob'] ?></h3>
            <h3> <b class="bold">Address </b>: <?php echo $row['address'] ?></h3>
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