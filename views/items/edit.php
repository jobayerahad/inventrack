<?php include '../views/partials/header.php'; ?>

<h1>Edit Item</h1>

<form action="<?= $base_url ?>/items/update" method="POST" class="mt-4">
  <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
  <div class="mb-3">
    <label for="item_name" class="form-label">Item Name</label>
    <input type="text" class="form-control" id="item_name" name="item_name" value="<?= htmlspecialchars($item['name']) ?>" required>
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <input type="text" class="form-control" id="category" name="category" value="<?= htmlspecialchars($item['category']) ?>" required>
  </div>

  <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-select" id="status" name="status" required>
      <option value="available" <?= $item['status'] === 'available' ? 'selected' : '' ?>>Available</option>
      <option value="in_repair" <?= $item['status'] === 'in_repair' ? 'selected' : '' ?>>In Repair</option>
      <option value="out_of_service" <?= $item['status'] === 'out_of_service' ? 'selected' : '' ?>>Out of Service</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success">
    <i class="fas fa-save"></i> Update Item
  </button>
</form>

<?php include '../views/partials/footer.php'; ?>