<?php require_once 'app/views/templates/headerPrivate.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4">Admin Reports</h2>

    <h4 class="mb-3">All Reminders</h4>
    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>User ID</th><th>Subject</th><th>Created</th></tr>
        </thead>
        <tbody>
            <?php foreach ($data['allReminders'] as $r): ?>
                <tr>
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['user_id'] ?></td>
                    <td><?= htmlspecialchars($r['subject']) ?></td>
                    <td><?= $r['created_at'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h4 class="mt-5">User with Most Reminders</h4>
    <?php if ($data['mostReminders']): ?>
        <p><strong><?= $data['mostReminders']['username'] ?></strong> with <?= $data['mostReminders']['total'] ?> reminders.</p>
    <?php endif; ?>
    

    

<?php require_once 'app/views/templates/footer.php'; ?>
