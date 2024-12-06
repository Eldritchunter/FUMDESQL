<!DOCTYPE html>
<html lang="pt-br">
<?php

date_default_timezone_set('America/Bahia');

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BussFeed | Documentos Pendentes</title>
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
                <h1>Listagem de Documentos</h1>
                <p>Documentos pendentes de aprovação.</p>
                <ul class="studentList">
                    <?php foreach ($data['documentos'] as $documento) {

                    ?>
                        <li class="studentItem">
                            <p><?php echo $documento['nomeAluno'] . " - " . $documento['nomeInstituicao'] . " (Horas: " . $documento['horasDocumento'] . ")" ?></p>
                            <a href="../../../public/assets/docs/<?php echo $documento['caminhoDocumento'] ?>" download><button class="respostaDoc">Baixar Documento</button></a>
                            <a href="/cadastrar/aprovar/<?php echo $documento['idDocumentos'] ?>"><button class="respostaDoc">Aprovar</button></a>
                            <a href="/cadastrar/recusar/<?php echo $documento['idDocumentos'] ?>"><button class="respostaDoc">Recusar</button></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
</body>

</html>