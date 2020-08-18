<link rel="stylesheet" href="./css/main.css" />

<?php
include_once "./includes/header.php";
?>

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
    <input class="form-control" type="text" name="event_time" placeholder="Time when event begins" required>
    </BR>
    <input class="form-control" type="text" name="event_start_date" placeholder="Event start date" required>
    </BR>
    <input class="form-control" type="text" name="event_end_date" placeholder="Event end date" required>
    </BR>
    <button class="btn btn-site-main" type="submit" name="submit">Submit to Database</button>
    </div>
</form>
</div>
</main>

<?php
include_once "./includes/footer.php";
?>