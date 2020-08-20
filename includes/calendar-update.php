<?php
// $connect = new PDO('mysql:host=localhost;dbname=manhattanrc', 'root', '');
$connect = new PDO("mysql:host=localhost;dbname=manhattanrc", "dd288",'DanielDeCarlo'); //connection

if(isset($_POST["reservation_id"])){
    $query = "UPDATE reservations SET name =:name, start_event = :start_event, end_event = :end_event WHERE reservation_id = :id"; //query to update table when adjustments are made to calendar
    $statement = $connect ->prepare($query); //prepares the query

    $statement -> execute( //executes the query
        array(
            ':name' => $_POST['name'], //fills in the data with the info from ajax in index when adjusted
            ':start_event' => $_POST['start_event'],
            ':end_event' => $_POST['end_event'],
            ':id' => $_POST['reservation_id'],
        )
    );
}
