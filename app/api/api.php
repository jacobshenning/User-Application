<?php

require '../app/api/user.php';

function Controller($request) {

  if ($request == 'messages') {
    $response = json_encode(['Message Data']);
  } else if ($request == 'user') {
    $response = json_encode(['User Data']);
  }
  else {
    $response = 'error';
  }

  return $response;
}

?>
