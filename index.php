<?php

include("init.php");
include("modules/authentication.php");


if ( isset($_COOKIE["id"]) ) {

    if (!isset($vars['action'])) {
        $vars['action']='list';
        $vars['user'] = $_COOKIE["id"];
    }

} else {
    header("location: login.php");
    
}

include("modules/todo.php");
?>