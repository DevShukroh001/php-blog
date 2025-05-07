<?php require_once("../../path.php"); ?>
<?php require(ROOT_PATH . "/controllers/users.php");
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

<?php 
$headtitle = "Index-post";
require(ROOT_PATH . "/admin/includes/head.php"); ?>

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