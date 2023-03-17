<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;


switch($vars['action']){
    case "register":{

        // reading required variables

        $email = $vars['email'];
        $username = $vars['username'];
        $password = $vars['password'];

        
        if ( $email == null || $username == null|| $password == null) {
            header("location: signup.php");
            exit;
        }

        $existingUsers = $db->query("SELECT * FROM users WHERE email=(?)", $email)->fetchAll();

        if(sizeof($existingUsers) > 0) {
            header("location: signup.php?error=User already exists");
            exit;
        }


        $db->query("INSERT INTO users (username, email, password) VALUES (?,?,?)", $username, $email, $password);


        $newUser = $db->query("SELECT * FROM users WHERE email=(?)", $email)->fetchAll()[0];


        $jwt = generateJWT($newUser["user_id"]);


        // sending the jwt as a cookie
        setcookie("token", $jwt, null, "/", null, false, true);


        header("location: index.php");


        exit;
    }

    case "login":{
        
        $email = $vars['email'] ?? ' ';
        $password = $vars['password'] ?? ' ';

        $existingUsers = $db->query("SELECT * FROM users WHERE email=(?) AND password=(?)", $email, $password) ->fetchAll();

        if(sizeof($existingUsers) == 0) {
            header("location: login.php?error=Either email or password are not correct");
            exit;
        }


        $db->query("INSERT INTO users (username, email, password) VALUES (?,?,?)", $username, $email, $password);


        $newUser = $existingUsers[0];

        $jwt = generateJWT($newUser["user_id"]);

        setcookie("token", $jwt, null, "/", null, false, true);

        header("location: index.php");

    
        exit;
        
    }
    
    case "logout":{
        setcookie("token", "", null, "/", null, false, true);

        header("location: login.php");


        exit;      
    }
    
    
    
}

// function to check if the provided token is valid or not
function checkCookie($token) {
    global $db;

    $secretKey = $_ENV["JWT_KEY"];

    $isCookieValid = false;

    $candidateUser = null;


    if($token == null) {
        return array(
            "isValid" => false,
            "user" => null
        );
    }

    try {
        $decodedJWT = JWT::decode($token, new Key($secretKey, 'HS256'));

        $decoded_UserID = $decodedJWT->id;


        $candidateUser = $db->query("SELECT user_id FROM users WHERE user_id=(?)", $decoded_UserID)->fetchAll()[0];

        
        $isCookieValid = isTokenValid($decodedJWT);

    } catch (Exception $e) {
        $isCookieValid = false;
    }


    return array(
        "isValid" => $isCookieValid,
        "user" => ($isCookieValid ? $candidateUser : null)
    );

}

function isTokenValid($decodedJWT)
{
    $serverName = $_ENV["SERVER"];
    $now = new DateTimeImmutable();

    return ($decodedJWT->iss == $serverName &&
        $decodedJWT->nbf <= $now->getTimestamp() &&
        $decodedJWT->exp >= $now->getTimestamp()
    );
}


function generateJWT($id) {
    $secretKey = $_ENV["JWT_KEY"];
    $issuedAt = new DateTimeImmutable();
    $expire = $issuedAt->modify('+6 days')->getTimestamp();
    $serverName = $_ENV["SERVER"];


    // payload of the JWT
    $data = [
        // Issued at: time when the token was generated
        'iat' => $issuedAt->getTimestamp(),
        
         // Issuer
        'iss' => $serverName,
       
        // Not before
        'nbf' => $issuedAt->getTimestamp(),
        
        // Expire
        'exp' => $expire,
        
        // User name
        "id" => $id
    ];


    // generating the JWT, we'll use this to securely authenticate the user's session
    $jwt = JWT::encode($data, $secretKey, 'HS256');

    return $jwt;
}


?>