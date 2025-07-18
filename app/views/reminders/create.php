<?php require_once 'app/views/templates/header.php' ?>

<main class="container mt-5 mb-5" style="max-width: 600px;">
    <div class="text-center mb-4">
        <h2 class="fw-semibold">New Reminder</h2>
        <p class="text-muted">Keep your thoughts organized and on time.</p>
    </div>

    <form method="post" action="/reminders/create" class="p-4 shadow-sm rounded-4 bg-white border">
        <div class="mb-4">
            <label for="subject" class="form-label fw-medium">Reminder</label>
            <input 
                type="text" 
                id="subject" 
                name="subject" 
                class="form-control rounded-pill px-4 py-2 border-light shadow-sm" 
                placeholder="e.g., Buy groceries, Call John..." 
                required
            >
        </div>

        <div class="d-flex justify-content-between">
            <a href="/reminders" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
            <button type="submit" class="btn btn-dark rounded-pill px-4">Add Reminder</button>
        </div>
    </form>
</main>

<?php require_once 'app/views/templates/footer.php' ?>
