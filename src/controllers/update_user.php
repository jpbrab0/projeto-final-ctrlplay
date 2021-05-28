<?php
require_once "../models/database_connection.php";

session_start();

if(updateUser( $_SESSION['id'], $_POST['name'], $_POST['email'], $_POST['avatar_url'], $_POST['username'], $_POST['password'], $_POST['biograph'], $_POST['gender'])){
    session_destroy();
    echo "<script>location.href='../views/index.php?user_updated=true'</script>";
}