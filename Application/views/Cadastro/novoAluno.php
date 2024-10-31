<!DOCTYPE html>
<html lang="pt-br">
<?php
// if ($_POST != "" && is_null($_POST)) {
//     echo '<pre>';
//     var_dump($_POST);
//     die;
// }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BussFeed | Cadastro</title>
    <link rel="stylesheet" href="../../../public/assets/css/styleCadastro.css">
</head>

<body>
    <section class="container">
        <header> <!-- header da página admin -->
            <div class="welcome">
                <h1 class="Titulo">FUMDESQL</h1>
                <h2 class="Subtitulo">CONTROLE DE BOLSISTAS FUMDES</h2>
                <h3 class="boas-vindas">Olá, <?php echo $_SESSION['NOME'] ?></h3>
            </div>
            <div>
                <img src="../../../public/assets/img/santa-catarina-flag.png" alt="Santa Catarina Flag" class="flag">
            </div>
        </header>
        <div class="innerConsole">
            <div class="screenDetail">
                <h2>Cadastro de Aluno</h2>
                <form class="studentDetailForm" action="inserirAluno.php" method="POST">
                    <label for="nomeAluno">Nome do Aluno:</label><br>
                    <input class="input-box" type="text" id="nomeAluno" name="nomeAluno" required><br>

                    <label for="matriculaAluno">Matrícula:</label><br>
                    <input class="input-box" type="number" id="matriculaAluno" name="matriculaAluno" required><br>

                    <label for="cpf">CPF:</label><br>
                    <input class="input-box" type="text" id="cpf" name="cpf" required><br>

                    <label for="telefone">Telefone:</label><br>
                    <input class="input-box" type="text" id="telefone" name="telefone" required><br>

                    <label for="dataIngresso">Data de Ingresso:</label><br>
                    <input class="input-box" type="date" id="dataIngresso" name="dataIngresso" required><br>

                    <label for="instituicao">Instituição:</label><br>
                    <input class="input-box" type="text" id="instituicao" name="instituicao" required><br>

                    <label for="faseAtual">Fase Atual:</label><br>
                    <input class="input-box" type="number" id="faseAtual" name="faseAtual" required><br>

                    <label for="email">Email:</label><br>
                    <input class="input-box" type="email" id="email" name="email" required><br>

                    <label for="senha">Senha:</label><br>
                    <input class="input-box" type="password" id="senha" name="senha" required><br>
                    <button id="btn-inserir" class="registraAluno" type="submit">Insere aluno</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>