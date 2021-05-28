<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../public/styles/update_profile.css">
    <link rel="shortcut icon" href="../../public/favicon.png"/>
    <title>Editar Perfil | Ctrl+Play</title>
</head>
<body>
    <section>
        <form action="../controllers/update_user.php" method="POST">
            <?php
            require_once '../models/database_connection.php';
            session_start();
            $rs = getDataOfUserWithId($_SESSION['id']);
            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                ?>


                <section class="first-section">
                    <div>
                        <label for="email">Email</label>
                        <input name="email" id="email" readonly type="email" value="<?php echo $row->email?>">
                    </div>
                    <div>
                        <label for="name">Name</label>
                        <input name="name" id="name" required value="<?php echo $row->name?>">
                    </div>
                </section>
                <section class="secound-section">
                    <div>
                        <label for="avatar_url">Avatar_url</label>
                        <input name="avatar_url" id="avatar_url" type="url" required value="<?php echo $row->avatar_url?>">
                    </div>
                    <div>
                        <label for="username">Username</label>
                        <input name="username" id="username" readonly value="<?php echo $row->username?>">
                    </div>
                </section>
                <section class="third-section">
                    <div>
                        <label for="biograph">Biograph</label>
                        <input name="biograph" id="biograph" required value="<?php echo $row->biograph?>">
                    </div>

                </section>
                <div class="total-line">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" required>
                        <option value="Select a gender" disabled>Select a gender</option>
                        <option value="Man" selected>Man</option>
                        <option value="Women">Women</option>
                        <option value="Outher">Outher</option>
                    </select>
                </div>
                <section class="last-section">
                    <div>
                        <label for="password">Senha</label>
                        <input name="password" id="password" type="password" readonly value="<?php echo $row->password?>">
                    </div>
                </section>
                <?php
            }
            ?>
            <button type="submit">Update</button>
        </form>
    </section>
</body>
</html>