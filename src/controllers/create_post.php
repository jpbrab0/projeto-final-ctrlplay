<?php
require_once "../models/database_connection.php";

if (createPost($_POST['userID'], $_POST['post_text'], $_POST['total_likes'])){
    echo "<script>location.href='../views/home.php'</script>";
}