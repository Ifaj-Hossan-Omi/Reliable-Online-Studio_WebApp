
<?php 

require_once 'db_connect.php';




function showUsers($username){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `client` where username = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
        //echo "success";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}








