<?php
function sendErrorRes($statusCode, $message)
{
  http_response_code($statusCode); // Set HTTP response code

  echo "
    <div class='container mt-4'>
      <div class='alert alert-danger' role='alert'>
        <h4 class='alert-heading'>Error $statusCode</h4>
        <p>$message</p>
      </div>
    </div>
  ";

  exit(); // Stop further execution
}
