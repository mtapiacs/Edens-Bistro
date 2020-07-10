<?php
include_once "./includes/header.php";

if (isset($_POST["register-form"])) {
    // $username = $_POST["username"];
    // $password = $_POST["password"];

    // $acceptedUsername = "ddec"; // TODO: Compare Against DB
    // $acceptedPassword = "password";

    // if ($username === $acceptedUsername && $password === $acceptedPassword) {
    //     session_start();
    //     $_SESSION["userId"] = $username; //* Would use user id
    //     header("Location: index.php");
    // } else {
    //     $error = array("message" => "Wrong Username Or Password!");
    // }
    $error = array("message" => var_dump($_POST));
}
?>

<main class="main-container">
    <h2 class="page-header">Register</h2>
    <form onsubmit="handleNextPage(event, 3)" method="POST" class="form-container mx-auto">
        <section id="sec-1">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input id="firstName" name="firstName" type="text" class="form-control" placeholder="John" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input id="lastName" name="lastName" type="text" class="form-control" placeholder="Doe" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="johndoe@example.com" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input id="phone" name="phone" type="tel" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="50" placeholder="e.g. 555-555-5555" required>
            </div>
            <div class="form-group d-flex justify-content-between mt-2">
                <button type="button" onclick="handleLastPage(1)" class="btn btn-danger btn-inv">Clear</button>
                <button type="button" onclick="handleNextPage(event, 1)" class="btn btn-primary">Next</button>
            </div>
        </section>

        <section id="sec-2" style="display:none;">
            <div class="form-group">
                <label for="addressLineMain">Address 1</label>
                <input class="form-control" type="text" name="addressLineMain" id="addressLineMain" required>
            </div>
            <div class="form-group">
                <label for="addressLineSecondary">Address 2</label>
                <input class="form-control" type="text" name="addressLineSecondary" id="addressLineSecondary">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input class="form-control" type="text" name="city" id="city" required>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input class="form-control" type="text" name="state" id="state" required>
            </div>
            <div class="form-group">
                <label for="zip">Zip</label>
                <input class="form-control" type="text" pattern="[0-9]{5}" name="zip" id="zip" required>
            </div>
            <div class="form-group d-flex justify-content-between mt-2">
                <button type="button" onclick="handleLastPage(2)" class="btn btn-danger">Clear</button>
                <button type="button" onclick="handleNextPage(event, 2)" class="btn btn-primary">Next</button>
            </div>
        </section>

        <section id="sec-3" style="display:none;">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" required>
            </div>
            <div class="form-group d-flex justify-content-between mt-2">
                <button type="button" onclick="handleLastPage(3)" class="btn btn-danger">Clear</button>
                <button type="submit" class="btn btn-primary" name="register-form" id="register-btn">Register</button>
            </div>
        </section>
        <div id="alert-box" class="alert alert-danger mt-4" role="alert" style="display:none;">
            This is a primary alert—check it out!
        </div>
        <?php
        if (isset($error)) {
            echo "<div class='alert alert-danger notice' role='alert'>{$error['message']}</div>";
        }
        ?>
    </form>

</main>

<?php
include_once "./includes/footer.php";
?>