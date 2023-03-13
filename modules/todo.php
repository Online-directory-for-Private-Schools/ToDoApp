<?php

switch($vars['action']){
    case "list":{
        $items = $db->query('SELECT * FROM items')->fetchAll();
        
        include("view/header.php");
        include("view/list.php");
        include("view/footer.php");
        exit;
    }break;

    case "do_add":{
        $date=date_create();

        $db->query("INSERT INTO items (title, create_time) VALUES (?,?)",$vars['title'], date_timestamp_get($date));
        header("location: index.php");
        exit;
        
    }break;
    
    case "delete":{
        //Some code here to delete ....
        exit;        
    }break;
    
    case "do_edit":{
        $db->query("UPDATE items SET title = (?) WHERE item_id = (?)", $vars["title"],$vars["item_id"]);

        header("location: index.php");
        exit;
    }break;
    
    case "help":{
        //some code here to show help 
        exit;
    }break;
    
    
}

?>