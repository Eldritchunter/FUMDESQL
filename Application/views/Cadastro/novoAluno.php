<!DOCTYPE html>
<html lang="pt-br">
<?php

date_default_timezone_set('America/Bahia');

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BussFeed | Cadastro</title>
    <link rel="stylesheet" href="../../../public/assets/css/styleCadastro.css">
</head>

<body>
    <section class="containerNew">
        <header> <!-- header da página admin -->
            <div>
                <h1 class="Titulo">FUMDESQL</h1>
                <h2 class="Subtitulo">CONTROLE DE BOLSISTAS FUMDES</h2>
                <h3 class="boas-vindas">Olá, <?php echo $_SESSION['NOME'] ?></h3>
            </div>
            <div>
                <img src="../../../public/assets/img/santa-catarina-flag.png" alt="Santa Catarina Flag" class="flag">
            </div>
        </header>
        <div>
            <div class="screenDetail">
                <h2>Cadastro de Aluno</h2>
                <form action="inserirAluno.php" method="POST">
                    <label for="nomeAluno">Nome do Aluno:</label>
                    <input class="input-box" type="text" id="nomeAluno" name="nomeAluno" required><br>

                    <label for="matriculaAluno">Matrícula:</label>
                    <input class="input-box" type="number" id="matriculaAluno" name="matriculaAluno" required><br>

                    <label for="cpf">CPF:</label>
                    <input class="input-box" type="text" id="cpf" name="cpf" required><br>

                    <label for="telefone">Telefone:</label>
                    <input class="input-box" type="text" id="telefone" name="telefone" required><br>

                    <label for="dataIngresso">Data de Ingresso:</label>
                    <input class="input-box" type="date" id="dataIngresso" name="dataIngresso" required><br>

                    <label for="instituicao">Instituição:</label>
                    <input class="input-box" type="text" id="instituicao" name="instituicao" required><br>

                    <label for="faseAtual">Fase Atual:</label>
                    <input class="input-box" type="number" id="faseAtual" name="faseAtual" required><br>

                    <label for="email">Email:</label>
                    <input class="input-box" type="email" id="email" name="email" required><br>

                    <label for="senha">Senha:</label>
                    <input class="input-box" type="password" id="senha" name="senha" required><br>
            </div>
            <a href="btn-inserir"><button type="button"></button></a>
        </div>
    </section>
    <script>
        function mostraInfo(idAluno) {
            var json = JSON.parse('<?= json_encode($data['alunos'], JSON_UNESCAPED_LINE_TERMINATORS) ?>');
            console.log(json);
            json.forEach((aluno) => {
                if (aluno.idAluno == idAluno) {
                    document.getElementById('btn-inserir').setAttribute("href", "/cadastro/novoAluno/");
                }
            })
        }
    </script>
</body>

</html>