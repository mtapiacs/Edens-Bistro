<link rel="stylesheet" href="./css/main.css" />

<?php
  include_once "./includes/header.php";
?>

<main class="main-container">
  <h2 class="page-header">Events</h2>

<?php
  include_once "./includes/dbConnect.php";
?>

<!--Creates search bar-->
<form action="search.php" method="POST">
  <div class="row">
    <div class="col-11">
      <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
    </div>
    <div class="col-1">
      <button class="btn btn-site-main" type="submit" name="submit-search">Search</button>
    </div>
  </div>
</form>

</BR>
<!--Queries the DB to return all of the events-->
<div class="form-container mx-auto">
  <?php
    $sql = "SELECT * FROM events";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

    //Used bootstrap for the Card CSS
    if ($queryResults > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo 
        "<div class='card mx-auto' style='width: 18rem;' >
          <div class='card-body'>
            <h5 class='card-title'>".$row['event_name']."</h5>
              <h6 class='card-subtitle mb-2 text-muted'>".$row['event_start_date']."</h6>
                <p class='card-text'>".$row['event_desc']."</p>
                  Starts:
                    <p>".$row['event_start_date']."</p>
                  At:
                    <p>".$row['event_time']."</p>
                  Ends:
                    <p>".$row['event_end_date']."</p>
        </div>
        </div>";
        ?> </br> <?php
      }
    }
  ?>
  </div>
</main>

<?php
  include_once "./includes/dbDisconnect.php";
?>

<?php
include_once "./includes/footer.php";
?>