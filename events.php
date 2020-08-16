<link rel="stylesheet" href="./css/main.css" />
<?php
include_once "./includes/header.php";
?>

<main class="main-container">
    <h2 class="page-header">Events</h2>
</main>

<?php
include_once "./includes/dbConnect.php";
?>



<h1>All Events</h1>

<div class="main-container">

<form action="search.php" method="POST">
  <input type="text" name="search" placeholder="Search">
  <button type="submit" name="submit-search">Search</button>
</form>

</BR>

  <?php
    $sql = "SELECT * FROM events";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

    if ($queryResults > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='events-box'>
          <h3>".$row['event_name']."</h3>
          <p>".$row['event_desc']."</p>
          <p>Begins at ".$row['event_time']."</p>
          Starts:
          <p>".$row['event_start_date']."</p>
          Ends:
          <p>".$row['event_end_date']."</p>
        </div>";
      }
    }
  ?>
</div>

<?php
/*$q = "SELECT event_name, event_desc FROM events;";
$result = $conn->query($q);
if ($result !== false) {
    //print "We got some results.";
    print "<SELECT id=\"event_name, event_desc\">";
    while ($row = $result->fetch_assoc()) {
        print "<OPTION value=\"{$row['event_name']}\"> {$row['event_name']}</OPTION>\r\n";
    }
    print "<SELECT>";
    //print "<SELECT id\"event_desc\">";
} else {
    print $link->error;
}*/
?>

<?php
include_once "./includes/footer.php";
?>