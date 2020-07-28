<?php
if(isset($_POST['reservation_submit'])){

    include_once "dbConnect.php";

    $name = $_POST['reservation_name'];
    $email = $_POST['reservation_email'];
    $room = $_POST['reservation_rooms'];
    $num_people = $_POST['amount_of_people'];
    $time = $_POST['reservation_time'];
    $date = $_POST['reservation_date'];
    $phonenum = $_POST['reservation_phonenumber'];
    $comments = $_POST['reservation_questions_comments'];

    //$sql = "INSERT INTO rooms(`room_name`, `room_desc`, `room_capacity`) VALUES ($room,'description',$num_people);";
    
     $sql = "INSERT INTO reservations (name, email, room, num_people,reservation_time, reservation_date,phone_number,comments_questions)
            VALUES ($name,$email,$room,$num_people,$time,$date,$phonenum,$comments);";"
            )";
    mysqli_query($conn, $sql);
    //mysqli_query($conn, $sql2);

    header("Location: ../reservation.php?reservation=success");

//echo "$name , $email, $room, $num_people, $time, $date, $phonenum, $comments";
}

?>