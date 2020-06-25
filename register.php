<?php
include_once "./includes/header.php";
?>

<main class="main-container">
    <h2 class="page-header">Register</h2>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" class="form-container mx-auto">
        <section id="register-person">
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
        </section>

        <section id="register-address">
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
            </div>
        </section>

        <section id="register-password">
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" required>
            </div>
        </section>
    </form>
</main>

<?php
include_once "./includes/footer.php";
?>