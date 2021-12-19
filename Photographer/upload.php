<?php include 'pre.php';

// $_SESSION['username'] = "Omioooooo";

$username = $_SESSION['username'];

?>

<link rel="stylesheet" href="assets/css/new.css">

<h2>Please upload your file</h2>

<form class="post-form" action="uploadprocess.php" method="post" enctype="multipart/form-data">
    <section class="form-group">
        <label>Select your image : </label>
        <input class="btn" type="file" name="img">
    </section>
    <input class="submit btn" type="submit" value="Upload" />
</form>

</section>
</main>

<!--========== MAIN JS ==========-->
<script src="assets/js/main.js">
    // function setProfilePic(address) {

    // }
</script>

</body>

</html>