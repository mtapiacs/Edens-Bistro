<link rel="stylesheet" href="./css/main.css" />

<?php
include_once "./includes/header.php";
?>
<!--Allows admin user to create a new event-->
<main class="main-container">
<h2 class="page-header">Add an Event</h2>
</BR>
<div class="form-container mx-auto">
<form action="formSubmission.php" method="POST">
    <div class="form-group">
    <input class="form-control" type="text" name="event_name" placeholder="Event Name" required>
    </BR>  
    <input class="form-control" type="text" name="event_desc" placeholder="Event Description" required>
    </BR>
    <input class="form-control" type="time" name="event_time" placeholder="Time when event begins" required>
    </BR>
    <input class="form-control" type="date" name="event_start_date" placeholder="Event start date" required>
    </BR>
    <input class="form-control" type="date" name="event_end_date" placeholder="Event end date" required>
    </BR>
    <button class="btn btn-site-main" type="submit" name="submit">Create Event</button>
    </div>
</form>
</div>
</main>
<!--Allows admin user to edit an event-->
<!--
<main class="main-container">
<h2 class="page-header">Alter an Event</h2>
</BR>
<div class="form-container mx-auto">
<form action="formSubmission.php" method="POST">
    <div class="form-group">
    <input class="form-control" type="text" name="event_name" placeholder="Event Name" required>
    </BR>  
    <input class="form-control" type="text" name="event_desc" placeholder="Event Description" required>
    </BR>
    <input class="form-control" type="time" name="event_time" placeholder="Time when event begins" required>
    </BR>
    <input class="form-control" type="date" name="event_start_date" placeholder="Event start date" required>
    </BR>
    <input class="form-control" type="date" name="event_end_date" placeholder="Event end date" required>
    </BR>
    <button class="btn btn-site-main" type="submit" name="submit-edit">Edit Event</button>
    </div>
</form>
</div>
</main> -->
<!--Allows admin user to delete an event-->
<main class="main-container">
<h2 class="page-header">Remove an Event</h2>
</BR>
<div class="form-container mx-auto">
<form action="formSubmission.php" method="POST">
    <div class="form-group">
    <input class="form-control" type="text" name="event_name" placeholder="Event Name" required>
    </BR>  
    <input class="form-control" type="text" name="event_desc" placeholder="Event Description" required>
    </BR>
    <input class="form-control" type="time" name="event_time" placeholder="Time when event begins" required>
    </BR>
    <input class="form-control" type="date" name="event_start_date" placeholder="Event start date" required>
    </BR>
    <input class="form-control" type="date" name="event_end_date" placeholder="Event end date" required>
    </BR>
    <button class="btn btn-site-main" type="submit" name="submit-remove">Remove Event</button>
    </div>
</form>
</div>
</main>

<?php
include_once "./includes/footer.php";
?>