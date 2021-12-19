<?php include 'pre.php';

// $_SESSION['username'] = "Omioooooo";

$username = $_SESSION['username'];

?>

<div id="main-content">
    <h2>Update Profile</h2>

    <?php

    $sql = "SELECT * FROM staff WHERE username = '$username'";
    $result = mysqli_query($conn, $sql) or die();


    // if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <link rel="stylesheet" href="assets/css/new.css">
        <script>
            function ValidateRegistration() {
                var password = document.getElementById("pass").value;

                if (password.length < 8) {
                    alert("Password must be at least 4 characters long.");
                    return false;
                }

                var email = document.getElementById("em").value;
                var atposition = email.indexOf("@");
                var dotposition = email.lastIndexOf(".");
                if (
                    atposition < 1 ||
                    dotposition < atposition + 2 ||
                    dotposition + 2 >= email.length
                ) {
                    alert("Please enter a valid e-mail address!!");
                    return false;
                }
            }
        </script>


        <form class="post-form" action="editprocess.php" method="post" onsubmit="return ValidateRegistration()">

            <section class="form-group">
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />

                <label> Name </label>
                <input type="text" name="name" value="<?php echo $row['name'] ?>" required />
            </section>
            <section class="form-group">
                <label> Email </label>
                <input id="em" type="text" name="email" value="<?php echo $row['email'] ?>" required />
            </section>
            <section class="form-group">
                <br>
                <label>Password</label>
                <input id="pass" type="password" name="password" value="<?php echo $row['password'] ?>" required />
            </section>
            <section class="form-group">
                <label>NID</label>
                <input type="number" name="nid" value="<?php echo $row['nid'] ?>" required />
            </section>
            <section class="form-group">
                <label>Date of birth</label>
                <input type="text" name="dob" value="<?php echo $row['dob'] ?>" required />
            </section>
            <section class="form-group">
                <label>Address</label>
                <input type="text" name="address" value="<?php echo $row['address'] ?>" required />
            </section>
            <input class="submit" type="submit" value="Update" />
        </form>

    <?php
        // }
    } ?>


    </section>
    </main>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/main.js">
        // function setProfilePic(address) {

        // }
    </script>

    </body>

    </html>