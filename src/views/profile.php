<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../public/favicon.png"/>
    <link rel="stylesheet" href="../../public/styles/home.css">
    <link rel="stylesheet" href="../../public/styles/profile.css">
    <title>Perfil | Ctrl+Play</title>
</head>
<body>
    <section class="profile_container">
        <?php
        require_once '../models/database_connection.php';
        session_start();
        if (empty($_GET['user'])){
            $rs = getDataOfUserWithId($_SESSION['id']);
            while($row = $rs->fetch(PDO::FETCH_OBJ)){
        ?>
                <nav>
                    <img src="<?php echo $row->avatar_url?>">
                    <div>
                        <h1>Perfil de <?php echo $row->name?>(<?php echo $row->username?>)</h1>
                        <p>Sobre <?php echo $row->username?>: <?php echo $row->biograph?></p>
                    </div>
                </nav>
                <section class="content">

                </section>
                <section class="all-posts">
                    <?php
                    $posts = getAllPostsOfUser($_SESSION['id']);

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
                    $rs = getAllPostsOfUser($_SESSION['id']);
                    while($row = $rs->fetch(PDO::FETCH_OBJ)){

                            echo "<div class='post'>";
                            echo "<nav>";
                            echo "<img ". "src='".$avatarUrlOfUser."'".">";
                            echo "<h3>"."Escrito por ". "<a href='profile.php?user=".getNameOfAuthor($row->userID)."'>" .getNameOfAuthor($row->userID). "</a>" . "</h3>";
                            echo "</nav>";

                            echo "<p>" . $row->post_text."</p>";

                            if($_SESSION['id'] == $row->userID){
                                echo "<a href=../controllers/delete_post.php?id=".$row->postID.">Apagar post</a>";
                            }
                            echo "</div>";
                        }
                    ?>
                    <hr>
                    <br>
                    <hr>
                </section>
            <?php
            }
        } else {

        ?>
        <?php
        $rs = getDataOfUserWithUsername($_GET['user']);
        while($row = $rs->fetch(PDO::FETCH_OBJ)){
        ?>
        <nav>
            <img src="<?php echo $row->avatar_url?>">
            <div>
                <h1>Perfil de <?php echo $row->name?>(<?php echo $row->username?>)</h1>
                <p>Sobre <?php echo $row->username?>: <?php echo $row->biograph?></p>
            </div>
        </nav>
        <section class="content">

        </section>
            <section class="all-posts">
                <?php
                $posts = getAllPostsOfUserByUsername($_GET['user']);

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
                $rs = getAllPostsOfUserByUsername($_GET['user']);
                while($row = $rs->fetch(PDO::FETCH_OBJ)){

                    echo "<div class='post'>";
                    echo "<nav>";
                    echo "<img ". "src='".$avatarUrlOfUser."'".">";
                    echo "<h3>"."Escrito por ". "<a href='profile.php?user=".getNameOfAuthor($row->userID)."'>" .getNameOfAuthor($row->userID). "</a>" . "</h3>";
                    echo "</nav>";

                    echo "<p>" . $row->post_text."</p>";

                    if($_SESSION['id'] == $row->userID){
                        echo "<a href=../controllers/delete_post.php?id=".$row->postID.">Apagar post</a>";
                    }
                    echo "</div>";
                }
                ?>
                <hr>
                <br>
                <hr>
            </section>
        <?php
            }
        }
        ?>
    </section>
</body>
</html>