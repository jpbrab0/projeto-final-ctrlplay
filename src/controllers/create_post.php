<?php
require_once "../models/database_connection.php";

if($_POST['post_text'] != ""){
    if (createPost($_POST['userID'], $_POST['post_text'], $_POST['total_likes'])){
        echo "<script>location.href='../views/home.php'</script>";
    }
} else {
    echo "<script>location.href='../views/home.php?error=null_post'</script>";
}