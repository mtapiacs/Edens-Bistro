<?php
//used https://www.codeandcourse.com/how-to-connect-html-register-form-to-mysql-database-with-php/ as a refrence for inserting
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
    // $sql = "INSERT INTO reservations (name, email, room, num_people,reservation_time, reservation_date,phone_number,comments_questions)
    // VALUES ('dan','dan@gmail.com',$room,'40','02:30:PM','2021-02-02','7186982707','test');";

    //  $sql = "INSERT INTO reservations (name, email, room, num_people,reservation_time, reservation_date,phone_number,comments_questions)
    //         VALUES ('$name','$email',$room,'$num_people','$time','$date','$phonenum','$comments');";
    
    if(empty($name) || empty($email) || empty($room) || empty($num_people) || empty($time) || empty($date) || empty($phonenum)){ //if there are empty inputs
        header("Location: ../reservation.php?error=emptyinputs");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../reservation.php?error=invalid_email"); //if there is an incorrect
        exit(); 
    }
    else if($date < "2020-08-04"){
        header("Location: ../reservation.php?error=noTimetravelallowed"); //if there is a past date
        exit(); 
    }
    else if($room === 1 && $num_people > 40){
        header("Location: ../reservation.php?error=too_manypeople"); //if there is too many people
        exit(); 
    }
    else if($room === 2 && $num_people > 6){
        header("Location: ../reservation.php?error=too_manypeople");
        exit(); 
    }
    else if($room === 3 && $num_people > 15){
        header("Location: ../reservation.php?error=too_manypeople");
        exit(); 
    }
    else{
        //when a reservation has the same room date and time
        $sql = "SELECT reservation_time, reservation_date FROM reservations WHERE reservation_time = ? AND reservation_date = ? AND room = ? ;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../reservation.php?error=sqlerror");
            exit();  
        }
        else{
           mysqli_stmt_bind_param($stmt,"ssi",$time,$date,$room);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $results = mysqli_stmt_num_rows($stmt);

           if($results > 0){
            header("Location: ../reservation.php?error=reservationtaken");
            exit();
           }
           else{

            $sql = "INSERT INTO reservations (name, email, room, num_people, reservation_time, reservation_date,phone_number,comments_questions) values(?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location ../reservation.php?error=?sqlerror");
                exit();
            }  
            else{
                mysqli_stmt_bind_param($stmt, "ssisssss",$name, $email, $room, $num_people, $time, $date,$phonenum,$comments); //inserts the values in the DB using the sql variable
                mysqli_stmt_execute($stmt);
                // echo mysqli_stmt_error($stmt);
                header("Location: ../reservation.php?reservation=success");
            exit();
            }            
            
           }
        }
    }
    mysqli_stmt_close($stmt); //closes the statment and the DB connection
    include "dbDisconnect.php";
//part of reservation email if eden had its own server...found at https://www.youtube.com/watch?v=wUkKCMEYj9M&t=559s
    // $reciever = $email;

    // $subject = "Eden's Bistro Reservation Confirmation";

    // $message .= "<p>Eden's Bistro has recieved that you have made a reservation for our cafe.</p><br>";

    // $message .= "Below is your reservation information.";

    // $message .= 'Name: '.$name.'Email: '.$email. 'Room: '.$room. 'Number of People: '.$num_people.'Time: '.$time.'Date: '.$date.'Phone Number: '.$phonenum.'Comments/Questions: '.$comments;

    // $headers = "From: Edens_Bistro <edenbistromanhattanrc@gmail.com>\r\n";
    // $headers .= "Reply-To: edenbistromanhattanrc@gmail.com\r\n";
    // $headers .= "Content-type: text/html\r\n";

    // mail($reciver, $subject, $message, $headers);

    // header("Location: ../reservation.php?reservation=success");
//debug for making sure form values are taken    
//echo "$name , $email, $room, $num_people, $time, $date, $phonenum, $comments";
}
else{
    header("Location: ../reservation.php");
    exit();
}