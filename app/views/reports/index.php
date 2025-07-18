<?php require_once 'app/views/templates/header.php'; ?>
<div class="container py-5">
    <h2 class="mb-4 fw-semibold">Reports</h2>

    <div class="card shadow-sm rounded-4 p-4 mb-4">
        <h4>All Reminders</h4>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Subject</th>
                        <th>Created</th>
                    </tr>
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
        </div>
    </div>

    <div class="card shadow-sm rounded-4 p-4 mb-4">
        <h4>User with Most Reminders</h4>
        <?php if ($data['mostReminders']): ?>
            <p><strong><?= $data['mostReminders']['username'] ?></strong> with <?= $data['mostReminders']['total'] ?> reminders.</p>
        <?php endif; ?>
    </div>

    <div class="card shadow-sm rounded-4 p-4">
        <h4>Login Counts by Username</h4>
        <canvas id="loginChart" height="120"></canvas>
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
</div>
<?php require_once 'app/views/templates/footer.php'; ?>
