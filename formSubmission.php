<link rel="stylesheet" href="./css/main.css" />

<?php
include_once "./includes/header.php";
?>

<?php
include_once "./includes/dbConnect.php";
?>

<main class="main-container">
<?php
if(isset($_POST['submit'])) {
    $event_name = $_POST['event_name'];
    $event_desc = $_POST['event_desc'];
    $event_time = $_POST['event_time'];
    $event_start_date = $_POST['event_start_date'];
    $event_end_date = $_POST['event_end_date'];

    $sql = "INSERT INTO events (event_name, event_desc, event_time, event_start_date, event_end_date) VALUES ('$event_name', '$event_desc', '$event_time', '$event_start_date', '$event_end_date')";

    //$result = mysqli_query($conn, $sql);

    if (mysqli_query($conn, $sql) === TRUE) {
        echo "New event created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    //echo $result;
    //echo "Event added succesfully to database.";
    //echo $event_name, $event_desc, $event_time, $event_start_date, $event_end_date;
} else {
    echo "There was a problemo.";
}
?>

<a href = "events-manage.php">Return to Add Event</a>

</main>
<?php
include_once "./includes/footer.php";
?>