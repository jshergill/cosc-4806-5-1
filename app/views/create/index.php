<?php require 'app/views/templates/headerPublic.php'; ?>
<main role="main" class="container py-5" style="max-width: 540px;">
    <div class="card shadow-sm rounded-4 p-4">
        <h2 class="mb-4 text-center fw-semibold">Create Account</h2>

        <?php if (!empty($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="/create/register" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input required id="username" name="username" class="form-control rounded-pill" type="text">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input required id="password" name="password" class="form-control rounded-pill" type="password"
                    title="Must contain upper, lower, digit and ≥ 10 chars">
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input required id="confirm_password" name="confirm_password" class="form-control rounded-pill" type="password">
            </div>

            <button class="btn btn-dark w-100 rounded-pill">Register</button>
        </form>
    </div>
</main>
<?php require 'app/views/templates/footer.php'; ?>
