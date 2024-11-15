<?php

require_once '../controllers/HomeController.php';
require_once '../controllers/ItemController.php';

// Initialize Controllers
$homeController = new HomeController();
$itemController = new ItemController();

// Capture the requested URI and remove query strings
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove the base path (`/inventrack/public`) from the URI
$basePath = '/inventrack/public';
$path = str_replace($basePath, '', $requestUri);
$path = trim($path, '/'); // Remove leading/trailing slashes

// Routing Logic
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  switch ($path) {
    case '':
    case 'home':
      $homeController->index();
      break;
    case 'items':
      $itemController->listItems();
      break;
    case 'items/add':
      include '../views/items/add.php';
      break;
    case 'items/edit':
      $itemController->editItemView();
      break;
    case 'items/delete':
      $itemController->deleteItem();
      break;
    default:
      include '../views/not-found.php';
      break;
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  switch ($path) {
    case 'items/add':
      $itemController->addItem();
      break;
    case 'items/update':
      $itemController->updateItem();
      break;
    default:
      include '../views/not-found.php';
      break;
  }
} else {
  include '../views/not-found.php';
}
