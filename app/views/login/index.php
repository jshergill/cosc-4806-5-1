<?php require 'app/views/templates/headerPublic.php'; ?>
<main role="main" class="container">
	<h1>You are not logged in</h1>

	<form action="/login/verify" method="post">
		<div class="form-group">
			<label for="username">Username</label>
			<input required id="username" name="username" class="form-control" type="text">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input required id="password" name="password" class="form-control" type="password">
		</div>
		<button class="btn btn-primary">Login</button><br><br>
		Don’t have an account? <a href="/create">Create account</a>
	</form>
</main>
<?php require 'app/views/templates/footer.php'; ?>
