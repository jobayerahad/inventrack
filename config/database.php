<?php

require_once '../helpers/response_helper.php';

class Database
{
  private $host;
  private $db_name;
  private $username;
  private $password;
  public $conn;

  public function __construct()
  {
    if (!file_exists(__DIR__ . '/config.php'))
      sendErrorRes(500, 'Configuration file not found! Please create a config.php based on config.example.php.');

    $config = include(__DIR__ . '/config.php'); // Load configuration file

    $this->host = $config['host'];
    $this->db_name = $config['db_name'];
    $this->username = $config['username'];
    $this->password = $config['password'];
  }

  public function getConnection()
  {
    $this->conn = null;

    try {
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
      $this->conn->exec("set names utf8");
    } catch (PDOException $exception) {
      sendErrorRes(500, 'Connection error: ' . $exception->getMessage());
    }

    return $this->conn;
  }
}
