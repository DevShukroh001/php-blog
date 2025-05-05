<?php include("path.php") ?>
<?php require(ROOT_PATH . "/controllers/posts.php");

if (isset($_GET['id'])) {

  $post = selectOne('posts', ['id' => $_GET['id']]);
}

$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/release/v5.7.2/css/all.css" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">

  <!-- Custom Css-->
  <link rel="stylesheet" href="./assets/css/style.css">
  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
    rel="stylesheet">
  <title><?php echo $post['title']; ?> |Devshukinspires</title>
</head>

<body>
  <?php
require(ROOT_PATH . "includes/header.php"); 
 
  ?>
  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <!-- Content -->
    <div class="content clearfix">
      <!-- Main Content -->
      <div class="main-content single">
        <h1 class="post-title"><?php echo $post['title']; ?></h1>
        <div class="post-content">
          <?php echo html_entity_decode($post['body']); ?>
        </div>
      </div>
      <!-- // Main Content -->
      <!-- Sidebar -->
      <div class="sidebar single">
        <div class="section popular">
          <h2 class="section-title">popular</h2>

          <?php foreach ($posts as $post): ?>
            <div class="post clearfix">
              <img src="<?php echo BASE_URL . '/assets/img/' . $post['image']; ?>" alt="">
              <a href="" class="title">
              <h4><?php echo $post['title']; ?></h4>
              </a>
            </div>
          <?php endforeach; ?>



        </div>
        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>
            <?php foreach ($topics as $topic): ?>
              <li>
                <a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo htmlspecialchars($topic['name']); ?>
                </a>
              </li>
            <?php endforeach; ?>



          </ul>
        </div>
      </div>
      <!-- // sidebar -->
    </div>
    <!--// Content -->
  </div>
  <!-- end of page-wrapper -->
  <?php require(ROOT_PATH . "/includes/footer.php"); ?>
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <!-- Custom Script -->
  <script src="./assets/js/script.js"></script>
</body>

</html>