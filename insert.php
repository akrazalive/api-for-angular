<?php
//header("Content-Type: application/json; charset=UTF-8");
/**
 * Returns the list of cars.
 */

require 'connect.php';
$data = json_decode(file_get_contents("php://input"));

// GEtting File Data


//get the file
$ori_fname=$_FILES['picture']['name'];

//get file extension
$ext = pathinfo($ori_fname, PATHINFO_EXTENSION);

//target folder
$target_path = "uploads/";

//replace special chars in the file name
$actual_fname=$_FILES['picture']['name'];
$actual_fname=preg_replace('/[^A-Za-z0-9\-]/', '', $actual_fname);

//set random unique name why because file name duplicate will replace
//the existing files
$modified_fname=uniqid(rand(10,200)).'-'.rand(1000,1000000).'-'.$actual_fname;

//set target file path
$target_path = $target_path . basename($modified_fname).".".$ext;
 
$result=array();

//move the file to target folder
if (move_uploaded_file($_FILES['picture']['tmp_name'], $target_path)) {

  $picture  = $target_path;

}
else{
  $picture = "NO fIoe uploaded";
}

// Gtting File Data



    $title = htmlspecialchars(trim($_POST['title']));
    $price = htmlspecialchars(trim($_POST['price']));
    $modelName = htmlspecialchars(trim($_POST['modelName']));
    $brand = htmlspecialchars(trim($_POST['brand']));
    $color = htmlspecialchars(trim($_POST['color']));
    $productType = htmlspecialchars(trim($_POST['productType']));

    $sql = "INSERT INTO cars (title,price,modelName,brand,color,productType,picture) VALUES('$title','$price','$modelName','$brand','$color','$productType','$picture')";
 

if($result = mysqli_query($con,$sql))
{  
  echo json_encode(['data'=>'Successfully inserted data to the table','fileuploadSuccess'=>$target_path]);
}
else
{
  http_response_code(404);
}
