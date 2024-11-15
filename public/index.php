<?php
// Define root path constants for easy access
define('BASE_PATH', dirname(__DIR__));
define('PUBLIC_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/');

// Autoload necessary files
require_once BASE_PATH . '/utils/helpers.php';

// Include the route dispatcher
require_once BASE_PATH . '/routes/web.php';
