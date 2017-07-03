<?php

# Includes

require 'vendor/AltoRouter.php';

# Initiate

$app = new AltoRouter();

# Establish

$app->map( 'GET', $router_path . '/', function() {
  echo 'Home';
});

$app->map( 'GET', $router_path . '/about', function() {
  echo 'About';
});

# Compute

$match = $app->match();

if ( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
	echo '404';
}
?>
