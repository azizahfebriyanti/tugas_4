<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login.php');
    exit;
}

require_once '../controllers/GuestController.php';

$guestController = new GuestController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $guest = $guestController->getGuestById($id);
} else {
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars($_POST['comment']);
    if ($guestController->updateGuest($id, $name, $comment)) {
        header('Location: dashboard.php');
        exit;
    } else {
        echo "<div class='error'>Error updating guest information.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Guest</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Edit Guest Entry</h2>
    <form method="POST" action="edit.php?id=<?php echo $id; ?>">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($guest['name']); ?>" required>

        <label for="comment">Comment</label>
        <textarea id="comment" name="comment" required><?php echo htmlspecialchars($guest['comment']); ?></textarea>

        <input type="submit" value="Update">
    </form>

    <p><a href="dashboard.php">Back to Dashboard</a></p>
</body>
</html>
