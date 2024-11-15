<?php
session_start();
include '../config/database.php';
include '../views/header.php';
require_once '../utils/helpers.php';

// if (!isset($_SESSION['user_id'])) {
//   header("Location: login.php");
//   exit;
// }

if (!isset($_GET['id'])) sendErrorRes(400, 'Item ID is required.');

$itemId = intval($_GET['id']);

// Fetch the item from the database
$db = new Database();
$conn = $db->getConnection();

$query = "SELECT * FROM items WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $itemId);
$stmt->execute();
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$item) sendErrorRes(404, 'Item not found.');
?>

<h2>Edit Item</h2>

<form action="update_item.php" method="POST">
  <input type="hidden" name="id" value="<?= $item['id'] ?>">

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

  <button type="submit" class="btn btn-success">Update Item</button>
</form>

<?php include '../views/footer.php'; ?>