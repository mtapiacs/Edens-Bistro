<?php
include_once "./includes/header.php";
?>

<main class="main-container">
    <h2 class="page-header">Register</h2>
    <div class="form-container mx-auto">
        <section id="sec-1">
            <form onsubmit="handleNextPage(event, 1)" method="POST">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input id="firstName" name="firstName" type="text" class="form-control" placeholder="John" minlength="1" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input id="lastName" name="lastName" type="text" class="form-control" placeholder="Doe" minlength="1" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" class="form-control" placeholder="johndoe@example.com" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input onfocusout="parseInput('PHONE')" id="phone" name="phone" type="tel" title="555-555-5555" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12" placeholder="e.g. 555-555-5555" required>
                </div>
                <div class="form-group d-flex justify-content-between mt-2">
                    <button type="button" onclick="handleLastPage(1)" class="btn btn-site-main btn-inv">Back</button>
                    <button type="submit" class="btn btn-site-main">Next</button>
                </div>
            </form>
        </section>

        <section id="sec-2" style="display:none;">
            <form onsubmit="handleNextPage(event, 2)" method="POST">
                <div class="form-group">
                    <label for="addressLineMain">Address 1</label>
                    <input class="form-control" type="text" name="addressLineMain" id="addressLineMain" placeholder="200 Manor Avenue" required>
                </div>
                <div class="form-group">
                    <label for="addressLineSecondary">Address 2</label>
                    <input class="form-control" type="text" name="addressLineSecondary" id="addressLineSecondary" placeholder="Apt. C3">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input class="form-control" type="text" name="city" id="city" placeholder="Langhorne" required>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input class="form-control" type="text" name="state" id="state" placeholder="PA" required>
                </div>
                <div class="form-group">
                    <label for="zip">Zip</label>
                    <input class="form-control" type="text" pattern="[0-9]{5}" name="zip" id="zip" placeholder="19047" required>
                </div>
                <div class="form-group d-flex justify-content-between mt-2">
                    <button type="button" onclick="handleLastPage(2)" class="btn btn-site-main">Back</button>
                    <button type="submit" class="btn btn-site-main">Next</button>
                </div>
            </form>
        </section>

        <section id="sec-3" style="display:none;">
            <form onsubmit="handleNextPage(event, 3)" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username" pattern="^[a-z0-9]{3,16}$" title="Letters and numbers only" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" pattern="(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$" title="1 lowercase letter, 1 uppercase letter, 1 number, and be at least 8 characters long" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input onfocusout="checkPasswordMatch()" class="form-control" type="password" name="confirmPassword" id="confirmPassword" pattern="(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$" title="1 lowercase letter, 1 uppercase letter, 1 number, and be at least 8 characters long and must match password" required>
                </div>
                <div class="form-group d-flex justify-content-between mt-2">
                    <button type="button" onclick="handleLastPage(3)" class="btn btn-site-main">Back</button>
                    <button type="submit" class="btn btn-site-main" name="register-form" id="register-btn">Register</button>
                </div>
            </form>
        </section>

        <div id="alert-box" class="alert alert-danger mt-4" role="alert" style="display:none;">
            This is a primary alert—check it out!
        </div>
    </div>
</main>

<?php
include_once "./includes/footer.php";
?>