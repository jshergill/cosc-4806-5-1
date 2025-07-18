<?php require_once 'app/views/templates/header.php'; ?>

<main role="main" class="container mt-5 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-semibold"> Reminders</h2>
        <a href="/reminders/create" class="btn btn-dark rounded-pill px-4">+ Add Reminder</a>
    </div>

    <?php if (!empty($data['reminders'])): ?>
        <div class="table-responsive">
            <table class="table align-middle table-borderless shadow-sm rounded-4">
                <thead class="table-light">
                    <tr class="text-muted">
                        <th>ID</th>
                        <th>Subject</th>
                        <th>Created</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['reminders'] as $index => $reminder): ?>
                       
                            <td class="text-secondary"><?= htmlspecialchars($reminder['id']) ?></td>

                            <td>
                                <strong><?= htmlspecialchars($reminder['subject']) ?></strong>
                            </td>

                            <td class="text-muted"><?= htmlspecialchars($reminder['created_at']) ?></td>
                            <td class="text-center">
                                <a href="/reminders/update/<?= $reminder['id'] ?>" class="btn btn-outline-secondary btn-sm rounded-pill me-2 px-3">Update</a>


                                <form method="post" action="/reminders/delete/<?= $reminder['id'] ?>" class="d-inline">
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center mt-5" role="alert">
            No reminders yet. Click <strong>Add New Reminder</strong> to get started!
        </div>
    <?php endif; ?>
</main>

<?php require_once 'app/views/templates/footer.php'; ?>
