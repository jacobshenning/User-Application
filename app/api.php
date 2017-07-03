<?php

function Login() {
  if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = DB_Conn();

    $sql = 'SELECT * FROM users';
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
      if ($row['username'] == $username) {
        if ($row['password'] ==  $password) {
          $response = 'Logged in';
        } else {
          $response = 'Incorrect Password';
        }
      } else {
        $response = 'Username not found';
      }
    }

    $conn->close();

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
