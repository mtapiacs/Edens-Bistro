<?php

$json = file_get_contents("php://input");
$postObj = json_decode($json);

//$itemId = $_GET["itemID"];
$itemId = $postObj -> itemId;
$itemName = $postObj -> itemName;
$itemPrice = $postObj -> itemPrice;
$itemDesc = $postObj -> itemDesc;
$itemCategory = $postObj -> item_category;

require "./includes/dbConnect.php";

 if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

$query = "SELECT ?, ?, ?, ? FROM menu WHERE item_category = ?";

$stmt = mysqli_stmt_init($conn);

//Prepare statement
if(mysqli_stmt_prepare($stmt, $query)){
   //Bind parameters to statement
   mysqli_stmt_bind_param($stmt, "sssss", $item_id, $item_name, $item_desc, $item_price, $item_cateogry);
   //Run parameters inside database
   $data = mysqli_stmt_execute($stmt);
   
   if($data === false) {
      header('Content-type: application/json');
      echo json_encode(array("message" => "FAIL"));
   } else {
      header('Content-type: application/json');
      echo json_encode(array("message" => "SUCCESS", "id" => $item_id, "name" => $item_name, "desc" => $item_desc, "price" => $item_price, "category" => $item_category));
   }
   
   break;
   
   mysqli_stmt_close($stmt);
}

require "./includes/dbDisconnect.php";







