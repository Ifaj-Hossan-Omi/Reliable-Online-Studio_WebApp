<?php
include 'pre.php';


// $_SESSION['username'] = "Omioooooo";

$username = $_SESSION['username'];

$sql = "SELECT id,img, task_details, task_status, client FROM TASK WHERE task_status = 'waiting for respond' AND photographer = '$username'";
$result = mysqli_query($conn, $sql) or die();

if (mysqli_num_rows($result) > 0) {
?>
    <link rel="stylesheet" href="assets/css/new.css">

    <div id="main-content">
        <h2 style="color: black; font-size: 40px; margin-bottom: 40px;" class=" mainHeading">All Orders</h2>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="main">
                <div class="image">
                    <img height="100px" weight="200px" src="../uploads/<?php echo $row['img'] ?>">
                </div>
                <div class="text">
                    <p><b class="bold">Task Details:</b> <?php echo $row['task_details'] ?></p>
                    <p><b class="bold">Task Status:</b> <?php echo $row['task_status'] ?></p>
                    <p><b class="bold">Client Name:</b> <?php echo $row['client'] ?></p>
                    <a class="btnSmall" href='accept.php?id=<?php echo $row['id'] ?>'>Accept</a>
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

<?php }

mysqli_close($conn);
?>
</div>
</div>
</body>

</html>