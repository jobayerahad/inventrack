<?php
session_start();
include '../config/database.php';
require_once '../utils/helpers.php';

// if (!isset($_SESSION['user_id'])) {
// 	header("Location: login.php");
// 	exit;
// }

if (!isset($_GET['id'])) sendErrorRes(400, 'Item ID is required.');

$itemId = intval($_GET['id']);

$db = new Database();
$conn = $db->getConnection();

try {
  $query = "DELETE FROM items WHERE id = :id";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':id', $itemId);

  if ($stmt->execute()) header("Location: items.php?success=3");
  else header("Location: items.php?error=2");
} catch (PDOException $e) {
  sendErrorRes(500, 'Failed to delete item: ' . $e->getMessage());
}
