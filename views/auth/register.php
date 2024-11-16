<?php
session_start();

// Redirect to home if already logged in
if (isset($_SESSION['user_id'])) {
  redirect('home', '');
  exit;
}

include '../views/partials/header.php';
?>

<?php if (isset($_GET['error']) && $_GET['error'] === '1'): ?>
  <div class="alert alert-danger mt-3" role="alert">
    Registration failed. Email might already be taken.
  </div>
<?php endif; ?>

<h2>Register</h2>

<form action="<?= $base_url ?>/register" method="POST" class="mt-4">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>

  <button type="submit" class="btn btn-primary">Register</button>
</form>

<!-- Link to Login Page -->
<div class="mt-3">
  <p>Already have an account? <a href="<?= $base_url ?>/login">Login here</a>.</p>
</div>

<?php include '../views/partials/footer.php'; ?>