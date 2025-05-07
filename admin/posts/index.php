<?php require_once("../../path.php"); ?>
<?php require(ROOT_PATH . "/controllers/posts.php");
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
        <a href="create.php" class="btn btn-big">Add Post</a>
        <a href="index.php" class="btn btn-big">Manage Posts</a>
      </div>
      <div class="content">

        <h2 class="page-title">Manage Posts</h2>
        <?php require(ROOT_PATH . "/includes/messages.php"); ?>
        <table>
          <th>SN</th>
          <th>Title</th>
          <th>Author</th>
          <th colspan="3">Action</th>

          <tbody>
            <?php foreach ($posts as $key => $post): ?>
              <tr>
                <td><?php echo $key + 1; ?></td> <!-- Use increment, not assignment -->
                <td><?php echo $post['title']; ?></td>
                <td>Devshuk</td>
                <td><a href="edit.php?id==?php echo $post['id'];?>" class="edit">edit</a></td>
                <td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>

                <?php if ($post['published']): ?>
                  <td>
                    <a href="edit.php?published=0&p_id=<?php echo $post['id']; ?>" class="unpublish">unpublish</a>
                  </td>
                <?php else: ?>
                  <td>
                    <a href="edit.php?published=1&p_id=<?php echo $post['id']; ?>" class="publish">publish</a>
                  </td>
                <?php endif; ?>
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