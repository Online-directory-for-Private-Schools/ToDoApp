<?php

switch($vars['action']){
    case "register":{
        // read password and pw from $vars
        // check if user exists
        // if user exists, generate session token and redirect to index.php with cookies set
        // if not, give error msg

        //TODO: make index.php handle auth


        $email = $vars['email'];
        $username = $vars['username'];
        $password = $vars['password'];

        $existingUsers = $db->query("SELECT * FROM users WHERE email=(?)", $email)->fetchAll();

        if(sizeof($existingUsers) > 0) {
            header("location: reigster.php?error=User already exists");
            exit;
        }


        $db->query("INSERT INTO users (username, email, password) VALUES (?,?,?)", $username, $email, $password);


        $newUser = $db->query("SELECT * FROM users WHERE email=(?)", $email)->fetchAll()[0];

        setcookie("id", $newUser["user_id"], null, "/", null, false, true);


        // TODO: make index.php handle login
        header("location: index.php");


        exit;
    }

    case "login":{
        
        $email = $vars['email'] | ' ';
        $password = $vars['password'] | ' ';

        $existingUsers = $db->query("SELECT * FROM users WHERE email=(?) AND password=(?)", $email, $password) ->fetchAll();

        if(sizeof($existingUsers) == 0) {
            header("location: login.php?error=Either email or password are not correct");
            exit;
        }


        $db->query("INSERT INTO users (username, email, password) VALUES (?,?,?)", $username, $email, $password);


        $newUser = $existingUsers[0];

        setcookie("id", $newUser["user_id"], null, "/", null, false, true);


        // TODO: make index.php handle login
        header("location: index.php");

        
        exit;
        
    }
    
    case "logout":{
        setcookie("id", "", null, "/", null, false, true);

        // TODO: make index.php handle login
        header("location: index.php");


        exit;      
    }
    
    
    
}

// function to check if the user hasn't touched the cookie id

?>