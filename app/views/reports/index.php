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
    
    <h4 class="mt-5">Login Counts by Username</h4>
        <canvas id="loginChart" width="600" height="300"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('loginChart').getContext('2d');
        const loginChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode(array_column($data['loginCounts'], 'username_attempted')) ?>,
                datasets: [{
                    label: 'Login Count',
                    data: <?= json_encode(array_column($data['loginCounts'], 'total_logins')) ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>

<?php require_once 'app/views/templates/footer.php'; ?>
