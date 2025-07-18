<?php require_once 'app/views/templates/header.php' ?>
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-semibold">Welcome Back</h1>
        <p class="lead text-muted"><?= date("F jS, Y"); ?></p>
    </div>

    <div class="text-center">
        <a href="/logout" class="btn btn-outline-dark rounded-pill px-4">Logout</a>
    </div>
</div>
<?php require_once 'app/views/templates/footer.php' ?>
