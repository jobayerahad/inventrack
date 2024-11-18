<?php include '../views/partials/header.php'; ?>

<div class="container">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h5>Your Profile</h5>
    </div>

    <div class="card-body">
      <form action="<?= $base_url ?>/profile/update" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($_SESSION['user_name'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($_SESSION['user_email'] ?? '') ?>" required>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Profile</button>
      </form>
    </div>
  </div>

  <div class="card shadow mt-4">
    <div class="card-header bg-secondary text-white">
      <h5>Change Password</h5>
    </div>

    <div class="card-body">
      <form action="<?= $base_url ?>/profile/change-password" method="POST">
        <div class="mb-3">
          <label for="current_password" class="form-label">Current Password</label>
          <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>

        <div class="mb-3">
          <label for="new_password" class="form-label">New Password</label>
          <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>

        <div class="mb-3">
          <label for="confirm_password" class="form-label">Confirm New Password</label>
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit" class="btn btn-secondary"><i class="fas fa-key"></i> Change Password</button>
      </form>
    </div>
  </div>
</div>

<?php include '../views/partials/footer.php'; ?>