<?php

switch($vars['action']){
    case "list":{
        $items = $db->query('
            SELECT * 
            FROM items 
            WHERE user_id = (?)
            ', $user["user_id"])->fetchAll();
        
        include("view/header.php");
        include("view/list.php");
        include("view/footer.php");
        exit;
    }

    case "do_add":{


        if($user == null || !isAuthorized()) {
            header("location: login.php");
            exit;
        }

        $user_id = $user["user_id"];

        $date=date_timestamp_get(date_create());

        $db->query("INSERT INTO items (title, create_time, user_id) VALUES (?,?,?)",$vars['title'], $date, $user_id);

        header("location: index.php");
        exit;
        
    }
    
    case "delete":{

        if($user == null || !isAuthorized()) {
            header("location: login.php");
        }

        $db->query("DELETE FROM items WHERE ITEM_ID=(?)",$vars['item_id']);
        header("location: index.php");
        exit;      
    }
    
    case "do_edit":{
        
        if($user == null || !isAuthorized()) {
            header("location: login.php");
        }

        $db->query("UPDATE items SET title = (?) WHERE item_id = (?)", $vars["title"],$vars["item_id"]);

        header("location: index.php?user=".$vars['user']);
        exit;
    }
    
    case "help":{
        //some code here to show help 
        exit;
    }
    
    
}


function isAuthorized() {
    return checkCookie($_COOKIE["token"])["isValid"];
}

?>