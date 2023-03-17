<?php

require __DIR__ . '/vendor/autoload.php';



// loading up the environment variables from the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// to assert the existence of the listed env variables
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASSWORD', 'SERVER', 'JWT_KEY']);


error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include("lib/db.php");
include("lib/utils.php");

$vars=get_input_vars();

$lang = 'en';

if($vars["lang"] == "fr"){
    $lang = 'fr';
}

include("lang/".$lang.".php");


//It is very stupid to share passwords within GIT, but for demostration, we will close our eyes on this principle.

$dbhost = $_ENV["DB_HOST"];
$dbuser = $_ENV["DB_USER"];
$dbpass = $_ENV["DB_PASSWORD"];
$dbname = $_ENV["DB_NAME"];


$db = new db($dbhost, $dbuser, $dbpass, $dbname);


?>