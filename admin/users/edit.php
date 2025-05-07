<?php require_once("../../path.php"); ?>
<?php require(ROOT_PATH . "/controllers/users.php");
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

<?php 
$headtitle = "Edit post";
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
        <a href="index.php" class="btn btn-big">Manage User</a>
      </div>
      <div class="content">
        <h2 class="page-title">Edit User</h2>
        
        <?php include(ROOT_PATH . "/helpers/formErrors.php"); ?>

        <form action="edit.php" method="post">
        <input type="hidden" name="id" value = "<?php echo $id; ?>">
        <div>
            <label>Username</label>
            <input type="text" name="username" value = "<?php echo $username; ?>" class="text-input">
          </div>

          <div>
            <label>Email</label>
            <input type="email" name="email" value = "<?php echo $email; ?>" class="text-input">
          </div>
          <div>
            <label>Password</label>
            <input type="password" name="password" value = "<?php echo $password; ?>" class="text-input">
          </div>
          <div>
            <label>Password Confirmation</label>
            <input type="password" name="passwordConf" value = "<?php echo $passwordConf; ?>" class="text-input">
          </div>
          <div>
            <?php if (isset($admin) && $admin == 1 ): ?> 
              <label>
              <input type="checkbox" name="admin">
              Admin
            </label>
            <?php else: ?>
              <label>
              <input type="checkbox" name="admin">
              Admin
            </label>
            <?php endif; ?>
          
          </div>
          <div><br>
            <button type="submit" name="update-user"  class="btn btn-big">Update User</button>
          </div>
        </form>
      </div>





    </div>
  </div>
  </div>

  <!-- end of page-wrapper -->

  <!-- Load jQuery FIRST -->
  <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>



  <!-- CKEditor 5 Classic build -->
  <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>


  <!-- Then your custom script -->
  <script src="../../assets/js/script.js"></script>

  <script>
    ClassicEditor
      .create(document.querySelector("#body"), {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
        heading: {
          options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
          ]
        }
      })
      .catch(error => {
        console.error('CKEditor error:', error);
      });
  </script>


</body>

</html>