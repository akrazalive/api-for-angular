<?php
header("Access-Control-Allow-Methods: *");

/**
 * Returns the list of cars.
 */
require 'connect.php';
    
$cars = [];
$sql = "SELECT * FROM cars";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $cars[$cr]['id']    = $row['id'];
    $cars[$cr]['title'] = $row['title'];
    $cars[$cr]['picture'] = $row['picture'];
    $cars[$cr]['price'] = $row['price'];
    $cars[$cr]['brand'] = $row['brand'];
    $cars[$cr]['modelName'] = $row['modelName'];
    $cars[$cr]['productType'] = $row['productType'];
    $cars[$cr]['color'] = $row['color'];
    $cr++;
  }
    
  echo json_encode(['data'=>$cars]);
}
else
{
  http_response_code(404);
}