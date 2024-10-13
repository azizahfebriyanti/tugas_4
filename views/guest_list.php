<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
<h3>Guests List</h3>
<table>
    <tr>
        <th>Name</th>
        <th>Comment</th>
        <th>Time</th>
    </tr>
    <?php foreach ($guests as $guest): ?>
        <tr>
            <td><?php echo htmlspecialchars($guest['name']); ?></td>
            <td><?php echo htmlspecialchars($guest['comment']); ?></td>
            <td><?php echo htmlspecialchars($guest['created_at']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Pagination -->
<?php if ($totalPages > 1): ?>
    <div>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
<?php endif; ?>
