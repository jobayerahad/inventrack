<?php
require_once '../config/database.php';

class UserModel
{
  private $conn;

  public function __construct()
  {
    $db = new Database();
    $this->conn = $db->getConnection();
  }

  public function createUser($name, $email, $password)
  {
    // Hash the password using a secure algorithm
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    return $stmt->execute();
  }

  public function verifyLogin($email, $password)
  {
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) return $user; // Return user data if password is correct
    else return false; // Invalid login
  }

  public function getUserByEmail($email)
  {
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function updateUser($id, $name, $email)
  {
    $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    return $stmt->execute();
  }

  public function updatePassword($id, $currentPassword, $newPassword)
  {
    // Get the current user
    $query = "SELECT password FROM users WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify current password
    if ($user && password_verify($currentPassword, $user['password'])) {
      $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); // Update to new password

      $query = "UPDATE users SET password = :password WHERE id = :id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':password', $hashedPassword);
      $stmt->bindParam(':id', $id);
      return $stmt->execute();
    }
    return false;
  }
}
