<?php
require_once "../models/database_connection.php";
if(!empty($_GET['id'])){
    if(deletePostById($_GET['id'])){
        echo "<script>location.href='../views/home.php'</script>";
    }
}