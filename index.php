<?php
session_start();
require_once 'config/Database.php';
require_once 'models/Guest.php';

$db = new Database();
$conn = $db->connect();
$guest = new Guest($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars($_POST['comment']);
    
    if ($guest->addGuest($name, $comment)) {
        echo "<div class='success'>Thank you for signing our guestbook!</div>";
    } else {
        echo "<div class='error'>Error submitting your entry. Please try again.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guestbook</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Guestbook</h2>
    <form method="POST" action="index.php">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" required>

        <label for="comment">Your Message</label>
        <textarea id="comment" name="comment" required></textarea>

        <input type="submit" value="Submit">
    </form>

    <h3>Admin?</h3>
    <h4><a href="login.php">Login as Admin</a></h4>
</body>
</html>
