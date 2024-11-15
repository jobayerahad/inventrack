<?php include '../views/partials/header.php'; ?>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card shadow">
      <div class="card-header bg-danger text-white">
        <h4 class="mb-0"><i class="fas fa-exclamation-triangle"></i> <?= htmlspecialchars($title ?? 'Error') ?></h4>
      </div>

      <div class="card-body">
        <p class="lead mb-0"><?= htmlspecialchars($message ?? 'An unexpected error occurred.') ?></p>
      </div>
    </div>
  </div>
</div>

<?php include '../views/partials/footer.php'; ?>