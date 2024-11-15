<?php
session_start();
include '../config/database.php';
require_once '../utils/helpers.php';

// if (!isset($_SESSION['user_id'])) {
// 	header("Location: login.php");
// 	exit;
// }

// Validate form data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_name'], $_POST['category'], $_POST['status'])) {
	$itemName = htmlspecialchars($_POST['item_name']);
	$category = htmlspecialchars($_POST['category']);
	$status = htmlspecialchars($_POST['status']);

	// Initialize database
	$db = new Database();
	$conn = $db->getConnection();

	try {
		$query = "INSERT INTO items (name, category, status) VALUES (:name, :category, :status)";
		$stmt = $conn->prepare($query);

		// Bind parameters
		$stmt->bindParam(':name', $itemName);
		$stmt->bindParam(':category', $category);
		$stmt->bindParam(':status', $status);

		// Execute query
		if ($stmt->execute())
			header("Location: items.php?success=1");
		else
			header("Location: add_item.php?error=1");
	} catch (PDOException $e) {
		sendErrorRes(500, 'Failed to add item: ' . $e->getMessage());
	}
} else {
	sendErrorRes(400, 'Invalid form data.');
}
