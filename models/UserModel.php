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
}
