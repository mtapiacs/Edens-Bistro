<?php
include_once "./includes/header.php";
?>

<h1>
    <center>Login</center>
</h1>
<main>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <input id="username" name="username" type="text" required />
        <input id="password" name="password" type="password" required />
        <button name="login-form" type="submit">Login</button>
    </form>
    <?php
    if (isset($_POST["login-form"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $acceptedUsername = "ddec";
        $acceptedPassword = "password";

        if ($username === $acceptedUsername && $password === $acceptedPassword) {
            session_start();
            $_SESSION["userId"] = $username; //* Would use user id
            header("Location: index.php");
        } else {
            echo "No dice";
        }
    }
    ?>
</main>

<?php
include_once "./includes/footer.php";
?>