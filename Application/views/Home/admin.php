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
            <div class="welcome">
                <h1 class="Titulo">FUMDESQL</h1>
                <h2 class="Subtitulo">CONTROLE DE BOLSISTAS FUMDES</h2>
                <h3 class="boas-vindas">Olá, <?php echo $_SESSION['NOME'] ?></h3>
            </div>
            <div>
                <img src="../../../public/assets/img/santa-catarina-flag.png" alt="Santa Catarina Flag" class="flag">
            </div>
        </header>
        <br>
        <div class="innerConsole"> <!-- listagem de alunos -->
            <div class="screenList">
                <h1>Listagem de Alunos</h1>
                <ul class="studentList">
                    <?php foreach ($data['alunos'] as $aluno) {

                    ?>
                        <li onclick="mostraInfo(<?php echo $aluno['idAluno'] ?>)" class="studentItem">
                            <?php echo $aluno['nomeAluno'] ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <a href="/cadastro/novoAluno"><button class="registraAluno" type="button">Registrar aluno</button></a>
        </div>
        <div class="innerConsole"> <!-- detalhamento dos alunos-->
            <div>
                <div class="screenDetail">
                    <form class="studentDetailForm">
                        <h1>Detalhes do Aluno</h1>
                        <div class="formGroup">
                            <label for="studentName">Nome:</label>
                            <p id="studentName" name="studentName"></p>
                        </div>
                        <div class="formGroup">
                            <label for="studentId">Matrícula:</label>
                            <p id="studentId" name="studentId"></p>
                        </div>
                        <div class="formGroup">
                            <label for="studentCPF">CPF:</label>
                            <p id="studentCPF" name="studentCPF"></p>
                        </div>
                        <div class="formGroup">
                            <label for="studentCPF">Fase:</label>
                            <p id="studentFase" name="studentFase"></p>
                        </div>
                        <div class="formGroup">
                            <label for="studentEmail">E-mail:</label>
                            <p id="studentEmail" name="studentEmail"></p>
                        </div>
                        <div class="formGroup">
                            <label for="studentPhone">Telefone:</label>
                            <p id="studentPhone" name="studentPhone"></p>
                        </div>
                        <a id="btn-inserir"><button class="insereDoc" type="button">Upload</button></a>
                    </form>
                    <div>
                    <h1>Histórico de instituições</h1>
                    <ul class="historicoInstituicoes" id="historicoInstituicoes">
                    
                    </ul>
                </div>
                </div>
                <a id="btn-deletar"><button class="deletaAluno" type="button">Deletar Aluno</button></a>
            </div>
    </section>
    <script>
        function mostraInfo(idAluno) {
            var json = JSON.parse('<?= json_encode($data['alunos'], JSON_UNESCAPED_LINE_TERMINATORS) ?>');
            var jsonInst = JSON.parse('<?= json_encode($data['instituicoes'], JSON_UNESCAPED_LINE_TERMINATORS) ?>');

            
            json.forEach((aluno) => {
                if (aluno.idAluno == idAluno) {
                    document.getElementById('studentName').innerHTML = aluno.nomeAluno
                    document.getElementById('studentId').innerHTML = aluno.matriculaAluno
                    document.getElementById('studentCPF').innerHTML = aluno.cpf
                    document.getElementById('studentFase').innerHTML = aluno.faseAtual
                    document.getElementById('studentEmail').innerHTML = aluno.email
                    document.getElementById('studentPhone').innerHTML = aluno.telefone

                    document.getElementById('historicoInstituicoes').innerHTML = ''
                    jsonInst.filter(i => i.idAluno == idAluno).forEach(i => {
                        document.getElementById('historicoInstituicoes').innerHTML += `<li>` + i.nomeInstituicao + `</li>`
                    });

                    document.getElementById('btn-deletar').setAttribute("href", "/cadastro/deletarAluno/" + aluno.idAluno);
                    document.getElementById('btn-inserir').setAttribute("href", "/cadastro/novoDocumento/" + aluno.idAluno);
                }
            })
        }
    </script>
</body>

</html>