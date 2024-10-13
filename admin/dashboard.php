<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login.php');
    exit;
}

require_once '../config/Database.php';
require_once '../models/Guest.php';

$db = new Database();
$conn = $db->connect();
$guest = new Guest($conn);
$guest_list = $guest->getGuests();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Admin Dashboard</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($guest_list as $guest): ?>
            <tr>
                <td><?php echo $guest['id']; ?></td>
                <td><?php echo htmlspecialchars($guest['name']); ?></td>
                <td><?php echo htmlspecialchars($guest['comment']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $guest['id']; ?>">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
