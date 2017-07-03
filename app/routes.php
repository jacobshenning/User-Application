<?php

# Includes

require 'vendor/AltoRouter.php';

# Initiate

$app = new AltoRouter();

# Establish

// App

$app->map( 'GET', $router_path . '/', function() {
  echo 'Website: Home';
});

$app->map( 'GET', $router_path . '/about', function() {
  echo 'Website: About';
});

// API

$app->map( 'POST', $router_path . '/api', function() {

  // API functions
  require 'app/api.php';

  // Check Type
  if (isset($_POST['request'])) {

    $request = $_POST['request'];

    $response = api($request);

  } else {
    $response = json_encode('No Request Made');
  }

  echo $response;
});

# Compute

$match = $app->match();

if ( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
	echo '<h1>404</h1><br><br><hr><br><a href="/"> Home </a>';
}
?>
