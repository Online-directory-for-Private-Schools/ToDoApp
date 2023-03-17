<?php

include("init.php");
include("modules/authentication.php");


$user = null;

$cookieCheck = checkCookie($_COOKIE["token"]);

if ( $cookieCheck["isValid"] ) {
    
    if (!isset($vars['action'])) {
        $vars['action']='list';
    }
    
    $user = $cookieCheck["user"];
    
} else {
    header("location: login.php");
}


include("modules/todo.php");


?>