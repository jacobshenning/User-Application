<?php

require '../app/api/user.php';

function Controller($request) {

  if ($request == 'messages') {
    $response = 'messages';
  } else {
    $response = 'error';
  }

  return $response;
}

?>
