<?php 
include '../connection/connect-select-OOP.php';


$request = $_GET['request'];

// Fetch Countries
if($request == 'country'){

  $result = mysqli_query($con,"SELECT DISTINCT * FROM country");

  $response = array();
  while($row = mysqli_fetch_assoc($result)){
    $id                = $row['id'];
    $name_skole        = trim($row['name_skole'], 1234567890);
    // $Schule     = $row['Schule'];
    // $school_id  = $row['school_id'];

    $response[] = array("id"=>$id,"name_skole"=>$name_skole);
  }

  echo json_encode($response);
  exit;
}


// Fetch States of a Country
if($request == 'school'){
  $country  = $_GET['country_id'];
  $result   = mysqli_query($con,"SELECT * FROM school WHERE country_id = '$country'" );

  $response = array();
  while($row = mysqli_fetch_assoc($result)){
    $id         = $row['id'];
    $school     = trim($row['school'], 1234567890);
    $country_id = $row['country_id'];

    $response[] = array("id"=>$id,"school"=>$school,"country_id"=>$country_id);
  }
  
  echo json_encode($response);
  exit;
}

var_dump($country, $result, $response);


// switch ($_GET['request']) {
//     case 'country':
//         $sql = "SELECT * FROM skole";
//         break;

//     $countryCase = $_GET['country'];
//     var_dump($countryCase);
//     case 'school':
//         $sql = "SELECT * FROM skole WHERE school_id = $countryCase";
//         break;
     
//     default:
//         break;
// }

// $result = $con->query($sql);

// $response = [];
// while($row = mysqli_fetch_assoc($result)){
//     $response[] = array( 
//                         "Id"        =>$row['Id'], 
//                         "PLZ"       =>trim($row['PLZ'], 1234567890), 
//                         "school_id" =>$row['school_id'], 
//                         "Schule"    =>$row['Schule']
//                     );
// }

// echo json_encode($response);

?>