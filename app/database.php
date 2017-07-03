<?php

function DB_Conn() {

  $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

  return $conn
}

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";


?>
