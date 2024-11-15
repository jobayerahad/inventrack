<?php include '../views/partials/header.php'; ?>

<h1 class="text-danger">Delete Item</h1>

<p class="lead">Are you sure you want to delete the item <strong><?= htmlspecialchars($item['name']) ?></strong>?</p>

<form action="<?= $base_url ?>/items/delete" method="POST">
  <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">

  <button type="submit" class="btn btn-danger">
    <i class="fas fa-trash"></i> Delete
  </button>

  <a href="<?= $base_url ?>/items" class="btn btn-secondary">
    <i class="fas fa-times"></i> Cancel
  </a>
</form>

<?php include '../views/partials/footer.php'; ?>