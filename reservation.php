<?php
include_once "./includes/header.php";
?>

<main class="main-container">
    
    <h2 class="page-header">Make A Reservation</h2>
<!--collapse was found from https://getbootstrap.com/docs/3.4/javascript/#collapse -->
            
<div class="container space-buttons">
    <button class="btn btn-sm" type="button" data-toggle="collapse" data-target="#reservation_map" aria-expanded="false" aria-controls="reservation_map">Bistro Layout</button>
    
        <a href = "reservation_calendar.php" class="btn btn-sm" style = "text-align: right">Calendar View</a>
    <!-- </div> -->
        <div class="collapse" id="reservation_map"> <br>
                <div class="col">
                    <div class = text-center">
                        <img src="./img/reservation_map_2d.jpg" class="img-fluid" alt="Map of bistro"> 
                    </div>
                </div>
        </div>
</div>
<br>
<?php
            if (isset($_GET['error'])){ 
                if($_GET['error'] == "invalid_email"){
                   echo" <div class='alert alert-danger'>
                    <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                </div>";
                }
                else if ($_GET['error'] == "noTimetravelallowed"){
                    echo" <div class='alert alert-danger'>
                    <strong>Danger!</strong> You cannot time travel! Please select a date in the future.
                </div>";
                }
                else if ($_GET['error'] == "too_manypeople"){
                    echo" <div class='alert alert-danger'>
                    <strong>Danger!</strong> There are too many people in your party!
                </div>";
                }
            }
            else if(isset($_GET['reservation'])){
                if($_GET['reservation'] == "success"){
                echo"<div class='alert alert-success'>
                        <strong>Success!</strong> Your reservation has been made successfully!
                     </div>";
                    }
            }
           
?>
<form method="POST" action= "includes/reservation.inc.php" class="form-container mx-auto mb-4">
<!-- name -->
    <div class="form-group">
        <label for="reservation_name">Name:</label>
        <input type="text" class="form-control" id="reservation_name" name = "reservation_name" placeholder = "John Doe" required> 
        <small>Please Include First and Last</small>
    </div>
 <!-- email -->
    <div class="form-group">
        <label for="reservation_email">Email:</label>
        <input type="email" id="reservation_email" name="reservation_email" class = "form-control" placeholder="johndoe@example.com" required>
    </div>
<!-- choosing a room -->
    <div class="form-group">
        <label for="reservation_rooms">Choose a room:</label>
        <select name="reservation_rooms" id = "reservation_rooms" class = "form-control" required>
          <option value = "no_option">---</option>
          <?php
            require "./includes/dbConnect.php";

            $query = "SELECT room_id, room_name FROM rooms";
            $results = $conn-> query($query);

            while($row = $results->fetch_assoc()){
                echo "<option value = '{$row['room_id']}'>{$row["room_name"]}</option>";
            }
            //require "./includes/dbDisconnect.php";
          ?>
          <!-- <option value="40 seat">40 seat party room</option>
          <option value="newlywed">Newlywed Corner</option>
          <option value="15 seat">15 seat party room</option>-->
         </select>
    </div>
<!-- amount of people -->
    <div class="form-group">
        <label for="amount_of_people">Amount of people:</label>
        <input type="number" class="form-control" id="amount_of_people" max = "40" min = "1" name = "amount_of_people" required>
    </div>
<!-- time of reservation -->
    <div class="form-group">
        <label for="reservation_time">Time:</label>
        <input type="time" class="form-control" id="reservation_time" name = "reservation_time" min = "10:00" max = "22:00"  required>
        <small>Time Format: 12:30 PM</small>
    </div>
<!-- date -->
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="reservation_date" name = "reservation_date" required>
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
    <button class="btn btn-primary-color" name ="reservation_submit" type="submit">Submit</button>
    <input type = "reset" class="btn btn-danger">
    <a href = "reservation-manage.php">click</a>
    </form>
</main>

<?php
include_once "./includes/footer.php";
?>