<?php

# Setup

require 'vendor/AltoRouter.php';

# Initiate

$router_path = '';
$router = new AltoRouter();

# Routes

$router->map( 'GET', $router_path . '/token', function() {
  require 'token.php';
});

# Calculate

$match = $router->match();

if ( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
	echo '404';
}

?>
