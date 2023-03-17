<?php

$page = $_SERVER['PHP_SELF'];

switch($vars["lang"]){
   case "en" :
    setcookie("lang", "en");
    header("location: $page");  // refresh the screen
    break;

    case "fr":
    setcookie("lang", "fr");
    header("location: $page");  // refresh the screen

    break;    
}

?>