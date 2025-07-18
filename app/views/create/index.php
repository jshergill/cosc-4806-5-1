<?php require 'app/views/templates/headerPublic.php'; ?>
<main role="main" class="container">
  <h1>Create Your Account</h1>

  <?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
    <?php unset($_SESSION['success']); ?>
  <?php endif; ?>

  <?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
    <?php unset($_SESSION['error']); ?>
  <?php endif; ?>

  <form action="/create/register" method="post">
    <div class="form-group">
      <label for="username">Username</label>
      <input required id="username" name="username" class="form-control" type="text">
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input required id="password" name="password" class="form-control"
             type="password"
             pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,}"
             title="Must contain upper, lower, digit and ≥ 10 chars">
    </div>

    <div class="form-group">
      <label for="confirm_password">Confirm Password</label>
      <input required id="confirm_password" name="confirm_password" class="form-control" type="password">
    </div>

    <button class="btn btn-primary">Register</button>
  </form>
</main>
<?php require 'app/views/templates/footer.php'; ?>
