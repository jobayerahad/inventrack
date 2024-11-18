<?php

require_once BASE_PATH . '/controllers/AuthController.php';
require_once BASE_PATH . '/controllers/HomeController.php';
require_once BASE_PATH . '/controllers/CategoryController.php';
require_once BASE_PATH . '/controllers/ItemController.php';
require_once BASE_PATH . '/controllers/ProfileController.php';

// Start session at the very beginning
if (session_status() === PHP_SESSION_NONE) session_start();

// Initialize Controllers
$authController = new AuthController();
$homeController = new HomeController();
$categoryController = new CategoryController();
$itemController = new ItemController();
$profileController = new ProfileController();

// Capture the requested URI and remove query strings
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove the base path (`/inventrack/public`) from the URI
$basePath = '/inventrack/public';
$path = str_replace($basePath, '', $requestUri);
$path = trim($path, '/'); // Remove leading/trailing slashes

// Middleware for auth check
if (!isset($_SESSION['user_id']) && in_array($path, ['home', 'items', 'categories', 'requests', 'vendors'])) {
  redirect('login', '');
  exit;
}

// Routing Logic
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  switch ($path) {
    case 'login':
      $authController->showLoginForm();
      break;

    case 'register':
      $authController->showRegisterForm();
      break;

    case 'logout':
      $authController->logout();
      break;

    case '':
    case 'home':
      $homeController->index();
      break;

    case 'categories':
      $categoryController->index();
      break;

    case 'categories/create':
      $categoryController->show();
      break;

      // case 'categories/edit':
      //   $categoryController->editItemView();
      //   break;

    case 'categories/delete':
      $categoryController->destroy();
      break;

    case 'items':
      $itemController->index();
      break;

    case 'items/add':
      $itemController->show();
      break;

    case 'items/edit':
      $itemController->edit();
      break;

    case 'items/delete':
      $itemController->destroy();
      break;

    case 'profile':
      $profileController->showProfile();
      break;

    default:
      include BASE_PATH . '/views/not-found.php';
      break;
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  switch ($path) {
    case 'register':
      $authController->register();
      break;

    case 'login':
      $authController->login();
      break;

    case 'categories/create':
      $categoryController->create();
      break;

    case 'items/add':
      $itemController->add();
      break;

    case 'items/update':
      $itemController->update();
      break;

    case 'profile/update':
      $profileController->updateProfile();
      break;

    case 'profile/change-password':
      $profileController->changePassword();
      break;

    default:
      include  BASE_PATH . '/views/not-found.php';
      break;
  }
} else {
  include BASE_PATH . '/views/not-found.php';
}
