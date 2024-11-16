<?php include '../views/partials/header.php'; ?>

<h2>Create Category</h2>

<form action="<?= $base_url ?>/categories/create" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Category Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Create</button>
</form>


<?php include '../views/partials/footer.php'; ?>