<?php include '../views/partials/header.php'; ?>

<h2>Add New Item</h2>

<form action="<?= $base_url ?>/items/add" method="POST" class="mt-4">
  <div class="mb-3">
    <label for="item_name" class="form-label">Item Name</label>
    <input type="text" class="form-control" id="item_name" name="item_name" required>
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <input type="text" class="form-control" id="category" name="category" required>
  </div>

  <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-select" id="status" name="status" required>
      <option value="available">Available</option>
      <option value="in_repair">In Repair</option>
      <option value="out_of_service">Out of Service</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">
    <i class="fas fa-plus"></i> Add Item
  </button>
</form>


<?php include '../views/partials/footer.php'; ?>