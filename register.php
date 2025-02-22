<?php
require_once "user.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

     if ($user->register($name, $email, $password)) {
     echo "<script>
        alert('User registration successfully created!');
        window.location.href = 'index.php';
    </script>";
    exit();
    } else {
        $error = "Registration failed!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Register User Account</h1>
<div class="container mt-5">
    <h2>Register</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <p class="mt-3">Already have an account? <a href="index.php">Login</a></p>
    </form>
</div>
</body>
</html>
