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
            <h1 class="Titulo">FUMDESQL</h1>
            <h2 class="Subtitulo">CONTROLE DE BOLSISTAS FUMDES</h2>
            <h3 class="boas-vindas">Olá, <?php echo $_SESSION['NOME'] ?></h3>
            <img src="public\assets\img\santa-catarina-flag.png" alt="Santa Catarina Flag" class="flag">
        </header>
        <div class="innerConsole"> <!-- listagem de alunos -->
            <div class="screenList">
                <ul class="studentList">
                    <li class="studentItem">Aluno 1</li>
                    <li class="studentItem">Aluno 2</li>
                    <li class="studentItem">Aluno 3</li>
                    <li class="studentItem">Aluno 4</li>
                    <li class="studentItem">Aluno 5</li>
                    <li class="studentItem">Aluno 6</li>
                    <li class="studentItem">Aluno 7</li>
                    <li class="studentItem">Aluno 8</li>
                    <li class="studentItem">Aluno 9</li>
                    <li class="studentItem">Aluno 10</li>
                    <!-- Mais itens podem ser adicionados aqui -->
                </ul>
            </div>
        </div>
        <div class="innerConsole"> <!-- detalhamento dos alunos-->
            <div class="innerConsole">
                <div class="screenDetail">
                    <form class="studentDetailForm">
                        <h3>Detalhes do Aluno</h3>
                        <div class="formGroup">
                            <label for="studentName">Nome:</label>
                            <input type="text" id="studentName" name="studentName" readonly>
                        </div>
                        <div class="formGroup">
                            <label for="studentId">Matrícula:</label>
                            <input type="text" id="studentId" name="studentId" readonly>
                        </div>
                        <div class="formGroup">
                            <label for="studentCourse">Curso:</label>
                            <input type="text" id="studentCourse" name="studentCourse" readonly>
                        </div>
                        <div class="formGroup">
                            <label for="studentEmail">E-mail:</label>
                            <input type="email" id="studentEmail" name="studentEmail" readonly>
                        </div>
                        <div class="formGroup">
                            <label for="studentPhone">Telefone:</label>
                            <input type="tel" id="studentPhone" name="studentPhone" readonly>
                        </div>
                    </form>
                </div>
            </div>

    </section>
</body>

</html>