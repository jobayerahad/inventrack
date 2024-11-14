<?php
// src/ProductForm.php
include '../config/db.php';

$db = getDBConnection();

$productStmt = $db->query("SELECT id, name FROM product_cat");
$categories = $productStmt->fetchAll();

$vendorStmt = $db->query("SELECT id, name FROM vendors");
$vendors = $vendorStmt->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// Collect and sanitize form data
	$serial = $_POST['serial'] ?? '';
	$in_stock = $_POST['in_stock'] ?? '';
	$qty = (int)$_POST['qty'] ?? 0;
	$product_category = (int)$_POST['product_id'] ?? 0;
	$vendor = (int)$_POST['vendor_id'] ?? 0;

	// Validate form data (this is basic validation, you may want to improve it)
	if (empty($serial) || !isset($in_stock) || $qty < 0 || $product_category <= 0 || $vendor <= 0) {
		echo "Please fill out all fields correctly.";
		exit;
	}

	try {
		// Insert data into products table
		$db = getDBConnection();
		$stmt = $db->prepare("INSERT INTO products (serial, in_stock, qty, product_id, vendor_id) VALUES (?, ?, ?, ?, ?)");
		$stmt->execute([$serial, $in_stock, $qty, $product_category, $vendor]);

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

<?php include '../layout/header.php'; ?>

<body>
	<div class="container login-container">
		<div class="row justify-content-center">
			<div class="col-md-6 col-sm-8">
				<div class="card mt-5">
					<div class="card-header text-center">
						<h3>Products Category</h3>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							<div class="mb-3">
								<label for="serial" class="form-label">Serial</label>
								<input type="text" name="serial" class="form-control" id="serial" required>
							</div>

							<p>In Stock</p>
							<div class="mb-3">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="in_stock" value="1" id="in_stock_yes" checked>
									<label class="form-check-label" for="in_stock_yes">Yes</label>
								</div>

								<div class="form-check">
									<input class="form-check-input" type="radio" name="in_stock" value="0" id="in_stock_no">
									<label class="form-check-label" for="in_stock_no">No</label>
								</div>
							</div>

							<div class="mb-3">
								<label for="qty" class="form-label">Quantity</label>
								<input type="number" name="qty" class="form-control" id="qty" required>
							</div>

							<div class="form-group mb-3">
								<label for="product_name">Product List:</label>
								<select name="product_id" class="form-control" required>

									<!-- foreach function -->
									<?php foreach ($categories as $category): ?>
										<option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group mb-3">
								<label for="brand">Vendor:</label>
								<select name="vendor_id" class="form-control" required>


									<!-- foreach function -->
									<?php foreach ($vendors as $vendor): ?>
										<option value="<?= $vendor['id'] ?>"><?= htmlspecialchars($vendor['name']) ?></option>
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