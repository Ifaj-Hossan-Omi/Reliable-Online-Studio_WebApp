<?php
include 'pre.php';

// $_SESSION['username'] = "Omi";

$username = $_SESSION['username'];

$sql = "SELECT * FROM `client`";
$result = mysqli_query($conn, $sql) or die();

if (mysqli_num_rows($result) > 0) {
?>
    <link rel="stylesheet" href="assets/css/new.css">

    <div id="main-content">
        <h2 style="text-align:center; margin-bottom: 30px">All Client</h2>


        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="main">
                <div class="image">
                    <img height="100px" weight="200px" src="../uploads/<?PHP echo $row['img'] ?>">
                </div>
                <div class="text">
                    <h3><b> Name </b>: <?php echo $row['name'] ?></h3>
                    <h3><b> Email </b>: <?php echo $row['email'] ?> </h3>
                    <h3><b> Username </b>: <?php echo $row['username'] ?></h3>
                    <h3><b> NID </b>: <?php echo $row['nid'] ?></h3>
                    <h3><b> Date of Birth </b>: <?php echo $row['dob'] ?></h3>
                    <h3> <b>Address </b>: <?php echo $row['address'] ?></h3>
                </div>
            </div>


        <?php } ?>
    </div>
<?php } else {
?>
    <link rel="stylesheet" href="assets/css/new.css">
    <div class="NoTask">
        <i class='bx bx-check-circle'></i>
        <h2> No Task remaining </h2>
    </div>

<?php
}
mysqli_close($conn);
?>
</section>
</main>

<!--========== MAIN JS ==========-->
<script src="assets/js/main.js">

</script>

</body>

</html>