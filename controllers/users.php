<?php 

include(ROOT_PATH ."/includes/connect.php");

  if (isset($_POST['register-btn'])) {
    unset($_POST['register-btn'], $_POST['passwordconf']);
    $_POST['admin'] = 1;


    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $user_id = create('blogs', $_POST);
    $user = selectOne('blogs', ['id' => $user_id]);

    dd($user);
  }


  