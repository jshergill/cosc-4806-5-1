<?php require_once 'app/views/templates/header.php' ?>

<main class="container mt-5 mb-5" style="max-width: 600px;">
    <div class="text-center mb-4">
        <h2 class="fw-semibold">Update Reminder</h2>
        <p class="text-muted">Update your reminder below and keep things on track.</p>
    </div>

    <?php $reminder = $data['reminder'] ?? null; ?>

    <?php if ($reminder): ?>
        <?php $reminderId = isset($reminder['id']) ? $reminder['id'] : ''; ?>
        <form method="post" action="/reminders/update/<?= htmlspecialchars((string)$reminderId) ?>" class="p-4 shadow-sm rounded-4 bg-white border">

            <div class="mb-4">
                <label for="subject" class="form-label fw-medium">Reminder Subject</label>
                <input 
                    type="text" 
                    id="subject" 
                    name="subject" 
                    class="form-control rounded-pill px-4 py-2 border-light shadow-sm" 
                    value="<?= htmlspecialchars((string)($reminder['subject'] ?? '')) ?>" 
                    placeholder="Edit your reminder..." 
                    required
                >
            </div>

            <div class="d-flex justify-content-between">
                <a href="/reminders" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                <button type="submit" class="btn btn-dark rounded-pill px-4">Update</button>
            </div>
        </form>
    <?php else: ?>
        <div class="alert alert-danger text-center">Reminder not found.</div>
    <?php endif; ?>
</main>

<?php require_once 'app/views/templates/footer.php' ?>
