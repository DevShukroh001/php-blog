<?php

include(ROOT_PATH . "/includes/connect.php");

include(ROOT_PATH . "/helpers/middleware.php");
include(ROOT_PATH . "/helpers/validatePost.php");


$table = 'posts';

$topics = selectAll('topics');
$posts = selectAll($table);

$errors = array();
$id = "";
$title = "";
$body = "";
$topic_id = "";
$published = "";

// ✅ FIXED: changed $_POST to $post
if (isset($_GET['id'])) {
  $post = selectOne($table, ['id' => $_GET['id']]); // ✅ Correct: assign to a proper variable

  if ($post) { // ✅ Check if the post was found
    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $topic_id = $post['topic_id'];
    $published = $post['published'];
  }
}


// ✅ DELETE POST
if (isset($_GET['delete_id'])) {
  adminOnly();
  $count = delete($table, $_GET['delete_id']);
  $_SESSION['message'] = "Post deleted successfully";
  $_SESSION['type'] = "success";
  header("location: " . BASE_URL . "/admin/posts/index.php");
  exit();
}

// ✅ TOGGLE PUBLISH/UNPUBLISH
if (isset($_GET['published']) && isset($_GET['p_id'])) {
  adminOnly();
  $published = $_GET['published'];
  $p_id = $_GET['p_id'];

  $count = update($table, $p_id, ['published' => $published]);
  $_SESSION['message'] = "Post published state changed";
  $_SESSION['type'] = "success";
  header("location: " . BASE_URL . "/admin/posts/index.php");
  exit();
}

// ✅ ADD NEW POST
if (isset($_POST['add-post'])) {
  adminOnly();
  $errors = validatePost($_POST);

  if (!empty($_FILES['image']['name'])) {
    $image_name = time() . "_" . $_FILES['image']['name'];
    $destination = ROOT_PATH . "/assets/img/" . $image_name;

    $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

    if ($result) {
      $_POST['image'] = $image_name;
    } else {
      array_push($errors, "Failed to upload image");
    }
  } else {
    array_push($errors, "Post image required");
  }

  if (count($errors) == 0) {
    unset($_POST['add-post']);
    $_POST['user_id'] = $_SESSION['id'];
    $_POST['published'] = isset($_POST['published']) ? 1 : 0;
    $_POST['body'] = htmlentities($_POST['body']);

    $post_id = create($table, $_POST);
    $_SESSION['message'] = "Post created successfully";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/posts/index.php");
    exit(); // ✅ Added exit
  } else {
    $title = $_POST['title'] ?? '';
    $body = $_POST['body'] ?? '';
    $topic_id = $_POST['topic_id'] ?? '';
    $published = isset($_POST['published']) ? 1 : 0;
  }
}

// ✅ UPDATE POST
if (isset($_POST['update-post'])) {
  adminOnly();
  $errors = validatePost($_POST);

  if (!empty($_FILES['image']['name'])) {
    $image_name = time() . "_" . $_FILES['image']['name'];
    $destination = ROOT_PATH . "/assets/img/" . $image_name;

    $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

    if ($result) {
      $_POST['image'] = $image_name;
    } else {
      array_push($errors, "Failed to upload image");
    }
  } else {
    array_push($errors, "Post image required");
  }

  if (count($errors) == 0) {
    $id = $_POST['id']; // ✅ Capture ID first
    unset($_POST['update-post'], $_POST['id']);

    $_POST['user_id'] = $_SESSION['id'];
    $_POST['published'] = isset($_POST['published']) ? 1 : 0;
    $_POST['body'] = htmlentities($_POST['body']);

    $post_id = update($table, $id, $_POST);

    $_SESSION['message'] = "Post updated successfully";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/posts/index.php");
    exit();
  } else {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $topic_id = $_POST['topic_id'];
    $published = isset($_POST['published']) ? 1 : 0;
  }
}
?>
