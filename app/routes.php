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

  require 'app/api.php';

  if (isset($_POST['request'])) {
    $request = $_POST['request'];
  } else {
    echo 'fail';
  }
});

# Compute

$match = $app->match();

if ( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
	echo '<h1>404</h1><br><br><hr><br><a href="/"> Home </a>';
}
?>
