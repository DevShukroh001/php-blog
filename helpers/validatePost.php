<?php

function validatePost($post) {
  $errors = array();

  if (!isset($post['title']) || empty($post['title'])) {
      array_push($errors, 'Title is required');
  }
  if (!isset($post['body']) || empty($post['body'])) {
      array_push($errors, 'Body is required');
  }
  if (!isset($post['topic_id']) || empty($post['topic_id'])) {
      array_push($errors, 'Please select a topic');
  }
  

  if (!empty($post['title'])) {
  $existingPost = selectOne('posts', ['title' => $post['title']]);

  if ($existingPost) {
    if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
      array_push($errors, 'Post with this title already exists');
    }

    if (isset($post['add-post'])) {
      array_push($errors, 'Post with this title already exists');
    }
  }
}


  return $errors;
}