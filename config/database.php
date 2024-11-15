<?php

require_once '../utils/helpers.php';

class Database
{
  private $host;
  private $db_name;
  private $username;
  private $password;
  public $conn;

  public function __construct()
  {
    if (!file_exists(__DIR__ . '/config.php')) {
      $this->renderErrorPage(
        "Configuration Error",
        "Configuration file not found! Please create a <code>config.php</code> based on <code>config.example.php</code>."
      );
      exit;
    }

    $config = include(__DIR__ . '/config.php'); // Load configuration file

    $this->host = $config['host'];
    $this->db_name = $config['db_name'];
    $this->username = $config['username'] ?? ''; // Ensure key exists
    $this->password = $config['password'] ?? '';
  }

  public function getConnection()
  {
    $this->conn = null;

    try {
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
      $this->conn->exec("set names utf8");
    } catch (PDOException $exception) {
      $this->renderErrorPage(
        "Database Connection Error",
        "Failed to connect to the database. Error message: " . $exception->getMessage()
      );
      exit;
    }

    return $this->conn;
  }

  private function renderErrorPage($title, $message)
  {
    include '../views/errors/general.php';
  }
}
