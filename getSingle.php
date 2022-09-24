<?php
//header("Content-Type: application/json; charset=UTF-8");
/**
 * Returns the list of cars.
 */

require 'connect.php';
$id =  $_GET['id'];

$sql = "SELECT * FROM cars where id=$id";
 

if($result = mysqli_query($con,$sql))
{  
  
$row= mysqli_fetch_assoc($result);

    $id = htmlspecialchars(trim($row['id']));
    $title = htmlspecialchars(trim($row['title']));
    $price = htmlspecialchars(trim($row['price']));
    $modelName = htmlspecialchars(trim($row['modelName']));
    $brand = htmlspecialchars(trim($row['brand']));
    $color = htmlspecialchars(trim($row['color']));
    $productType = htmlspecialchars(trim($row['productType']));
    $picture = htmlspecialchars(trim($row['picture']));

    $data = array('id'=>$id,
    'title'=>$title,
    'price'=>$price,
    'color'=>$color,
    'brand'=>$brand,
    'modelName'=>$modelName,
    'productType'=>$productType,
    'picture'=>$picture);


  echo json_encode(['data'=>$data]);
}
else
{
  http_response_code(404);
}
