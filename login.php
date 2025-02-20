<?php include("path.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/release/v5.7.2/css/all.css" crossorigin="anonymous">
  <!-- Custom Css-->
  <link rel="stylesheet" href="./assets/css/style.css">
  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
    rel="stylesheet">
  <title>Login Page</title>
</head>
<body>
<?php require(ROOT_PATH ."includes/header.php");?>
  <div class="auth-content">
    <form action="login.php" method="post">
      <h2 class="form-title">Register</h2>
      <div>
        <label>Username</label>
        <input type="text" name="username" class="text-input">
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" class="text-input">
      </div>
      <div>
        <button type="submit" name="login-btn" class="btn btn-big">Login</button>
      </div>
      <p>Or <a href="<?php echo BASE_URL . 'register.php'; ?>">Sign In</a>
      </p>
    </form>
  </div>
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Custom Script -->
  <script src="./assets/js/script.js"></script>
</body>
</html>