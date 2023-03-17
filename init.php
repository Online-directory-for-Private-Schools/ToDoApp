<?php

error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include("lib/db.php");
include("lib/utils.php");
$vars=get_input_vars(); 
// sets the language to 
// the one specified by user
// must be after $vars
include("modules/lang.php");

// set the language from cookies
$lang = $_COOKIE["lang"];
include("lang/".$lang.".php");


//It is very stupid to share passwords within GIT, but for demostration, we will close our eyes on this principle.

$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = '';
$dbname = 'todo-db';


$db = new db($dbhost, $dbuser, $dbpass, $dbname);


?>