<?php

require "../../includes/dbConnect.php";

$json = file_get_contents("php://input");
$postObj = json_decode($json);

$stmt = mysqli_stmt_init($conn);
$sql = "UPDATE users SET isAdmin = ? WHERE user_id = ?;";

$isAdmin = $postObj->isAdmin;
$userId = $postObj->userId;

if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "ii", $isAdmin, $userId);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $success);

    mysqli_stmt_fetch($stmt);

    mysqli_stmt_close($stmt);
}

require "../../includes/dbDisconnect.php";

$response = array("type" => "SUCCESS");
header("Content-Type: application/json");
echo json_encode($response);
