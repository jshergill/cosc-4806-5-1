<?php require 'app/views/templates/headerPublic.php'; ?>
<main role="main" class="container py-5" style="max-width: 480px;">
		<div class="card shadow-sm rounded-4 p-4">
				<h2 class="mb-4 text-center fw-semibold">Login</h2>
				<form action="/login/verify" method="post">
						<div class="mb-3">
								<label for="username" class="form-label">Username</label>
								<input required id="username" name="username" class="form-control rounded-pill" type="text">
						</div>
						<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input required id="password" name="password" class="form-control rounded-pill" type="password">
						</div>
						<button class="btn btn-dark w-100 rounded-pill">Login</button>
				</form>
				<div class="mt-3 text-center">
						Don’t have an account? <a href="/create">Create account</a>
				</div>
		</div>
</main>
<?php require 'app/views/templates/footer.php'; ?>
