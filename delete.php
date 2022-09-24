<?php
//header("Content-Type: application/json; charset=UTF-8");
/**
 * Returns the list of cars.
 */


require 'connect.php';
$data = json_decode(file_get_contents("php://input"));

// Gtting File Data
    $id = htmlspecialchars(trim($_GET['id']));

    $sql = "DELETE FROM cars WHERE id='$id'";


if($result = mysqli_query($con,$sql))
{  
  echo json_encode(['data'=>'Successfully updated data to the table']);
}
else
{
  http_response_code(404);
}
