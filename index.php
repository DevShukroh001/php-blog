<?php include("path.php");
require_once(ROOT_PATH . "/controllers/topics.php");



// Select all from the Posts

$posts = array();
$postsTitle = 'Recent Posts';

if (isset($_GET['t_id'])) {
  $posts = getPostsByTopicId($_GET['t_id']);
  $postsTitle = "You searched for Posts under " . $_GET['name'] . "'";
} else if (isset($_POST['search-term'])) {
  $postsTitle = "You searched for '" . htmlspecialchars($_POST['search-term']) . "'";
  $posts = searchPosts($_POST['search-term']);
} else {
  $posts = getPublishedPosts();
}

?>
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
  <title>Blog</title>
</head>

<body>

  <?php require(ROOT_PATH . "/includes/header.php"); ?>
  <?php require(ROOT_PATH . "/includes/messages.php"); ?>


  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <!-- post Slider -->
    <div class="post-slider">
      <h1 class="slider-title">Trending Posts</h1>
      <i class="fas fa-chevron-left prev"></i>
      <i class="fas fa-chevron-right next"></i>


      <div class="post-wrapper">

        <?php foreach ($posts as $post): ?>

          <div class="post">
            <img src="<?php echo BASE_URL . '/assets/img/' . $post['image']; ?>" alt="" class="slider-image">

            <div class="post-info">
              <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
              <i class="far fa-user"><?php echo $post['username']; ?></i>
              &nbsp;
              <i class="far fa-calendar"><?php echo date('F, Y', strtotime($post['created_at'])) ?></i>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>

    <!-- End post Slider -->

    <!-- Content -->

    <div class="content clearfix">
      <!-- Main Content -->
      <div class="main-content">
        <h1 class="recent-post-title"><?php echo $postsTitle ?></h1>

        <?php foreach ($posts as $post): ?>

          <div class="post clearfix">
            <img src="<?php echo BASE_URL . '/assets/img/' . $post['image']; ?>" alt="" class="post-image">
            <div class="post-preview">
              <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
              <i class="far fa-user"><?php echo $post['username']; ?></i>
              &nbsp;
              <i class="far fa-calendar"> <?php echo date('F, Y', strtotime($post['created_at'])) ?></i>
              <p class="preview-text">
                <?php echo substr(strip_tags(html_entity_decode($post['body'])), 0, 150) . '...'; ?>
              </p>
              <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
            </div>
          </div>
        <?php endforeach; ?>



      </div>
      <div class="sidebar">
        <div class="section search">
          <h2 class="section-title">Search</h2>
          <form action="index.php" method="post">
            <input type="text" name="search-term" class="text-input" placeholder="Search......">
          </form>
        </div>
        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>

            <?php foreach ($topics as $topic): ?>
              <li>
                <a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>">
                  <?php echo htmlspecialchars($topic['name']); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
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