<?php include '../views/partials/header.php'; ?>

<div class="d-flex justify-content-between">
  <h2>Items List</h2>

  <a href="<?= $base_url ?>/items/add" class="btn btn-primary mb-3">Add New Item</a>
</div>

<table class="table table-striped mb-0">
  <thead>
    <tr>
      <th>#</th>
      <th>Item Name</th>
      <th>Category</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($items as $index => $item): ?>
      <tr>
        <td><?= $index + 1 ?></td>
        <td><?= htmlspecialchars($item['name']) ?></td>
        <td><?= htmlspecialchars($item['category']) ?></td>
        <td><?= htmlspecialchars($item['status']) ?></td>
        <td>
          <a href="<?= $base_url ?>/items/edit?id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i> Edit
          </a>

          <a href="<?= $base_url ?>/items/delete?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
            <i class="fas fa-trash"></i> Delete
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include '../views/partials/footer.php'; ?>