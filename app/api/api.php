<?php

require '../app/api/user.php';

function API($request) {

  if ($request == 'login') {
    $response = Login();
  } else {
    $response = 'error';
  }

  return $response;
}

?>
