<?php
if(isset($_POST['reservation_submit'])){
    require "dbConnect.php";
    $name = $_POST['reservation_name'];
    $email = $_POST['reservation_email'];
    $room = $_POST['reservation_rooms'];
    $num_people = $_POST['amount_of_people'];
    $time = $_POST['reservation_time'];
    $phonenum = $_POST['reservation_phonenumber'];
    $comments = $_POST['reservation_questions_comments'];

echo "$name , $email, $room, $num_people, $time, $phonenum, $comments";
}

?>