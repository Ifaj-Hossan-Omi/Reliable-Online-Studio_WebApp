<?php
include 'pre.php';

// $_SESSION['username'] = "Omioooooo";

$username = $_SESSION['username'];

$sql = "SELECT * FROM `complain` where complain_status = 'waiting'";
$result = mysqli_query($conn, $sql) or die();

if (mysqli_num_rows($result) > 0) {
?>
    <link rel="stylesheet" href="assets/css/new.css">

    <div id="main-content">
        <h2 style="text-align:center; margin-bottom: 30px">All Task</h2>


        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="main">
                <div class="text">
                    <p>Complain By:<?php echo $row['complain_by'] ?></p>
                    <p>Complain To:<?php echo $row['complain_to'] ?></p>
                    <p>Details: <?php echo $row['details'] ?></p>
                    <p>Complain Status: <?php echo $row['complain_status'] ?></p>
                    <a class="btnSmall" href='accept.php?id=<?php echo $row['id'] ?>'>Take Action</a>
                    <a class="btnSmall" href='reject.php?id=<?php echo $row['id'] ?>'>Reject</a>
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