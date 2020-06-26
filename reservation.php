<?php
include_once "./includes/header.php";
?>

<main class="main-container">
    
    <h2 class="page-header">Make A Reservation</h2>
<!--collapse was found from https://getbootstrap.com/docs/3.4/javascript/#collapse -->
    <div class="container">        
        <button class="btn btn-sm" type="button" data-toggle="collapse" data-target="#reservation_map" aria-expanded="false" aria-controls="reservation_map">Bistro Layout</button>
        <div class="collapse" id="reservation_map"> <br>
        <div class = text-center>
        <img src="./img/reservation-map.jpg" class="d-block w-50" alt="Map of bistro" style="display: none">
        </div>
    </div>
    
    <form method="POST" action="" class="form-container mx-auto mb-4">

    <div class="form-group">
        <label for="Name">Name:</label>
        <input type="text" class="form-control" id="reservation_name" name = "reservation_name"> 
    </div>

    <div class="form-group">
        <label for="reservation_room">Choose a room:</label>
        <select name="reservation_rooms" class = "form-control">
          <option value="40seat">40 seat party room</option>
          <option value="newlywed">Newlywed Corner</option>
          <option value="15seat">15 seat party room</option>
         </select>
    </div>

    <div class="form-group">
        <label for="amount_of_people">Amount of people:</label>
        <input type="number" class="form-control" id="amount_of_people" max = "40"  name = "amount_of_people">
    </div>

    <div class="form-group">
        <label for="time_of_reservation">Time:</label>
        <input type="time" class="form-control" id="reservation_time" max = "40"  name = "reservation_time">
        <small>Time Format: 12:30 PM</small>
    </div>
    
    <div class="form-group">
        <label for="reservation_phonenumber">Phonenumber:</label>
        <input type="tel" class="form-control" id="reservation_phonenumber" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder = "123-456-7890" name = "reservation_phonenumber">
    </div>

    <div class="form-group">
        <label for="reservation_comment_ques">Additional comments & Questions:</label>
        <textarea type="text" class="form-control" id="reservation_questions_comments"  name = "reservation_questions_comments"></textarea>
    </div>

    <button class="btn btn-block btn-site-main" name="reservation-form" type="submit">Submit</button>
    </form>
</main>

<?php
include_once "./includes/footer.php";
?>