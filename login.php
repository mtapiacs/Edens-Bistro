<?php
include_once "./includes/header.php";

$registered = isset($_GET["registered"]) ? true : false;

if (isset($_POST["login-form"])) {
    $u_in = $_POST["username"];
    $p_in = $_POST["password"];

    require "./includes/dbConnect.php";

    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, "SELECT user_id, email, username, password FROM users WHERE email = ? OR username = ?;")) {
        mysqli_stmt_bind_param($stmt, "ss", $u_in, $u_in);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $user_id, $email, $username, $password);

        mysqli_stmt_fetch($stmt);

        mysqli_stmt_close($stmt);
    }

    require "./includes/dbDisconnect.php";

    $p_hashed = password_hash($p_in, PASSWORD_DEFAULT);
    if (($u_in === $email || $u_in === $username) && ($p_hashed === $password)) {
        session_start();
        $_SESSION["userId"] = $user_id;
        header("Location: index.php");
    } else {
        $error = array("message" => "Wrong Username Or Password!", "wrongUsername" => $username, "wrongPassword" => $password);
    }
}
?>
<main class="main-container">
    <h2 class="page-header">Login</h2>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" class="form-container mx-auto mb-4">
        <div class="form-group">
            <label for="username">Username</label>
            <input value="<?php echo isset($error) ? $error["wrongUsername"] : '' ?>" id="username" name="username" type="text" class="form-control" placeholder="johndoe" required />
        </div>
        <div class="form-group mb-4">
            <label for="password">Password</label>
            <input value="<?php echo isset($error) ? $error["wrongPassword"] : '' ?>" id="password" name="password" type="password" class="form-control" placeholder="*********" required />
        </div>
        <button class="btn btn-block btn-site-main" name="login-form" type="submit">Login</button>
    </form>
    <?php
    echo $registered ? "<div class='alert alert-dark notice' role='alert'>Sign in with registered values</div>" : "";

    if (isset($error)) {
        echo "<div class='alert alert-danger notice' role='alert'>{$error['message']}</div>";
    }
    ?>
</main>

<?php
include_once "./includes/footer.php";
?>