<?php

include("init.php");
include("modules/authentication.php");

// function checkCookie($id) {
//     global $db;
//     $user_id= $id;
//     $users = $db->query("SELECT * FROM users WHERE user_id=(?)", $user_id)->fetchAll();
    
//     if(!in_array($id, $users)) {
//         return false;
//     }
//     return true;
// }

if ( isset($_COOKIE["id"]) ) {

    if (!isset($vars['action'])) {
        $vars['action']='list';
    }

} else {
    header("location: login.php");
    
}

include("modules/todo.php");
?>