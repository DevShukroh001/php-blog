<?php

include(ROOT_PATH . "/includes/connect.php");

include(ROOT_PATH . "/helpers/middleware.php");
include(ROOT_PATH . "/helpers/validateUser.php");

$table = 'blogs';
$admin_users = selectAll($table,);

$errors = array();
$id = '';
$username = '';
$admin = '';
$email = '';
$password = '';
$passwordConf = '';
$table = 'blogs'; // ✅ Ensure you use the correct table

function loginUser($user)
{
  $_SESSION['id'] = $user['id'];
  $_SESSION['username'] = $user['username'] ?? ''; // ✅ Use ?? to avoid errors if username does not exist
  $_SESSION['admin'] = $user['admin'] ?? 0;
  $_SESSION['message'] = 'You are now logged in';
  $_SESSION['type'] = 'success';

  if ($_SESSION['admin']) {
    header('location: ' . BASE_URL . '/admin/dashboard.php');
  } else {
    header('location: ' . BASE_URL . '/index.php');
  }
  exit();
}

if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {
  $errors = validateUser($_POST);

  if (count($errors) == 0) {
    unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (isset($_POST['admin'])) {
      $_POST['admin'] = 1;
      $user_id = create($table, $_POST);
      $_SESSION['message'] = "Admin user created successfullly";
      $_SESSION['type'] = "success";
      header('location: ' . BASE_URL . '/admin/index.php');
      exit();
    } else {
      $_POST['admin'] = 0;
      // ✅ Insert into blogs (if blogs store users)
      $user_id = create($table, $_POST);
      $user = selectOne($table, ['id' => $user_id]);
      loginUser($user);
    }



  } else {
    $username = $_POST['username'];
    $admin = isset($_POST['admin']) ? 1 : 0;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];
  }
}

// update user
if (isset($_POST['update-user'])) {
  adminOnly();
  $errors = validateUser($_POST);

  if (count($errors) == 0) {
    $id = $_POST['id'];
    unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;

    $count = update($table, $id, $_POST);
    $_SESSION['message'] = "Admin user";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();

  } else {
    // Populate form fields in case of error
    $username = $_POST['username'];
    $email = $_POST['email'];
    $admin = isset($_POST['admin']) ? 1 : 0;
  }
}


if (isset($_GET['id'])) {
  $user = selectOne($table, ['id' => $_GET['id']]);

  $id = $user['id'];
  $username = $user['username'];
  $admin = $user['admin'];         // ✅ Get from $user, not $_POST
  $email = $user['email'];         // ✅ Get from $user, not $_POST
}

if (isset($_POST['login-btn'])) {
  $errors = validateLogin($_POST);

  if (count($errors) === 0) {
    // ✅ Change to email if your database does not store usernames
    $user = selectOne($table, ['username' => $_POST['username']]);

    if ($user && password_verify($_POST['password'], $user['password'])) {
      loginUser($user); // ✅ Fixed typo
    } else {
      array_push($errors, 'Wrong credentials');
    }
  }
}

// ✅ Prevent errors if fields are empty
// $username = isset($_POST['username']) ? $_POST['username'] : '';
if (isset($_POST['username'])) {
  $username = $_POST['username'];
} else {
  $username = '';
}
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';


if (isset($_GET['delete_id'])) {
  adminOnly();
  $count = delete($table, $_GET['delete_id']);
  $_SESSION['message'] = "Admin user deleted";
  $_SESSION['type'] = "success";
  header('location: ' . BASE_URL . '/admin/index.php');
  exit();
}
?>