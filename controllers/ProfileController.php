<?php

require_once BASE_PATH . '/models/UserModel.php';

class ProfileController
{
  private $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function showProfile()
  {
    include BASE_PATH . '/views/profile.php';
  }

  public function updateProfile()
  {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Update the user in the database (example logic)
    if ($this->userModel->updateUser($_SESSION['user_id'], $name, $email)) {
      $_SESSION['user_name'] = $name;
      $_SESSION['user_email'] = $email;
      redirect('profile', 'success=1');
      exit;
    } else {
      redirect('profile', 'error=1');
      // echo "Error updating profile.";
    }
  }

  public function changePassword()
  {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Ensure new passwords match
    if ($newPassword !== $confirmPassword) {
      // echo "New passwords do not match.";
      redirect('profile', 'error=2');
      return;
    }

    // Verify current password and update to new password
    if ($this->userModel->updatePassword($_SESSION['user_id'], $currentPassword, $newPassword)) {
      redirect('profile', 'success=2');
      exit;
    } else {
      // echo "Error updating password.";
      redirect('profile', 'error=2');
    }
  }
}
