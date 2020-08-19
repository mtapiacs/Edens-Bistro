<?php

require "../../includes/dbConnect.php";

$json = file_get_contents("php://input");
$postObj = json_decode($json);

$itemId = $postObj->itemId;
$itemName = $postObj->itemName;
$itemDesc = $postObj->itemDesc;
$itemPrice = $postObj->itemPrice;
$itemTakeOut = $postObj->itemTakeout;
$itemCategory = $postObj->itemCategory;
$itemRemove = $postObj->itemRemove;

$sqlUpdate = "UPDATE menu SET item_name = ?, item_desc = ?, item_price = ?, take_out = ?, item_category = ? WHERE item_id = ?;";
$sqlDelete = "DELETE FROM menu WHERE item_id = ?;";
$sql = $itemRemove ? $sqlDelete : $sqlUpdate;

$stmt = mysqli_stmt_init($conn);
if (mysqli_stmt_prepare($stmt, $sql)) {
    if ($itemRemove) {
        mysqli_stmt_bind_param($stmt, "i", $itemId);
    } else {
        mysqli_stmt_bind_param($stmt, "ssdsii", $itemName, $itemDesc, $itemPrice, $itemTakeOut, $itemCategory, $itemId);
    }

    mysqli_stmt_execute($stmt);

    mysqli_stmt_fetch($stmt);

    mysqli_stmt_close($stmt);
}

$response = array("type" => "SUCCESS");
header("Content-Type: application/json");
echo json_encode($response);


require "../../includes/dbDisconnect.php";
