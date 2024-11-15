<?php
session_start();
include '../config/database.php';
include '../views/partials/header.php';

// if (!isset($_SESSION['user_id'])) {
// 	header("Location: login.php");
// 	exit;
// }

// Initialize database
$db = new Database();
$conn = $db->getConnection();

// Fetch items from the database
$query = "SELECT id, name, category, status FROM items";
$stmt = $conn->prepare($query);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
	<h2>Manage Items</h2>
	<p>Here, you can view, add, and manage all items in the inventory.</p>

	<!-- Success/Error Messages -->
	<?php if (isset($_GET['success'])): ?>
		<?php if ($_GET['success'] == 1): ?>
			<div class="alert alert-success">Item added successfully!</div>
		<?php elseif ($_GET['success'] == 2): ?>
			<div class="alert alert-success">Item updated successfully!</div>
		<?php elseif ($_GET['success'] == 3): ?>
			<div class="alert alert-success">Item deleted successfully!</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (isset($_GET['error'])): ?>
		<?php if ($_GET['error'] == 1): ?>
			<div class="alert alert-danger">Failed to update item. Please try again.</div>
		<?php elseif ($_GET['error'] == 2): ?>
			<div class="alert alert-danger">Failed to delete item. Please try again.</div>
		<?php endif; ?>
	<?php endif; ?>

	<!-- Add New Item Button -->
	<a href="add_item.php" class="btn btn-primary my-3">
		<i class="fas fa-plus"></i> Add New Item
	</a>

	<!-- Items Table -->
	<table class="table table-striped">
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
						<a href="edit_item.php?id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">
							<i class="fas fa-edit"></i> Edit
						</a>

						<a href="delete_item.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
							<i class="fas fa-trash"></i> Delete
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</div>

<?php include '../views/partials/footer.php'; ?>