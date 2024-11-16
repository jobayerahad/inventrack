<?php include '../views/partials/header.php'; ?>

<div class="d-flex justify-content-between">
  <h2>Categories List</h2>

  <a href="<?= $base_url ?>/categories/create" class="btn btn-primary mb-3">Add New Category</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categories as $category): ?>
      <tr>
        <td><?= htmlspecialchars($category['id']) ?></td>
        <td><?= htmlspecialchars($category['name']) ?></td>
        <td><?= htmlspecialchars($category['description']) ?></td>
        <td>
          <a href="<?= $base_url ?>/categories/delete?id=<?= $category['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include '../views/partials/footer.php'; ?>