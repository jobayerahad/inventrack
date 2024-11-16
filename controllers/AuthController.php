<?php

require_once '../models/UserModel.php';

class AuthController
{
  private $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function showLoginForm()
  {
    include '../views/auth/login.php';
  }

  public function showRegisterForm()
  {
    include '../views/auth/register.php';
  }

  public function register()
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($this->userModel->createUser($name, $email, $password)) {
      redirect('login', '');
      exit;
    } else {
      redirect('login', 'error=1');
    }
  }

  public function login()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $this->userModel->verifyLogin($email, $password);

    if ($user) {
      session_start();
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['name'];
      redirect('home', '');
      exit;
    } else {
      redirect('login', 'error=1');
    }
  }

  public function logout()
  {
    session_start();
    session_destroy();
    redirect('login', '');
    exit;
  }
}
