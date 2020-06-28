<?php
include_once "./includes/header.php";
?>

<main class="main-container">
    
    <h2 class="page-header">Make A Reservation</h2>
<!--collapse was found from https://getbootstrap.com/docs/3.4/javascript/#collapse -->
    <!-- <div class="container">        
        <button class="btn btn-sm" type="button" data-toggle="collapse" data-target="#reservation_map" aria-expanded="false" aria-controls="reservation_map">Bistro Layout</button>
            <div class="collapse" id="reservation_map"> <br>
                <div class = text-center>
                 <img src="./img/reservation_map_3d.jpg" class="d-block w-50" alt="Map of bistro" style="display: none">
                 <img src="./img/reservation-map.jpg" class="d-block w-50" alt="Map of bistro" style="display: none">
                </div>
            </div>
    </div> -->

<div class="container">
<button class="btn btn-sm" type="button" data-toggle="collapse" data-target="#reservation_map" aria-expanded="false" aria-controls="reservation_map">Bistro Layout</button>
    <div class="collapse" id="reservation_map"> <br>
        <div class="row">
            <div class="col">
                <img src="./img/reservation_map_3d.jpg" class="d-block w-50" alt="Map of bistro" style="display: none">
            </div>
            <div class="col">
                <img src="./img/reservation_map_2d.jpg" class="d-block w-50" alt="Map of bistro" style="display: none">
                <img src="./img/reservation-map.jpg" class="d-block w-50" alt="Map of bistro" style="display: none">
            </div>
        </div>
    </div>
</div>

    <form method="POST" action="" class="form-container mx-auto mb-4">
<!-- name -->
    <div class="form-group">
        <label for="reservation_name">Name:</label>
        <input type="text" class="form-control" id="reservation_name" name = "reservation_name" placeholder = "John Doe" required> 
    </div>
 <!-- email -->
    <div class="form-group">
        <label for="reservation_email">Email:</label>
        <input type="email" id="reservation_email" name="reservation_email" class = "form-control" placeholder="johndoe@example.com" required>
    </div>
<!-- choosing a room -->
    <div class="form-group">
        <label for="reservation_room">Choose a room:</label>
        <select name="reservation_rooms" id = "reservation_rooms" class = "form-control" required>
          <option value="---">---</option>
          <option value="40seat">40 seat party room</option>
          <option value="newlywed">Newlywed Corner</option>
          <option value="15seat">15 seat party room</option>
         </select>
    </div>
<!-- amount of people -->
    <div class="form-group">
        <label for="amount_of_people">Amount of people:</label>
        <input type="number" class="form-control" id="amount_of_people" max = "40"  name = "amount_of_people" required>
    </div>
<!-- time of reservation -->
    <div class="form-group">
        <label for="reservation_time">Time:</label>
        <input type="time" class="form-control" id="reservation_time" name = "reservation_time" min = "10:00" max = "22:00"  required>
        <small>Time Format: 12:30 PM</small>
    </div>
<!-- phonenumber -->
    <div class="form-group">
        <label for="reservation_phonenumber">Phone Number:</label>
        <input type="tel" class="form-control" id="reservation_phonenumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder = "e.g. 555-555-5555" name = "reservation_phonenumber" required>
    </div>
<!-- comments/questions -->
    <div class="form-group">
        <label for="reservation_comment_ques">Additional Comments & Questions:</label>
        <textarea type="text" class="form-control" id="reservation_questions_comments"  name = "reservation_questions_comments"></textarea>
    </div>
<!-- submit -->
    <button class="btn btn-block btn-site-main" name="reservation-form" type="submit">Submit</button>
    </form>
</main>

<?php
include_once "./includes/footer.php";
?>