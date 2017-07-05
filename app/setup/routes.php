<?php

require '../private/vendor/AltoRouter.php';
require '../app/api/api.php';

$router = new AltoRouter();

// General Pages

$router->map( 'GET', '/', function() {
	echo 'home';
});

$router->map( 'GET', '/about', function() {
	echo 'about';
});

// API

$router->map( 'POST', '/api', function() {
	if (isset($_POST['request'])) {
		echo API($_POST['request']);
	}
});

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
	echo '404';
}

?>
