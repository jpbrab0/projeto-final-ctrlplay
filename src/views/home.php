<?php
session_start();
require_once "../models/database_connection.php";

$_SESSION['liked_posts'] = [];

// Verificando caso a pessoa não esteja logada na rede social.
if (empty($_SESSION['email'])) {
    echo "<script>location.href='./index.php?logged=false'</script>";
}
if(!empty($_GET["error"])){
    if($_GET["error"] = "null_post"){
        echo "<script>alert('Por favor preencha o campo de texto para publicar o seu post.')</script>";
        echo "<script>location.href='../views/home.php'</script>";
    }
}
?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../public/favicon.png"/>
    <link rel="stylesheet" href="../../public/styles/home.css">
    <title>Página Inicial | Ctrl+Play</title>
</head>
<body>
    <header>
        <img src="../../public/logo-ctrlplay.png">
        <section class="current-user">
            <img src="<?php
                $rs = getDataOfUser($_SESSION['email']);

                while($row = $rs->fetch(PDO::FETCH_OBJ)){
                    echo $row->avatar_url;
                }
            ?>">
            <div>
                <h2><?php
                    $rs = getDataOfUser($_SESSION['email']);

                    while($row = $rs->fetch(PDO::FETCH_OBJ)){
                        echo "Olá ".$row->username."!";
                    }
                    ?></h2>
                <div>
                    <a href="update_profile.php">Editar perfil</a>
                    <a href="../controllers/disconnect.php">Sair.</a>
                </div>
            </div>
        </section>
    </header>

    <section class="mid-container">
        <form class="create-post" method="POST" action="../controllers/create_post.php">
            <label for="post_text">Criar um post</label>
            <input type="hidden" name="userID" value="<?php
            $rs = getDataOfUser($_SESSION['email']);

            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                echo $row->id;
            }
            ?>">
            <textarea name="post_text" id="post_text" placeholder="O que está acontecendo?"></textarea>
            <button type="submit">Postar</button>
        </form>
        <section class="all-posts">
            <?php
            $posts = getAllPosts();

            $avatarUrlOfUser = "";
            $result = getDataOfUser($_SESSION['email']);

            while($row2 = $result->fetch(PDO::FETCH_OBJ)){
                $avatarUrlOfUser = $row2->avatar_url;
            }
            function getNameOfAuthor($id){
                $rs = getDataOfUserWithId($id);
                while($row = $rs->fetch(PDO::FETCH_OBJ)){
                    return $row->username;
                }
            }
            if(count($posts) > 0){
                for($i = 0; $i < count($posts); $i++) {
                    $postID = $posts[$i]['postID'];
                    echo "<div class='post'>";
                        echo "<nav>";
                            echo "<img ". "src='".$avatarUrlOfUser."'".">";
                            echo "<h3>"."Escrito por ". "<a href='". getNameOfAuthor($posts[$i]['userID']) ."'>" .getNameOfAuthor($posts[$i]['userID']). "</a>" . "</h3>";
                        echo "</nav>";

                        echo "<p>" . $posts[$i]['post_text']."</p>";

                        if($_SESSION['id'] == $posts[$i]['userID']){
                            echo "<a href=../controllers/delete_post.php?id=".$postID.">Apagar post</a>";
                        }
                    echo "</div>";
                }
            }
            ?>
            <hr>
            <br>
            <hr>
        </section>
    </section>
</body>
</html>
