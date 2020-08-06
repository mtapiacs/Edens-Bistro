<?php
include "dbConfig.php";

//$connect = new PDO("mysql:host=localhost;dbname=calendar", "root",''); //connection pdo

$data = array(); // puts the data in an array
//gets the dates from the reservations table
// $query = "SELECT reservation_date FROM reservations ORDER BY cast(reservation_date as datetime) asc "; //found order by at https://stackoverflow.com/questions/1545888/sql-order-by-date-problem
$query = "SELECT * FROM events ORDER BY id;";
$results = mysqli_query($conn,$query);
$resultCheck = mysqli_num_rows($results);

if ($resultCheck > 0){
    foreach($results as $row){ //get data from database
        $data[] = array(
            //gets the data and pushes it in variables
            'id' => $row["id"],
            'title' => $row['title'],
            'start' => $row['start_event'],
            'end' => $row['end_event'],
        );
    }
    echo json_encode($data); //converts to a string and displays on calendar
}