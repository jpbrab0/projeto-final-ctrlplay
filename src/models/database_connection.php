<?php

$connection = new PDO("mysql:host=localhost;dbname=ctrlplay", "root", "Senhashowdemais@1234");

function getUsernameAndPassword($login_username, $login_password) {
    global $connection;

    $query = $connection->prepare("SELECT username,password FROM users where username=:username AND password=:password");
    $query->bindParam(':username',$login_username);
    $query->bindParam(':password',$login_password);
    $query->execute();

    return $query;
}
