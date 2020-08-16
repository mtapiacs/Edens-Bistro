<?php

// Sources: https://webdamn.com/create-simple-rest-api-with-php-mysql/
// Sources: https://www.allphptricks.com/create-and-consume-simple-rest-api-in-php/

$json = file_get_contents("php://input");
$postObj = json_decode($json);
$itemId = $_GET["item_id"];

if(isset($itemId) && $itemId != "") {
   require "./includes/dbConnect.php";
   
   if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
   }
   
   $itemId = $postObj -> item_id;
   $itemName = $postObj -> item_name;
   $itemPrice = $postObj -> item_price;
   $itemDesc = $postObj -> item_desc;

   $query = 'SELECT item_id, item_name, item_desc, item_price from menu WHERE item_id = $itemId';
   
   $stmt = mysqli_stmt_init($conn);
   
   //Prepare statement
   if(mysqli_stmt_prepare($stmt, $query)){
      //Bind parameters to statement
      mysqli_stmt_bind_param($stmt, "sssss", $itemId, $itemName, $itemPrice, $itemDesc);
      //Run parameters inside database
      $data = mysqli_stmt_execute($stmt);
   
      if($data === false) {
         header('Content-type: application/json');
         echo json_encode(array("message" => "FAIL"));
      } else {
         header('Content-type: application/json');
         echo json_encode(array("message" => "SUCCESS", "id" => $itemId, "name" => $itemName, "desc" => $itemDesc, "price" => $itemPrice));
      }
      
      mysqli_stmt_close($stmt);
      
   }
}

require "./includes/dbDisconnect.php";

?>






 