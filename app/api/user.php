<?php



function Login() {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $response = 'Login Reached';
  } else {
    $response = 'error';
  }

  return $response;
}

?>
