<?php if (!empty($guests)): ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Comment</th>
        </tr>
        <?php foreach ($guests as $guest): ?>
            <tr>
                <td><?php echo htmlspecialchars($guest['name']); ?></td>
                <td><?php echo htmlspecialchars($guest['comment']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No guests found.</p>
<?php endif; ?>
