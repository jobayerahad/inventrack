<?php include '../views/partials/header.php'; ?>

<h1 class="mb-4">Dashboard</h1>

<div class="row">
  <!-- Total Items Card -->
  <div class="col-md-4">
    <div class="card text-white bg-primary mb-3">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h5 class="card-title">Total Items</h5>
            <p class="card-text"><?= htmlspecialchars($totalItems) ?></p>
          </div>
          <i class="fas fa-box fa-3x"></i>
        </div>
        <a href="<?= $base_url ?>/items" class="btn btn-light mt-3">View Items</a>
      </div>
    </div>
  </div>

  <!-- Total Requests Card -->
  <div class="col-md-4">
    <div class="card text-white bg-success mb-3">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h5 class="card-title">Total Requests</h5>
            <p class="card-text"><?= htmlspecialchars($totalRequests) ?></p>
          </div>
          <i class="fas fa-clipboard-list fa-3x"></i>
        </div>
        <a href="<?= $base_url ?>/requests" class="btn btn-light mt-3">View Requests</a>
      </div>
    </div>
  </div>

  <!-- Total Vendors Card -->
  <div class="col-md-4">
    <div class="card text-white bg-warning mb-3">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h5 class="card-title">Total Vendors</h5>
            <p class="card-text"><?= htmlspecialchars($totalVendors) ?></p>
          </div>
          <i class="fas fa-truck fa-3x"></i>
        </div>
        <a href="<?= $base_url ?>/vendors" class="btn btn-dark mt-3">Manage Vendors</a>
      </div>
    </div>
  </div>
</div>

<?php include '../views/partials/footer.php'; ?>