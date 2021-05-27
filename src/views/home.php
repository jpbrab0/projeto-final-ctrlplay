<?php
session_start();
require_once "../models/database_connection.php";
// Verificando caso a pessoa não esteje logada na rede social.
if (empty($_SESSION['email'])) {
    echo "<script>location.href='./index.php?logged=false'</script>";
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
                    <a>Editar perfil</a>
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
            <input type="hidden" name="total_likes" value="0">
            <textarea name="post_text" id="post_text" placeholder="O que está acontecendo?"></textarea>
            <button type="submit">Postar</button>
        </form>
        <section class="all-posts">
            <?php
            $posts = getAllPosts();
            if(count($posts) > 0){
                for($i = 0; $i < count($posts); $i++) {
                    echo $posts[$i]['post_text']. "<br>";
                    echo "Likes: ".$posts[$i]['total_likes'];
                }
            }
            ?>
        </section>
    </section>
</body>
</html>
