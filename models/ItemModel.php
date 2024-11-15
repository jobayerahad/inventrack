<?php
require_once '../config/database.php';

class ItemModel
{
  private $conn;

  public function __construct()
  {
    $db = new Database();
    $this->conn = $db->getConnection();
  }

  public function getTotalItems()
  {
    $query = "SELECT COUNT(*) as total FROM items";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'] ?? 0;
  }

  public function getAllItems()
  {
    $query = "SELECT * FROM items";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getItemById($id)
  {
    $query = "SELECT * FROM items WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function addItem($name, $category, $status)
  {
    $query = "INSERT INTO items (name, category, status) VALUES (:name, :category, :status)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':status', $status);
    $stmt->execute();
  }

  public function updateItem($id, $name, $category, $status)
  {
    $query = "UPDATE items SET name = :name, category = :category, status = :status WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':status', $status);
    $stmt->execute();
  }

  public function deleteItem($id)
  {
    $query = "DELETE FROM items WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
}
