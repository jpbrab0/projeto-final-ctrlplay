<?php
require_once '../models/database_connection.php';

$user_data = getUsernameAndPassword($_POST['username'], $_POST['password']);

if (!empty($user_data)){
    session_start();

    $_SESSION['username'] = $_POST['username'];
    echo "<script>location.href='../views/home.php'</script>";
}

