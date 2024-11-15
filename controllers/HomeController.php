<?php

class HomeController
{
  public function index()
  {
    // Start session and check if user is logged in
    // if (session_status() === PHP_SESSION_NONE)
    //   session_start();

    // if (!isset($_SESSION['user_id'])) {
    //   header("Location: /login");
    //   exit;
    // }

    // Load configuration
    $config = include BASE_PATH . '/config/config.php';
    $base_url = $config['base_url'];

    // Load models and fetch data
    require_once BASE_PATH . '../models/ItemModel.php';
    $itemModel = new ItemModel();
    $totalItems = $itemModel->getTotalItems();

    // For demonstration, assuming only items
    $totalRequests = 0;
    $totalVendors = 0;

    // Pass data to the view
    include '../views/home.php';
  }
}
