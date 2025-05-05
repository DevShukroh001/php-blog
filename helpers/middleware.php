<?php

function usersOnly($redirect = '/index.php')
{
  if (empty($_SESSION['id'])) {
    $_SESSION['message'] = 'You need to login first';
    $_SESSION['type'] = 'error';
    header('Location: ' . BASE_URL . $redirect);
    exit(0);
  }
}

function AdminOnly($redirect = '/index.php')
{
  if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
    $_SESSION['message'] = 'You are not authorized';
    $_SESSION['type'] = 'error';
    header('Location: ' . BASE_URL . $redirect);
    exit(0);
  }
}

function guestsOnly($redirect = '/index.php')
{
  if (isset($_SESSION['id'])) { 
    header('Location: ' . BASE_URL . $redirect);
    exit(0);
  }
}
