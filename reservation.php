<?php
include_once "./includes/header.php";
?>
<h2 class = "reservation">Make A Reservation</h2>

<div class = "reservation_form">
    <form method = "POST" action = "">
        <label class = "reservatrion_labels">Name:</label>
        <input type = "text" name = "registration_name"><br><br>
        
        <label class = "reservation_labels">Choose a room:</label>
            <select name = "reservation_rooms">
            <option value = "40seat">40 seat party room</option>
            <option value = "newlywed">Newlywed Corner</option>
            <option value = "15seat">15 seat party room</option>
            </select> <br> <br>

        <label class = "reservation_labels">Number of People:<label>
        <input type = "number" name = "amount_people"> <br> <br>

        <label class = "reservation_labels">Time:<label>
        <input type = "time" name = "time_reservation"> <br> <br>

        <label class = "reservation_labels">Phone Number:<label>
        <input type = "tel" name = "reservation_phone_number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"> <br> <br>

        <label class = "reservation_labels">Additional Instructions:<label>
        <input type = "textarea" name = "time_reservation"> <br> <br>

        <button type = "submit" value = "registration_submit" name = "registration_submit" >Submit</button>
    </form>
</div>

<?php
include_once "./includes/footer.php";
?>