<?php

require_once '../config/database.php';

class CategoryModel
{
  private $conn;

  public function __construct()
  {
    $db = new Database();
    $this->conn = $db->getConnection();
  }

  public function getAllCategories()
  {
    $query = "SELECT * FROM categories";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function createCategory($name, $description)
  {
    $query = "INSERT INTO categories (name, description) VALUES (:name, :description)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    return $stmt->execute();
  }

  public function deleteCategory($id)
  {
    $query = "DELETE FROM categories WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }
}
