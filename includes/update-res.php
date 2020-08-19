<?php

//update.php
require "dbConnect.php";

// // $connect = new PDO('mysql:host=localhost;dbname=cis431', 'root', '');
// $data = array(); // puts the data in an array
// //gets the dates from the reservations table
// // $query = "SELECT reservation_date FROM reservations ORDER BY cast(reservation_date as datetime) asc "; //found order by at https://stackoverflow.com/questions/1545888/sql-order-by-date-problem
// $query = "SELECT * FROM reservations ORDER BY reservation_id;";
// $results = mysqli_query($conn,$query);
// $resultCheck = mysqli_num_rows($results);

// if ($resultCheck > 0){
//     foreach($results as $row){ //get data from database
//         $data[] = array(
//             //gets the data and pushes it in variables
//             'id' => $row["reservation_id"],
//             'title' => $row['name'],
//             'start' => $row['start_event'],
//             'end' => $row['end_event'],
//         );
//     }
    
//     echo json_encode($data); //converts to a string and displays on calendar
// }



if(isset($_POST["reservation_id"]))
{

$result = mysqli_query($query);
$query = "UPDATE reservations SET name=:title, start_event=:start, end_event=:end WHERE reservation_id=:reservation_id;";
$results = mysqli_query($conn,$query);
//  $statement = $connect->prepare($query);
$resultCheck = mysqli_num_rows($results);
if ($resultCheck > 0){
    foreach($results as $row){ //get data from database
        $data[] = array(
            //gets the data and pushes it in variables
            'id' => $row["reservation_id"],
            'title' => $row['name'],
            'start' => $row['start_event'],
            'end' => $row['end_event'],
        );
    }
    
    echo json_encode($data); //converts to a string and displays on calendar
}
}

?>
