<?php
session_start();
require_once 'config/Database.php';
require_once 'models/Admin.php';

$db = new Database();
$conn = $db->connect();
$admin = new Admin($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    if ($admin->login($username, $password)) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin/dashboard.php');
        exit;
    } else {
        echo "<div class='error'>Invalid login credentials. Try again.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Admin Login</h2>
    <form method="POST" action="login.php">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</body>
</html>
