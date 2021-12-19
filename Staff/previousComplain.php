<?php
include 'pre.php';

// $_SESSION['username'] = "Omioooooo";

$username = $_SESSION['username'];

$sql = "SELECT complain_to, details, complain_status, reply FROM complain WHERE complain_status <> 'waiting'";
$result = mysqli_query($conn, $sql) or die();

if (mysqli_num_rows($result) > 0) {
?>
    <link rel="stylesheet" href="assets/css/new.css">

    <div id="main-content">
        <h2 style="text-align:center; margin-bottom: 30px">All Previous Complains</h2>


        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="main">
                <div class="text">
                    <p>Complain To: <?php echo $row['complain_to'] ?></p>
                    <p>Details: <?php echo $row['details'] ?></p>
                    <p>Complain Status: <?php echo $row['complain_status'] ?></p>
                    <p>Reply: <?php echo $row['reply'] ?></p>
                </div>
            </div>


        <?php } ?>
    </div>
<?php } else {
?>
    <link rel="stylesheet" href="assets/css/new.css">
    <div class="NoTask">
        <i class='bx bx-check-circle'></i>
        <h2> No Complain remaining </h2>
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