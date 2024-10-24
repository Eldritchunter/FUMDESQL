<!DOCTYPE html>
<html lang="pt-br">
<?php

date_default_timezone_set('America/Bahia');

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BussFeed | Home</title>
    <link rel="stylesheet" href="../../../public/assets/css/styleAdmin.css">
</head>

<body>
    <section class="container">
        <header> <!-- header da página admin -->
            <div>
                <h1 class="Titulo">FUMDESQL</h1>
                <h2 class="Subtitulo">CONTROLE DE BOLSISTAS FUMDES</h2>
                <br>
                <h3 class="boas-vindas">Olá, <?php echo $_SESSION['NOME'] ?></h3>
            </div>
        <div class="innerConsole"> <!-- detalhamento dos alunos-->
            <div>
                <div class="screenDetail">
                    <h2>Cadastro de Aluno</h2>
                    <form action="inserirAluno.php" method="POST">
                        <label for="nomeAluno">Nome do Aluno:</label>
                        <input type="text" id="nomeAluno" name="nomeAluno" required><br>

                        <label for="matriculaAluno">Matrícula:</label>
                        <input type="number" id="matriculaAluno" name="matriculaAluno" required><br>

                        <label for="cpf">CPF:</label>
                        <input type="text" id="cpf" name="cpf" required><br>

                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" required><br>

                        <label for="dataIngresso">Data de Ingresso:</label>
                        <input type="date" id="dataIngresso" name="dataIngresso" required><br>

                        <label for="instituicao">Instituição:</label>
                        <input type="text" id="instituicao" name="instituicao" required><br>

                        <label for="faseAtual">Fase Atual:</label>
                        <input type="number" id="faseAtual" name="faseAtual" required><br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required><br>

                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required><br>
                </div>
            </div>
    </section>
    <script>
        function mostraInfo(idAluno) {
            var json = JSON.parse('<?= json_encode($data['alunos'], JSON_UNESCAPED_LINE_TERMINATORS) ?>');
            console.log(json);
            json.forEach((aluno) => {
                if (aluno.idAluno == idAluno) {
                    document.getElementById('studentName').innerHTML = aluno.nomeAluno
                    document.getElementById('studentId').innerHTML = aluno.matriculaAluno
                    document.getElementById('studentCPF').innerHTML = aluno.cpf
                    document.getElementById('studentFase').innerHTML = aluno.faseAtual
                    document.getElementById('studentEmail').innerHTML = aluno.email
                    document.getElementById('studentPhone').innerHTML = aluno.telefone
                }
            })
        }
    </script>
</body>

</html>