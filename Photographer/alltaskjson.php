<?php
include 'pre.php';

// $_SESSION['username'] = "Omioooooo";

$username = $_SESSION['username'];

$sql = "SELECT img, task_details, task_status, client, feedback FROM TASK WHERE task_status <> 'waiting for respond' AND photographer = '$username'";
$result = mysqli_query($conn, $sql) or die();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $img = $row['img'];
        $task_details = $row['task_details'];
        $task_status = $row['task_status'];
        $client = $row['client'];
        $feedback = $row['feedback'];
        $tasks[] = array('img' => $img, 'task_details' => $task_details, 'task_status' => $task_status, 'client' => $client, 'feedback' => $feedback);
    }

    $response['tasks'] = $tasks;

    $fp = fopen('alltask.json', 'w');
    fwrite($fp, json_encode($response));
    fclose($fp);
?>
    <link rel="stylesheet" href="assets/css/new.css">

    <div id="main-content">
        <h2 style="text-align:center; margin-bottom: 30px">All Records</h2>
        <script>
            function showProfiles() {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    let data = JSON.parse(this.responseText);
                    var output = "";
                    for (var i = 0; i < 2; i++) {
                        // output +=
                        //     '<div class="main"><div class="image"><img height="100" weight="200" src="' +
                        //     user[i].avatar_url +
                        //     '"></div>';
                        // output += '<div class = "text">';
                        output += "<p>ID: " + data.taks[i].task_details + "</p>";
                        // output += "<p>Login: " + user[i].login + "</p>";
                        // output += "<p>URL: " + user[i].html_url + "</p>";
                        // output +=
                        //     "<p>Subscription: " +
                        //     user[i].subscriptions_url +
                        //     "</p></div></div>";
                    }
                    console.log(output);
                    document.getElementById("data").innerHTML = output;
                }
                xmlhttp.open("GET", "alltask.json", true);
                xmlhttp.send();
            }

            // function loadDoc() {
            //     const xmlhttp = new XMLHttpRequest();
            //     xmlhttp.onload = function() {
            //         let data = JSON.parse(this.responseText);
            //         document.getElementById("aboutInfo").innerHTML = data.about;
            //         document.getElementById("yrExpreience").innerHTML = data.yearExperience;
            //         document.getElementById("jobDone").innerHTML = data.jobDone;
            //         document.getElementById("completed_Event").innerHTML = data.completedEvent;
            //     }
            //     xmlhttp.open("GET", "alltask.json", true);
            //     xmlhttp.send();
            // }

            showProfiles();
        </script>
        <div id="data"></div>

    <?php } else {
    echo " No Task remaining";
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