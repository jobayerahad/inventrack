<?php
session_start();
include '../config/database.php';
include '../helpers/response_helper.php';

// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'], $_POST['item_name'], $_POST['category'], $_POST['status'])) {
  $itemId = intval($_POST['id']);
  $itemName = htmlspecialchars($_POST['item_name']);
  $category = htmlspecialchars($_POST['category']);
  $status = htmlspecialchars($_POST['status']);

  $db = new Database();
  $conn = $db->getConnection();

  try {
    $query = "UPDATE items SET name = :name, category = :category, status = :status WHERE id = :id";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':name', $itemName);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $itemId);

    if ($stmt->execute()) {
      header("Location: items.php?success=2");
    } else {
      header("Location: edit_item.php?id=$itemId&error=1");
    }
  } catch (PDOException $e) {
    sendErrorRes(500, 'Failed to update item: ' . $e->getMessage());
  }
} else {
  sendErrorRes(400, 'Invalid form data.');
}
