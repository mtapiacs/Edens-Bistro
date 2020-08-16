<?php

$isAdminPage = true;

include_once "./includes/header.php";
require "./includes/isAuthenticated.php";

?>

<main class="main-container">
    <h2 class="page-header mb-4">Manage Register</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Is Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require "./includes/dbConnect.php";

                $sql = "SELECT user_id, first_name, last_name, email, username, isAdmin FROM users ORDER BY last_name;";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $rowNum = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $isChecked = $row['isAdmin'] ?  true : false;
                        if ($isChecked) {
                            $checkInput = "<input onclick='changeAdminStatus(event);' type='checkbox' name='isAdmin' value='{$row['user_id']}' checked='checked'>";
                        } else {
                            $checkInput = "<input onclick='changeAdminStatus(event);' type='checkbox' name='isAdmin' value='{$row['user_id']}'>";
                        }
                        echo "<tr>
                            <th scope='row'>$rowNum</th>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['username']}</td>
                            <td>$checkInput</td>
                        </tr>";
                        $rowNum++;
                    }
                } else {
                    echo "0 Results";
                }

                require "./includes/dbDisconnect.php";
                ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include_once "./includes/footer.php";
?>