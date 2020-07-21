<?php
if(isset($_POST['reservation_submit'])){

    include_once "dbConnect.php";

    $name = $_POST['reservation_name'];
    $email = $_POST['reservation_email'];
    $room = $_POST['reservation_rooms'];
    $num_people = $_POST['amount_of_people'];
    $date = $_POST['reservation_date'];
    $time = $_POST['reservation_time'];
    $phonenum = $_POST['reservation_phonenumber'];
    $comments = $_POST['reservation_questions_comments'];

    $sql = "INSERT INTO reservations (`reservation_id`,`name`, `email`, `room`, `num_people`,`reservation_date`,`reservation_time`,`phone_number`,`comments_questions`)
            VALUES ('$name','$email','$room','$num_people','$date','$time','$phonenum','$comments');";
    mysqli_query($conn, $sql);

    header("Location: ../reservation.php?reservation=success");







// echo "$name , $email, $room, $num_people, $time,$date, $phonenum, $comments";
}

?>