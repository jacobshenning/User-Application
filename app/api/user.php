<?php



function Login() {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, "http://http://user.jacobshenning.com/api/token.php");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_USERPWD, "testclient" . ":" . "testpass");

    $headers = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($curl);
    if (curl_errno($curl)) {
      echo 'Error:' . curl_error($curl);
    }

    curl_close ($curl);

    $response = $result;
  } else {
    $response = 'error';
  }

  return $response;
}

?>
