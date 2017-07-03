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

if ( $app->match() && is_callable( $app->match()['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
	echo '404';
}

?>
