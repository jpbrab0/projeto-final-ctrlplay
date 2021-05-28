<?php

$connection = new PDO("mysql:host=localhost;dbname=ctrlplay", "root", "Senhashowdemais@1234");

function checkLogin($user_email,$user_password){
    global $connection;

    $rs = $connection->query("SELECT email, password FROM users WHERE email='$user_email' AND password='$user_password'");
    if($rs->rowCount()>0){
        return true;
    }
    else{
        return false;
    }
}
function createUser($name, $email, $avatar_url, $username, $password, $biograph, $gender) {
    global $connection;

    $query = $connection->prepare("INSERT INTO users(name,email,avatar_url,username,password,biograph,gender) VALUES (?,?,?,?,?,?,?)");
    $query->bindParam(1, $name);
    $query->bindParam(2, $email);
    $query->bindParam(3, $avatar_url);
    $query->bindParam(4, $username);
    $query->bindParam(5, $password);
    $query->bindParam(6, $biograph);
    $query->bindParam(7, $gender);

    $query->execute();

    return true;
}
function createPost($userID, $post_text, $total_likes) {
    global $connection;

    $query = $connection->prepare("INSERT INTO posts(userID,post_text) VALUES (?,?)");
    $query->bindParam(1, $userID);
    $query->bindParam(2, $post_text);

    $query->execute();

    return true;
}
function getDataOfUser($email) {
    global $connection;

    $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam(':email',$email);
    $query->execute();

    return $query;
}
function getDataOfUserWithId($id){
    global $connection;

    $query = $connection->prepare("SELECT * FROM users WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();

    return $query;
}
function getDataOfUserWithUsername($username){
    global $connection;

    $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam(':username', $username);
    $query->execute();

    return $query;
}
function getAllPosts(){
    global $connection;

    $query = $connection->query("SELECT * FROM posts");
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}
function getAllPostsOfUser($id){
    global $connection;

    $query = $connection->prepare("SELECT * FROM posts WHERE userID=:id");
    $query->bindParam('id', $id);
    $query->execute();

    return $query;
}
function getAllPostsOfUserByUsername($query_username){
    global $connection;

    $resultDataOfUser = getDataOfUserWithUsername($query_username);
    $userID = "";
    while($rowUser = $resultDataOfUser->fetch(PDO::FETCH_OBJ)){
        $userID = $rowUser->id;
    }

    $query = $connection->prepare("SELECT * FROM posts WHERE userID=:id");
    $query->bindParam('id', $userID);
    $query->execute();

    return $query;
}
function updateUser($userId, $name, $email, $avatar_url, $username, $password, $biograph, $gender) {
    global $connection;

    $query = $connection->prepare("UPDATE users SET name=:name,email=:email,avatar_url=:avatar_url,username=:username,password=:password,biograph=:biograph,gender=:gender WHERE id=:id");

    $query->bindParam(name, $name);
    $query->bindParam(email, $email);
    $query->bindParam(avatar_url, $avatar_url);
    $query->bindParam(username, $username);
    $query->bindParam(password, $password);
    $query->bindParam(biograph, $biograph);
    $query->bindParam(gender, $gender);
    $query->bindParam(id, $userId);

    $query->execute();

    return true;
}
function deletePostById($post_id){
    global $connection;

    $query = $connection->prepare("DELETE FROM posts WHERE postID=:postID");
    $query->bindParam(':postID', $post_id);
    $query->execute();

    return true;
}