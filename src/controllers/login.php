<?php
require_once '../models/database_connection.php';

if (checkLogin($_POST['email'], $_POST['password'])){
    session_start();

    $_SESSION['email'] = $_POST['email'];
    $rs = getDataOfUser($_SESSION['email']);

    while($row = $rs->fetch(PDO::FETCH_OBJ)){
        $_SESSION['id'] = $row->id;
    }
    echo "<script>location.href='../views/home.php'</script>";
} else {
    echo "<script>location.href='../views/index.php?error=true'</script>";
}

