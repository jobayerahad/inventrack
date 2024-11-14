<?php
include '../config/db.php';

$db = getDBConnection();

// Get the search term if it exists
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Modified query with JOINs and search filter
$query = "
  SELECT products.id, products.serial, products.in_stock, products.qty, 
         product_cat.name AS name, product_cat.brand AS brand, vendors.name AS vendor_name
  FROM products
  LEFT JOIN product_cat ON products.product_id = product_cat.id
  LEFT JOIN vendors ON products.vendor_id = vendors.id
  WHERE product_cat.name LIKE ? 
     OR product_cat.brand LIKE ? 
     OR products.serial LIKE ?
     OR vendors.name LIKE ?
";
$stmt = $db->prepare($query);

// Execute with the search parameter applied to each placeholder
$stmt->execute(["%$search%", "%$search%", "%$search%", "%$search%"]);
$data = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<?php include '../layout/header.php'; ?>

<body>

  <div class="container mt-5">
    <h1 class="mb-4">Product List</h1>

    <!-- Search Form -->
    <form class="mb-4" method="get" action="">
      <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search by product name, brand, or serial " value="<?php echo htmlspecialchars($search); ?>">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
    </form>

    <!-- Products Table -->
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Brand</th>
          <th>Serial</th>
          <th>In-Stock</th>
          <th>Quantity</th>
          <th>Vendor</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">
        <?php foreach ($data as $row): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['brand']); ?></td>
            <td><?php echo htmlspecialchars($row['serial']); ?></td>
            <td>
              <?php echo $row['in_stock'] == 1 ? "In Stock" : "Out of Stock"; ?> <!-- Conditional for stock status -->
            </td>
            <td><?php echo htmlspecialchars($row['qty']); ?></td>
            <td><?php echo htmlspecialchars($row['vendor_name']); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>