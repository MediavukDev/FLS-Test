<?php 
include '../connection/connection-OOP.php';

$userData = mysqli_query($con,"SELECT * FROM laschentable");

$response = array();

while($row = mysqli_fetch_array($userData)){

   $response[] = $row;
}

echo json_encode($response);
exit;



?>fls_shop_test