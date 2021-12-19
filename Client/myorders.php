






<?php
include 'headerc.php';

session_start();


if(isset($_SESSION['username'])){


}
else{

    header('location: ../sign.html');
}




//task_status <> 'waiting for respond' AND

$username = $_SESSION['username'];

 ?>


<body onload="getAllTask()">


    <div id="main-content">
        Search <input type="text" name="search" id="search"  onkeyup ="showResultTask(this.value)">
        <h2>All Records</h2>
         
        <div id="taskList">
        
        </div>
    
</div>
</div>


</body>

<script type="text/javascript" src="javascript/ajax.js"></script>

</html>