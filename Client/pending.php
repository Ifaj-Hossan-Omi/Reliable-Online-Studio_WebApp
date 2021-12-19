<?php
include 'headerc.php';

session_start();


if(isset($_SESSION['username'])){


}
else{

    header('location: ../sign.html');
}


$username = $_SESSION['username'];





$sql = "SELECT task_details, task_status, photographer, feedback FROM TASK WHERE task_status = 'waiting for respond' AND client = '".$username."'";
$result = mysqli_query($conn, $sql) or die();

if (mysqli_num_rows($result) > 0) {

?>
    <div id="main-content">
        <h2>All Pending Records</h2>
        <table cellpadding="7px">
            <thead>
                <th>Task Details</th>
                <th>Task Status</th>
                <th>Photographer username</th>
                <th>Feedback</th>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['task_details'] ?></td>
                        <td><?php echo $row['task_status'] ?></td>
                        <td><?php echo $row['photographer'] ?></td>
                        <td><?php echo $row['feedback'] ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    <?php } else {
    echo " No Order Pending remaining";
}
mysqli_close($conn);
    ?>
    </div>
    </div>
    </body>

    </html>