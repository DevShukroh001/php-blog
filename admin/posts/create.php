<?php require_once("../../path.php"); ?>
<?php require(ROOT_PATH . "/controllers/posts.php");
adminOnly();
?>

<!DOCTYPE html>
<html lang="en">

<?php 

$headtitle = "Create-Post";
require(ROOT_PATH . "/admin/includes/head.php"); 
?>


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
        <h2 class="page-title">Add Posts</h2>
        <?php include(ROOT_PATH . "/helpers/formErrors.php"); ?>

        <form action="create.php" method="post" enctype="multipart/form-data">
          <div>
            <label>Title</label>
            <input type="text" name="title" value="<?php echo $title ?>" class="text-input">
          </div>
          <div>
            <label>Body</label>
            <textarea name="body" id="body"><?php echo $body ?></textarea>
          </div>
          <div>
            <label>Image</label>
            <input type="file" name="image" class="text-input">
          </div>
          <div>
            <label>Topic</label>
            <select name="topic_id" class="text-input">
              <option value=""></option>

              <?php foreach ($topics as $key => $topic): ?>

                <?php if (!empty($topic_id) && $topic_id == $topic['id']): ?>
                  <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                <?php else: ?>
                  <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                <?php endif; ?>

              <?php endforeach; ?>


            </select>
          </div>
          <div>
            <?php if (empty($published)): ?>
              <label>
                <input type="checkbox" name="published">
                Publish
              </label>
            <?php else: ?>
              <label>
                <input type="checkbox" name="published" checked>
                Publish
              </label>
            <?php endif; ?>


          </div>
          <div><br>
            <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
          </div>
        </form>

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