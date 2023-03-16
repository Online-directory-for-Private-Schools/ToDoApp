<?php

switch($vars['action']){
    case "list":{
        $items = $db->query('
            SELECT * 
            FROM items 
            WHERE user_id = (?)
            ', $vars['user'])->fetchAll();
        
        include("view/header.php");
        include("view/list.php");
        include("view/footer.php");
        exit;
    }break;

    case "do_add":{
        if ( !isset($vars['user'])) {
            // header("location: index.php");
            break;
        }
        $date=date_create();
        $db->query("INSERT INTO items (title, create_time, user_id) VALUES (?,?,?)",$vars['title'], date_timestamp_get($date), $vars['user']);
        header("location: index.php");
        exit;
        
    }break;
    
    case "delete":{
        $db->query("DELETE FROM items WHERE ITEM_ID=(?)",$vars['item_id']);
        header("location: index.php");
        exit;      
    }break;
    
    case "do_edit":{
        $db->query("UPDATE items SET title = (?) WHERE item_id = (?)", $vars["title"],$vars["item_id"]);

        header("location: index.php?user=".$vars['user']);
        exit;
    }break;
    
    case "help":{
        //some code here to show help 
        exit;
    }break;
    
    
}

?>