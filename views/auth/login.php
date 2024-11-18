<?php

// Redirect to home if already logged in
if (isset($_SESSION['user_id'])) {
  redirect('home', '');
  exit;
}

include '../views/partials/header.php';
?>

<!-- Display Alert for Unauthenticated Status -->
<?php if (isset($_GET['error']) && $_GET['error'] === '1'): ?>
  <div class="alert alert-danger mt-3" role="alert">
    Invalid credentials.
  </div>
<?php endif; ?>

<h2>Login</h2>

<form action="<?= $base_url ?>/login" method="POST" class="mt-4">
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>

  <button type="submit" class="btn btn-primary">Login</button>
</form>

<!-- Link to Register Page -->
<div class="mt-3">
  <p>Don't have an account? <a href="<?= $base_url ?>/register">Register here</a>.</p>
</div>

<?php include '../views/partials/footer.php'; ?>