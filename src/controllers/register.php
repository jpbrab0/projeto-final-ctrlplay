<?php
require_once '../models/database_connection.php';

if($_POST['password'] != $_POST['password_confirmation']){
    echo "<script>location.href='../views/index.php?password_incorrect=true'</script>";
} else {
    $rs = getDataOfUser($_POST['email']);

    while($row = $rs->fetch(PDO::FETCH_OBJ)){
        if($_POST['email'] == $row->email || $_POST['password'] == $row->password || $_POST['username'] == $row->username){
            echo "<script>location.href='../views/index.php?register_error=true'</script>";
        } else if(createUser($_POST['name'], $_POST['email'], $_POST['avatar_url'], $_POST['username'], $_POST['password'], $_POST['biograph'], $_POST['gender'])) {
            session_start();
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            echo "<script>location.href='../views/index.php?user_created=true'</script>";
        }
    }
}

