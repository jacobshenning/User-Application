<?php

/*	============
 *	Setup
 *	============
**/

# Includes

require '../private/vendor/AltoRouter.php';
require '../app/api/api.php';
require '../private/views/master.php';

# Create Router

$router = new AltoRouter();

/*	============
 *	Page Route
 *	============
**/

# Home

$router->map( 'GET', '/', function() {
	require '../private/views/home/home.php';
});

# About

$router->map( 'GET', '/about', function() {
	echo 'about';
});

/*	============
 *	API Routes
 *	============
**/

# API Resource Controller

$router->map( 'POST', '/api/controller', function() {

	//	Get our server object
	require '../app/api/server.php';

	//	Authenticate that token
	if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
	  $response = $server->getResponse()->send();
	} else if (isset($_POST['request'])) {
		$response = Controller($_POST['request']);
	} else {
		$response = '{"API_Systems":"Online"}';
	}

	// Response
	echo $response;
});

#	API Token

$router->map( 'POST', '/api/token', function() {

	//	Get our server object
	require '../app/api/server.php';

	//	Check Credentials
	$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();
});

/*	============
 *	Calculate Requests
 *	============
**/

# match current request url
$match = $router->match();

# call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
	echo '404';
}

?>
