<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Main Dashboard </h1>
<div class="container mt-5">
    <h2>Welcome, <?php echo $_SESSION["user"]["name"]; ?>!</h2><br>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>
</body>
</html>
