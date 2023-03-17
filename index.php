<?php

include("init.php");
include("modules/authentication.php");

$user = null;

$cookieCheck = checkCookie($_COOKIE["token"]);

$user = null;

$cookieCheck = checkCookie($_COOKIE["token"]);

if ( $cookieCheck["isValid"] ) {
    
    if (!isset($vars['action'])) {
        $vars['action']='list';
    }
    
    $user = $cookieCheck["user"];
    
} else {
    // set default langue for all user as en
    setcookie("lang", "en");
    header("location: login.php");
}


include("modules/todo.php");


?>