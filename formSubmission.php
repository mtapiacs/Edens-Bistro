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
        echo "New event created successfully.";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    //echo $result;
    //echo "Event added succesfully to database.";
    //echo $event_name, $event_desc, $event_time, $event_start_date, $event_end_date;
}
?>

<?php
/*if(isset($_POST['submit-edit'])) {
    $event_name = $_POST['event_name'];
    $event_desc = $_POST['event_desc'];
    $event_time = $_POST['event_time'];
    $event_start_date = $_POST['event_start_date'];
    $event_end_date = $_POST['event_end_date'];

    $sql = "ALTER TABLE events (event_name, event_desc, event_time, event_start_date, event_end_date) VALUES ('$event_name', '$event_desc', '$event_time', '$event_start_date', '$event_end_date')";

    //$result = mysqli_query($conn, $sql);

    if (mysqli_query($conn, $sql) === TRUE) {
        echo "Event altered successfully.";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    //echo $result;
    //echo "Event added succesfully to database.";
    //echo $event_name, $event_desc, $event_time, $event_start_date, $event_end_date;
}*/
?>

<?php
if(isset($_POST['submit-remove'])) {
    $event_name = $_POST['event_name'];
    $event_desc = $_POST['event_desc'];
    $event_time = $_POST['event_time'];
    $event_start_date = $_POST['event_start_date'];
    $event_end_date = $_POST['event_end_date'];

    $sql = "DELETE FROM events WHERE (event_name, event_desc, event_time, event_start_date, event_end_date) = ('$event_name', '$event_desc', '$event_time', '$event_start_date', '$event_end_date')";

    //$result = mysqli_query($conn, $sql);

    if (mysqli_query($conn, $sql) === TRUE) {
        echo "Event altered successfully.";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    //echo $result;
    //echo "Event added succesfully to database.";
    //echo $event_name, $event_desc, $event_time, $event_start_date, $event_end_date;
}
?>

<a href = "events-manage.php">Return Event manage page.</a>

</main>

<?php
  include_once "./includes/dbDisconnect.php";
?>

<?php
include_once "./includes/footer.php";
?>