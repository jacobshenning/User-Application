<?php

// This keeps my info secret ;)
require '../app/setup/credentials.php';

// Define Credentials
$dsn      = 'mysql:dbname=' . $db_name . ';host=' . $db_host;
$username = $db_user;
$password = $db_pass;

// Include 0auth2
require_once('../private/vendor/OAuth2/Autoloader.php');
OAuth2\Autoloader::register();

// Setup Database
$storage = new OAuth2\Storage\Pdo(array('dsn' => $dsn, 'username' => $username, 'password' => $password));

// Pass a storage object or array of storage objects to the OAuth2 server class
$server = new OAuth2\Server($storage);

// Add the "Client Credentials" grant type (it is the simplest of the grant types)
$server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));

// Add the "Authorization Code" grant type (this is where the oauth magic happens)
$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));

?>
