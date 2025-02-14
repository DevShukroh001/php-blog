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

  <title>Register</title>
</head>

<body>
  <header>
    <div class="logo">
      <h1 class="logo-text"><span>Dev</span>Shuk</h1>
    </div>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <!-- <li><a href="#">Sign up</a></li>
      <li><a href="#">Login</a></li> -->
      <li>
        <a href="#">
          <i class="fa fa-user"></i>
          Dev Shuk
          <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
        </a>
        <ul>
          <li><a href="#">Dashboard</a></li>
          <li><a href="#" class="logout">Logout</a></li>
        </ul>
      </li>
    </ul>
  </header>

  <div class="auth-content">
    <form action="register.php" method="post">
      <h2 class="form-title">Register</h2>

      <!-- <div class="msg success error">
        <li>Username reguired</li>
      </div> -->
      <div>
        <label>Username</label>
        <input type="text" name="username" class="text-input">
      </div>

      <div>
        <label>Email</label>
        <input type="email" name="email" class="text-input">
      </div>

      <div>
        <label>Password</label>
        <input type="password" name="password" class="text-input">
      </div>

      <div>
        <label>Password Confirmation</label>
        <input type="password" name="passwordconf" class="text-input">
      </div>

      <div>
        <button type="submit" name="register-btn" class="btn btn-big">Register</button>
      </div>
      <p>Or <a href="login.php">Sign In</a></p>
    </form>
  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  <!-- Custom Script -->
  <script src="./assets/js/script.js"></script>
</body>

</html>