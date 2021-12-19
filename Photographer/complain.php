<?php include 'pre.php';


$_SESSION['username'] = "Omi";

$username = $_SESSION['username'];
?>
<link rel="stylesheet" href="assets/css/new.css">

<div id="main-content">
    <h2>Please fill up the following,</h2>

    <form class="post-form" action="complainProcess.php" method="post" enctype="multipart/form-data">

        <section class="form-group">
            <label> Complainee </label>
            <input type="text" name="complainee" placeholder="" required />
        </section>
        <section class="form-group">
            <label> Complain Details </label>
            <input type="text" name="details" placeholder="" required />
        </section>
        <input class="submit" type="submit" value="Submit" />
    </form>
</div>
</div>
</body>

</html>