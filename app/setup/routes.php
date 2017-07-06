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

// API Wrapper

$router->map( 'POST', '/api', function() {
	if (isset($_POST['request'])) {
		echo API($_POST['request']);
	}
});

// API

$router->map( 'POST', '/api/token', function() {
	require '../app/api/server.php';
	$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();
});

$router->map( 'POST', '/api/controller', function() {

	// include our OAuth2 Server object
	require_once __DIR__.'/server.php';

	// Handle a request to a resource and authenticate the access token
	if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
	    $server->getResponse()->send();
	    die;
	}

	echo json_encode(array('success' => true, 'message' => 'You accessed my APIs!'));
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
