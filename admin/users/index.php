<?php require_once("../../path.php"); ?>
<?php require(ROOT_PATH . "/controllers/users.php");
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font Awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />


  <link rel="stylesheet" href="https://use.fontawesome.com/release/v5.7.2/css/all.css" crossorigin="anonymous">

  <!-- Admin Styling  -->
  <link rel="stylesheet" href="../../assets/css/main.css" />


  <!-- Custom Styling -->
  <link rel="stylesheet" href="../../assets/css/style.css" />


  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
    rel="stylesheet">

  <title>Admin Section - Manage Users</title>
</head>

<body>

  <?php require(ROOT_PATH . "/includes/adminheader.php"); ?>

  <!-- Admin Page Wrapper -->
  <div class="admin-wrapper">

    <!-- Left Sidebar -->
    <?php require(ROOT_PATH . "/includes/adminsidebar.php"); ?>

    <!-- Admin Content -->
    <div class="admin-content">
      <div class="button-group">
        <a href="create.php" class="btn btn-big">Add User</a>
        <a href="index.php" class="btn btn-big">Manage Posts</a>
      </div>
      <div class="content">

        <h2 class="page-title">Manage Users</h2>
        <!-- <h2 class="page-title">Manage Posts</h2> -->
        <?php require(ROOT_PATH . "/includes/messages.php"); ?>

        <table>
          <th>SN</th>
          <th>Username</th>
          <th>Email</th>
          <th colspan="2">Action</th>

          <tbody>
            <?php foreach ($admin_users as $key => $user): ?>
              <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><a href="edit.php?id=<?php echo $user['id']; ?>" class="edit">edit</a></td>
                <td><a href="index.php?delete_id=<?php echo $user['id']; ?>" class="delete">delete</a></td>
              </tr>
            <?php endforeach; ?>


          </tbody>
        </table>

      </div>
    </div>
  </div>

  <!-- end of page-wrapper -->

  <!-- Load jQuery FIRST -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Then your custom script -->
  <script src="../../assets/js/script.js"></script>
</body>

</html>