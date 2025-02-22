<?php
require_once "User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($user->login($email, $password)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Login and Registration Using OOP in PHP and MySQL</h1>
<div class="container mt-5">
    <h2>Login</h2>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <p class="mt-3">Don't have an account? <a href="register.php">Register</a></p>
    </form>
</div>
</body>
</html>
