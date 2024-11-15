<?php

function sanitize($data)
{
  return htmlspecialchars(strip_tags(trim($data)));
}

function redirect($path, $query = '')
{
  $config = include BASE_PATH . '/config/config.php';
  $base_url = $config['base_url'];
  $url = $base_url . '/' . trim($path, '/') . ($query ? '?' . $query : '');
  header("Location: $url");
  exit;
}
