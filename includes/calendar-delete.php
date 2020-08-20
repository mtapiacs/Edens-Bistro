<?php

if(isset($_POST["reservation_id"])){
    $connect = new PDO('mysql:host=localhost;dbname=manhattanrc', 'root', '');
    // include "dbConnect.php";
    $query = "DELETE FROM reservations WHERE reservation_id = :reservation_id";
    $statement = $connect -> prepare($query);

    $statement ->execute(
        array(
            ':reservation_id' => $_POST['reservation_id']
        )
    );
}