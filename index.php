<?php

include("init.php");
include("modules/authentication.php");

if ( checkCookie($_COOKIE["id"]) ) {
    
    if (!isset($vars['action'])) {
        $vars['action']='list';
        $vars['user'] = $_COOKIE["id"];
    }
    
} else {
    // set default langue for all user as en
    setcookie("lang", "en");
    header("location: login.php");
    
}

include("modules/todo.php");
?>