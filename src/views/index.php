<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/index.css">
    <link rel="shortcut icon" href="../../public/favicon.png" />
    <title>Login & Cadastro | Ctrl+Play</title>
</head>
<body>
    <header>
        <h2>Ctrl+Play</h2>
            <form action="/src/controllers/login.php" method="POST">
                <input name="email" placeholder="Digite seu Email">
                <input name="password" placeholder="Digite sua senha" type="password">

                <button type="submit">Login</button>
            </form>
    </header>
    <section class="register__container">
        <section class="about__container">
            <h1>Cadastre-se na Ctrl+Play!</h1>
            <img src="../../public/homer.gif" alt="homer dançando 2021 lol"/>
        </section>
        <form action="../controllers/register.php" method="POST">
            <section class="first-section">
                <div>
                    <label for="email">Email</label>
                    <input name="email" id="email" required type="email">
                </div>
                <div>
                    <label for="name">Name</label>
                    <input name="name" id="name" required>
                </div>
            </section>
            <section class="secound-section">
                <div>
                    <label for="avatar_url">Avatar_url</label>
                    <input name="avatar_url" id="avatar_url" type="url" required>
                </div>
                <div>
                    <label for="username">Username</label>
                    <input name="username" id="username" required>
                </div>
            </section>
            <section class="third-section">
                <div>
                    <label for="biograph">Biograph</label>
                    <input name="biograph" id="biograph" required>
                </div>
                <div>
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" required>
                        <option value="Select a gender" disabled>Select a gender</option>
                        <option value="Man" selected>Man</option>
                        <option value="Women">Women</option>
                        <option value="Outher">Outher</option>
                    </select>
                </div>
            </section>
            <section class="last-section">
                <div>
                    <label for="password">Senha</label>
                    <input name="password" id="password" type="password" required>
                </div>
                <div>
                    <label for="password_confirmation">Confirme sua senha</label>
                    <input name="password_confirmation" id="password_confirmation" type="password" required>
                </div>
            </section>
            <button type="submit">Register</button>
        </form>
    </section>
</body>
</html>
<?php
    if(!empty($_GET['error'])){
        if($_GET['error'] == true){
            // Gambiarra caso de ruim no login.
            echo "<script>alert('O email ou senha estão errados, por favor, tente novamente.')</script>";
            echo "<script>location.href='./index.php'</script>";
        }
    }

    if(!empty($_GET['user_created'])){
        if($_GET['user_created'] == true){
            // Gambiarra caso o usuário seja criado com sucesso.
            echo "<script>alert('Usuário criado com sucesso! Tente logar na sua conta!')</script>";
            echo "<script>location.href='./index.php'</script>";
        }
    }
    if(!empty($_GET['logged'])){
        if($_GET['logged'] == 'false'){
            // Gambiarra caso o usuário não esteja logado, envia um alerta.
            echo "<script>alert('Para acessar a home, por favor logue na sua conta.')</script>";
            echo "<script>location.href='./index.php'</script>";
        }
    }
    if(!empty($_GET['password_incorrect'])){
        if($_GET['password_incorrect'] == 'true'){
            // Gambiarra caso o usuário não esteja logado, envia um alerta.
            echo "<script>alert('As senhas utilizadas no cadastro não coincidem.')</script>";
            echo "<script>location.href='./index.php'</script>";
        }
    }
    if(!empty($_GET['register_error'])){
        if($_GET['register_error'] == 'true'){
            // Gambiarra caso o usuário não esteja logado, envia um alerta.
            echo "<script>alert('Alguns dados que você colocou para cadastro já foram utilizados, por favor tente novamente.')</script>";
            echo "<script>location.href='./index.php'</script>";
        }
    }
    if(!empty($_GET['user_updated'])){
        if($_GET['user_updated'] == 'true'){
            // Gambiarra caso o usuário não esteja logado, envia um alerta.
            echo "<script>alert('O seu usuário foi atualizado com sucesso, por favor logue em sua conta novamente.')</script>";
            echo "<script>location.href='./index.php'</script>";
        }
    }
?>