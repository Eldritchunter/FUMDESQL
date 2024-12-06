<!DOCTYPE html>
<html lang="pt-br">
<?php
date_default_timezone_set('America/Bahia');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BussFeed | Estudante</title>
    <link rel="stylesheet" href="../../../public/assets/css/styleAluno.css">
</head>

<body>
    <section class="container">
        <header>
            <div class="welcome">
                <h1 class="Titulo">FUMDESQL</h1>
                <h2 class="Subtitulo">SEU PERFIL</h2>
                <h3 class="boas-vindas">Bem-vindo, <?php echo $_SESSION['NOME']; ?></h3>
            </div>
            <div>
                <img src="../../../public/assets/img/santa-catarina-flag.png" alt="Santa Catarina Flag" class="flag">
            </div>
        </header>
        <br>
        <div class="innerConsole">
            <div class="screenDetail">
                <form class="studentDetailForm">
                    <h1>Suas Informações</h1>
                    <div class="formGroup">
                        <label for="studentName">Nome:</label>
                        <p id="studentName"><?php echo $data['aluno']['nomeAluno']; ?></p>
                    </div>
                    <div class="formGroup">
                        <label for="studentId">Matrícula:</label>
                        <p id="studentId"><?php echo $data['aluno']['matriculaAluno']; ?></p>
                    </div>
                    <div class="formGroup">
                        <label for="studentCPF">CPF:</label>
                        <p id="studentCPF"><?php echo $data['aluno']['cpf']; ?></p>
                    </div>
                    <div class="formGroup">
                        <label for="studentFase">Fase:</label>
                        <p id="studentFase"><?php echo $data['aluno']['faseAtual']; ?></p>
                    </div>
                    <div class="formGroup">
                        <label for="studentEmail">E-mail:</label>
                        <p id="studentEmail"><?php echo $data['aluno']['email']; ?></p>
                    </div>
                    <div class="formGroup">
                        <label for="studentPhone">Telefone:</label>
                        <p id="studentPhone"><?php echo $data['aluno']['telefone']; ?></p>
                    </div>
                    <a id="btn-inserir" href="/cadastro/novoDocumento/<?php echo $_SESSION['ID'] ?>"><button class="insereDoc" type="button">Upload</button></a>
                </form>
                <div>
                    <h1>Histórico de instituições</h1>
                    <ul class="historicoInstituicoes">
                        <?php foreach($data['instituicao'] as $inst) {?>

                        <li><?php echo $inst['nomeInstituicao']?></li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>

</html>