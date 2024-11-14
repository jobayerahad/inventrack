<?php
include '../config/db.php';

$db = getDBConnection();

// Get the search term if it exists
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Modified query with JOINs and search filter
$query = "
  SELECT distributions.id, distributions.to_branch, distributions.qty, 
         product_cat.name AS name, products.serial AS serial, 
         product_cat.brand AS brand, vendors.name AS vendor_name

  FROM distributions
  
  LEFT JOIN products ON distributions.product_id = products.id   

  LEFT JOIN product_cat ON distributions.product_id = product_cat.id
 LEFT JOIN vendors ON products.vendor_id = vendors.id

  WHERE distributions.to_branch LIKE ? 
     OR product_cat.name LIKE ? 
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

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>view Distribution List</title>
</head>

<body>

  <div class="container mt-5">
    <h1 class="mb-4">Distributions List</h1>

    <!-- Search Form -->
    <form class="mb-4" method="get" action="">
      <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search by branch name, product name, brand, or serial, vendors" value="<?php echo htmlspecialchars($search); ?>">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
    </form>

    <!-- Products Table -->
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Branch Name</th>
          <th>Products</th>
          <th>Serial</th>
          <th>Quantity</th>
          <th>Vendor</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">
        <?php foreach ($data as $row): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['to_branch']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['serial']); ?></td>
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