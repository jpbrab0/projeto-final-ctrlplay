<?php
require_once '../models/database_connection.php';

if($_POST['password'] != $_POST['password_confirmation']){
    echo "<script>location.href='../views/index.php?password_incorrect=true'</script>";
} else {
    if(createUser($_POST['name'], $_POST['email'], $_POST['avatar_url'], $_POST['username'], $_POST['password'], $_POST['biograph'], $_POST['gender'])) {
        session_start();
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        echo "<script>location.href='../views/index.php?user_created=true'</script>";
    }
}

