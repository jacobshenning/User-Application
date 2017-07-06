<?php

function Snippet($name) {
  include '../private/views/snippets/' . $name . '.php';
}

function Scripts($array) {

  $response = '';

  foreach ($array as &$script) {
    $response .= '<script src=\'js/' . $script . '.js\'> </script>';
  }

  return $response;
}

?>
