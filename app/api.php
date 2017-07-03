<?php

function Login() {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $response = 'Login System In Progress';

    // Login Here

  } else {
    // Error
    if (!isset($_POST['username']) && !isset($_POST['password'])) {
      $response = 'Username and Password are Missing';
    } else if (!isset($_POST['username'])) {
      $response = 'Username is missing';
    } else if (!isset($_POST['userpass'])) {
      $response = 'Password is missing';
    }
  }
  return $response;
}

function api($request) {

  if ($request == 'test') {
    $response = 'API Online';
  } else if ($request == 'login') {
    $response = Login();
  } else {
    $response = 'Command Not Reconized';
  }

  return json_encode($response);
}

?>
