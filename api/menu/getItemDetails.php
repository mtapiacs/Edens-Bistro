<?php

// Sources: https://webdamn.com/create-simple-rest-api-with-php-mysql/
// Sources: https://www.allphptricks.com/create-and-consume-simple-rest-api-in-php/

$json = file_get_contents("php://input");
$postObj = json_decode($json);

$itemId = $_GET["itemId"];

if (isset($itemId) && $itemId != "") {
    require "../../includes/dbConnect.php";

    $query = 'SELECT item_id, item_name, item_desc, item_price FROM menu WHERE item_id = ?;';

    $stmt = mysqli_stmt_init($conn);

    //Prepare statement
    if (!mysqli_stmt_prepare($stmt, $query)) {
        print "Failed to prepare statement \n";
    } else {
        //Bind parameters to statement
        mysqli_stmt_bind_param($stmt, "i", $itemId);

        //Run parameters inside database
        $data = mysqli_stmt_execute($stmt);

        if ($data === false) {
            header('Content-type: application/json');
            echo json_encode(array("message" => "FAIL"));
        } else {
            $result = mysqli_stmt_get_result($stmt);

            $itemDetails = mysqli_fetch_array($result);
            $response = array("id" => $itemDetails['item_id'], "name" => $itemDetails['item_name'], "desc" => $itemDetails['item_desc'], "price" => $itemDetails['item_price']);

            header('Content-type: application/json');
            echo json_encode($response);
        }

        mysqli_stmt_close($stmt);
    }
} else {
    $response = array("message" => "FAIL", "reason" => "No item id provided");
    header("Content-Type: application/json");
    echo json_encode($response);
}

require "../../includes/dbDisconnect.php";
