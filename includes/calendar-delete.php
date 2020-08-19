<?php

if(isset($_POST["reservation_id"])){
    $connect = new PDO('mysql:host=localhost;dbname=reservations', 'root', '');
    $query = "DELETE FROM reservations WHERE reservation_id = :id";
    $statement = $connect -> prepare($query);

    $statement ->execute(
        array(
            ':id' => $_POST['reservation_id']
        )
    );
}