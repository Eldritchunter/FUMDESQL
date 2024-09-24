<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUMDESQL | Login</title>
    <link rel="stylesheet" href="../../../public/assets/css/style.css">
</head>

<body>
    <section class="container">
        <div class="fundoConsole">
            <header class="header">
                <h1 class="Titulo">FUMDESQL</h1>
                <h2 class="Subtitulo">CONTROLE DE BOLSISTAS FUMDES</h2>
            </header>
            <hr class="line">
            <form class="login-section" action="/login/login" method="POST">
                <div>
                    <label for="email">LOGIN</label>
                    <input class="input-box" type="text" name="email">
                </div>
                <div>
                    <label for="senha-label">SENHA</label>
                    <input class="input-box" type="password" name="senha">
                </div>
                <div>
                    <input class="forgot" type="submit" value="Esqueceu a senha?">
                    <br><br>
                    <input class="entrar" type="submit" value="Entrar">
                    <br><br>
                    <p class="register">Não possui login?</p>
                    <p class="register"><a href="/cadastro/tipo">Registre-se aqui.</a></p>
                </div>
                <hr class="lineFooter">
            </form>
        </div>
    </section>
    <script src="public/assets/JS/script.js"></script>
</body>

</html>