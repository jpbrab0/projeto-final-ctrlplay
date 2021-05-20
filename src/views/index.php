<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ctrl+Play</title>
</head>
<body>
    <!-- Falta o css ainda, calma lá amigão eu sei que ta feio só com o html mas tenha paciencia o css jaja ta ai -->
    <header>
        <h2>Ctrl+Play</h2>
        <section class="login__container">
            <form action="/controller/login.php" method="POST">
                <input name="username" placeholder="Digite seu usuário">
                <input name="password" placeholder="Digite sua senha">

                <button type="submit">Login</button>
            </form>
        </section>
    </header>
    <section class="register__container">
        <section class="about__container">
            <img src="" alt="svg show demais"/>
        </section>
        <form action="/controller/register.php" method="POST">
            <section class="email-and-password-section">
                <div>
                    <label for="email">Email</label>
                    <input name="email" id="email">
                </div>
                <div>
                    <label for="username">Username</label>
                    <input name="username" id="username">
                </div>
            </section>
            <section class="password-section">
                <div>
                    <label for="password">Senha</label>
                    <input name="password" id="password">
                </div>
                <div>
                    <label for="password_confirmation">Confirme sua senha</label>
                    <input name="password_confirmation" id="password_confirmation">
                </div>
            </section>
        </form>
    </section>
</body>
</html>