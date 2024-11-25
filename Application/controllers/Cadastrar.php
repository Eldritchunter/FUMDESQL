<?php
// Arquivo responsável por realizar os cadastros e chamar os inserts do model cadastrar.php

use Application\core\Controller;

class Cadastrar extends Controller
{

    // Cadastro do aluno
    public function aluno()
    {
        $nome = $_POST['nomeAluno'];
        $matricula = $_POST['matriculaAluno'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $dataIngresso = $_POST['dataIngresso'];
        $instituicao = $_POST['instituicao'];
        $faseAtual = $_POST['faseAtual'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $conn = $this->model('cadastrar');
        $insertUser = $conn::insertUsuario($nome, $email, $senha, '2');
        $insert = $conn::insertAluno($nome, $matricula, $cpf, $telefone, $dataIngresso, $instituicao, $faseAtual, $email, $senha);
        header("location: /home/admin");
    }

    public function documentoAdmin()
    {
        $idAluno = $_POST['idAluno'];
        $dataDoc = $_POST['dataDoc'];
        $nomeInstituicao = $_POST['nomeInstituicao'];
        $horaInicial = $_POST['horaInicial'];
        $horaFinal = $_POST['horaFinal'];

        // Convertendo as strings para timestamps
        $timestampInicial = strtotime($horaInicial);
        $timestampFinal = strtotime($horaFinal);

        // Calculando a diferença em segundos
        $diferencaEmSegundos = $timestampFinal - $timestampInicial;

        // Convertendo a diferença para horas, minutos e segundos
        $horasTrabalhadas = date('H:i:s', $diferencaEmSegundos);

        $dir = "D:/xampp/htdocs/FUMDESQL/public/assets/docs/";
                $arquivo = $_FILES['docs'];
                $data = str_replace("-", "", date('d-m-y'));

                $arquivoNovo = $dir . $data . $arquivo["name"];

                if (move_uploaded_file($arquivo["tmp_name"], $arquivoNovo)) {
                    $arquivoNovo = $data . $arquivo["name"].".pdf";
                } else {
                    $arquivoNovo = "";
                }

        $conn = $this->model('cadastrar');
        $insertDocumento = $conn::insertDocumento( $idAluno, $arquivoNovo, $dataDoc , $horasTrabalhadas, $nomeInstituicao);
        header("location: /home/admin");
    }

    public function documentoAluno()
    {
        if($_SESSION['nivel'] == 2){
            $idAluno = $_SESSION['ID'];
        } else {
            $idAluno = $_POST['idAluno'];
        }
        $dataDoc = $_POST['dataDoc'];
        $nomeInstituicao = $_POST['nomeInstituicao'];
        $horaInicial = $_POST['horaInicial'];
        $horaFinal = $_POST['horaFinal'];

        // Convertendo as strings para timestamps
        $timestampInicial = strtotime($horaInicial);
        $timestampFinal = strtotime($horaFinal);

        // Calculando a diferença em segundos
        $diferencaEmSegundos = $timestampFinal - $timestampInicial;

        // Convertendo a diferença para horas, minutos e segundos
        $horasTrabalhadas = date('H:i:s', $diferencaEmSegundos);

        $dir = "D:/xampp/htdocs/FUMDESQL/public/assets/docs/";
                $arquivo = $_FILES['docs'];
                $data = str_replace("-", "", date('d-m-y'));

                $arquivoNovo = $dir . $data . $arquivo["name"];

                if (move_uploaded_file($arquivo["tmp_name"], $arquivoNovo)) {
                    $arquivoNovo = $data . $arquivo["name"].".pdf";
                } else {
                    $arquivoNovo = "";
                }

        $conn = $this->model('cadastrar');
        $insertDocumento = $conn::insertDocumento( $idAluno, $arquivoNovo, $dataDoc , $horasTrabalhadas, $nomeInstituicao);

        if($_SESSION['nivel'] == 2){
            header("location: /home/aluno");
        } else {
            header("location: /home/admin");
        }
    }
}
