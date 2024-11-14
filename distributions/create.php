<?php
// src/ProductForm.php
include '../config/db.php';

$db = getDBConnection();

$productStmt = $db->query("SELECT id, name FROM product_cat");
$categories = $productStmt->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Collect and sanitize form data
  $to_branch = $_POST['to_branch'] ?? '';
  $qty = (int)$_POST['qty'] ?? 0;
  $remarks = $_POST['remarks'] ?? '';
  $product_category = (int)$_POST['product_id'] ?? 0;

  // Validate form data
  if (empty($to_branch) || $qty <= 0 || empty($remarks) || $product_category <= 0) {
    echo "Please fill out all fields correctly.";
    exit;
  }

  try {
    // Insert data into products table
    $stmt = $db->prepare("INSERT INTO distributions (to_branch, qty, remarks, product_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$to_branch, $qty, $remarks, $product_category]);

    // Redirect or give feedback
    echo "Product added successfully!";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
} else {
  echo "Invalid request method.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Distribute Product</title>
</head>

<body>
  <div class="container login-container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-sm-8">
        <div class="card mt-5">
          <div class="card-header text-center">
            <h3>Distribute Products</h3>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="mb-3">
                <label for="to_branch" class="form-label">Branch Name</label>
                <input type="text" name="to_branch" class="form-control" id="to_branch" required>
              </div>

              <div class="mb-3">
                <label for="qty" class="form-label">Quantity</label>
                <input type="number" name="qty" class="form-control" id="qty" required>
              </div>

              <div class="mb-3">
                <label for="remarks" class="form-label">Remarks</label>
                <input type="text" name="remarks" class="form-control" id="remarks" required>
              </div>
              <!-- forech -->
              <div class="form-group mb-3">
                <label for="product_name">Product List:</label>
                <select name="product_id" class="form-control" required>
                  <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include '../layout/footer.php'; ?>

</html>