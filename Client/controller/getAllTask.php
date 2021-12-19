
<?php  

session_start();

$username = $_SESSION['username'];

$conn = mysqli_connect("localhost", "root", "", "ROS") or die("Connection Failed");


$sql = "SELECT task_details, task_status, client, feedback FROM TASK WHERE  client = '$username'";
$result = mysqli_query($conn, $sql) or die();

if (mysqli_num_rows($result) > 0) {

?>  



    <div id="main-content">
        <div id="taskList">
        <table cellpadding="7px">
            <thead>
                <th>Task Details</th>
                <th>Task Status</th>
                <th>Feed Back</th>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['task_details'] ?></td>
                        <td><?php echo $row['task_status'] ?></td>
                        <td><?php echo $row['feedback'] ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
        </div>
    <?php } else {
    echo " No Task remaining";
}
mysqli_close($conn);
?>
</div>
</div>



